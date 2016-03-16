<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author   : Ismo Broto
 */

class M_Setting extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function getSetting(){
        $this->db->where('key_setting', 1);
        $query = $this->db->get('tbl_setting');
        return $query->result();
    }
    
    function submitSetting($data){
        $this->db->where('key_setting', 1);
        $this->db->update('tbl_setting',$data);
    }
}