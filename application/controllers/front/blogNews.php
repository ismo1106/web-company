<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BlogNews extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        
        $this->load->model(array('M_BlogCategory','M_BlogPost','M_Comment'));
        $this->load->library('pagination');
        $this->load->library('encrypt');
    }
    
    public function index(){
        $filter = $this->uri->segment(4);
        if($filter == 'all' || $filter == NULL){
            $config['base_url']     = site_url('front/BlogNews/index/all');
            $this->db->where('publish', 1);
            $config['total_rows']   = $this->db->count_all('vw_select_blog');
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

            $data['_selectBlogPublish'] = $this->M_BlogPost->selectBlogPublish($config["per_page"], $data['page']);
            $data['_pagination']        = $this->pagination->create_links();
        }else{
            $config['base_url'] = site_url('front/BlogNews/index/').'/'.$filter;
            $this->db->where('publish', 1);
            $this->db->where('id_category', $filter);
            $select                 = $this->db->get('vw_select_blog');
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
            
            $data['_selectBlogPublish'] = $this->M_BlogPost->selectFilterBlogPublish($filter,$config["per_page"], $data['page']);
            $data['_pagination']        = $this->pagination->create_links();
        }
        $data['_getCountAllPost']   = $this->M_BlogPost->countAllPostPublish();
        $data['_selectCategory']    = $this->M_BlogCategory->selectBlogCategory();
        $data['_selectComment']     = $this->M_Comment->selectCommentThree();
        $this->template->display('front_page/news/index',$data);
    }
                
    function of($idPost){
        $encID  = str_replace(array('-', '_', '~'), array('+', '/', '='), $idPost);
        $decID  = $this->encrypt->decode($encID);
        $data['_selectCategory']    = $this->M_BlogCategory->selectBlogCategory();
        $data['_getBlogPost']       = $this->M_BlogPost->getBlogPost($decID);
        $data['_getComment']        = $this->M_Comment->selectWhereComment($decID);
        $data['_selectComment']     = $this->M_Comment->selectCommentThree();
        $data['_Controller']        = $this;
        $this->template->display('front_page/news/blog',$data);
    }
    
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

/* End of file blogNews.php */
/* Location: ./application/controllers/front/blogNews.php */