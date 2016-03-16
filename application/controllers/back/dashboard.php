<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model('m_dashboard');
    }
    
    public function index(){
        $data['_getRowDailyComment']    = $this->m_dashboard->getRowDailyComment();
        $data['_getRowNotYetApprove']   = $this->m_dashboard->getRowNotYetApproveComment();
        $data['_getRowPublishedPost']   = $this->m_dashboard->getRowPostPublished();
        $data['_getRowDailyVisitorFront']   = $this->m_dashboard->getRowDailyVisitor(0);
        $data['_getRowDailyVisitorBack']    = $this->m_dashboard->getRowDailyVisitor(1);
        $this->theme->display('back_page/index',$data);
    }
    
    function test(){
        $tags=json_decode(file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn='. $this->getIP()), true);
        if($tags['geobyteslocationcode']!='')
        {
            echo '<p>Welcome to visitors from '.$tags['geobytesfqcn'].'. '.PHP_EOL ;
        }
        print_r($tags);
        echo PHP_EOL ;
        print_r($tags['geobytescity']);
        echo PHP_EOL.'<p>The value of GeobytesCity is:'.$tags['geobytescity'].'</p>';
    }
    
    function getIP() {
      foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
         if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
               if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                  return $ip;
               }
            }
         }
      }
   }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/back/dashboard.php */