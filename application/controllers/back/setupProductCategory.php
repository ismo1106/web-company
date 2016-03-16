<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class SetupProductCategory extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_Product'));
    }
    
    public function index(){
        $data['_selectCatProduct']  = $this->M_Product->selectCategoryProduct();
        $data['_selectTypeProduct'] = $this->M_Product->selectTypeProduct();
        $this->theme->display('back_page/setup_product/category/index',$data);
    }
    
    function saveCategoryProduct(){
        $data   = array(
            'id_type'               => $this->input->post('selectType'),
            'name_category_product' => $this->input->post('txtCategory'),
            'created_by'            => $this->session->userdata('nickname'),
            'created_date'          => date('Y-m-d H:i:s')
        );
        $this->M_Product->saveCategoryProduct($data);
        redirect('back/setupProductCategory');
    }
    
    function ajaxCategoryProduct(){
        if('IS_AJAX'){
            $idCat                          = $this->input->post('kode');
            $data['_getCategoryProduct']    = $this->M_Product->getCategoryProduct($idCat);
            $data['_selectTypeProduct']     = $this->M_Product->selectTypeProduct();
            $this->load->view('back_page/setup_product/category/edit',$data);
        }
    }
    
    function updateCategoryProduct(){
        $idCat  = $this->input->post('txtCategoryID');
        $data   = array(
            'id_type'               => $this->input->post('selectType'),
            'name_category_product' => $this->input->post('txtCategory'),
            'updated_by'            => $this->session->userdata('nickname'),
            'updated_date'          => date('Y-m-d H:i:s')
        );
        $this->M_Product->updateCategoryProduct($idCat,$data);
        redirect('back/setupProductCategory');
    }
    
    function deleteCategoryProduct($idCat){
        $this->M_Product->deleteCategoryProduct($idCat);
        redirect('back/setupProductCategory');
    }
}