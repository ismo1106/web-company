<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Author   : Ismo Broto
 */

class M_BlogPost extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    function selectLastThree(){
        $query  = $this->db->query('SELECT * FROM vw_select_blog ORDER BY id_post DESC LIMIT 3');
        return $query->result();
    }
    function selectLastFour(){
        $query  = $this->db->query('SELECT * FROM vw_select_blog ORDER BY id_post DESC LIMIT 4');
        return $query->result();
    }
            
    function selectBlogPost(){
        $this->db->order_by('id_post', 'ASC');
        $query = $this->db->get('vw_select_blog');
        return $query->result();
    }
    
    function selectBlogPublish($num,$offset){
        $this->db->where('publish', 1);
        $this->db->order_by('id_post', 'DESC');
        $query = $this->db->get('tbl_blog_post',$num,$offset);
        return $query->result();
    }
    function selectFilterBlogPublish($idCat,$num,$offset){
        $this->db->where('publish', 1);
        $this->db->where('id_category', $idCat);
        $this->db->order_by('id_post', 'DESC');
        $query = $this->db->get('tbl_blog_post',$num,$offset);
        return $query->result();
    }
    
    function selectWhereBlogPublish($idCat){
        $this->db->where('publish', 1);
        $this->db->where('id_category', $idCat);
        $this->db->order_by('id_post', 'ASC');
        $query = $this->db->get('vw_select_blog');
        return $query->result();
    }
    
    function countAllPostPublish(){
        $this->db->where('publish', 1);
        $query = $this->db->get('vw_select_blog');
        return $query->num_rows();
    }
            
    function getBlogPost($idPost){
        $this->db->where('id_post',$idPost);
        $query = $this->db->get('tbl_blog_post');
        return $query->result();
    }
    
    function saveBlogPost($data){
        $this->db->trans_start();
        $this->db->insert('tbl_blog_post',$data);
        $idPost  = $this->db->insert_id();
        $this->db->trans_complete();
        return $idPost;
    }
    
    function updateBlogPost($idPost,$data){
        $this->db->where('id_post',$idPost);
        $this->db->update('tbl_blog_post',$data);
    }
    
    function deleteBlogPost($idPost){
        $this->db->where('id_post',$idPost);
        $this->db->delete('tbl_blog_post');
    }
    
    // ============================ Media ============================
    function addMedia($data){
        $this->db->trans_start();
        $this->db->insert('tbl_blog_media',$data);
        $this->db->trans_complete();
    }
    
    function selectMedia(){
        $this->db->order_by('uploaded_date', 'ASC');
        $query = $this->db->get('tbl_blog_media');
        return $query->result();
    }
}