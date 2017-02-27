<?php

class Model_jenis_pembayaran extends CI_Model {

    public $table ="tbl_jenis_pembayaran";
    
    function save() {
        $data = array(
            'nama_jenis_pembayaran'  => $this->input->post('nama_jenis_pembayaran', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'nama_jenis_pembayaran'  => $this->input->post('nama_jenis_pembayaran', TRUE)
        );
        $id_jenis_pembayaran   = $this->input->post('id_jenis_pembayaran');
        $this->db->where('id_jenis_pembayaran',$id_jenis_pembayaran);
        $this->db->update($this->table,$data);
    }

}