<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Author : ITD-15
 */

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        
        $this->load->model('m_login');
    }
    
    function index(){
        if($this->session->userdata('username')){
            redirect('back/dashboard');
        }
        
        $this->load->view('back_page/login_view/index');
    }
    
    function doLogin(){
        // Response Data Array
        $resp = array();

        // Fields Submitted
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        // This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js
        $resp['submitted_data'] = $_POST;

        // Login success or invalid login data [success|invalid]
        // Your code will decide if username and password are correct

        $getLogin   = $this->m_login->getLogin($username)->row();
        $cekLogin   = $this->m_login->setLogin($username,$password);
        if($cekLogin == TRUE){
            $this->session->set_userdata('username',$getLogin->username);
            $this->session->set_userdata('nickname',$getLogin->nickname);
            $this->session->set_userdata('groupid',$getLogin->group_id);
            $login_status = 'success';
            $this->setInfoDevice();
            $this->saveLog();
        }  else {
            $login_status = 'invalid';
        }

//        if($username == 'demo' && $password == 'demo')
//        {
//            $login_status = 'success';
//        }

        $resp['login_status'] = $login_status;

        // Login Success URL
        if($login_status == 'success') {
            // If you validate the user you may set the user cookies/sessions here
                #setcookie("logged_in", "user_id");
                #$_SESSION["logged_user"] = "user_id";
            // Set the redirect url after successful login
            $resp['redirect_url'] = 'dashboard';
        }
        header('Content-type: application/json');
        echo json_encode($resp);
    }

    function saveLog(){
        $this->load->model('m_login');
        $this->load->library(array('user_agent','mobile_detect','misc'));

        $detect = new Mobile_Detect();

        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? '' : '') : 'PC');

        foreach($detect->getRules() as $name => $regex):
                $check = $detect->{'is'.$name}();
                if($check == 'true'){
                        $deviceType .= $name.' ';
                }
        endforeach;

        if ($this->agent->is_browser()){
                $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_robot()){
                $agent = $this->agent->robot();
        }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
        }else{
                $agent = 'Unidentified User Agent';
        }

        $info = array (
            'username'      => strtoupper($this->session->userdata('username')),
            'log_time'      => date('Y-m-d H:i:s'),
            'hostname'      => $this->session->userdata('hostname'),
            'ip_address'    => $this->session->userdata('ipaddress'),
            'device'        => $deviceType,
            'browser'       => $agent,
            'platform'      => $this->misc->platform(),
            'user_agent'    => $this->agent->agent_string()
        );

        $this->m_login->saveLog($info);
    }

    function setInfoDevice(){
        $ipaddr=$_SERVER['REMOTE_ADDR'];
        $this->session->set_userdata('ipaddress', $ipaddr);

        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->session->set_userdata('hostname', $hostname);
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nickname');
        $this->session->unset_userdata('groupid');

        $this->session->unset_userdata('ipaddress');
        $this->session->unset_userdata('hostname');
        redirect('back/login');
    }
    
}

/* End of file login.php */
/* Location: ./application/controllers/back/login.php */