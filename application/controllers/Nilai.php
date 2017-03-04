<?php
class Nilai extends CI_Controller{
    
    
    function index(){
                    // load daftar ngajar guru
        $sql = "SELECT tj.id_rombel,tj.id_jadwal,tjr.nama_jurusan,tj.kelas,tm.nama_mapel,tj.jam,tr.nama_ruangan,tj.hari,tj.semester
                    FROM tbl_jadwal as tj,tbl_jurusan as tjr,tbl_ruangan as tr,tbl_mapel as tm
                    WHERE tj.kd_jurusan=tjr.kd_jurusan and tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan and tj.id_guru=".$this->session->userdata('id_guru');
        $data['jadwal'] = $this->db->query($sql); 
        $this->template->load('template','nilai/list_kelas',$data);
    }
    
    
    function rombel(){
        $id_jadwal      = $this->uri->segment(3);
        $jadwal         = $this->db->get_where('tbl_jadwal',array('id_jadwal'=>$id_jadwal))->row_array();
        $id_rombel      = $jadwal['id_rombel'];
        $rombel         =   "SELECT rb.nama_rombel,rb.kelas,jr.nama_jurusan, mp.nama_mapel
                            FROM tbl_jadwal AS j,tbl_jurusan as jr, tbl_rombel as rb,tbl_mapel as mp
                            WHERE j.kd_jurusan=jr.kd_jurusan and rb.id_rombel=j.id_rombel and mp.kd_mapel=j.kd_mapel 
                            and j.id_jadwal=13='$id_rombel'";
        $siswa          =   "SELECT s.nim,s.nama
                            FROM tbl_history_kelas as hk,tbl_siswa as s 
                            WHERE hk.nim=s.nim and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik')." 
                            and hk.id_rombel='$id_rombel'";
        $data['rombel'] =   $this->db->query($rombel)->row_array();
        $data['siswa']  =   $this->db->query($siswa)->result();
        $this->template->load('template','nilai/form_nilai',$data);
    }
    
 
    
    function update_nilai(){
        $nim        = $_GET['nim'];
        $id_jadwal  = $_GET['id_jadwal'];
        $nilai      = $_GET['nilai'];
        
        // parameter
        $params = array('nim'=>$nim,'id_jadwal'=>$id_jadwal,'nilai'=>$nilai);
        
        $validasi = array('nim'=>$nim,'id_jadwal'=>$id_jadwal);
        $chek = $this->db->get_where('tbl_nilai',$validasi);
        if($chek->num_rows()>0){
            // proses update
            $this->db->where('nim',$nim);
            $this->db->where('id_jadwal',$id_jadwal);
            $this->db->update('tbl_nilai',array('nilai'=>$nilai));
        }else{
            // proses insert
            $this->db->insert('tbl_nilai',$params);
            echo "data sudah masuk";
        }
    }
}