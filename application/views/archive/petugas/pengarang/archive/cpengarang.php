 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <?php echo form_open_multipart("adm/pengarangg/create");?>
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="inputEmail3" placeholder="Nama">
                  </div>
                </div>
                    <!--input type="text" class="form-control" name="kelas" id="inputEmail3" placeholder="kelas"-->
                 </div> 
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Simpan  </button>
              </div>
              <!-- /.box-footer -->
            </form>
            <?php echo form_close();?>
          </div>