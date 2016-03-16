<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class AccessMenu extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model(array('M_MenuSidebar','M_Groupuser'));
    }
    
    function index(){
        $data['_selectMenu1']   = $this->M_MenuSidebar->selectMenu1();
        $data['_selectMenu2']   = $this->M_MenuSidebar->selectMenu2();
        $data['_selectMenu3']   = $this->M_MenuSidebar->selectMenu3();
        $data['_selectGroup']   = $this->M_Groupuser->selectGroupuser();
        $this->theme->display('back_page/utility/access/index',$data);
    }
    
    function ajaxGetMenuByGroup(){
        $group_id               = $this->input->post('grupid');
        $data['_selectMenu1']   = $this->M_MenuSidebar->selectViewMenu1($group_id);
        $data['_selectMenu2']   = $this->M_MenuSidebar->selectViewMenu2($group_id);
        $data['_selectMenu3']   = $this->M_MenuSidebar->selectViewMenu3($group_id);
        $this->load->view('back_page/utility/access/getMenu',$data);
    }
            
    function setAccess(){
        $group_id   = $this->input->post('selGroupID');
        $chk_menu   = $this->input->post('chkMenuID');
        $count_chk  = count($chk_menu);

        if (!empty($chk_menu)):
            $this->M_MenuSidebar->deleteAccessMenu($group_id);
        
            for($i=0; $i < $count_chk; $i++):
                if (isset($chk_menu[$i])):
                    $menu_id = $chk_menu[$i];
                    $this->M_MenuSidebar->saveAccessMenu($group_id,$menu_id);
                endif;
            endfor;
        endif;
        
        if($this->input->post('txtActionFrom') == 1){
            redirect('back/groupuser/index');
        }elseif($this->input->post('txtActionFrom') == 0){
            redirect('back/accessMenu/index');
        }else{
            echo 'maneh teh saha?? ku tampol gek ku aing..';
        }
    }
}