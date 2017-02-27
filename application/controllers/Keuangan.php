<?php
class Keuangan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_keuangan');
    }
    
    function setup(){
        if(isset($_POST['submit'])){
            // proses simpan
            $this->Model_keuangan->setup();
            redirect('keuangan/setup');
        }else{
            $data['jenis_pembayaran'] = $this->db->get('tbl_jenis_pembayaran');
            $this->template->load('template','keuangan/setup',$data);
        }
    }
}