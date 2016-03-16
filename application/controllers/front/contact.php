<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->model('M_FrontMenu');
        $data['_getSetting']    = $this->M_FrontMenu->getSetting();
        $this->template->display('front_page/contact/index',$data);
    }
}

/* End of file contact.php */
/* Location: ./application/controllers/front/contact.php */