<div class="col-md-5">
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i> Filter Data

    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php echo form_open('siswa/data_by_rombel_excel'); ?>
            <table  class="table table-striped table-bordered">
                <tr><td>Jurusan</td><td><?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan', null, "id='jurusan' onchange='loadData()'") ?></td></tr>
                <tr><td>Rombel</td><td><div id="rombel"></div></td></tr>
                <tr><td>Jenis Pembayaran</td><td><?php echo cmb_dinamis('jenis_pembayaran', 'tbl_jenis_pembayaran', 'nama_jenis_pembayaran', 'id_jenis_pembayaran',null,"id='jenis_bayar' onchange='loadSiswa()'")?></td></tr>
                <tr><td></td><td><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Data</button></td></tr>
            </table>
            </form>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
<div class="col-md-7">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Siswa

        </div>
        <div class="panel-body">
            <div id="dataSiswa"></div>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>


<script type="text/javascript">
    $(document ).ready(function() {
        loadRombel();
        
    });
</script>

<script type="text/javascript">
    function loadRombel(){
        var jurusan=$("#jurusan").val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/rombel/show_combobox_rombel_by_jurusan',
            data:'jurusan='+jurusan,
            success:function(html){
                $("#rombel").html(html);
                var rombel = $("#rombel2").val();
                loadSiswa(rombel);
            }
        })
    }
    
    function loadSiswa(rombel){
        var rombel = $("#rombel2").val();
        var jenis_bayar = $("#jenis_bayar").val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/keuangan/load_data_siswa_by_rombel',
            data:'rombel='+rombel+'&jenis_pembayaran='+jenis_bayar,
            success:function(html){
                $("#dataSiswa").html(html);
            }
        })
    
    }
    
</script>
