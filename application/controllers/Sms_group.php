<?php

Class Sms_group extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_sms_group');
    }

    function data() {
        // nama tabel
        $table = 'tbl_sms_group';
        // nama PK
        $primaryKey = 'id';
        // list field
        $columns = array(
            array('db' => 'nama_group', 'dt' => 'nama_group'),
            array(
                'db' => 'id',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('sms_group/edit/' . $d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"') . ' 
                        ' . anchor('sms_group/delete/' . $d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'sms_group/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            // membuat group
            $id_group = $this->Model_sms_group->save();
            
            // upload data excel
            $config['upload_path'] = './uploads/phonebook/';
            $config['allowed_types'] = 'xlsx';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $upload = $this->upload->data();


            // membaca data excel
            $this->load->library('CPHP_excel');
            // nama file
            $inputFileName =  "uploads/phonebook/".$upload['file_name'];
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            //  Loop through each row of the worksheet in turn
            for ($row = 2; $row <= $highestRow; $row++) {
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                $no_hp = $rowData[0][0];
                $this->db->insert('tbl_phonebook',array('id_group'=>$id_group,'no_hp'=>$no_hp));
            }
                redirect('sms_group');
            } else {
                $this->template->load('template', 'sms_group/add');
            }
        }

        function edit() {
            if (isset($_POST['submit'])) {
                $this->Model_sms_group->update();
                redirect('sms_group');
            } else {
                $id = $this->uri->segment(3);
                $data['sms_group'] = $this->db->get_where('tbl_sms_group', array('id' => $id))->row_array();
                $this->template->load('template', 'sms_group/edit', $data);
            }
        }

        function delete() {
            $id = $this->uri->segment(3);
            if (!empty($id)) {
                // proses delete data
                $this->db->where('id', $id);
                $this->db->delete('tbl_sms_group');
            }
            redirect('sms_group');
        }

    }