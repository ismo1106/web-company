<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: itd15
 * Date: 10/08/2015
 * Time: 15:20
 */
class M_MenuSidebar extends CI_Model{

    private $menu1 = 'tbl_utl_menu_lv1';
    private $menu2 = 'tbl_utl_menu_lv2';
    private $menu3 = 'tbl_utl_menu_lv3';

    function __construct(){
        parent:: __construct();
    }
    
    function getGroupID(){
        $username   = $this->session->userdata('username');
        $this->db->where('username', $username);
        $get    = $this->db->get('tbl_utl_user');
        $row    = $get->row();
        return $row->group_id;
    }
    
    function selectMenu1(){
        $this->db->order_by('menu_id', 'ASC');
        $query = $this->db->get($this->menu1);
        return $query->result();
    }
    function selectMenu1ByGroup(){
        $username   = $this->session->userdata('username');
        $this->db->where('username', $username);
        $get    = $this->db->get('tbl_utl_user');
        $row    = $get->row();
        
        $this->db->order_by('menu_id', 'ASC');
        $this->db->where('group_id', $row->group_id);
        $query = $this->db->get('vw_utl_menu_lv1');
        return $query->result();
    }
    function selectViewMenu1($group_id){
        $query = $this->db->query("SELECT group_id, menu_id, menu_label, menu_icon, 1 as acc FROM vw_utl_menu_lv1 WHERE group_id = ".$group_id."
            UNION ALL
            SELECT NULL as group_id, menu_id, menu_label, menu_icon, 0 as acc FROM tbl_utl_menu_lv1
                    WHERE menu_id NOT IN (SELECT menu_id FROM vw_utl_menu_lv1 WHERE group_id = ".$group_id.")
            ORDER BY menu_id");
        return $query->result();
    }

    function selectMenu2(){
        $this->db->order_by('menu_id', 'ASC');
        $query = $this->db->get($this->menu2);
        return $query->result();
    }
    function selectMenu2ByGroup(){
        $username   = $this->session->userdata('username');
        $this->db->where('username', $username);
        $get    = $this->db->get('tbl_utl_user');
        $row    = $get->row();
        
        $this->db->order_by('menu_id', 'ASC');
        $this->db->where('group_id', $row->group_id);
        $query = $this->db->get('vw_utl_menu_lv2');
        return $query->result();
    }
    function selectViewMenu2($group_id){
        $query = $this->db->query("SELECT group_id, menu_id, menu_label, menu_icon, menu_header, 1 as acc FROM vw_utl_menu_lv2 WHERE group_id = ".$group_id."
            UNION ALL
            SELECT NULL as group_id, menu_id, menu_label, menu_icon, menu_header, 0 as acc FROM tbl_utl_menu_lv2
                    WHERE menu_id NOT IN (SELECT menu_id FROM vw_utl_menu_lv2 WHERE group_id = ".$group_id.")
            ORDER BY menu_id");
        return $query->result();
    }
    
    function selectMenu3(){
        $this->db->order_by('menu_id', 'ASC');
        $query = $this->db->get($this->menu3);
        return $query->result();
    }
    function selectMenu3ByGroup(){
        $username   = $this->session->userdata('username');
        $this->db->where('username', $username);
        $get    = $this->db->get('tbl_utl_user');
        $row    = $get->row();
        
        $this->db->order_by('menu_id', 'ASC');
        $this->db->where('group_id', $row->group_id);
        $query = $this->db->get('vw_utl_menu_lv3');
        return $query->result();
    }
    function selectViewMenu3($group_id){
        $query = $this->db->query("SELECT group_id, menu_id, menu_label, menu_icon, menu_header, 1 as acc FROM vw_utl_menu_lv3 WHERE group_id = ".$group_id."
            UNION ALL
            SELECT NULL as group_id, menu_id, menu_label, menu_icon, menu_header, 0 as acc FROM tbl_utl_menu_lv3
                    WHERE menu_id NOT IN (SELECT menu_id FROM vw_utl_menu_lv3 WHERE group_id = ".$group_id.")
            ORDER BY menu_id");
        return $query->result();
    }
    
    // ==================== Save Menu Access ====================
    function saveAccessMenu($group_id,$menu_id){
        $info = array(
            'group_id'  => $group_id,
            'menu_id'   => $menu_id
        );
        
        $this->db->trans_start();
        $get    = $this->db->get_where('tbl_utl_menu_access',$info);
        if ($get->num_rows() == 0):
            $this->db->insert('tbl_utl_menu_access',$info);
        endif;
        $this->db->trans_complete();
    }
    
    function deleteAccessMenu($group_id){
        $this->db->where('group_id', $group_id);
        $this->db->delete('tbl_utl_menu_access');
    }
}

/* End of file m_menuSidebar.php */
/* Location: ./application/models/m_menuSidebar.php */