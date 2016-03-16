<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array('user_agent','encrypt'));
    }
    
    public function index(){
        $this->load->model(array('M_BlogPost','M_Widget'));
        if($this->agent->is_mobile()){
            $mobile = 1;
        }else{
            $mobile = 0;
        }
        $data['_isMobile']          = $mobile;
        $data['_selectLastPost']    = $this->M_BlogPost->selectLastThree();
        
        $data['_getWidgetSlider']   = $this->M_Widget->getWidgetSlider()->row();
        $data['_getWidgetQuotes']   = $this->M_Widget->getWidgetQuotes()->row();
        $data['_getWidgetTagLine']  = $this->M_Widget->getWidgetTagLine()->row();
        $data['_getWidgetProTile']  = $this->M_Widget->getWidgetProductTile()->row();

        $data['_selectWidgetSlider']   = $this->M_Widget->selectWidgetWhere(1,5);
        $data['_selectWidgetQuotes']   = $this->M_Widget->selectWidgetWhere(2,5);
        $data['_selectWidgetTagLine']  = $this->M_Widget->selectWidgetWhere(3,3);
        $data['_selectWidgetProTile']  = $this->M_Widget->selectWidgetWhere(4,4);
        
        $this->template->display('front_page/home_page/index',$data);
    }
    
    function demo(){
        echo $ipAdd     = getenv('remote_addr').'<br/>';
        echo $ipAdd2    = $_SERVER['REMOTE_ADDR'];
        echo '<br/>';
        $date=getdate(date('U'));
        $day=$date['mday'];
        $month=$date['month'];
        $year=$date['year'];
        echo $day.'/'.$month.'/'.$year;
        echo '<br/>';
        echo gethostbyaddr($ipAdd2);
        echo '<br/>';
        echo gethostname();
        echo '<br/>';
        echo $_SERVER['HTTP_USER_AGENT'];
    }
}

/* End of file home.php */
/* Location: ./application/controllers/front/home.php */