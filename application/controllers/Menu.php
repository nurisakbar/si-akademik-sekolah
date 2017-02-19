<?php

Class Menu extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_menu');
    }

    function data() {
        // nama tabel
        $table = 'tabel_menu';
        // nama PK
        $primaryKey = 'id';
        // list field
        $columns = array(
            array('db' => 'nama_menu', 'dt' => 'nama_menu'),
            array('db' => 'link', 'dt' => 'link'),
            array(
                'db' => 'is_main_menu',
                'dt' => 'is_main_menu',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return $d==0?'Main Menu':'Sub Menu';
                }),
            array(
                'db' => 'id',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('menu/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('menu/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'menu/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_menu->save();
            redirect('menu');
        } else {
            $this->template->load('template', 'menu/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_menu->update();
            redirect('menu');
        }else{
            $id           = $this->uri->segment(3);
            $data['menu'] = $this->db->get_where('tabel_menu',array('id'=>$id))->row_array();
            $this->template->load('template', 'menu/edit',$data);
        }
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tabel_menu');
        }
        redirect('menu');
    }

}