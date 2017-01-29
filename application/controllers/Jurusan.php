<?php

Class Jurusan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_jurusan');
    }

    function data() {
        // nama tabel
        $table = 'tbl_jurusan';
        // nama PK
        $primaryKey = 'kd_jurusan';
        // list field
        $columns = array(
            array('db' => 'kd_jurusan', 'dt' => 'kd_jurusan'),
            array('db' => 'nama_jurusan', 'dt' => 'nama_jurusan'),
            array(
                'db' => 'kd_jurusan',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('jurusan/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('jurusan/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    function index() {
        $this->template->load('template', 'jurusan/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_jurusan->save();
            redirect('jurusan');
        } else {
            $this->template->load('template', 'jurusan/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_jurusan->update();
            redirect('jurusan');
        }else{
            $kd_jurusan      = $this->uri->segment(3);
            $data['jurusan'] = $this->db->get_where('tbl_jurusan',array('kd_jurusan'=>$kd_jurusan))->row_array();
            $this->template->load('template', 'jurusan/edit',$data);
        }
    }
    
    function delete(){
        $kd_jurusan = $this->uri->segment(3);
        if(!empty($kd_jurusan)){
            // proses delete data
            $this->db->where('kd_jurusan',$kd_jurusan);
            $this->db->delete('tbl_jurusan');
        }
        redirect('jurusan');
    }

}