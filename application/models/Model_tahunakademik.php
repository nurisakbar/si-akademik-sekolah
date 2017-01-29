<?php

class Model_tahunakademik extends CI_Model {

    public $table ="tbl_tahun_akademik";
    
    function save() {
        $data = array(
            'tahun_akademik'    => $this->input->post('tahun_akademik', TRUE),
            'is_aktif'          => $this->input->post('is_aktif', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'tahun_akademik'    => $this->input->post('tahun_akademik', TRUE),
            'is_aktif'          => $this->input->post('is_aktif', TRUE)
        );
        $id_tahun_akademik   = $this->input->post('id_tahun_akademik');
        $this->db->where('id_tahun_akademik',$id_tahun_akademik);
        $this->db->update($this->table,$data);
    }

}