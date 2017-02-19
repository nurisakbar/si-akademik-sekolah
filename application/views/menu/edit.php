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
            echo form_open('menu/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('id', $menu['id']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA MENU
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $menu['nama_menu'] ?>" name="nama menu" placeholder="MASUKAN NAMA MENU" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    LINK
                </label>
                <div class="col-sm-9">
                    <input type="text" name="link" value="<?php echo $menu['link'] ?>" placeholder="MASUKAN LINK" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ICON
                </label>
                <div class="col-sm-9">
                    <input type="text" name="icon" value="<?php echo $menu['icon'] ?>" placeholder="MASUKAN KODE ICON" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    IS MAIN MENU
                </label>
                <div class="col-sm-9">
                    <select name="is_main_menu" class="form-control">
                        <option value="0">MAIN MENU</option>
                        <?php
                        $tabel_menu = $this->db->get('tabel_menu');
                        foreach ($tabel_menu->result() as $row) {
                            echo "<option value='$row->id' ";
                            echo $row->id==$menu['is_main_menu']?'selected':'';
                            echo ">$row->nama_menu</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('menu', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>