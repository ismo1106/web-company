<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */
class M_Widget extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    function getWidgetType($idWidget){
        $this->db->where('id_widget', $idWidget);
        return $query = $this->db->get('tbl_widget_type');
    }

    function getWidgetSlider(){
        $this->db->where('id_widget', 1);
        $query = $this->db->get('tbl_widget_type');
        return $query;
    }
    function getWidgetQuotes(){
        $this->db->where('id_widget', 2);
        $query = $this->db->get('tbl_widget_type');
        return $query;
    }
    function getWidgetTagLine(){
        $this->db->where('id_widget', 3);
        $query = $this->db->get('tbl_widget_type');
        return $query;
    }
    function getWidgetProductTile(){
        $this->db->where('id_widget', 4);
        $query = $this->db->get('tbl_widget_type');
        return $query;
    }
    function getWidgetPhilosophy(){
        $this->db->where('id_widget', 6);
        $query = $this->db->get('tbl_widget_type');
        return $query;
    }

    function selectWidgetType(){
        $query = $this->db->get('tbl_widget_type');
        return $query->result();
    }

    function updateWidgetType($idWidget,$data){
        $this->db->where('id_widget', $idWidget);
        $this->db->update('tbl_widget_type', $data);
    }
    
    function selectWidget(){
        $this->db->order_by('created_date','ASC');
        $query = $this->db->get('tbl_widget');
        return $query->result();
    }

    function selectWidgetWhere($type,$limit){
        $this->db->limit($limit);
        $this->db->where('publish', 1);
        $this->db->where('type_widget', $type);
        $this->db->order_by('created_date','DESC');
        $query = $this->db->get('tbl_widget');
        return $query->result();
    }
    
    function getWidget($idWidget){
        $this->db->where('code_widget', $idWidget);
        $query = $this->db->get('tbl_widget');
        return $query->result();
    }
    
    function saveWidget($data){
        $this->db->trans_start();
        $this->db->insert('tbl_widget',$data);
        $this->db->trans_complete();
    }
    
    function editWidget($idWidget,$data){
        $this->db->where('code_widget', $idWidget);
        $this->db->update('tbl_widget',$data);
    }
    
    function deleteWidget($data){
        
    }
}