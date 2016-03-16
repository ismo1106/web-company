<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }
    
    public function index(){
        $page   = 0;
        $this->theGhostCode($page);
        redirect(site_url('front/home'));
    }
    
    public function comingSoon(){
        $this->load->view('coming_soon/index');
    }
    
    function theGhostCode($page = NULL){
        // this like ghost : don't you gubris
        $this->load->library(array('user_agent','encrypt','mobile_detect','misc'));
        
        $detect     = new Mobile_Detect();
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? '' : '') : 'PC');

        foreach($detect->getRules() as $name => $regex):
            $check = $detect->{'is'.$name}();
            if($check == 'true'){
                $deviceType .= $name.' ';
            }
        endforeach;

        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_robot()){
            $agent = $this->agent->robot();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent = 'Unidentified User Agent';
        }
        $ipAddress  = $_SERVER['REMOTE_ADDR'];
        $hostName   = gethostname();
        if (!isset($_COOKIE['visitor'])){ // if an visitor
            setcookie('visitor', $ipAddress, time() +3600);
            //save to db
            $data   = array(
                'date_visit'    => date('Y-m-d H:i:s'),
                'ip_address'    => $ipAddress,
                'hostname'      => $hostName,
                'device'        => $deviceType,
                'browser'       => $agent,
                'platform'      => $this->misc->platform(),
                'user_agent'    => $this->agent->agent_string(),
                'on_page'       => $page
            );
            $this->db->insert('tbl_visitor',$data);
        }
    }
}

/* End of file core.php */
/* Location: ./application/controllers/core.php */