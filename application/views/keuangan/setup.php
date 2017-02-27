<div class="col-md-12">
    <table class="table table-bordered">
        <tr><td width='200'>TAHUN AKADEMIK</td><td> : <?php echo get_tahun_akademik_aktif('tahun_akademik') ?></td></tr>
        <tr><td>SEMESTER</td><td> : <?php echo get_tahun_akademik_aktif('semester_aktif') ?></td></tr>
    </table>
</div>

<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Komponen Biaya

        </div>
        <div class="panel-body">
            <?php
            echo form_open('keuangan/setup');
            ?>
            <table class="table table-bordered">
                <?php
                foreach ($jenis_pembayaran->result() as $row) {
                    echo "<tr>
                        <td width='200'>" . strtoupper($row->nama_jenis_pembayaran) . "</td>
                        <td><input type='int' value='".  chek_komponen_biaya($row->id_jenis_pembayaran)."' class='form-control' name='$row->id_jenis_pembayaran' placeholder='Masukan Data $row->nama_jenis_pembayaran'></td></tr>";
                }
                ?>
                <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN PERUBAHAN</button></td></tr>
            </table>
            </form>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>