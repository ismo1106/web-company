<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class M_Profile extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    // ====================== Header ======================
    function selectHeadProfile(){
        $this->db->order_by('id_head_profile','ASC');
        $query = $this->db->get('tbl_profile_head');
        return $query->result();
    }    
    function getHeadProfile($idHead){
        $this->db->where('id_head_profile',$idHead);
        $query = $this->db->get('tbl_profile_head');
        return $query->result();
    }    
    function saveHeadProfile($data){
        $this->db->trans_start();
        $this->db->insert('tbl_profile_head',$data);
        $this->db->trans_complete();
    }    
    function updateHeadProfile($idHead,$data){
        $this->db->where('id_head_profile',$idHead);
        $this->db->update('tbl_profile_head',$data);
    }    
    function deleteHeadProfile($idHead){
        $this->db->where('id_head_profile',$idHead);
        $this->db->delete('tbl_profile_head');
    }
    
    // ====================== Content ======================
    function selectContentProfile(){
        $this->db->order_by('created_date','ASC');
        $query = $this->db->get('vw_select_content_profile');
        return $query->result();
    }
    function selectWhereContentProfile($idContent){
        $this->db->order_by('created_date','ASC');
        $this->db->where('kode_profile',$idContent);
        $query = $this->db->get('vw_select_content_profile');
        return $query->result();
    }
    function getContentProfile($idContent){
        $this->db->where('kode_profile',$idContent);
        $query = $this->db->get('tbl_profile_post');
        return $query->result();
    }    
    function saveContentProfile($data){
        $this->db->trans_start();
        $this->db->insert('tbl_profile_post',$data);
        $this->db->trans_complete();
    }    
    function updateContentProfile($idContent,$data){
        $this->db->where('kode_profile',$idContent);
        $this->db->update('tbl_profile_post',$data);
    }    
    function deleteContentProfile($idContent){
        $this->db->where('kode_profile',$idContent);
        $this->db->delete('tbl_profile_post');
    }
    
    function checkLayoutProfile($kodeProfile){
        $query  = $this->db->query("SELECT layout_content FROM tbl_profile_post WHERE kode_profile = '".$kodeProfile."'")->row();
        return $query->layout_content;
    }
}