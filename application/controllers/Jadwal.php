<?php
Class jadwal extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_jadwal'));
    }
    
    function index(){
        $infoSekolah = "SELECT js.jumlah_kelas
                        FROM tbl_jenjang_sekolah as js,tbl_sekolah_info as si 
                        WHERE js.id_jenjang=si.id_jenjang_sekolah";
        $data['info']= $this->db->query($infoSekolah)->row_array();
        $this->template->load('template','jadwal/list',$data);
    }
    
    function generate_jadwal(){
        if(isset($_POST['submit'])){
            $this->model_jadwal->generateJadwal();
        }
        redirect('jadwal');
    }
    
    function dataJadwal(){
        $kd_jurusan     = $_GET['jurusan'];
        $kelas          = $_GET['kelas'];
        $id_kurikulum   = $_GET['id_kurikulum'];
        if($kelas=='semua_kelas'){
            $selected_kelas = '';
        }else{
            $selected_kelas="and kd.kelas='$kelas'";
        }
        echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>MATA PELAJARAN</th>
                        <th>GURU</th>
                        <th>RUANGAN</th>
                        <th>HARI</th>
                        <th>JAM</th>
                        <th></th>
                    </tr>
                </thead>";
        
        $sql = "SELECT  tj.hari,tj.id_jadwal,tm.nama_mapel,tg.id_guru,tg.nama_guru,tr.kd_ruangan,tj.hari,tj.jam
                FROM tbl_jadwal as tj, tbl_mapel as tm, tbl_ruangan as tr, tbl_guru as tg
                WHERE tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan and tg.id_guru=tj.id_guru 
                and tj.kelas='$kelas' and tj.kd_jurusan='$kd_jurusan'";
        $jadwal = $this->db->query($sql)->result();
        $no=1;
        $jam_pelajaran = $this->model_jadwal->getJamPelajaran();
        $hari          = array (
                        'SENIN'=>'SENIN',
                        'SELASA'=>'SELASA',
                        'RABU'=>'RABU',
                        'KAMIS'=>'KAMIS',
                        'JUMAT'=>'JUMAT',
                        'SABTU'=>'SABTU');
        foreach ($jadwal as $row){
            echo"<tr><td>$no</td>
                <td>$row->nama_mapel</td>
                <td>".  cmb_dinamis('guru', 'tbl_guru', 'nama_guru', 'id_guru',$row->id_guru,"id='guru".$row->id_jadwal."' onchange='updateGuru(".$row->id_jadwal.")'")."</td>
                <td>".  cmb_dinamis('ruangan', 'tbl_ruangan', 'nama_ruangan', 'kd_ruangan',$row->kd_ruangan,"id='ruangan".$row->id_jadwal."' onchange='updateRuangan(".$row->id_jadwal.")'")."</td>
                <td>".  form_dropdown('hari',$hari,$row->hari,"class='form-control' id='hari".$row->id_jadwal."' onchange='updateHari(".$row->id_jadwal.")'")."</td>
                <td>".  form_dropdown('jam',$jam_pelajaran,$row->jam,"class='form-control' id='jam".$row->id_jadwal."' onchange='updateJam(".$row->id_jadwal.")'")."</td>
                <td>".anchor('kurikulum/deletedetail/'.$row->id_jadwal,'<i class="fa fa-trash"></i>')."</td></tr>";
            $no++;
        }
        
        echo"</table>";
        

    }
    
    function updateGuru(){
        $id_guru = $_GET['id_guru'];
        $id_jadwal = $_GET['id_jadwal'];
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->update('tbl_jadwal',array('id_guru'=>$id_guru));
    }
    
   function updateRuangan(){
        $kd_ruangan = $_GET['kd_ruangan'];
        $id_jadwal  = $_GET['id_jadwal'];
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->update('tbl_jadwal',array('kd_ruangan'=>$kd_ruangan));
    }
    
    function updateHari(){
        $hari       = $_GET['hari'];
        $id_jadwal  = $_GET['id_jadwal'];
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->update('tbl_jadwal',array('hari'=>$hari));
    }
    
    function updateJam(){
        $jam        = $_GET['jam'];
        $id_jadwal  = $_GET['id_jadwal'];
        $this->db->where('id_jadwal',$id_jadwal);
        $this->db->update('tbl_jadwal',array('jam'=>$jam));
    }
    
}