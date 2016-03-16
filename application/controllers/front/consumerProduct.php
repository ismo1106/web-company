<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class ConsumerProduct extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('encrypt');
    }
    
    public function index(){
        $this->load->model('M_Product');
        $data['_selectProduct']     = $this->M_Product->selectProductConsumer();
        $data['_selectCategory']    = $this->M_Product->selectCategoryWhereType(1); // 1 = Type Product Consumer
        $this->template->display('front_page/product/consumer',$data);
    }
    
    function detail($encryptID){
        $this->load->model('M_Product');
        
        $encID      = str_replace(array('-', '_', '~'), array('+', '/', '='), $encryptID);
        $idProduct  = $this->encrypt->decode($encID);
        
        $data['_getProduct']    = $this->M_Product->getProduct($idProduct);
        $this->template->display('front_page/product/detail',$data);
    }
        
}