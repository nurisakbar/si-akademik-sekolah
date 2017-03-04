<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Form SMS
            <div class="panel-tools">
            </div>
        </div>
        <div class="panel-body">
            <?php
            echo form_open('sms/send');
            ?>
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <tr><td>GROUP SMS</td><td><?php echo cmb_dinamis('group', 'tbl_sms_group', 'nama_group', 'id') ?></td></tr>
                <tr><td>TEXT</td><td><textarea name="pesan" class="form-control"></textarea></td></tr>
                <tr><td></td><td><button type="submit" name="submit" class="btn btn-success btn-sm">Kirim Pesan</button></td></tr>
            </table>
            </form>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
