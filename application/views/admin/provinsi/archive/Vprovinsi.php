<div class="col-md-6">
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $title;?></h3>
            </div>
            <?php if($_SERVER['REQUEST_METHOD'] == "POST") echo "$err"; ?>

            <!-- /.box-header -->
            <!-- form start -->
          <?php echo form_open_multipart("adm/provinsi/Edit/".$old_value['id_provinsi']);?>
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_propinsi" value="<?php echo $old_value['nama_provinsi']?>" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kota" value="<?php echo $old_value['kota']?>" id="inputEmail3">
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Simpan  </button>
              </div>
            </div>
              <!-- /.box-footer -->
            </form  <?php echo form_close();?>
          </div>
          </div>