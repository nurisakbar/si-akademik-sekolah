<div class="col-md-4">
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i> Filter Data

    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <table  class="table table-striped table-bordered">
                <tr><td>Jurusan</td><td><?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan',null,"id='jurusan' onchange='loadData()'") ?></td></tr>
                <tr><td>Rombel</td><td><div id="rombel"></div></td></tr>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
<div class="col-md-8">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Data Siswa

        </div>
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
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
    $(document ).ready(function() {
        loadData();
    });
</script>

<script type="text/javascript">
    function loadData(){
        var jurusan=$("#jurusan").val();
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>index.php/rombel/show_combobox_rombel_by_jurusan',
            data:'jurusan='+jurusan,
            success:function(html){
                $("#rombel").html(html);
            }
        })
    }
</script>

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "ajax": '<?php echo site_url('siswa/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
                {
                    "data": null,
                    "width": "50px",
                    "sClass": "text-center",
                    "orderable": false,
                },
                {
                    "data": "nim",
                    "width": "120px",
                    "sClass": "text-center"
                },
                { "data": "nama" },
            ]
        } );
               
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>