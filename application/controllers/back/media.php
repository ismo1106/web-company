<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Author   : Ismo Broto
 */

class Media extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
    }

    public function index() {
        $this->theme->display('back_page/media/index');
    }

    public function upload_multiple_files() {
        $this->load->helper('form');
        if ($this->input->post()) {
            $nu     = 1;
            $name   = 'image'.$nu++;
            $config = array(
                'upload_path'   => './assets/upload/images',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => '2048'
            );
            $this->load->library('upload', $config);// load Upload library
            $this->upload->do_upload('uploadedimages');
            echo '<pre>';
            $uploaded = $this->upload->data();
            print_r($uploaded);
            echo '</pre>';
            echo '<hr />';
            echo '<pre>';
            print_r($this->upload->display_errors());
            echo '</pre>';
            exit();
        }
        //$this->load->view('upload_form', $data);
        $this->theme->display('back_page/media/index');
    }

}
