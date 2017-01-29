<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Dynamic Table
            <div class="panel-tools">
                <?php echo anchor('kurikulum/addKurikulumDetail/' . $this->uri->segment(3), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', "title='Dambah Data'"); ?>
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
                <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
            </div>
        </div>
        <div class="panel-body">
            <input type="text" id="searchbox2">
            <select id="bos">
                <option value="IPA">IPA</option>
                <option value="IP">IPS</option>
            </select>
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE MAPEL</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
<script

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "ajax": '<?php echo site_url('kurikulum/data_detail_kurikulum/' . $this->uri->segment(3)); ?>',
            "order": [[ 3, 'asc' ]],
            "columns": [
                {
                    "data": null,
                    "width": "50px",
                    "sClass": "text-center",
                    "orderable": false,
                },
                {
                    "data": "kd_mapel",
                    "width": "80px"
                },
                {
                    "data": "nama_mapel",
                    "width": "420px"
                },
                { "data": "kelas","width":"60px" },
                { "data": "aksi","width": "30px" },
            ]
        } );
               $('#bos').on('change', function () {
        table.columns(6).search( this.value).draw();
} );
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
   
    </script>

    <script type="text/javascript">
        $("#bos").on("change",function(){
            // action goes here!!
            alert('asa')
        });    
    </script>