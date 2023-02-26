<div class="col-md-6">
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $title;?></h3>
            </div>
            <?php if($_SERVER['REQUEST_METHOD'] == "POST") echo "$err"; ?>

            <!-- /.box-header -->
            <!-- form start -->
          <?php echo form_open_multipart("adm/Anggota/Edit/".$old_value['id_anggota']);?>
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo $old_value['nama']?>" id="inputEmail3">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <!--input type="text" class="form-control" name="agama" id="inputEmail3" placeholder="Agama"-->
                      <select  type="text" class="form-control" name="id_kelas">
                      <?php $id1=$old_value['id_kelas'];?>
                        <?php $col1="id_kelas";
                              $quer1=$this->Kelas_model->Get_by_id('tb_kelas',$col1,$id1);?>
                              <?php foreach ($quer1 as $key1);
                              {?>
                                  <option value="<?php echo $old_value['id_kelas']  ?>"><?php  echo $key1;?></option>
                              <?php
                              }
                              ?>

                        <?php ?>
                        <?php $col="id_kelas";
                              //$quer=$this->Kelas_model->Get_by_id1('tb_kelas',$id);
                              $id=$old_value['id_kelas'];
                              $array = array('id_kelas !=' => $id);
                              $this->db->where($array);
                              $Q=$this->db->get('tb_kelas');
                              ?>

                              <?php 
                               if(isset($Q))
                                {
                                  foreach ($Q->result() as $key);
                                    {?>
                                        <option value="<?php echo $key->id_kelas; ?>"><?php  echo $key->kelas;?></option>
                                    <?php
                                    }
                                  }
                               ?>
                             
                    
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <!--input type="text" class="form-control" name="agama" id="inputEmail3" placeholder="Agama"-->
                      <select  type="text" class="form-control" name="id_agama">
                      <?php $id=$old_value['id_agama'];?>
                        <?php $col="id_agama";
                              $quer=$this->Agama_model->Get_by_id('tb_agama',$col,$id);?>
                              <?php foreach ($quer as $key);
                              {?>
                                  <option value="<?php echo $old_value['id_agama']  ?>"><?php  echo $key;?></option>
                              <?php
                              }
                              ?>
                             <?php
                        if(isset($comboagama))
                        {
                            foreach($comboagama as $row)
                            {
                            ?>
                        <option value="<?php echo $row->id_agama;?>"><?php echo $row->agama;?></option>
                        <?php
                            }
                        }
                        ?>
                    
                    </select>
                  </div>
                </div>
                <div class="form-group" >
                  <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                  <div class="col-sm-10">
                    <!--input type="radio" class="form-control" name="gender" id="inputEmail3" placeholder="Jenis Kelamin"-->
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" <?php echo ($old_value['jenis_kelamin']=="L")?'checked':''?> id="inlineRadio1" value="L"> Laki - Laki
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" <?php echo ($old_value['jenis_kelamin']=="A")?'checked':''?> id="inlineRadio2" value="P"> Perempuan
                      </label>
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hp" value="<?php echo $old_value['hp']?>" id="inputEmail3">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="Alamat"  id="inputEmail3"><?php echo $old_value['alamat']?></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="ket" id="inputEmail3"><?php echo $old_value['ket']?></textarea>
                   
                  </div>
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