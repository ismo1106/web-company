<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class JobVacancy extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_JobVacancy'));
        $this->load->library('pagination');
        $this->load->library('encrypt');
    }
    
    function index(){
        $filter = $this->uri->segment(4);
        if($filter == 'all' || $filter == NULL){
            $config['base_url']     = site_url('front/JobVacancy/index/all');
            $this->db->where('publish', 1);
            $config['total_rows']   = $this->db->count_all('vw_select_vacancy');
            $config['per_page']     = "4";
            $config["uri_segment"]  = 5;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"]    = floor($choice);

            //config for bootstrap pagination class integration
            $config['full_tag_open']    = '<ul class="pagination">';
            $config['full_tag_close']   = '</ul>';
            $config['first_link']       = false;
            $config['last_link']        = false;
            $config['first_tag_open']   = '<li>';
            $config['first_tag_close']  = '</li>';
            $config['prev_link']        = 'Previews';
            $config['prev_tag_open']    = '<li class="prev">';
            $config['prev_tag_close']   = '</li>';
            $config['next_link']        = 'Next';
            $config['next_tag_open']    = '<li>';
            $config['next_tag_close']   = '</li>';
            $config['last_tag_open']    = '<li>';
            $config['last_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="active"><a href="#">';
            $config['cur_tag_close']    = '</a></li>';
            $config['num_tag_open']     = '<li>';
            $config['num_tag_close']    = '</li>';

            $this->pagination->initialize($config);
            $data['page']   = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

            $data['_selectBlogPublish'] = $this->M_JobVacancy->selectVacancyPublish($config["per_page"], $data['page']);
            $data['_pagination']        = $this->pagination->create_links();
        }else{
            $config['base_url'] = site_url('front/JobVacancy/index/').'/'.$filter;
            $this->db->where('publish', 1);
            $this->db->where('id_category', $filter);
            $select                 = $this->db->get('vw_select_vacancy');
            $config['total_rows']   = $select->num_rows();
            $config['per_page']     = "4";
            $config["uri_segment"]  = 5;
            $choice                 = $config["total_rows"] / $config["per_page"];
            $config["num_links"]    = floor($choice);

            //config for bootstrap pagination class integration
            $config['full_tag_open']    = '<ul class="pagination">';
            $config['full_tag_close']   = '</ul>';
            $config['first_link']       = false;
            $config['last_link']        = false;
            $config['first_tag_open']   = '<li>';
            $config['first_tag_close']  = '</li>';
            $config['prev_link']        = 'Previews';
            $config['prev_tag_open']    = '<li class="prev">';
            $config['prev_tag_close']   = '</li>';
            $config['next_link']        = 'Next';
            $config['next_tag_open']    = '<li>';
            $config['next_tag_close']   = '</li>';
            $config['last_tag_open']    = '<li>';
            $config['last_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="active"><a href="#">';
            $config['cur_tag_close']    = '</a></li>';
            $config['num_tag_open']     = '<li>';
            $config['num_tag_close']    = '</li>';

            $this->pagination->initialize($config);
            $data['page']   = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            
            $data['_selectBlogPublish'] = $this->M_JobVacancy->selectFilterVacancyPublish($filter,$config["per_page"], $data['page']);
            $data['_pagination']        = $this->pagination->create_links();
        }
        $data['_getCountAllPost']   = $this->M_JobVacancy->countAllVacancyPublish();
        $data['_selectCategory']    = $this->M_JobVacancy->selectVacancyCategory();
        $this->template->display('front_page/job_vacancy/index',$data);
    }
    
    function detail($idVacancy){
        $encID  = str_replace(array('-', '_', '~'), array('+', '/', '='), $idVacancy);
        $decID  = $this->encrypt->decode($encID);
        $data['_selectCategory']    = $this->M_JobVacancy->selectVacancyCategory();
        $data['_getBlogPost']       = $this->M_JobVacancy->getCategoryByIdVacancy($decID);
        $this->template->display('front_page/job_vacancy/detail',$data);
    }
}