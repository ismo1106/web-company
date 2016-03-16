<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class SetupProfile extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_Profile'));
    }
    
    function index(){
        $data['_selectContent']    = $this->M_Profile->selectContentProfile();
        $this->theme->display('back_page/setup_profile/content_profile/list_content',$data);
    }
    
    // // ====================== Header ======================
    function indexHeadProfile(){
        $data['_selectHead']    = $this->M_Profile->selectHeadProfile();
        $this->theme->display('back_page/setup_profile/head_profile/index',$data);
    }
    function saveHeadProfile(){
        $data   = array(
            'head_abbr'     => strtolower($this->input->post('txtHeadProfile')),
            'head_descript' => $this->input->post('txtDescript'),
            'created_by'    => ucwords(strtolower($this->session->userdata('nickname'))),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Profile->saveHeadProfile($data);
        redirect('back/setupProfile/indexHeadProfile');
    }
    function viewEditHeadProfile(){
        if('IS_AJAX') {
            $kode   = $this->input->post('kode');
            $data['_getHeadProfile']    = $this->M_Profile->getHeadProfile($kode);
            $this->load->view('back_page/setup_profile/head_profile/edit',$data);
        }
    }
    function updateHeadProfile(){
        $idHead = $this->input->post('txtIdHead');
        $data   = array(
            'head_abbr'     => strtolower($this->input->post('txtHeadProfile')),
            'head_descript' => $this->input->post('txtDescript'),
            'updated_by'    => ucwords(strtolower($this->session->userdata('nickname'))),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Profile->updateHeadProfile($idHead,$data);
        redirect('back/setupProfile/indexHeadProfile');        
    }
    function deleteHeadProfile($idHead){
        $this->M_Profile->deleteHeadProfile($idHead);
        redirect('back/setupProfile/indexHeadProfile');
    }
    
    // ====================== Content ======================
    function indexProfileContent(){
        $segment    = $this->uri->segment(4);
        if($segment == 'failed' || $segment == 'failUpload'){
            $data['_message']   = 'Upload content is not stored , check your uploaded images or other settings!';
        }else{
            $data['_message']   = NULL;
        }
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']       = $url;
        $data['_selectHead']    = $this->M_Profile->selectHeadProfile();
        $this->theme->display('back_page/setup_profile/content_profile/index',$data);
    }
    function saveProfileContent(){
        $layout = $this->input->post('radioLayout');
        
        $char   = 'QWERTYUIOPASDFGHJKLZXCVBNM'
                . 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890';
        $rand   = substr(str_shuffle(str_repeat($char, 5)), 0, 5);
        $data   = array(
            'kode_profile'  => $rand,
            'id_head'       => $this->input->post('selHeader'),
            'title_profile' => $this->input->post('txtTitlePost'),
            'post_profile'  => $this->input->post('txtPostValue'),
            'publish'       => $this->input->post('selStatusPost'),
            'layout_content'=> $this->input->post('radioLayout'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        
        $path   = "./assets/img/";
        $config['upload_path']      = $path;		
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '1024';
        $config['file_name']        = $rand.'.png';
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if($layout == 1){
            $this->M_Profile->saveContentProfile($data);
            redirect('back/setupProfile/indexProfileContent');
        }else{
            if(!$this->upload->do_upload('imgHeader')) {
                redirect(site_url('back/setupProfile/indexProfileContent/failed'));
            }else {
                $this->M_Profile->saveContentProfile($data);
                redirect('back/setupProfile/indexProfileContent');
            }
        }
    }
    function viewEditContentProfile($kodeContent){
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']       = $url;
        $data['_selectHead']    = $this->M_Profile->selectHeadProfile();
        $data['_selectContent'] = $this->M_Profile->getContentProfile($kodeContent);
        $this->theme->display('back_page/setup_profile/content_profile/edit',$data);
    }
    function updateContentProfile(){
        $kode   = $this->input->post('txtKodeProfile');
        $layout = $this->input->post('radioLayout');
        $data   = array(
            'id_head'       => $this->input->post('selHeader'),
            'title_profile' => $this->input->post('txtTitlePost'),
            'post_profile'  => $this->input->post('txtPostValue'),
            'publish'       => $this->input->post('selStatusPost'),
            'layout_content'=> $this->input->post('radioLayout'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        
        if($layout == 1){
            // langsung update
            $this->M_Profile->updateContentProfile($kode,$data);
            redirect('back/setupProfile/index');
        }else{
            $path   = "./assets/img/";
            $config['upload_path']      = $path;		
            $config['allowed_types']    = 'jpeg|jpg|png|gif';
            $config['allow_scale_up']   = true;
            $config['overwrite']        = true;
            $config['max_size']         = '1024';
            $config['file_name']        = $kode.'.png';

            $this->load->library('upload');
            $this->upload->initialize($config);

            $imgFile = $_FILES["imgHeader"]["tmp_name"];
            if(empty($imgFile) || $imgFile == '' || !isset($imgFile)){
                //file not selected
                $this->M_Profile->updateContentProfile($kode,$data);
                redirect('back/setupProfile/index');
                
            }else{
                //file selected
                if(!$this->upload->do_upload('imgHeader')) {
                    redirect(site_url('back/setupProfile/viewEditContentProfile/'.$kode.'/failed'));
                }else {
                    $this->M_Profile->updateContentProfile($kode,$data);
                    redirect('back/setupProfile/index');
                }
            }   
        }
    }
    function deleteContentProfile($idContent){
        $this->M_Profile->deleteContentProfile($idContent);
        redirect('back/setupProfile/index');
    }        
            
    function cek($error){
        $char   = 'QWERTYUIOPASDFGHJKLZXCVBNM'
                . 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890!@#$%^&*()';
        echo $s = substr(str_shuffle(str_repeat($char, 5)), 0, 5);
        echo $error;
    }
        
}