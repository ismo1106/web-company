<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class M_Product extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    function selectTypeProduct(){
        $this->db->order_by('id_type','ASC');
        $query  = $this->db->get('tbl_product_type');
        return $query->result();
    }
    // ============================= Category =============================
    function selectCategoryProduct(){
        $this->db->order_by('id_category_product','ASC');
        $query  = $this->db->get('vw_join_type_category_product');
        return $query->result();
    }
    function getCategoryProduct($idCat){
        $this->db->where('id_category_product',$idCat);
        $query  = $this->db->get('tbl_product_category');
        return $query->result();
    }
    function selectCategoryWhereType($idType){
        $this->db->order_by('id_category_product','ASC');
        $this->db->where('id_type',$idType);
        $query  = $this->db->get('tbl_product_category');
        return $query->result();
    }            
    function saveCategoryProduct($data){
        $this->db->trans_start();
        $this->db->insert('tbl_product_category',$data);
        $this->db->trans_complete();
    }
    function updateCategoryProduct($idCat,$data){
        $this->db->where('id_category_product',$idCat);
        $this->db->update('tbl_product_category',$data);
    }
    function deleteCategoryProduct($idCat){
        $this->db->where('id_category_product',$idCat);
        $this->db->delete('tbl_product_category');
    }

    // ============================= Product =============================
    function selectProduct(){
        $this->db->order_by('id_product','ASC');
        $query  = $this->db->get('vw_select_product');
        return $query->result();
    }
    function getProduct($idProduct){
        $this->db->where('id_product',$idProduct);
        $query  = $this->db->get('vw_select_product');
        return $query->result();
    }
    function saveProduct($data){
        $this->db->trans_start();
        $this->db->insert('tbl_product',$data);
        $idProduct  = $this->db->insert_id();
        $this->db->trans_complete();
        return $idProduct;
    }
    function updateProduct($idProduct,$data){
        $this->db->where('id_product',$idProduct);
        $this->db->update('tbl_product',$data);
    }
    function deleteProduct($idProduct){
        $this->db->where('id_product',$idProduct);
        $this->db->delete('tbl_product');
    }
    
    // ============================= Product in Front =============================
    function selectProductConsumer(){
        $this->db->where('type_product', 1);
        $query  = $this->db->get('vw_select_product');
        return $query->result();
    }
    function selectProductIndustrial(){
        $this->db->where('type_product', 2);
        $query  = $this->db->get('vw_select_product');
        return $query->result();
    }
    
}