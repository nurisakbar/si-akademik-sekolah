<?php
    
    function data_detail_kurikulum(){
                // nama tabel
        $table = 'view_detail_kurikulum';
        // nama PK
        $primaryKey = 'id_kurikulum_detail';
        // list field
        $columns = array(
            array('db' => 'id_kurikulum_detail', 'dt' => 'id_kurikulum_detail'),
            array('db' => 'id_kurikulum', 'dt' => 'id_kurikulum'),
            //array('db' => 'nama_kurikulum', 'dt' => 'nama_kurikulum'),
            array('db' => 'kd_mapel', 'dt' => 'kd_mapel'),
            array('db' => 'nama_mapel', 'dt' => 'nama_mapel'),
            array('db' => 'kelas', 'dt' => 'kelas'),
            array(
                'db' => 'id_kurikulum',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('kurikulum/deleteDetailKurikulum/' . $d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
                      
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $id_kurikulum = $this->uri->segment(3);
        $kelas        = $this->uri->segment(4);
        $where = "id_kurikulum=$id_kurikulum ";
        echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }
    
    function detail(){
        $this->template->load('template', 'kurikulum/detail');
    }
    
    function addkurikulumdetail(){
        if(isset($_POST['submit'])){
            // save
            $this->Model_kurikulum->addKurikulumDetail();
            redirect('kurikulum/detail/'.$_POST['id_kurikulum']);
        }else{
            // dapatkan jenjang dari info sekolah
            $info_sekolah  = $this->db->get_where('tbl_sekolah_info',array('id_sekolah'=>1))->row_array();
            $data['kelas'] = $this->db->get_where('tbl_jenjang_sekolah',array('id_jenjang'=>$info_sekolah['id_jenjang_sekolah']))->row_array(); 
            $this->template->load('template', 'kurikulum/addKurikulumDetail',$data);
        }
    }
    
    function deleteDetailKurikulum(){
        $id_kurikulum_detail = $this->uri->segment(3);
        if (!empty($id_kurikulum_detail)) {
            // proses delete data
            $this->db->where('id_kurikulum_detail', $id_kurikulum_detail);
            $this->db->delete('tbl_kurikulum');
        }
        redirect('kurikulum');
    }
?>
