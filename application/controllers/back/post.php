<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */
class Post extends CI_Controller{
    
    private $im = array('dadsad','kdfjlsd','eoiruw');

    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_BlogCategory','M_BlogPost'));
        $this->load->library('encrypt');
    }
    
    public function index(){
        $this->theme->display('back_page/post/category/index');
    }
    
    // ================================ Category Blog ==========================
    function category(){
        $data['_selectCategory']    = $this->M_BlogCategory->selectBlogCategory();
        $this->theme->display('back_page/post/category/index',$data);
    }
    function saveBlogCategory(){
        $data   = array(
            'name_category' => ucwords(strtolower($this->input->post('txtCategory'))),
            'active'        => $this->input->post('radActiveCategorty'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $this->M_BlogCategory->saveBlogCategory($data);
        
        redirect('back/post/category');
    }
    function viewModalEditCategory(){
        if('IS_AJAX') {
            $kode   = $this->input->post('kode');
            $data['_getBlogCategory'] = $this->M_BlogCategory->getBlogCategory($kode);
            $this->load->view('back_page/post/category/edit',$data);
        }
    }
    function editBlogCategory(){
        $idCat  = $this->input->post('txtIdCategory');
        $data   = array(
            'name_category' => $this->input->post('txtCategory'),
            'active'        => $this->input->post('radActiveCategorty'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        $this->M_BlogCategory->updateBlogCategory($idCat,$data);
        
        redirect('back/post/category');
    }
    function deleteBlogCategory($idCat){
        $this->M_BlogCategory->deleteBlogCategory($idCat);
        redirect('back/post/category');
    }
    
    // ========================== All Post =====================================
    function allPost(){
        $data['_selectPost']    = $this->M_BlogPost->selectBlogPost();
        $this->theme->display('back_page/post/post_all/index',$data);
    }
    
    // ========================== Create New Post ==============================
    function newPost(){
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']           = $url;
        $data['_selectCategory']    = $this->M_BlogCategory->selectBlogCategoryActive();
        $this->theme->display('back_page/post/post_new/index',$data);
    }
    function saveNewPost(){
        $idCat          = $this->input->post('selCategory');
        $getCategory    = $this->M_BlogCategory->getBlogCategory($idCat);
        foreach ($getCategory as $row):
            $getCountPost   = $row->count_post;
        endforeach;
        $dataCat    = array(
            'count_post'    => $getCountPost+1
        );
        
        $data   = array(
            'id_category'   => $this->input->post('selCategory'),
            'title_post'    => ucwords(strtolower($this->input->post('txtTitlePost'))),
            'post'          => $this->input->post('txtPostValue'),
            'publish'       => $this->input->post('selStatusPost'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $idPost = $this->M_BlogPost->saveBlogPost($data);
        $this->session->set_flashdata('idPost',$idPost);
        
        if($idPost > 0){
            $this->M_BlogCategory->updateBlogCategory($idCat,$dataCat);
            redirect('back/post/viewUploadThumb');
        }else{
            redirect('back/post/newPost/failed');
        }
        
    }
    
    function viewUploadThumb(){
        $idPost = $this->session->flashdata('idPost');
        $this->session->keep_flashdata('idPost');
        
        $data['_getPost']    = $this->M_BlogPost->getBlogPost($idPost);
        $this->theme->display('back_page/post/post_new/uploadThumb',$data);
    }
    
    function uploadThumbPost(){
        $idPost = $this->input->post('txtIdPost');
        $data   = array(
            'thumbnail' => 1
        );
        
        $path   = "./assets/upload/thumbnail-post/";
        $config['upload_path']      = $path;
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '2048';
        $config['file_name']        = $idPost.".png";
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('imgThumb')) {
            $this->session->set_flashdata('idPost',$idPost);
            redirect('back/post/viewUploadThumb/failed');
        }else{
            $this->M_BlogPost->updateBlogPost($idPost,$data);
            $this->session->set_flashdata('idPost',$idPost);
            
            redirect('back/post/allPost');
        }
    }
            
    function viewEditPost($idPost){
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']           = $url;
        $data['_getBlogPost']       = $this->M_BlogPost->getBlogPost($idPost);
        $data['_selectCategory']    = $this->M_BlogCategory->selectBlogCategoryActive();
        $this->theme->display('back_page/post/post_new/edit',$data);
    }
    
    function updatePost(){
        $idPost = $this->input->post('txtidPost');
        
        $getCategory    = $this->M_BlogCategory->getCategoryByIdPost($idPost);
        foreach ($getCategory as $row):
            $idCatold   = $row->id_category;
            $getWasPost = $row->count_post;
        endforeach;
        $dataCatOld     = array(
            'count_post'    => $getWasPost-1
        );
        $this->M_BlogCategory->updateBlogCategory($idCatold,$dataCatOld);
        
        $idCatNew       = $this->input->post('selCategory');
        $getCategoryNew = $this->M_BlogCategory->getBlogCategory($idCatNew);
        foreach ($getCategoryNew as $row):
            $getCountPost   = $row->count_post;
        endforeach;
        $dataCatNew     = array(
            'count_post'    => $getCountPost+1
        );
        $this->M_BlogCategory->updateBlogCategory($idCatNew,$dataCatNew);
        
        $data   = array(
            'id_category'   => $this->input->post('selCategory'),
            'title_post'    => ucwords(strtolower($this->input->post('txtTitlePost'))),
            'post'          => $this->input->post('txtPostValue'),
            'publish'       => $this->input->post('selStatusPost'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        $this->M_BlogPost->updateBlogPost($idPost,$data);
        $this->session->set_flashdata('idPost',$idPost);
        
        redirect('back/post/viewUploadThumb');
    }
    
    function deleteBlogPost($idCat,$idPost){
        $idPost         = $this->uri->segment(4);
        $idCat          = $this->uri->segment(5);
        $getCategory    = $this->M_BlogCategory->getBlogCategory($idCat);
        foreach ($getCategory as $row):
            $getCountPost   = $row->count_post;
        endforeach;
        $dataCat    = array(
            'count_post'    => $getCountPost - 1
        );
        $this->M_BlogCategory->updateBlogCategory($idCat,$dataCat);
        
        $this->M_BlogPost->deleteBlogPost($idPost);
        redirect('back/post/allPost');
    }
    
    // ========================== Media Picture ==========================
    function ajaxSelectMedia(){
        if('IS_AJAX') {
            $data['_selectMedia']   = $this->M_BlogPost->selectMedia();
            $this->load->view('back_page/post/post_new/image_select',$data);
        }
    }
    function ajaxAddMedia(){
        if('IS_AJAX') {
            $data['_URL']   = $this->input->post('url');
            $this->load->view('back_page/post/post_new/image_add',$data);
        }
    }
    
    function uploadMedia(){
        $char   = 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890';
        $rand   = substr(str_shuffle(str_repeat($char, 6)), 0, 6);
        $date   = date('y-m-d(');
                
        $path   = "./assets/upload/images/";
        $config['upload_path']      = $path;		
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '1024';
        $config['file_name']        = $date.$rand.".png";
        
        $data   = array(
            'kode_media'    => $date.$rand,
            'name_media'    => $date.$rand.".png",
            'descript_media'=> $this->input->post('txtDescriptMedia'),
            'link_media'    => $path.$date.$rand.".png",
            'uploaded_by'   => $this->session->userdata('nickname'),
            'uploaded_date' => date('Y-m-d H:i:s')
        );
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        $thisURL    = $this->input->post('txtThisURL');
        
        if(!$this->upload->do_upload('fileMedia')) {
            redirect(site_url(''.$thisURL.'/failUpload'));
        }else{
            $this->M_BlogPost->addMedia($data);
            redirect(site_url(''.$thisURL.'/successUpload'));
        }
    }
    
    function test(){
        $this->load->library('encrypt');
        $char   = 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890!@#$%^&';
        $rand   = substr(str_shuffle(str_repeat($char, 6)), 0, 6);
        $date   = date('y-m-d(');
        $path   = "./assets/upload/images/";
        echo $date.$rand.".png</br>";
        echo $path.$date.$rand.".png";
        echo '<hr/>';
        
        $text   = '123456mama';
        $pass   = 'qwerty';
        $enc    = $this->fnEncrypt($text, $pass);
        $des    = $this->fnDencrypt($enc, $pass);
        $sa     = $this->encrypt->encode($text, $pass);
        
        echo 'Text  : '.$text."</br>";
        echo 'Enc  : '.$enc."</br>";
        echo 'Des  : '.$des."</br>";
        echo 'Enc  : '.$this->encrypt->encode($text, $pass)."</br>";
        echo 'Des  : '.$this->encrypt->decode($sa, $pass)."</br>";
        
        foreach ($this->im as $as){
            echo $as.",";
        }
        
        echo '</br>';
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        echo $url;
        echo '</br>';
        $kalimat    = 'aku cinta dia dan dirimu';
        $keyText    = ' d';
        if(strpos($kalimat, $keyText)){
            echo 'Text found';
        }else{
            echo '<span style="color :red;">Text not found</span>';
        }
        echo '<hr/>';
        $asas = 'front/profile/of/IaZBs';
        echo substr($asas, 17);
    }
    
    

    function GenerateRandomColor(){
        $color = '#';
        $colorHexLighter = array("A","B","C","D","E","F","0","1","2","3","4","5","6","7","8","9");
        for($x=0; $x < 6; $x++):
            $color .= $colorHexLighter[array_rand($colorHexLighter, 1)]  ;
        endfor;
        echo substr($color, 0, 7);
        echo substr($color, 0, 7);
        echo substr($color, 0, 7);
        echo substr($color, 0, 7);
        echo substr($color, 0, 7);
    }


    
    function fnEncrypt($sValue, $sSecretKey){
        return rtrim(
            base64_encode(
                mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    $sSecretKey, $sValue, 
                    MCRYPT_MODE_ECB, 
                    mcrypt_create_iv(
                        mcrypt_get_iv_size(
                            MCRYPT_RIJNDAEL_256, 
                            MCRYPT_MODE_ECB
                        ), 
                    MCRYPT_RAND)
                )
            ), "\0"
        );
    }
    function fnDencrypt($sValue, $sSecretKey){
        return rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_256, 
                $sSecretKey, 
                base64_decode($sValue), 
                MCRYPT_MODE_ECB,
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND
                )
            ), "\0"
        );
    }
        
}

/* End of file post.php */
/* Location: ./application/controllers/back/post.php */