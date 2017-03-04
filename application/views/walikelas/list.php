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
            <i class="fa fa-external-link-square"></i> Dynamic Table
            <div class="panel-tools">
                <?php echo anchor('mapel/add', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', "title='Dambah Data'"); ?>
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
                <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ROMBEL</th>
                        <th>NAMA JURUSAN</th>
                        <th>KELAS</th>
                        <th>NAMA WALIKELAS</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>


<script type="text/javascript">
    function updateDataWalikelas(id_walikelas){
        var id_guru = $("#guru"+id_walikelas).val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/walikelas/updateWalikelas',
            data:'id_walikelas='+id_walikelas+'&id_guru='+id_guru,
            success:function(html){
                //$("#showRombel").html(html);
                //loadPelajaran();
            }
        })
    }

</script>

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "ajax": '<?php echo site_url('walikelas/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
                {
                    "data": null,
                    "width": "50px",
                    "sClass": "text-center",
                    "orderable": false,
                },
                { "data": "nama_rombel" },
                { "data": "nama_jurusan" },
                { "data": "kelas" },
                { "data": "nama_guru" },
                    
            ]
        } );
               
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>