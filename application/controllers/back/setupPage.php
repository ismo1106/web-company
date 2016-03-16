<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class SetupPage extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_FrontMenu','M_Profile'));
    }
    
    function index(){
        $data['_selectFooter']  = $this->M_FrontMenu->selectFooterPage();
        $data['_selectPage']    = $this->M_FrontMenu->selectPageAll();
        $this->theme->display('back_page/setup_page/index',$data);
    }
    
    // ============================ First Page ============================
    function ajaxFirstPage(){
        $data['_selectProfilContent']   = $this->M_Profile->selectContentProfile();
        $this->load->view('back_page/setup_page/firstPage',$data);
    }
    function saveFirstPage(){
        $data   = array(
            'label_page'    => $this->input->post('txtLabelPage'),
            'active'        => $this->input->post('radActive'),
            'link_page'     => $this->input->post('selectLinkPage')
        );
        $this->M_FrontMenu->savePage1($data);
        redirect('back/setupPage/');
    }
    function ajaxEditFirstPage(){
        if('IS_AJAX'){
            $idPage = $this->input->post('kode');
            $data['_getPageFirst']          = $this->M_FrontMenu->getPage1($idPage);
            $data['_selectProfilContent']   = $this->M_Profile->selectContentProfile();
            $this->load->view('back_page/setup_page/edit/firstPage',$data);
        }
    }
    function updateFirstPage(){
        $idPage = $this->input->post('txtIdPage');
        $data   = array(
            'label_page'    => $this->input->post('txtLabelPage'),
            'active'        => $this->input->post('radActive'),
            'link_page'     => $this->input->post('selectLinkPage')
        );
        $this->M_FrontMenu->updatePage1($idPage,$data);
        redirect('back/setupPage/');
    }
    
    // ============================ Second Page ============================
    function ajaxSecondPage(){
        $data['_selectFirstPage']       = $this->M_FrontMenu->selectPage1();
        $data['_selectProfilContent']   = $this->M_Profile->selectContentProfile();
        $this->load->view('back_page/setup_page/secondPage',$data);
    }
    function saveSecondPage(){
        $data   = array(
            'label_page'    => $this->input->post('txtLabelPage'),
            'header_page'   => $this->input->post('selectHeaderPage'),
            'active'        => $this->input->post('radActive'),
            'link_page'     => $this->input->post('selectLinkPage')
        );
        $this->M_FrontMenu->savePage2($data);
        redirect('back/setupPage/');
    }
    function ajaxEditSecondPage(){
        if('IS_AJAX'){
            $idPage = $this->input->post('kode');
            $data['_getPageSecond']         = $this->M_FrontMenu->getPage2($idPage);
            $data['_selectFirstPage']       = $this->M_FrontMenu->selectPage1();
            $data['_selectProfilContent']   = $this->M_Profile->selectContentProfile();
            $this->load->view('back_page/setup_page/edit/secondPage',$data);
        }
    }
    function updateSecondPage(){
        $idPage = $this->input->post('txtIdPage');
        $data   = array(
            'label_page'    => $this->input->post('txtLabelPage'),
            'header_page'   => $this->input->post('selectHeaderPage'),
            'active'        => $this->input->post('radActive'),
            'link_page'     => $this->input->post('selectLinkPage')
        );
        $this->M_FrontMenu->updatePage2($idPage,$data);
        redirect('back/setupPage/');
    }


    // ============================ Third Page ============================
    function ajaxThirdPage(){
        $data['_selectFirstPage']       = $this->M_FrontMenu->selectPage1();
        $data['_selectProfilContent']   = $this->M_Profile->selectContentProfile();
        $this->load->view('back_page/setup_page/thirdPage',$data);
    }
    function ajaxSelectThirdPage(){
        $idPage                     = $this->input->post('head');
        $data['_selectSecondPage']  = $this->M_FrontMenu->getHeadPage2($idPage);
        $this->load->view('back_page/setup_page/getSecondPage',$data);
    }
    function saveThirdPage(){
        $data   = array(
            'label_page'    => $this->input->post('txtLabelPage'),
            'header_page'   => $this->input->post('selectSubHeaderPage'),
            'active'        => $this->input->post('radActive'),
            'link_page'     => $this->input->post('selectLinkPage')
        );
        $this->M_FrontMenu->savePage3($data);
        redirect('back/setupPage/');
    }
    function ajaxEditThirdPage(){
        if('IS_AJAX'){
            $idPage = $this->input->post('kode');
            $data['_getPageThird']          = $this->M_FrontMenu->getPage3forEdit($idPage)->result();
            $get2   = $this->M_FrontMenu->getPage3forEdit($idPage)->row();
            $idPage2= $get2->id1;
            $data['_selectFirstPage']       = $this->M_FrontMenu->selectPage1();
            $data['_selectSecondPage']      = $this->M_FrontMenu->getHeadPage2($idPage2);
            $data['_selectProfilContent']   = $this->M_Profile->selectContentProfile();
            $this->load->view('back_page/setup_page/edit/thirdPage',$data);
        }
    }
    function updateThirdPage(){
        $idPage = $this->input->post('txtIdPage');
        $data   = array(
            'label_page'    => $this->input->post('txtLabelPage'),
            'header_page'   => $this->input->post('selectSubHeaderPage'),
            'active'        => $this->input->post('radActive'),
            'link_page'     => $this->input->post('selectLinkPage')
        );
        $this->M_FrontMenu->updatePage3($idPage,$data);
        redirect('back/setupPage/');
    }
    
    // ============================ Footer Page ============================
    function ajaxFooterPage(){
        if('IS_AJAX'){
            $this->load->view('back_page/setup_page/footerPage');
        }
    }
    function saveFooterPage(){
        $data   = array(
            'category_page' => $this->input->post('selCategory'),
            'label_page'    => $this->input->post('txtLabelPage'),
            'link_page'     => $this->input->post('txtLinkPage'),
            'active'        => $this->input->post('radActive')
        );
        
        $this->M_FrontMenu->insertFooterPage($data);
        redirect('back/setupPage');
    }
    function ajaxEditFooterPage(){
        if('IS_AJAX'){
            $idPage = $this->input->post('kode');
            $data['_getPageFooter'] = $this->M_FrontMenu->getFooterPage($idPage);
            $this->load->view('back_page/setup_page/edit/footerPage',$data);
        }
    }
    function updateFooterPage(){
        $idPage = $this->input->post('txtIdPage');
        $data   = array(
            'category_page' => $this->input->post('selCategory'),
            'label_page'    => $this->input->post('txtLabelPage'),
            'link_page'     => $this->input->post('txtLinkPage'),
            'active'        => $this->input->post('radActive')
        );
        
        $this->M_FrontMenu->updateFooterPage($idPage,$data);
        redirect('back/setupPage');
    }
    
}