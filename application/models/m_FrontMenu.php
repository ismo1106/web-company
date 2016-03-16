<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class M_FrontMenu extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function selectPageAll(){
        $query = $this->db->get('vw_page_all_for_back');
        return $query->result();
    }
    
    function selectPage1(){
        $this->db->order_by('id_page', 'ASC');
        $query = $this->db->get('tbl_page_lv1');
        return $query->result();
    }
    function selectPage1Avtive(){
        $this->db->where('active', 1);
        $this->db->order_by('id_page', 'ASC');
        $query = $this->db->get('tbl_page_lv1');
        return $query->result();
    }
    
    function selectPage2(){
        $this->db->order_by('id_page', 'ASC');
        $query = $this->db->get('tbl_page_lv2');
        return $query->result();
    }
    function selectPage2Avtive(){
        $this->db->where('active', 1);
        $this->db->order_by('id_page', 'ASC');
        $query = $this->db->get('tbl_page_lv2');
        return $query->result();
    }
    
    function selectPage3(){
        $this->db->order_by('id_page', 'ASC');
        $query = $this->db->get('tbl_page_lv3');
        return $query->result();
    }
    function selectPage3Avtive(){
        $this->db->where('active', 1);
        $this->db->order_by('id_page', 'ASC');
        $query = $this->db->get('tbl_page_lv3');
        return $query->result();
    }
    
    function getPage1($idPage){
        $this->db->where('id_page',$idPage);
        $query = $this->db->get('tbl_page_lv1');
        return $query->result();
    }
    
    function getPage2($idPage){
        $this->db->where('id_page',$idPage);
        $query = $this->db->get('tbl_page_lv2');
        return $query->result();
    }
    function getHeadPage2($idPage){
        $this->db->where('header_page',$idPage);
        $query = $this->db->get('tbl_page_lv2');
        return $query->result();
    }
    
    function getPage3($idPage){
        $this->db->where('id_page',$idPage);
        $query = $this->db->get('tbl_page_lv3');
        return $query->result();
    }
    function getPage3forEdit($idPage){
        $this->db->where('id3',$idPage);
        $query = $this->db->get('vw_page_all_for_back');
        return $query;
    }
    
    // ================ Insert ================
    function savePage1($data){
        $this->db->trans_start();
        $this->db->insert('tbl_page_lv1',$data);
        $this->db->trans_complete();
    }
    function savePage2($data){
        $this->db->trans_start();
        $this->db->insert('tbl_page_lv2',$data);
        $this->db->trans_complete();
    }
    function savePage3($data){
        $this->db->trans_start();
        $this->db->insert('tbl_page_lv3',$data);
        $this->db->trans_complete();
    }
    
    // ================ Update ================
    function updatePage1($idPage,$data){
        $this->db->where('id_page',$idPage);
        $this->db->update('tbl_page_lv1',$data);
    }
    function updatePage2($idPage,$data){
        $this->db->where('id_page',$idPage);
        $this->db->update('tbl_page_lv2',$data);
    }
    function updatePage3($idPage,$data){
        $this->db->where('id_page',$idPage);
        $this->db->update('tbl_page_lv3',$data);
    }
    
    // ================ Delete ================
    function deletePage1($idPage){
        $this->db->where('id_page',$idPage);
        $this->db->delete('tbl_page_lv1');
    }
    function deletePage2($idPage){
        $this->db->where('id_page',$idPage);
        $this->db->delete('tbl_page_lv2');
    }
    function deletePage3($idPage){
        $this->db->where('id_page',$idPage);
        $this->db->delete('tbl_page_lv3');
    }
    
    // ================ Get Setting================
    function getSetting(){
        $this->db->where('key_setting', 1);
        return $this->db->get('tbl_setting')->result();
    }
    
    // ================ Footer Page =================
    function selectFooterPage(){
        $this->db->order_by('id_page', 'ASC');
        $query = $this->db->get('tbl_page_footer');
        return $query->result();
    }
    function selectFooterLeftActive(){
        $this->db->where('active', 1);
        $this->db->where('category_page', 1);
        $this->db->order_by('id_page', 'DESC');
        $query = $this->db->get('tbl_page_footer');
        return $query->result();
    }
    function selectFooterCenterActive(){
        $this->db->where('active', 1);
        $this->db->where('category_page', 0);
        $this->db->order_by('id_page', 'DESC');
        $query = $this->db->get('tbl_page_footer');
        return $query->result();
    }
    
    function getFooterPage($idPage){
        $this->db->where('id_page',$idPage);
        $query = $this->db->get('tbl_page_footer');
        return $query->result();
    }
    function insertFooterPage($data){
        $this->db->trans_start();
        $this->db->insert('tbl_page_footer',$data);
        $this->db->trans_complete();
    }
    function updateFooterPage($idPage,$data){
        $this->db->where('id_page',$idPage);
        $this->db->update('tbl_page_footer',$data);
    }
    function deleteFooterPage($idPage){
        $this->db->where('id_page',$idPage);
        $this->db-delete('tbl_page_footer');
    }
    
}