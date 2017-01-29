<?php

class Model_ruangan extends CI_Model {

    public $table ="tbl_ruangan";
    
    function save() {
        $data = array(
            'kd_ruangan'    => $this->input->post('kd_ruangan', TRUE),
            'nama_ruangan'  => $this->input->post('nama_ruangan', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            //'kd_ruangan'    => $this->input->post('kd_ruangan', TRUE),
            'nama_ruangan'  => $this->input->post('nama_ruangan', TRUE)
        );
        $kd_ruangan   = $this->input->post('kd_ruangan');
        $this->db->where('kd_ruangan',$kd_ruangan);
        $this->db->update($this->table,$data);
    }

}