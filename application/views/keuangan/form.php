<div class="col-md-6">
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Biodata Siswa
        </div>
    <div class="panel panel-default">
        <?php echo form_open('keuangan/form'); ?>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <tr><td>NIS</td><td><input name="nim" onkeyup="isi_otomatis()" type="text" id="nis" placeholder="NIS SISWA" class="form-control"></td></tr>
                <tr><td>NAMA</td><td><input type="text" id="nama" placeholder="NAMA SISWA" class="form-control"></td></tr>
                <tr><td>JURUSAN</td><td><input type="text" id="jurusan" placeholder="JURUSAN" class="form-control"></td></tr>
                <tr><td>KELAS</td><td><input type="text" id="kelas" placeholder="KELAS" class="form-control"></td></tr>
                <tr><td>ROMBEL</td><td><input type="text" id="rombel" placeholder="ROMBEL" class="form-control"></td></tr>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
<div class="col-md-6">
    <!-- start: DYNAMIC TABLE PANEL -->
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Form Transaksi
        </div>
    <div class="panel panel-default">
        <div class="panel-body">
            
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <tr><td>TANGGAL</td><td><input type="date" name="tanggal" placeholder="Tanggal" class="form-control"></td></tr>
                <tr><td>JENIS PEMBAYARAN</td><td><?php echo cmb_dinamis('jenis_pembayaran', 'tbl_jenis_pembayaran', 'nama_jenis_pembayaran', 'id_jenis_pembayaran')?></td></tr>
                <tr><td>JUMLAH PEMBAYARAN</td><td><input type="int" name="jumlah_pembayaran" placeholder="JUMLAH" class="form-control"></td></tr>
                <tr><td>KETERANGAN</td><td><input type="text" name="keterangan" placeholder="KETERANGAN TRANSAKSI" class="form-control"></td></tr>
                <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">SIMPAN TRANSAKSI</button> </<td></tr>
            </table>
        </form>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var nis = $("#nis").val();
                $.ajax({
                    url: '<?php echo base_url()?>index.php/keuangan/form_siswa_autocomplate',
                    data:"nis="+nis ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#kelas').val(obj.kelas);
                    $('#jurusan').val(obj.jurusan);
                    $('#rombel').val(obj.rombel);
                });
            }
        </script>

