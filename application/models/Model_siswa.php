<?php

class Model_siswa extends CI_Model {

    public $table ="tbl_siswa";
    
    function save($foto) {
        $data = array(
            'nim'           => $this->input->post('nim', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'foto'          => $foto,
            'id_rombel'     => $this->input->post('rombel',TRUE)
        );
        $this->db->insert($this->table,$data);
        
        $tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        $history =  array(
            'nim'                 =>  $this->input->post('nim', TRUE),
            'id_tahun_akademik'   =>  $tahun_akademik['id_tahun_akademik'],
            'id_rombel'           =>  $this->input->post('rombel', TRUE)
            );
        $this->db->insert('tbl_history_kelas',$history);
    }
    
    function update($foto) {
        if(empty($foto)){
            // update without foto
            $data = array(
            'nama'          => $this->input->post('nama', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE)
        );
        }else{
            // update with foto
            $data = array(
            'nama'          => $this->input->post('nama', TRUE),
            'kd_agama'      => $this->input->post('agama', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
            'gender'        => $this->input->post('gender', TRUE),
            'foto'          => $foto,
            'id_rombel'     => $this->input->post('rombel',TRUE)
        );
        }
        $nim   = $this->input->post('nim');
        $this->db->where('nim',$nim);
        $this->db->update($this->table,$data);
    }

}