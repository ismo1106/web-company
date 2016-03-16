<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Author : ITD-15
 */

class Adminpanel extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->library('../controllers/core');
        $page   = 1;
        $this->core->theGhostCode($page);
        
        redirect(site_url('back/login'));
    }
}

/* End of file adminpanel.php */
/* Location: ./application/controllers/adminpanel.php */