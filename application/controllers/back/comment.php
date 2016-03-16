<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class Comment extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Asia/Jakarta");
        
        $this->load->model(array('M_Comment'));
        $this->load->library('encrypt');
    }
    
    function index(){
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        if($this->uri->segment(4) == 'NotYet'):
            $data['_current']       = 0;
            $data['_title']         = 'Not Yet Approved Comments';
            $data['_selectComment'] = $this->M_Comment->selectCommentWaitingApprove();
        elseif($this->uri->segment(4) == 'Approved'):
            $data['_current']       = 1;
            $data['_title']         = 'Approved Comments';
            $data['_selectComment'] = $this->M_Comment->selectCommentApproved();
        else:
            $data['_current']       = 9;
            $data['_title']         = 'List All Comments';
            $data['_selectComment'] = $this->M_Comment->selectComment();
        endif;
        $this->theme->display('back_page/comment/index',$data);
    }
            
    function send(){
        $idPost     = $this->input->post('postid');
        $encID      = $this->encrypt->encode($idPost);
        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
        
        $data   = array(
            'id_post'       => $idPost,
            'comment_by'    => ucwords(strtolower($this->input->post('name'))),
            'commnet_date'  => date('Y-m-d H:i:s'),
            'comment_email' => $this->input->post('email'),
            'comment_value' => nl2br($this->input->post('message'))
        );
        $this->M_Comment->saveComment($data);
        
        redirect('front/blogNews/of/'.$encryptID);
    }
    
    function approveComment($idComment){
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        $idPost         = $this->uri->segment('5');
        $row            = $this->M_Comment->getPost($idPost)->row();
        $countCommnet   = $row->count_comment;
        $dataPost       = array(
            'count_comment' => $countCommnet+1
        );
        $this->M_Comment->updateBlogPost($idPost,$dataPost);
        
        $data   = array(
            'approve'   => 1
        );
        $this->M_Comment->updateComment($idComment,$data);
        redirect('back/comment');
    }
    
    function trashComment($idComment){
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        $rowComment     = $this->M_Comment->getComment($idComment)->row();
        $approve        = $rowComment->approve;
        $idPost         = $this->uri->segment('5');
        $row            = $this->M_Comment->getPost($idPost)->row();
        $countCommnet   = $row->count_comment;
        
        if($approve == 1){
            $dataPost       = array(
                'count_comment' => $countCommnet-1
            );
            $this->M_Comment->updateBlogPost($idPost,$dataPost);
        }
        
        $data   = array(
            'trash' => 1
        );
        $this->M_Comment->updateComment($idComment,$data);
        redirect('back/comment');
    }
    function restoreComment($idComment){
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        $rowComment     = $this->M_Comment->getComment($idComment)->row();
        $approve        = $rowComment->approve;
        $idPost         = $this->uri->segment('5');
        $row            = $this->M_Comment->getPost($idPost)->row();
        $countCommnet   = $row->count_comment;
        
        if($approve == 1){
            $dataPost       = array(
                'count_comment' => $countCommnet+1
            );
            $this->M_Comment->updateBlogPost($idPost,$dataPost);
        }
        
        $data   = array(
            'trash' => 0
        );
        $this->M_Comment->updateComment($idComment,$data);
        redirect('back/comment/commentTrashed/restored');
    }
            
    function commentTrashed(){
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        $seg4   = $this->uri->segment(4);
        if($seg4 == 'deleted'):
            $data['_alert'] = 1;
        elseif($seg4 == 'restored'):
            $data['_alert'] = 2;
        else:
            $data['_alert'] = 0;
        endif;
        $data['_selectComment'] = $this->M_Comment->selectCommentTrashed();
        $this->theme->display('back_page/comment/trash',$data);
    }
    
    function deleteComment($idComment){
        if(!$this->session->userdata('username')){
            redirect('back/login');
        }
        $this->M_Comment->deleteComment($idComment);
        redirect('back/comment/commentTrashed/deleted');
    }
            
    function test($idPost){
        $row = $this->M_Comment->getPost($idPost)->row();
        echo $row->count_comment;
    }
}