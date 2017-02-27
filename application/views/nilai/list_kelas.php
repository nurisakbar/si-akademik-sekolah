<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <table class="table table-bordered">
        <tr><td width="200">TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td></tr>
        <tr><td>SEMESTER</td><td> :  <?php echo get_tahun_akademik_aktif('semester_aktif')?></td></tr>
        
    </table>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DAFTAR KELAS
            <div class="panel-tools">
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><th>NO</th><th>JURUSAN</th><th>MATAPELAJARAN</th><th>HARI</th><th>JAM</th><th>RUANG</th><th></td></tr>
                <?php
                $no=1;;
                foreach ($jadwal->result() as $row){
                    echo "<tr>
                        <td>$no</td>
                        <td>KELAS $row->kelas $row->nama_jurusan</td>
                        <td>$row->nama_mapel</td>
                        <td>$row->hari</td>
                        <td>$row->jam</td>
                        <td>$row->nama_ruangan</td>
                        <td>".anchor('nilai/rombel/'.$row->id_jadwal,'<i class="fa fa-eye" aria-hidden="true"></i>',"title='Lihat Kelas'")."</td>
                        </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
