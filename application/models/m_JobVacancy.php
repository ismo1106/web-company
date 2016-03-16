<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class M_JobVacancy extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    // ============================= Category =============================
    function selectCategory(){
        $this->db->order_by('id_category','ASC');
        $query = $this->db->get('tbl_vacancy_category');
        return $query->result();
    }
    function selectCategoryActive(){
        $this->db->where('active', 1);
        $this->db->order_by('id_category','ASC');
        $query = $this->db->get('tbl_vacancy_category');
        return $query->result();
    }
    function getCategory($idCat){
        $this->db->where('id_category',$idCat);
        $query = $this->db->get('tbl_vacancy_category');
        return $query->result();
    }
    function insertCategory($data){
        $this->db->trans_start();
        $this->db->insert('tbl_vacancy_category',$data);
        $this->db->trans_complete();
    }
    function updateCategory($idCat,$data){
        $this->db->where('id_category',$idCat);
        $this->db->update('tbl_vacancy_category',$data);
    }
    function deleteCategory($idCat){
        $this->db->where('id_category',$idCat);
        $this->db->delete('tbl_vacancy_category');
    }
    
    // ============================= Vacancy =============================
    function selectVacancy(){
        $this->db->order_by('id_vacancy','ASC');
        $query = $this->db->get('vw_select_vacancy');
        return $query->result();
    }
    function getCategoryByIdVacancy($idVacancy){
        $this->db->where('id_vacancy',$idVacancy);
        $query = $this->db->get('vw_select_vacancy');
        return $query->result();
    }
    function getVacancy($idVacancy){
        $this->db->where('id_vacancy',$idVacancy);
        $query = $this->db->get('tbl_vacancy_jobs');
        return $query->result();
    }
    function insertVacancy($data){
        $this->db->trans_start();
        $this->db->insert('tbl_vacancy_jobs',$data);
        $idVacancy  = $this->db->insert_id();
        $this->db->trans_complete();
        return $idVacancy;
    }
    function updateVacancy($idVacancy,$data){
        $this->db->where('id_vacancy',$idVacancy);
        $this->db->update('tbl_vacancy_jobs',$data);
    }
    
    // ============================= For Front =============================
    function selectVacancyPublish($num,$offset){
        $this->db->where('publish', 1);
        $this->db->order_by('id_vacancy', 'DESC');
        $query = $this->db->get('tbl_vacancy_jobs',$num,$offset);
        return $query->result();
    }
    function selectFilterVacancyPublish($idCat,$num,$offset){
        $this->db->where('publish', 1);
        $this->db->where('id_category', $idCat);
        $this->db->order_by('id_vacancy', 'DESC');
        $query = $this->db->get('tbl_vacancy_jobs',$num,$offset);
        return $query->result();
    }
    function countAllVacancyPublish(){
        $this->db->where('publish', 1);
        $query = $this->db->get('tbl_vacancy_jobs');
        return $query->num_rows();
    }
    function selectVacancyCategory(){
        $this->db->order_by('id_category','ASC');
        $query = $this->db->get('tbl_vacancy_category');
        return $query->result();
    }
}