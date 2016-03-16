<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class IndustrialProduct extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('encrypt');
    }
    
    public function index(){
        $this->load->model('M_Product');
        $data['_selectProduct']     = $this->M_Product->selectProductIndustrial();
        $data['_selectCategory']    = $this->M_Product->selectCategoryWhereType(2); // 2 = Type Product Industrial
        $this->template->display('front_page/product/industrial',$data);
    }
    
    function detail($encryptID){
        $this->load->model('M_Product');
        
        $encID      = str_replace(array('-', '_', '~'), array('+', '/', '='), $encryptID);
        $idProduct  = $this->encrypt->decode($encID);
        
        $data['_getProduct']    = $this->M_Product->getProduct($idProduct);
        $this->template->display('front_page/product/detail',$data);
    }
        
}