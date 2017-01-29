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
            echo form_open('siswa/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('nim', $siswa['nim']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NIM
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['nim'] ?>" readonly="" placeholder="MASUKAN NIM" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA LENGKAP
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['nama'] ?>" name="nama" placeholder="MASUKAN NAMA LENGKAP" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    TEMPAT, TGL LAHIR
                </label>
                <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" value="<?php echo $siswa['tempat_lahir'] ?>" placeholder="TEMPAT LAHIR" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-2">
                    <input type="date" value="<?php echo $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" placeholder="TANGGAL LAHIR" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    GENDER
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('gender', array('P' => 'LAKI LAKI', 'W' => 'PEREMPUAN'), $siswa['gender'], "class='form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    AGAMA
                </label>
                <div class="col-sm-3">
                    <?php
                    echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama',$siswa['kd_agama']);
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
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