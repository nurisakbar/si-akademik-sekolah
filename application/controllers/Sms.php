<?php
class sms extends CI_Controller{
    
    
    function index(){
        $this->template->load('template','sms/form_sms');
    }
    
    
    function send(){
        if(isset($_POST['submit'])){
            $group      = $this->input->post('group');
            $pesan      = $this->input->post('pesan');
            $phonebooks = $this->db->get_where('tbl_phonebook',array('id_group'=>$group));
            foreach ($phonebooks->result() as $phonebook){
                sendsms($phonebook->no_hp, $pesan);
            }
            redirect('sms');
        }else{
            redirect('sms');
        }
    }
    
}