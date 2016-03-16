<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class M_Login extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    private $table_name = 'tbl_utl_user';
    private $username   = 'username';
    private $password   = 'password';
    
    function getLogin($username){
        $this->db->where($this->username,$username);
        return $this->db->get($this->table_name);
    }

    function setLogin($username,$password){
        $this->db->where($this->username,$username);
        $this->db->where($this->password,$password);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function saveLog($data){
        $this->db->trans_start();
        $this->db->insert('tbl_utl_user_log',$data);
        $this->db->trans_complete();
    }
    
    // ======================= Utility/User =======================
    function selectUserJoinGroupuser(){
        $this->db->order_by('username','ASC');
        $query = $this->db->get('vw_utl_list_user');
        return $query->result();
    }
    
    function getUser($username){
        $this->db->where('username', $username);
        $query = $this->db->get('vw_utl_list_user');
        return $query->result();
    }
    
    function insertUser($data){
        $this->db->trans_start();
        $this->db->insert('tbl_utl_user',$data);
        $this->db->trans_complete();
    }
    
    function updateUsers($username,$data){
        $this->db->where('username',$username);
        $this->db->update('tbl_utl_user',$data);
    }
    
    function deleteUsers($username){
        $this->db->where('username',$username);
        $this->db->delete('tbl_utl_user');
    }
}