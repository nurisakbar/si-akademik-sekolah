<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_user');
    }

    function index() {
        $this->load->view('auth/login');
    }

    function chek_login() {
        if (isset($_POST['submit'])) {
            // proses login disini
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->Model_user->chekLogin($username,$password);
            if(!empty($result)){
                $this->session->set_userdata($result);
                redirect('siswa');
            }else{
                redirect('auth');
            }
            print_r($result);
        } else {
            redirect('auth');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }

}