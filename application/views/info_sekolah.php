<div class="col-sm-12">
    
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Text Fields
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                    <i class="fa fa-wrench"></i>
                </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#">
                    <i class="fa fa-refresh"></i>
                </a>
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-resize-full"></i>
                </a>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open('sekolah/index', 'role="form" class="form-horizontal"');
            echo form_hidden('id_sekolah',$info['id_sekolah']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA SEKOLAH
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $info['nama_sekolah'];?>" name="nama_sekolah" placeholder="MASUKAN NAMA SEKOLAH" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ALAMAT SEKOLAH
                </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat_sekolah" value="<?php echo $info['alamat_sekolah'];?>" placeholder="MASUKAN ALAMAT SEKOLAH" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    EMAIL, TELPON
                </label>
                <div class="col-sm-5">
                    <input type="text" value="<?php echo $info['email'];?>" name="email" placeholder="EMAIL SEKOLAH" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="text" value="<?php echo $info['telpon'];?>" name="telpon" placeholder="TELPON" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    JENJANG SEKOLAH
                </label>
                <div class="col-sm-2">
                    <?php
                    echo cmb_dinamis('jenjang','tbl_jenjang_sekolah','nama_jenjang','id_jenjang',$info['id_jenjang_sekolah']);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>