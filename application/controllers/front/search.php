<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class Search extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function of(){
        $this->load->model(array('M_Search'));
        $key                = $this->input->get('q');
        
        $data['_keyWord']   = $key;
        $data['_searchOne'] = $this->M_Search->searchLikeTitleBlog($key)->result();
        $data['_searchTwo'] = $this->M_Search->searchLikePostBlog($key)->result();
        $data['_searchThree']   = $this->M_Search->searchLikeTitleProfile($key)->result();
        $data['_searchFour']    = $this->M_Search->searchLikePostProfile($key)->result();
        
        $getOne     = $this->M_Search->searchLikeTitleBlog($key)->num_rows();
        $getTwo     = $this->M_Search->searchLikePostBlog($key)->num_rows();
        $getThree   = $this->M_Search->searchLikePostBlog($key)->num_rows();
        $getFour    = $this->M_Search->searchLikePostBlog($key)->num_rows();
        
        if($getOne == 0 && $getTwo == 0 & $getThree == 0 && $getFour == 0){
            $data['_isNull']    = TRUE;
        }else{
            $data['_isNull']    = FALSE;
        }
        $this->template->display('front_page/search/index',$data);
    }
}