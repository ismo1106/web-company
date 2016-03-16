<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class Setting extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model('M_Setting');
    }
    
    function index(){
        $data['_getSetting']    = $this->M_Setting->getSetting();
        $this->theme->display('back_page/setting/index',$data);
    }
    
    function submitSetting(){
        $data   = array( 
            'name_company'      => $this->input->post('txtCompany'), 
            'display_company'   => $this->input->post('txtDisplayName'), 
            'address'           => $this->input->post('txtAddress'),  
            'work_time'         => $this->input->post('txtWorkHour'), 
            'longitude_map'     => $this->input->post('txtLongitude'), 
            'latitude_map'      => $this->input->post('txtLatitude'), 
            'phone1'            => $this->input->post('txtPhone1'), 
            'phone2'            => $this->input->post('txtPhone2'), 
            'fax'               => $this->input->post('txtFax'), 
            'facebook'          => $this->input->post('txtFacebook'), 
            'twitter'           => $this->input->post('txtTwitter'), 
            'instagram'         => $this->input->post('txtInstagram'), 
            'google_plus'       => $this->input->post('txtGooglePlus'), 
            'email'             => $this->input->post('txtEmail'), 
            'updated_by'        => $this->session->userdata('nickname'), 
            'updated_date'      => date('Y-m-d H:i:s')
        );
        
        $this->M_Setting->submitSetting($data);
        redirect('back/setting');
    }
}