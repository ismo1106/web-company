<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Author   : Ismo Broto
 */

class M_Groupuser extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function selectGroupuser(){
        $this->db->order_by('group_id','ASC');
        $query = $this->db->get('tbl_utl_group_user');
        return $query->result();
    }
    
    function getGroupuser($idGroup){
        $this->db->where('group_id',$idGroup);
        $query = $this->db->get('tbl_utl_group_user');
        return $query->result();
    }
    
    function insertGroupuser($data){
        $this->db->trans_start();
        $this->db->insert('tbl_utl_group_user',$data);
        $this->db->trans_complete();
    }
    
    function updateGroupuser($idGroup,$data){
        $this->db->where('group_id',$idGroup);
        $this->db->update('tbl_utl_group_user',$data);
    }
    
    function deleteGroupuser($idGroup){
        $this->db->where('group_id',$idGroup);
        $this->db->delete('tbl_utl_group_user');
    }
}