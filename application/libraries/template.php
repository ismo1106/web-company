<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
    
    function display($template,$data=null){
        $this->_CI->load->model('M_FrontMenu');
        $data['_getPage1']      = $this->_CI->M_FrontMenu->selectPage1();
        $data['_getPage2']      = $this->_CI->M_FrontMenu->selectPage2();
        $data['_getPage3']      = $this->_CI->M_FrontMenu->selectPage3();
        
        $data['_getFootLeft']   = $this->_CI->M_FrontMenu->selectFooterLeftActive();
        $data['_getFootCenter'] = $this->_CI->M_FrontMenu->selectFooterCenterActive();
        $data['_getSetting']    = $this->_CI->M_FrontMenu->getSetting();
        
        $data['_content']       = $this->_CI->load->view($template,$data,true);
	$data['_navbar']        = $this->_CI->load->view('template/navbar',$data,true);
	$data['_footer']        = $this->_CI->load->view('template/footer',$data,true);
        $this->_CI->load->view('/template.php',$data);
    }
    
}

