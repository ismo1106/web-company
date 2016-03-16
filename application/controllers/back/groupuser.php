<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class Groupuser extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_Groupuser','M_MenuSidebar'));
        $this->load->library('encrypt');
    }
    
    function index(){
        $data['_selectGroupuser']   = $this->M_Groupuser->selectGroupuser();
        $this->theme->display('back_page/utility/groupuser/index',$data);
    }
    
    function insertGroupuser(){
        $data   = array(
            'group_name'    => ucwords(strtolower($this->input->post('txtGroupuser'))),
            'active'        => $this->input->post('radActive'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        
        $this->M_Groupuser->insertGroupuser($data);
        redirect('back/groupuser/index');
    }
    
    function ajaxEditGroupuser(){
        if('IS_AJAX') {
            $idGroup                = $this->input->post('kode');
            $data['_getGroupuser']  = $this->M_Groupuser->getGroupuser($idGroup);
            $this->load->view('back_page/utility/groupuser/edit',$data);
        }
    }
    
    function updateGroupuser(){
        $idGroup    = $this->input->post('txtIdGroupuser');
        $data       = array(
            'group_name'    => ucwords(strtolower($this->input->post('txtGroupuser'))),
            'active'        => $this->input->post('radActive'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        
        $this->M_Groupuser->updateGroupuser($idGroup,$data);
        redirect('back/groupuser/index');
    }
    
    function ajaxAccessGroupuser(){
        if('IS_AJAX') {
            $group_id               = $this->input->post('kode');
            $data['_getGroupuser']  = $this->M_Groupuser->getGroupuser($group_id);
            $data['_selectMenu1']   = $this->M_MenuSidebar->selectViewMenu1($group_id);
            $data['_selectMenu2']   = $this->M_MenuSidebar->selectViewMenu2($group_id);
            $data['_selectMenu3']   = $this->M_MenuSidebar->selectViewMenu3($group_id);
            $this->load->view('back_page/utility/groupuser/accessMenu',$data);
        }
    }
            
    function deleteGroupuser($idGroup){
        $this->M_Groupuser->deleteGroupuser($idGroup);
        redirect('back/groupuser/index');
    }
}