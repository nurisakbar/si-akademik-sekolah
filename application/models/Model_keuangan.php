<?php
class Model_keuangan extends CI_Model{
    
    
    function pembayaran(){
        $tanggal            = $this->input->post('tanggal');
        $jenis_pembayaran   = $this->input->post('jenis_pembayaran');
        $nim                = $this->input->post('nim');
        $jumlah_pembayaran  = $this->input->post('jumlah_pembayaran');
        $keterangan         = $this->input->post('keterangan');
        
        $transaksi          = array(
                                'tanggal'               =>  $tanggal,
                                'nim'                   =>  $nim,
                                'id_jenis_pembayaran'   =>  $jenis_pembayaran,
                                'jumlah'                =>  $jumlah_pembayaran,'keterangan'=>$keterangan);   
        $this->db->insert('tbl_pembayaran',$transaksi);
    }
    
    function setup(){
        $jenis_pembayaran = $this->db->get('tbl_jenis_pembayaran');
        foreach ($jenis_pembayaran->result() as $jp){
            
            $params = array (
                'id_tahun_akademik'     => get_tahun_akademik_aktif('id_tahun_akademik'),
                'id_jenis_pembayaran'   => $jp->id_jenis_pembayaran,
                'jumlah_biaya'          => $this->input->post($jp->id_jenis_pembayaran));
            
            
             $validasi = array (
                'id_tahun_akademik'     => get_tahun_akademik_aktif('id_tahun_akademik'),
                'id_jenis_pembayaran'   => $jp->id_jenis_pembayaran);
             
            $chek = $this->db->get_where('tbl_biaya_sekolah',$validasi);
            if($chek->num_rows()>0){
                // lakukan update
                $this->db->where('id_tahun_akademik',get_tahun_akademik_aktif('id_tahun_akademik'));
                $this->db->where('id_jenis_pembayaran',$jp->id_jenis_pembayaran);
                $this->db->update('tbl_biaya_sekolah',$params);
            }else{
                // insert data
                $this->db->insert('tbl_biaya_sekolah',$params);
            }
            
        }
    }
}