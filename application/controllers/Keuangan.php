<?php
class Keuangan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_keuangan');
    }
    
    
    function index(){
        $this->template->load('template','keuangan/laporan');
    }
    
    function setup(){
        if(isset($_POST['submit'])){
            // proses simpan
            $this->Model_keuangan->setup();
            redirect('keuangan/setup');
        }else{
            $data['jenis_pembayaran'] = $this->db->get('tbl_jenis_pembayaran');
            $this->template->load('template','keuangan/setup',$data);
        }
    }
    
    function form(){
        if(isset($_POST['submit'])){
            $this->Model_keuangan->pembayaran();
            redirect('keuangan/form');
        }else{
            $this->template->load('template','keuangan/form');
        }
    }
    
    function form_siswa_autocomplate(){
        $nis = $_GET['nis'];
        $sqlSiswa = "SELECT ts.nama as nama_siswa,ts.nim,tj.nama_jurusan,tr.nama_rombel,tr.kelas
                    FROM tbl_history_kelas as hk,tbl_siswa as ts,tbl_rombel as tr,tbl_jurusan as tj
                    WHERE ts.nim=hk.nim and tr.id_rombel=ts.id_rombel and tr.kd_jurusan=tj.kd_jurusan 
                    and hk.nim='$nis' and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
       $siswa = $this->db->query($sqlSiswa)->row_array();
        $data = array(
                    'nama'      =>  $siswa['nama_siswa'],
                    'jurusan'   =>  $siswa['nama_jurusan'],
                    'rombel'    =>  $siswa['nama_rombel'],
                    'kelas'     =>  $siswa['kelas'],);
         echo json_encode($data);
    }
    
    function load_data_siswa_by_rombel(){
        $rombel = $_GET['rombel'];
        $id_jenis_pembayaran = $_GET['jenis_pembayaran'];
        echo "<table class='table table-bordered'>
            <tr><th width='90'>NIM</th><th>NAMA</th><th WIDTH='160'>SUDAH DIBAYARKAN</th></tr>";
        $this->db->where('id_rombel',$rombel);
        $siswa = $this->db->get('tbl_siswa');
        foreach ($siswa->result() as $row){
            echo "<tr>
                <td>$row->nim</td>
                <td>$row->nama</td>
                <td>".$this->__chek_jumlah_yang_sudah_dibayar($row->nim, $id_jenis_pembayaran)."</td></tr>";
        }
        echo"</table>";
    }
    
    function __chek_jumlah_yang_sudah_dibayar($nim,$id_jenis_pembayaran){
        $pembayaran = $this->db->get_where('tbl_pembayaran',array('nim'=>$nim,'id_jenis_pembayaran'=>$id_jenis_pembayaran));
        if($pembayaran->num_rows()>0){
            $row = $pembayaran->row_array();
            return $row['jumlah'];
        }else{
            return 0;
        }
    }
}