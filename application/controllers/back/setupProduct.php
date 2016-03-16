<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class SetupProduct extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_Product'));
        $this->load->library('encrypt');
    }
    
    public function index(){
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']           = $url;
        $data['_selectTypeProduct'] = $this->M_Product->selectTypeProduct();
        $this->theme->display('back_page/setup_product/product/index',$data);
    }
    
    function ajaxGetCategoryProduct(){
        if('IS_AJAX'){
            $idType     = $this->input->post('type');
            $data['_selectCategory']    = $this->M_Product->selectCategoryWhereType($idType);
            $this->load->view('back_page/setup_product/product/getCategoryProduct',$data);
        }
    }
    
    function saveProduct(){
        $data   = array(
            'type_product'      => $this->input->post('selectType'),
            'category_product'  => $this->input->post('selectCategory'),
            'name_product'      => $this->input->post('txtProductName'),
            'descript_product'  => $this->input->post('txtDescription'),
            'publish'           => $this->input->post('selStatusPost'),
            'created_by'        => $this->session->userdata('nickname'),
            'created_date'      => date('Y-m-d H:i:s')
        );
        
        if($this->input->post('selectType') == '' || $this->input->post('selectType') == NULL){
            redirect('back/SetupProduct/index/unsetType');
        }elseif($this->input->post('selectCategory') == '' || $this->input->post('selectCategory') == NULL) {
            redirect('back/SetupProduct/index/unsetCat');
        }else{
            $idProduct  = $this->M_Product->saveProduct($data);
            $this->session->set_flashdata('idProduct',$idProduct);
            if($idProduct > 0){
                redirect('back/setupProduct/viewUploadThumb');
            }else{
                redirect('back/setupProduct/index/failed');
            }
        }
    }
    
    function viewUploadThumb(){
        $idProduct  = $this->session->flashdata('idProduct');
        $this->session->keep_flashdata('idProduct');
        
        $data['_getProduct']    = $this->M_Product->getProduct($idProduct);
        $this->theme->display('back_page/setup_product/product/uploadThumb',$data);
    }            
    function uploadThumbProduct(){
        $idProduct  = $this->input->post('txtIdProduct');
        $data       = array(
            'thumbnail_product' => 1
        );
        
        $path   = "./assets/upload/thumbnail-product/";
        $config['upload_path']      = $path;
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '2048';
        $config['file_name']        = $idProduct.".png";
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('imgThumb')) {
            $this->session->set_flashdata('idProduct',$idProduct);
            redirect('back/setupProduct/viewUploadThumb/failed');
        }else{
            $this->M_Product->updateProduct($idProduct,$data);
            $this->session->set_flashdata('idProduct',$idProduct);
            
            redirect('back/setupProduct/viewUploadHeader');
        }
    }
    
    function viewUploadHeader(){
        $idProduct  = $this->session->flashdata('idProduct');
        $this->session->keep_flashdata('idProduct');
        
        $data['_getProduct']    = $this->M_Product->getProduct($idProduct);
        $this->theme->display('back_page/setup_product/product/uploadHeader',$data);
    }            
    function uploadHeaderProduct(){
        $idProduct  = $this->input->post('txtIdProduct');
        $data       = array(
            'banner_product' => 1
        );
        
        $path   = "./assets/upload/header-product/";
        $config['upload_path']      = $path;		
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '5120';
        $config['file_name']        = $idProduct.".png";
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('imgBanner')) {
            $this->session->set_flashdata('idProduct',$idProduct);
            redirect('back/setupProduct/viewUploadHeader/failed');
        }else{
            $this->M_Product->updateProduct($idProduct,$data);
            $this->session->set_flashdata('idProduct',$idProduct);
            
            redirect('back/setupProduct');
        }
    }
    
    function allProduct(){
        $data['_selectProduct'] = $this->M_Product->selectProduct();
        $this->theme->display('back_page/setup_product/product/allProduct',$data);
    }
    
    function viewEditProduct($idProduct){
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']           = $url;
        $data['_selectProduct']     = $this->M_Product->getProduct($idProduct);
        $data['_selectTypeProduct'] = $this->M_Product->selectTypeProduct();
        $this->theme->display('back_page/setup_product/product/editProduct',$data);
    }
    function updateProduct(){
        $idProduct  = $this->input->post('txtIdProduct');
        $data       = array(
            'type_product'      => $this->input->post('selectType'),
            'category_product'  => $this->input->post('selectCategory'),
            'name_product'      => $this->input->post('txtProductName'),
            'descript_product'  => $this->input->post('txtDescription'),
            'publish'           => $this->input->post('selStatusPost'),
            'created_by'        => $this->session->userdata('nickname'),
            'created_date'      => date('Y-m-d H:i:s')
        );
        
        if($this->input->post('selectType') == '' || $this->input->post('selectType') == NULL){
            redirect('back/SetupProduct/viewEditProduct/'.$idProduct.'/unsetType');
        }elseif($this->input->post('selectCategory') == '' || $this->input->post('selectCategory') == NULL) {
            redirect('back/SetupProduct/viewEditProduct/'.$idProduct.'/unsetCat');
        }else{
            $this->M_Product->updateProduct($idProduct,$data);
            $this->session->set_flashdata('idProduct',$idProduct);
            redirect('back/SetupProduct/viewUploadThumb');
        }
    }
    function setPublishProduct($idProduct){
        $publish    = $this->M_Product->getProduct($idProduct);
        foreach ($publish as $row):
            $pub    = $row->publish;
        endforeach;
        if($pub == 1){
            $data       = array(
                'publish' => 0
            );
            $this->M_Product->updateProduct($idProduct,$data);
            redirect('back/SetupProduct/allProduct');
        }  else {
            $data       = array(
                'publish' => 1
            );
            $this->M_Product->updateProduct($idProduct,$data);
            redirect('back/SetupProduct/allProduct');
        }
    }
    
    function deleteProduct($idProduct){
        $this->M_Product->deleteProduct($idProduct);
        redirect('back/SetupProduct/allProduct');
    }
}