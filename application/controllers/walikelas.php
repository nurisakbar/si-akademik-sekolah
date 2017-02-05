<?php
class walikelas extends CI_Controller{
    
    
    function index(){
        $tahun_akademik_aktif = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        $data['walikelas'] = $this->db->get_where('tbl_walikelas',
                array('id_tahun_akademik'=>$tahun_akademik_aktif['id_tahun_akademik']));
        $this->template->load('template','walikelas/list',$data);
    }
    
}