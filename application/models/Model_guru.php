<?php

class Model_guru extends CI_Model {

    public $table ="tbl_guru";
    
    function save() {
        $data = array(
            'nuptk'      => $this->input->post('nuptk', TRUE),
            'nama_guru'  => $this->input->post('nama_guru', TRUE),
            'gender'     => $this->input->post('gender', TRUE),
            'username'   => $this->input->post('username', TRUE),
            'password'   => md5($this->input->post('password', TRUE))
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'nuptk'      => $this->input->post('nuptk', TRUE),
            'nama_guru'  => $this->input->post('nama_guru', TRUE),
            'gender'     => $this->input->post('gender', TRUE)
        );
        $id_guru   = $this->input->post('id_guru');
        $this->db->where('id_guru',$id_guru);
        $this->db->update($this->table,$data);
    }
    
    function chekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_guru')->row_array();
        return $user;
    }

}