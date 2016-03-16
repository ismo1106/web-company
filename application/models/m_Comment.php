<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class M_Comment extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function selectComment(){
        $this->db->where('trash', 0);
        $this->db->order_by('id_comment', 'ASC');
        $query = $this->db->get('vw_select_comment');
        return $query->result();
    }
    function selectCommentApproved(){
        $this->db->where('approve', 1);
        $this->db->where('trash', 0);
        $this->db->order_by('id_comment', 'ASC');
        $query = $this->db->get('vw_select_comment');
        return $query->result();
    }
    function selectCommentWaitingApprove(){
        $this->db->where('approve', 0);
        $this->db->where('trash', 0);
        $this->db->order_by('id_comment', 'ASC');
        $query = $this->db->get('vw_select_comment');
        return $query->result();
    }
    
    function selectCommentTrashed(){
        $this->db->where('trash', 1);
        $this->db->order_by('id_comment', 'ASC');
        $query = $this->db->get('vw_select_comment');
        return $query->result();
    }
    function getPost($idPost){
        $this->db->where('id_post', $idPost);
        return $this->db->get('tbl_blog_post');
    }
    function getComment($idComment){
        $this->db->where('id_comment', $idComment);
        return $this->db->get('vw_select_comment');
    }
            
    function selectWhereComment($idPost){
        $this->db->where('id_post', $idPost);
        $this->db->where('approve', 1);
        $this->db->where('trash', 0);
        $this->db->order_by('id_comment', 'DESC');
        $query = $this->db->get('tbl_blog_comment');
        return $query->result();
    }
    
    function selectCommentThree(){
        $this->db->limit(3);
        $this->db->where('approve', 1);
        $this->db->where('trash', 0);
        $this->db->order_by('id_comment', 'DESC');
        $query = $this->db->get('tbl_blog_comment');
        return $query->result();
    }
            
    function saveComment($data){
        $this->db->trans_start();
        $this->db->insert('tbl_blog_comment',$data);
        $this->db->trans_complete();
    }
    
    function updateBlogPost($idPost,$data){
        $this->db->where('id_post',$idPost);
        $this->db->update('tbl_blog_post',$data);
    }
    function updateComment($idComment,$data){
        $this->db->where('id_comment',$idComment);
        $this->db->update('tbl_blog_comment',$data);
    }
    
    function deleteComment($idComment){
        $this->db->where('id_comment',$idComment);
        $this->db->delete('tbl_blog_comment');
    }
}