<?php

Class Siswa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_siswa');
    }

    function data() {
        // nama tabel
        $table = 'tbl_siswa';
        // nama PK
        $primaryKey = 'nim';
        // list field
        $columns = array(
            array('db' => 'foto',
                'dt' => 'foto',
                'formatter' => function( $d) {
                    return "<img src='http://www.cliptheme.com/preview/cliponeV2/Admin/clip-one-template/clip-one/assets/images/avatar-1-small.jpg'>";
                }
            ),
            array('db' => 'nim', 'dt' => 'nim'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
            array('db' => 'tanggal_lahir', 'dt' => 'tanggal_lahir'),
            array(
                'db' => 'nim',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('siswa/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('siswa/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'siswa/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_siswa->save();
            redirect('siswa');
        } else {
            $this->template->load('template', 'siswa/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_siswa->update();
            redirect('siswa');
        }else{
            $nim           = $this->uri->segment(3);
            $data['siswa'] = $this->db->get_where('tbl_siswa',array('nim'=>$nim))->row_array();
            $this->template->load('template', 'siswa/edit',$data);
        }
    }
    
    function delete(){
        $nim = $this->uri->segment(3);
        if(!empty($nim)){
            // proses delete data
            $this->db->where('nim',$nim);
            $this->db->delete('tbl_siswa');
        }
        redirect('siswa');
    }

}