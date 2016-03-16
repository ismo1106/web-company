<?php
class Theme{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
    
    function display($template,$data=null){
        $this->_CI->load->model('m_menuSidebar');
        
        $data['_getMenu1']  = $this->_CI->m_menuSidebar->selectMenu1ByGroup();
        $data['_getMenu2']  = $this->_CI->m_menuSidebar->selectMenu2ByGroup();
        $data['_getMenu3']  = $this->_CI->m_menuSidebar->selectMenu3ByGroup();
        
        $data['_content']   = $this->_CI->load->view($template,$data,true);
	$data['_header']    = $this->_CI->load->view('template/back_header',$data,true);
	$data['_sidebar']   = $this->_CI->load->view('template/back_sidebar',$data,true);
	$data['_footer']    = $this->_CI->load->view('template/back_footer',$data,true);
        $this->_CI->load->view('template_back.php',$data);
    }
    
}

