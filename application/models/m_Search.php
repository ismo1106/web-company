<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class M_Search extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }
    
    // ================= Search in Blog =================
    function searchLikeTitleBlog($key){
        $this->db->where('publish', 1);
        $this->db->like('title_post', $key);
        return $this->db->get('tbl_blog_post');
    }
    function searchLikePostBlog($key){
        $this->db->where('publish', 1);
        $this->db->like('post', $key);
        return $this->db->get('tbl_blog_post');
    }
    
    // ================= Search in Profile =================
    function searchLikeTitleProfile($key){
        $this->db->where('publish', 1);
        $this->db->like('title_profile', $key);
        return $this->db->get('tbl_profile_post');
    }
    function searchLikePostProfile($key){
        $this->db->where('publish', 1);
        $this->db->like('post_profile', $key);
        return $this->db->get('tbl_profile_post');
    }
}