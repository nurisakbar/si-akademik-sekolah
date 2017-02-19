<?php

Class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_users');
    }

    function data() {
        // nama tabel
        $table = 'v_tbl_user';
        // nama PK
        $primaryKey = 'id_user';
        // list field
        $columns = array(
            array('db' => 'foto', 'dt' => 'foto'),
            array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
            array('db' => 'nama_level', 'dt' => 'nama_level'),
            array(
                'db' => 'id_user',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('users/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('users/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'users/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $uplodFoto = $this->upload_foto_user();
            $this->Model_users->save($uplodFoto);
            redirect('users');
        } else {
            $this->template->load('template', 'users/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $uplodFoto = $this->upload_foto_user();
            $this->Model_users->update($uplodFoto);
            redirect('users');
        }else{
            $id_user       = $this->uri->segment(3);
            $data['user']  = $this->db->get_where('tbl_user',array('id_user'=>$id_user))->row_array();
            $this->template->load('template', 'users/edit',$data);
        }
    }
    
    function delete(){
        $id_user = $this->uri->segment(3);
        if(!empty($id_user)){
            // proses delete data
            $this->db->where('id_user',$id_user);
            $this->db->delete('tbl_user');
        }
        redirect('users');
    }
    
    
     function upload_foto_user(){
        $config['upload_path']          = './uploads/foto_user/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
    
    
    function rule(){
        $this->template->load('template','users/rule');
    }

}