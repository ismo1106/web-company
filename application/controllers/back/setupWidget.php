<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class SetupWidget extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_Widget'));
    }
    
    function index(){
        $segment    = $this->uri->segment(4);
        if($segment == 'failedSlide'):
            $data['_alert'] = 1;
        else:
            $data['_alert'] = 0;
        endif;
        $data['_selectWidget']      = $this->M_Widget->selectWidget();
        $data['_selectWidgetType']  = $this->M_Widget->selectWidgetType();
        $this->theme->display('back_page/setup_widget/index',$data);
    }

    function setActive($idWidget){
        $row = $this->M_Widget->getWidgetType($idWidget)->row();

        if ($row->active == 1) {
            $data   = array(
                'active'    => 0
            );
        }else{
            $data   = array(
                'active'    => 1
            );
        }

        $this->M_Widget->updateWidgetType($idWidget,$data);
        redirect('back/SetupWidget/index');
    }
    
    // ========================== Widget Slider ==========================
    function ajaxAddSlider(){
        if('IS_AJAX'){
            $this->load->view('back_page/setup_widget/addSlider');
        }
    }
    function saveSlider(){
        $char   = 'QWERTYUIOPASDFGHJKLZXCVBNM'
                . 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890';
        $rand   = substr(str_shuffle(str_repeat($char, 5)), 0, 5);
        
        $data   = array(
            'code_widget'   => $rand,
            'type_widget'   => 1,
            'title_widget'  => $this->input->post('txtTitle'),
            'description'   => $this->input->post('txtDescript'),
            'thumb_slider'  => 1,
            'thumb_potition'=> $this->input->post('radImgPotition'),
            'publish'       => $this->input->post('selStatusPost'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        
        $path   = "./assets/upload/img-slider/";
        $config['upload_path']      = $path;		
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['min_height']       = '270';
        $config['max_size']         = '1024';
        $config['file_name']        = $rand.'.png';
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        
        if(!$this->upload->do_upload('imgThumb')) {
            redirect(site_url('back/setupWidget/index/failedSlide'));
        }else {
            $this->M_Widget->saveWidget($data);
            redirect('back/setupWidget');
        }
    }
    function ajaxEditSlider(){
        if('IS_AJAX'){
            $idWidget           = $this->input->post('kode');
            $data['_getWidget'] = $this->M_Widget->getWidget($idWidget);
            $this->load->view('back_page/setup_widget/editSlider',$data);
        }
    }
    function editSlider(){
        $code   = $this->input->post('txtCodeWidget');
        $data   = array(
            'type_widget'   => 1,
            'title_widget'  => $this->input->post('txtTitle'),
            'description'   => $this->input->post('txtDescript'),
            'thumb_slider'  => 1,
            'thumb_potition'=> $this->input->post('radImgPotition'),
            'publish'       => $this->input->post('selStatusPost'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        
        $path   = "./assets/upload/img-slider/";
        $config['upload_path']      = $path;        
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['min_height']       = '270';
        $config['max_size']         = '1024';
        $config['file_name']        = $code.'.png';
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        $imgFile = $_FILES["imgThumb"]["tmp_name"];
        if(empty($imgFile) || $imgFile == '' || !isset($imgFile)){
            $this->M_Widget->editWidget($code,$data);
            redirect('back/setupWidget');
        }else{
            if(!$this->upload->do_upload('imgThumb')) {
                redirect(site_url('back/setupWidget/index/failedSlide'));
            }else {
                $this->M_Widget->editWidget($code,$data);
                redirect('back/setupWidget');
            }
        }
    }
    
    // ========================== Widget Quote ==========================
    function ajaxAddQuote(){
        if('IS_AJAX'){
            $this->load->view('back_page/setup_widget/addQuotes');
        }
    }
    function saveQuote(){
        $char   = 'QWERTYUIOPASDFGHJKLZXCVBNM'
                . 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890';
        $rand   = substr(str_shuffle(str_repeat($char, 5)), 0, 5);
        
        $data   = array(
            'code_widget'   => $rand,
            'type_widget'   => 2,
            'title_widget'  => $this->input->post('txtTitle'),
            'quote_by'      => $this->input->post('txtQuoteBy'),
            'description'   => $this->input->post('txtDescript'),
            'publish'       => $this->input->post('selStatusPost'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Widget->saveWidget($data);
        redirect('back/setupWidget');
    }
    function ajaxEditQuote(){
        if('IS_AJAX'){
            $idWidget           = $this->input->post('kode');
            $data['_getWidget'] = $this->M_Widget->getWidget($idWidget);
            $this->load->view('back_page/setup_widget/editQuotes',$data);
        }
    }
    function editQuote(){
        $code   = $this->input->post('txtCodeWidget');
        $data   = array(
            'type_widget'   => 2,
            'title_widget'  => $this->input->post('txtTitle'),
            'quote_by'      => $this->input->post('txtQuoteBy'),
            'description'   => $this->input->post('txtDescript'),
            'publish'       => $this->input->post('selStatusPost'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Widget->editWidget($code,$data);
        redirect('back/setupWidget');
    }

    // ========================== Widget Tag Line ==========================
    function ajaxAddTagLine(){
        if('IS_AJAX'){
            $this->load->view('back_page/setup_widget/addTagLines');
        }
    }
    function saveTagLine(){
        $char   = 'QWERTYUIOPASDFGHJKLZXCVBNM'
                . 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890';
        $rand   = substr(str_shuffle(str_repeat($char, 5)), 0, 5);
        
        $data   = array(
            'code_widget'   => $rand,
            'type_widget'   => 3,
            'title_widget'  => $this->input->post('txtTitle'),
            'icon_tag_line' => $this->input->post('radioIcon'),
            'description'   => $this->input->post('txtDescript'),
            'publish'       => $this->input->post('selStatusPost'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Widget->saveWidget($data);
        redirect('back/setupWidget');
    }
    function ajaxEditTagLine(){
        if('IS_AJAX'){
            $idWidget           = $this->input->post('kode');
            $data['_getWidget'] = $this->M_Widget->getWidget($idWidget);
            $this->load->view('back_page/setup_widget/editTagLines',$data);
        }
    }
    function editTagLine(){
        $code   = $this->input->post('txtCodeWidget');
        $data   = array(
            'type_widget'   => 3,
            'title_widget'  => $this->input->post('txtTitle'),
            'icon_tag_line' => $this->input->post('radioIcon'),
            'description'   => $this->input->post('txtDescript'),
            'publish'       => $this->input->post('selStatusPost'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Widget->editWidget($code,$data);
        redirect('back/setupWidget');
    }

    // ========================== Widget Product Tile ==========================
    function ajaxAddProductTile(){
        if('IS_AJAX'){
            $this->load->view('back_page/setup_widget/addProductTile');
        }
    }
    function saveProductTile(){
        $char   = 'QWERTYUIOPASDFGHJKLZXCVBNM'
                . 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890';
        $rand   = substr(str_shuffle(str_repeat($char, 5)), 0, 5);
        
        $data   = array(
            'code_widget'   => $rand,
            'type_widget'   => 4,
            'title_widget'  => $this->input->post('txtTitle'),
            'thumb_product_tile'    => 1,
            'publish'       => $this->input->post('selStatusPost'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        
        $path   = "./assets/upload/img-slider/";
        $config['upload_path']      = $path;
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '1024';
        $config['file_name']        = $rand.'.png';
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        
        if(!$this->upload->do_upload('imgThumb')) {
            redirect(site_url('back/setupWidget/index/failed'));
        }else {
            $this->M_Widget->saveWidget($data);
            redirect('back/setupWidget');
        }
    }
    function ajaxEditProductTile(){
        if('IS_AJAX'){
            $idWidget           = $this->input->post('kode');
            $data['_getWidget'] = $this->M_Widget->getWidget($idWidget);
            $this->load->view('back_page/setup_widget/editProductTile',$data);
        }
    }
    function editProductTile(){
        $code   = $this->input->post('txtCodeWidget');
        $data   = array(
            'type_widget'   => 4,
            'title_widget'  => $this->input->post('txtTitle'),
            'thumb_product_tile'    => 1,
            'publish'       => $this->input->post('selStatusPost'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        
        $path   = "./assets/upload/img-slider/";
        $config['upload_path']      = $path;        
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '1024';
        $config['file_name']        = $code.'.png';
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        $imgFile = $_FILES["imgThumb"]["tmp_name"];
        if(empty($imgFile) || $imgFile == '' || !isset($imgFile)){
            $this->M_Widget->editWidget($code,$data);
            redirect('back/setupWidget');
        }else{
            if(!$this->upload->do_upload('imgThumb')) {
                redirect(site_url('back/setupWidget/index/failed'));
            }else {
                $this->M_Widget->editWidget($code,$data);
                redirect('back/setupWidget');
            }
        }
    }
    
    // ========================== Philosophy ==========================
    function ajaxAddPhilosophy(){
        if('IS_AJAX'){
            $this->load->view('back_page/setup_widget/addPhilosophy');
        }
    }
    function savePhilosophy(){
        $char   = 'QWERTYUIOPASDFGHJKLZXCVBNM'
                . 'qwertyuiopasdfghjklzxcvbnm'
                . '1234567890';
        $rand   = substr(str_shuffle(str_repeat($char, 5)), 0, 5);
        
        $data   = array(
            'code_widget'   => $rand,
            'type_widget'   => 6,
            'title_widget'  => $this->input->post('txtTitle'),
            'description'   => $this->input->post('txtDescript'),
            'publish'       => $this->input->post('selStatusPost'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Widget->saveWidget($data);
        redirect('back/setupWidget');
    }
    function ajaxEditPhilosophy(){
        if('IS_AJAX'){
            $idWidget           = $this->input->post('kode');
            $data['_getWidget'] = $this->M_Widget->getWidget($idWidget);
            $this->load->view('back_page/setup_widget/editPhilosophy',$data);
        }
    }
    function editPhilosophy(){
        $code   = $this->input->post('txtCodeWidget');
        $data   = array(
            'type_widget'   => 6,
            'title_widget'  => $this->input->post('txtTitle'),
            'description'   => $this->input->post('txtDescript'),
            'publish'       => $this->input->post('selStatusPost'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        $this->M_Widget->editWidget($code,$data);
        redirect('back/setupWidget');
    }
    
}