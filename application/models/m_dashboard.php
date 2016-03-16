<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Author   : Ismo Broto
 */

class M_Dashboard extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    function getRowDailyComment(){
        $query  = $this->db->query("SELECT * FROM `tbl_blog_comment` WHERE DATE(commnet_date) = CURDATE()");
        return $query->num_rows();
    }
    
    function getRowNotYetApproveComment(){
        $query  = $this->db->query("SELECT * FROM `tbl_blog_comment` WHERE approve = 0");
        return $query->num_rows();
    }
    
    function getRowPostPublished(){
        $query  = $this->db->query("SELECT * FROM `tbl_blog_post` WHERE publish = 1");
        return $query->num_rows();
    }
    
    function getRowDailyVisitor($page){
        $query  = $this->db->query("SELECT * FROM `tbl_visitor` WHERE DATE(date_visit) = CURDATE() AND on_page = ".$page);
        return $query->num_rows();
    }
}