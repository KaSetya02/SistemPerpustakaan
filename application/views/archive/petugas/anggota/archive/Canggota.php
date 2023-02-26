  <div class="col-md-6">
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <?php if($_SERVER['REQUEST_METHOD'] == "POST") echo "$err"; ?>
            <!-- /.box-header -->
            <!-- form start -->
          <?php echo form_open_multipart("adm/Anggota/create");?>
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="inputEmail3" placeholder="Nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kelas</label>
                  <div class="col-sm-10">
                    <!--input type="text" class="form-control" name="kelas" id="inputEmail3" placeholder="kelas"-->
                   <select  type="text" class="form-control" name="id_kelas">
                      <option >Pilih Kelas</option>
                       <?php
                        $no=1;
                        if(isset($kelas))
                            {
                                foreach($kelas as $row1)
                                {
                        ?>
                          <option value="<?php echo $row1->id_kelas;?>">
                            <?php echo $row1->kelas;?>
                          </option>
                        <?php
                      }
                        }?> 
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <!--input type="text" class="form-control" name="agama" id="inputEmail3" placeholder="Agama"-->
                      <select  type="text" class="form-control" name="id_agama">
                      <option >Pilih Agama</option>
                       <?php
                        $no=1;
                        if(isset($agama))
                            {
                                foreach($agama as $row)
                                {
                        ?>
                          <option value="<?php echo $row->id_agama;?>">
                            <?php echo $row->agama;?>
                          </option>
                        <?php
                      }
                        }?> 
                    </select>
                  </div>
                </div>
                 <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                  <div class="col-sm-10">
                    <!--input type="radio" class="form-control" name="gender" id="inputEmail3" placeholder="Jenis Kelamin"-->
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L"> Laki - Laki
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P"> Perempuan
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hp" id="inputEmail3" placeholder="No HP">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="Alamat" id="inputEmail3" placeholder="Alamat"></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="ket" id="inputEmail3" placeholder="Keterangan"></textarea>
                   
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Simpan  </button>
              </div>
              <!-- /.box-footer -->
            </form  <?php echo form_close();?>>
          </div>
          </div>