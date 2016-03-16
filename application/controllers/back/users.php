<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class Users extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_Groupuser','M_Login'));
        $this->load->library('encrypt');
    }
    
    function index(){
        $data['_selectGroupuser']   = $this->M_Groupuser->selectGroupuser();
        $data['_selectUserlogin']   = $this->M_Login->selectUserJoinGroupuser();
        $this->theme->display('back_page/utility/users/index',$data);
    }
    
    function insertUsers(){
        $data   = array(
            'username'      => strtolower($this->input->post('txtUsername')),
            'nickname'      => $this->input->post('txtNickname'),
            'password'      => md5($this->input->post('txtPassword')),
            'active'        => $this->input->post('radActive'),
            'group_id'      => $this->input->post('selGroupuser'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        
        $this->M_Login->insertUser($data);
        redirect('back/users');
    }
    
    function ajaxEditUsers(){
        if('IS_AJAX') {
            $username                   = $this->input->post('kode');
            $data['_getUsers']          = $this->M_Login->getUser($username);
            $data['_selectGroupuser']   = $this->M_Groupuser->selectGroupuser();
            $this->load->view('back_page/utility/users/edit',$data);
        }
    }
    
    function updateUsers(){
        $usename    = strtolower($this->input->post('txtUsername'));
        $data   = array(
            'nickname'      => $this->input->post('txtNickname'),
            'active'        => $this->input->post('radActive'),
            'group_id'      => $this->input->post('selGroupuser'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        
        $this->M_Login->updateUsers($usename,$data);
        redirect('back/users');
    }
    
    function resetPassword($usename){
        $data   = array(
            'password'      => md5('123456'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        
        $this->M_Login->updateUsers($usename,$data);
        redirect('back/users');
    }
            
    function deleteUsers($username){
        $this->M_Login->deleteUsers($username);
        redirect('back/users');
    }
}