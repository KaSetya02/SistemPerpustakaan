
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
	<form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>admin/Buku/update_buku" role="form">

  <?php
  foreach($buku->result_array() as $op)
  {
?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Buku</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $op['id_buku'];?>"  class="form-control" name="id_buku" disabled=disabled placeholder="ID Buku" >
                    <input type="hidden" value="<?php echo $op['id_buku'];?>"  name="id" >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">ISBN</label>
                  <div class="col-sm-3">
                    <input type="text" value="<?php echo $op['ISBN'];?>" class="form-control" name="ISBN" placeholder="ISBN">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-6">
                    <input type="text" value="<?php echo $op['judul'];?>" class="form-control" name="judul" placeholder="Judul Buku" >
                  </div>
                </div>
                <div class="form-group">
                 <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-5">
		               <select name="kategori" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
		  				      <option value="">&nbsp;</option>
		  				      <?php foreach($data_kategori->result_array() as $op2)
                            {
                            ?>
                              <?php  if($op2['id_kategori']== $op['id_kategori']){
                              ?>
                                <option value="<?php echo $op2['id_kategori'];?>" selected><?php echo $op2['kategori'];?></option>
                              <?php }
                                    else{?>
                                <option value="<?php echo $op2['id_kategori'];?>"><?php echo $op2['kategori'];?></option>
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
                 <label class="col-sm-2 control-label">Penerbit</label>
                 <div class="col-sm-5">
		            <select  name="penerbit" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
		  				<option value="">&nbsp;</option>
                    <?php foreach($data_penerbit->result_array() as $op2)
                            {
                            ?>
                              <?php  if($op2['id_penerbit']== $op['id_penerbit']){
                              ?>
                                <option value="<?php echo $op2['id_penerbit'];?>" selected><?php echo $op2['nama_penerbit'];?></option>
                              <?php }
                                    else{?>
                                <option value="<?php echo $op2['id_penerbit'];?>"><?php echo $op2['nama_penerbit'];?></option>
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
                 <label class="col-sm-2 control-label">Pengarang</label>
                 <div class="col-sm-5">
		               <select  name="pengarang" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih" >
		  				<option value="">&nbsp;</option>
                    <?php foreach($data_pengarang->result_array() as $op2)
                            {
                            ?>
                              <?php  if($op2['id_pengarang']== $op['id_pengarang']){
                              ?>
                                <option value="<?php echo $op2['id_pengarang'];?>" selected><?php echo $op2['nama_pengarang'];?></option>
                              <?php }
                                    else{?>
                                <option value="<?php echo $op2['id_pengarang'];?>"><?php echo $op2['nama_pengarang'];?></option>
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
                 <label class="col-sm-2 control-label">No Rak</label>
                 <div class="col-sm-3">
		               <select  name="no_rak" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
		  			<option value="">&nbsp;</option>
                    <?php foreach($data_rak->result_array() as $op2)
                            {
                            ?>
                              <?php  if($op2['no_rak']== $op['no_rak']){
                              ?>
                                <option value="<?php echo $op2['no_rak'];?>" selected><?php echo $op2['nama_rak'];?></option>
                              <?php }
                                    else{?>
                                <option value="<?php echo $op2['no_rak'];?>"><?php echo $op2['nama_rak'];?></option>
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
                  <label class="col-sm-2 control-label">Tahun Terbit</label>
                  <div class="col-sm-3">
                   <input name="thn_terbit" value="<?php echo $op['thn_terbit'];?>" class="date-own form-control" maxlength="4" type="text" placeholder="Tahun terbit">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-5">
                   <textarea class="form-control" value="<?php echo $op['ket'];?>" name="keterangan" rows="4" placeholder="Keterangan"></textarea>
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
<?php }?>
              <!-- /.box-footer -->
            </form>
  </div>
  <div class="box-footer">
    Update Data Buku Perpustakaan, edit form diatas untuk mengubah data buku. 
  </div><!-- box-footer -->
</div><!-- /.box -->


