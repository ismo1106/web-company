<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Author   : Ismo Broto
 */

class M_BlogCategory extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function selectBlogCategory(){
        $this->db->order_by('id_category','ASC');
        $query = $this->db->get('tbl_blog_category');
        return $query->result();
    }
    function selectBlogCategoryActive(){
        $this->db->where('active', 1);
        $this->db->order_by('id_category','ASC');
        $query = $this->db->get('tbl_blog_category');
        return $query->result();
    }
            
    function getBlogCategory($idCat){
        $this->db->where('id_category',$idCat);
        $query = $this->db->get('tbl_blog_category');
        return $query->result();
    }
    
    function getCategoryByIdPost($idPost){
        $this->db->where('id_post',$idPost);
        $query = $this->db->get('vw_select_blog');
        return $query->result();
    }
            
    function saveBlogCategory($data){
        $this->db->trans_start();
        $this->db->insert('tbl_blog_category',$data);
        $this->db->trans_complete();
    }
    
    function updateBlogCategory($idCat,$data){
        $this->db->where('id_category',$idCat);
        $this->db->update('tbl_blog_category',$data);
    }
    
    function deleteBlogCategory($idCat){
        $this->db->where('id_category',$idCat);
        $this->db->delete('tbl_blog_category');
    }
    
    function selectCategory(){
        $this->db->order_by('id_category','ASC');
        $query = $this->db->get('tbl_blog_category');
        return $query->result_array();
    }
}