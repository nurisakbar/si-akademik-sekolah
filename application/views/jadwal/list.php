<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Filter Data

        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr><td>Jurusan</td><td><?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan', null, "id='jurusan' onChange='loadData()'") ?></td></tr>
                <tr><td>Kelas</td><td>
                        <select id="kelas" class="form-control" onchange="loadData()()">
                            
                            <?php
                            for ($i = 1; $i <= $info['jumlah_kelas']; $i++) {
                                echo "<option value='$i'>Kelas $i</option>";
                            }
                            ?>
                        </select>
                    </td></tr>
                <tr><td colspan="2">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                            Generate Jadwal
                        </button>
                        <?php //echo anchor('kurikulum/adddetail/'.$this->uri->segment(3), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tambah Data', "title='Dambah Data' class='btn btn-danger btn-sm'"); ?>
                        <?php echo anchor('kurikulum', 'Kembali', "class='btn btn-success btn-sm'"); ?>
                    </td></tr>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>


<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Daftar Pelajaran
            <div class="panel-tools">

                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
                <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <div id="tabel"></div>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script type="text/javascript">
    $(document ).ready(function() {
        loadData();
    });
</script>

<script type="text/javascript">
    function loadData(){
        var kelas=$("#kelas").val();
        var jurusan=$("#jurusan").val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/jadwal/dataJadwal',
            data:'jurusan='+jurusan+'&kelas='+kelas+'&id_kurikulum=<?php echo $this->uri->segment(3) ?>',
            success:function(html){
                $("#tabel").html(html);
            }
        })
    }
    
    function updateGuru(id){
      var guru = $("#guru"+id).val();
      $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/jadwal/updateGuru',
            data:'id_guru='+guru+'&id_jadwal='+id,
            success:function(html){
                loadData();
            }
        })
    }
    
    function updateRuangan(id){
      var kd_ruangan = $("#ruangan"+id).val();
      $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/jadwal/updateRuangan',
            data:'kd_ruangan='+kd_ruangan+'&id_jadwal='+id,
            success:function(html){
                loadData();
            }
        })
    }
    
     function updateHari(id){
      var hari = $("#hari"+id).val();
      $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/jadwal/updateHari',
            data:'hari='+hari+'&id_jadwal='+id,
            success:function(html){
                loadData();
            }
        })
    }
    
    function updateJam(id){
      var jam = $("#jam"+id).val();
      $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/jadwal/updateJam',
            data:'jam='+jam+'&id_jadwal='+id,
            success:function(html){
                loadData();
            }
        })
    }
    
    
    function filterData(){
        loadData();
    }

</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
            echo form_open('jadwal/generate_jadwal');
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Generate Jadwal Otomatis</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr><td>Kurikulum</td><td><?php echo cmb_dinamis('kurikulum', 'tbl_kurikulum', 'nama_kurikulum', 'id_kurikulum')?></td></tr>
                    <tr><td>Semester</td><td><?php echo form_dropdown('semester',array(1=>'SEMESTER 1',2=>'SEMESTER 2'),null,"class='form-control'");?></td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" class="btn btn-primary">Generate Data</button>
            </div>
        </form>
        </div>
    </div>
</div>