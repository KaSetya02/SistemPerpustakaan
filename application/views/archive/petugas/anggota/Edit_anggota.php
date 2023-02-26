
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-pencil"></i> <i class="fa fa-book"></i>Edit Buku</h3>
    <div class="box-tools pull-right">
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
   <div class="box-body">

   	<?php if(!empty(validation_errors())){
   			echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <p>Inputan tidak terisi dengan benar. Cek kembali</p>';
                echo validation_errors();
             echo '</div>';

   	}?>
    <!--show error message here -->
    <div class="form-group"></div>
	<form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>petugas/Anggota/update" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID ANGGOTA</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $anggota['id_anggota'];?>"  disabled=disabled class="form-control" name="id_anggota" placeholder="id Lengkap" >
                     <input type="hidden" value="<?php echo $anggota['id_anggota'];?>"  name="id_anggota" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $anggota['nama'];?>"  class="form-control" name="nama" placeholder="Nama Lengkap" >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">jenis</label>
                  <div class="col-sm-3">
                    <div class="col-sm-10">
                    <!--input type="radio" class="form-control" name="gender" id="inputEmail3" placeholder="Jenis Kelamin"-->
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" <?php echo ($anggota['jenis_kelamin']=="L")?'checked':''?> id="inlineRadio1" value="L"> Laki - Laki
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" <?php echo ($anggota['jenis_kelamin']=="P")?'checked':''?> id="inlineRadio2" value="P"> Perempuan
                      </label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group">
                 <label class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-5">
		               <select name="kelas" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
		  				      <option value="">&nbsp;</option>
		  				      <?php foreach($data_kelas->result_array() as $op2)
                            {
                            ?>
                              <?php  if($op2['id_kelas']== $anggota['id_kelas'])
                              {
                              ?>
                                <option value="<?php echo $op2['id_kelas'];?>" selected><?php echo $op2['kelas'];?></option>
                              <?php 
                            }
                                if ($op2['id_kelas']!= $anggota['id_kelas'])
                                  {?>
                                <option value="<?php echo $op2['id_kelas'];?>"><?php echo $op2['kelas'];?></option>
                              <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
						      </select>
		      		  </div>
              </div>
              <div class="form-group">
                 <label class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-5">
                   <select name="agama" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
                    <option value="">&nbsp;</option>
                    <?php foreach($data_agama->result_array() as $op2)
                            {
                            ?>
                              <?php  if($op2['id_agama']== $anggota['id_agama']){
                              ?>
                                <option value="<?php echo $op2['id_agama'];?>" selected><?php echo $op2['agama'];?></option>
                              <?php }
                                    if ($op2['id_agama']!= $anggota['id_agama']){?>
                                <option value="<?php echo $op2['id_agama'];?>"><?php echo $op2['agama'];?></option>
                              <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                  </select>
                </div>
              </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">Hp</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $anggota['hp'];?>"  class="form-control" name="hp" placeholder="No HP" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $anggota['alamat'];?>"  class="form-control" name="alamat" placeholder="alamat" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-5">
                   <textarea class="form-control" value="<?php echo $anggota['ket'];?>" name="keterangan" rows="4" placeholder="Keterangan"><?php echo $anggota['ket'];?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                  <div class="btn-group">
                   <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Reset</button>
				</div>
                   <div class="btn-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Update</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>
  <div class="box-footer">
    <td>
     <div align ="Right"> <a  href="<?php echo base_url(); ?>petugas/Anggota"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
    Update Data Buku Perpustakaan, edit form diatas untuk mengubah data buku. 
  </div><!-- box-footer -->
</div><!-- /.box -->


