<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td> :  <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>
        <tr><td>JURUSAN</td><td> : KELAS <?php echo $rombel['kelas'].' '.$rombel['nama_jurusan']?> ( <?php echo $rombel['nama_rombel']?> )</td></tr>
       
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Daftar Siswa
            <div class="panel-tools">

            </div>
        </div>
        <div class="panel-body">
                <table class="table table-bordered">
                    <tr><th>NIM</th><th>NAMA</th><th>LIHAT NILAI</th></tr>
                    <?php
                    foreach ($siswa->result() as $row){
                        echo "<tr>
                            <td width='100'>$row->nim</td>
                            <td>$row->nama</td>
                            <td width='100'>".anchor('raport/nilai_semester/'.$row->nim,'Lihat Raport','class="btn btn-success btn-sm"')."</td></tr>";
                    }
                    ?>
                </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
