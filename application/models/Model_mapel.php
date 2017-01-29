<?php

class Model_mapel extends CI_Model {

    public $table ="tbl_mapel";
    
    function save() {
        $data = array(
            'kd_mapel'    => $this->input->post('kd_mapel', TRUE),
            'nama_mapel'  => $this->input->post('nama_mapel', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'nama_mapel'  => $this->input->post('nama_mapel', TRUE)
        );
        $kd_mapel   = $this->input->post('kd_mapel');
        $this->db->where('kd_mapel',$kd_mapel);
        $this->db->update($this->table,$data);
    }

}