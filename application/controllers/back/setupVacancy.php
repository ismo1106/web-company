<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class SetupVacancy extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        
        $this->load->model(array('M_JobVacancy'));
        $this->load->library('encrypt');
    }
    
    function index(){
        redirect('back/SetupVacancy/allVacancy');
    }
    
    function categoryVacancy(){
        $data['_selectCategory']    = $this->M_JobVacancy->selectCategory();
        $this->theme->display('back_page/setup_vacancy/category/index',$data);
    }
    function saveCategory(){
        $data   = array(
            'name_category' => ucwords(strtolower($this->input->post('txtCategory'))),
            'active'        => $this->input->post('radActiveCategorty'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $this->M_JobVacancy->insertCategory($data);
        
        redirect('back/SetupVacancy/categoryVacancy');
    }
    function viewModalEditCategory(){
        if('IS_AJAX') {
            $kode   = $this->input->post('kode');
            $data['_getCategory'] = $this->M_JobVacancy->getCategory($kode);
            $this->load->view('back_page/setup_vacancy/category/edit',$data);
        }
    }
    function editCategory(){
        $idCat  = $this->input->post('txtIdCategory');
        $data   = array(
            'name_category' => $this->input->post('txtCategory'),
            'active'        => $this->input->post('radActiveCategorty'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        $this->M_JobVacancy->updateCategory($idCat,$data);
        
        redirect('back/SetupVacancy/categoryVacancy');
    }
    function deleteCategory($idCat){
        $this->M_JobVacancy->deleteCategory($idCat);
        redirect('back/SetupVacancy/categoryVacancy');
    }
    
    // ========================= Vacancy =========================
    function addVacancy(){
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']           = $url;
        $data['_selectCategory']    = $this->M_JobVacancy->selectCategoryActive();
        $this->theme->display('back_page/setup_vacancy/add_vacancy',$data);
    }
    function saveVacancy(){
        $idCat          = $this->input->post('selCategory');
        $getCategory    = $this->M_JobVacancy->getCategory($idCat);
        foreach ($getCategory as $row):
            $getCountVacancy    = $row->count_vacancy;
        endforeach;
        $dataCat    = array(
            'count_vacancy'    => $getCountVacancy+1
        );
        
        $data   = array(
            'id_category'   => $this->input->post('selCategory'),
            'title_jobs'    => ucwords(strtolower($this->input->post('txtTitlePost'))),
            'closed_date'   => date('Y-m-d', strtotime($this->input->post('txtDateClosing'))),
            'description'   => $this->input->post('txtPostValue'),
            'publish'       => $this->input->post('selStatusPost'),
            'created_by'    => $this->session->userdata('nickname'),
            'created_date'  => date('Y-m-d H:i:s')
        );
        $idVacancy  = $this->M_JobVacancy->insertVacancy($data);
        $this->session->set_flashdata('idVacancy',$idVacancy);
        if($idVacancy > 0){
            $this->M_JobVacancy->updateCategory($idCat,$dataCat);
            redirect('back/SetupVacancy/viewUploadThumb');
        }else{
            redirect('back/SetupVacancy/addVacancy/failed');
        }
    }
    
    function viewUploadThumb(){
        $idVacancy  = $this->session->flashdata('idVacancy');
        $this->session->keep_flashdata('idVacancy');
        
        $data['_getVacancy']    = $this->M_JobVacancy->getVacancy($idVacancy);
        $this->theme->display('back_page/setup_vacancy/uploadThumb',$data);
    }
    
    function uploadThumbVacancy(){
        $idVacancy  = $this->input->post('txtIdVacancy');
        $data       = array(
            'thumbnail' => 1
        );
        
        $path   = "./assets/upload/thumbnail-vacancy/";
        $config['upload_path']      = $path;
        $config['allowed_types']    = 'jpeg|jpg|png|gif';
        $config['allow_scale_up']   = true;
        $config['overwrite']        = true;
        $config['max_size']         = '2048';
        $config['file_name']        = $idVacancy.".png";
        
        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('imgThumb')) {
            $this->session->set_flashdata('idVacancy',$idVacancy);
            redirect('back/SetupVacancy/viewUploadThumb/failed');
        }else{
            $this->M_JobVacancy->updateVacancy($idVacancy,$data);
            $this->session->set_flashdata('idVacancy',$idVacancy);
            
            redirect('back/SetupVacancy/allVacancy');
        }
    }
    
    function allVacancy(){
        $data['_selectVacancy'] = $this->M_JobVacancy->selectVacancy();
        $this->theme->display('back_page/setup_vacancy/index',$data);
    }
    
    function viewEditVacancy($idVacancy){
        $url =  substr("{$_SERVER['REQUEST_URI']}",11);
        $data['_thisURL']           = $url;
        $data['_getVacancy']        = $this->M_JobVacancy->getVacancy($idVacancy);
        $data['_selectCategory']    = $this->M_JobVacancy->selectCategoryActive();
        $this->theme->display('back_page/setup_vacancy/edit',$data);
    }
    
    function updateVacancy(){
        $idVacancy      = $this->input->post('txtIdVacancy');
        
        $getCategory    = $this->M_JobVacancy->getCategoryByIdVacancy($idVacancy);
        foreach ($getCategory as $row):
            $idCatold       = $row->id_category;
            $getWasVacancy  = $row->count_vacancy;
        endforeach;
        $dataCatOld     = array(
            'count_vacancy'    => $getWasVacancy-1
        );
        $this->M_JobVacancy->updateCategory($idCatold,$dataCatOld);
        
        $idCatNew       = $this->input->post('selCategory');
        $getCategoryNew = $this->M_JobVacancy->getCategory($idCatNew);
        foreach ($getCategoryNew as $row):
            $getCountVacancy    = $row->count_vacancy;
        endforeach;
        $dataCatNew     = array(
            'count_vacancy'    => $getCountVacancy+1
        );
        $this->M_JobVacancy->updateCategory($idCatNew,$dataCatNew);
        
        $data       = array(
            'id_category'   => $this->input->post('selCategory'),
            'title_jobs'    => ucwords(strtolower($this->input->post('txtTitlePost'))),
            'closed_date'   => date('Y-m-d', strtotime($this->input->post('txtDateClosing'))),
            'description'   => $this->input->post('txtPostValue'),
            'publish'       => $this->input->post('selStatusPost'),
            'updated_by'    => $this->session->userdata('nickname'),
            'updated_date'  => date('Y-m-d H:i:s')
        );
        
        $this->M_JobVacancy->updateVacancy($idVacancy,$data);
        $this->session->set_flashdata('idVacancy',$idVacancy);
        
        redirect('back/SetupVacancy/viewUploadThumb');
    }
}