
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-plus"></i> <i class="fa fa-book"></i> Tambah Petugas</h3>
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
    <?php if($_SERVER['REQUEST_METHOD'] == "POST")
    { 
      echo $pesan;
      }?>
    <!--show error message here -->
    <div class="form-group"></div>
	<form class="form-horizontal" method="post"  <?php echo form_open_multipart('admin/Petugas/Create');?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Petugas</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_petugas" placeholder="ID Petugas(sebagai Username login)" required="required" >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="pass" placeholder="Password(sebagai password login)" required="required" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" required="required" >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Gender</label>
                  <div class="col-sm-4">
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" required="required" type="radio" name="jk" id="inlineRadio1" value="L"> Laki - Laki
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" required="required" type="radio" name="jk" id="inlineRadio2" value="P"> Perempuan
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-5">
                   <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat" required="required"></textarea>
                  </div>
                </div>
                
              <div class="form-group">
                 <label class="col-sm-2 control-label">Agama</label>
                 <div class="col-sm-5">
		            <select  name="agama" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
		  				<option value="">&nbsp;</option>
		  			<?php	foreach($data_agama->result_array() as $op)
						{
						?>

						<option value="<?php echo $op['id_agama'];?>"><?php echo $op['agama'];?></option>
						<?php
						}
						?>
						</select>
		      		</div>
              </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Status Petugas</label>
                  <div class="col-sm-4">
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" required="required" type="radio" name="stts" id="inlineRadio1" value="admin"> Admin
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" required="required" type="radio" name="stts" id="inlineRadio2" value="petugas"> Petugas
                      </label>
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">HP</label>
                  <div class="col-sm-4">
                    <input type="text" maxlength="15" required="required" class="form-control" name="hp" placeholder="No hp" >
                  </div>
                </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-4">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-5">
                   <textarea class="form-control" name="ket" rows="4" placeholder="Keterangan"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                  <div class="btn-group">
                   <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i>Reset</button>
				</div>
                   <div class="btn-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>
  <div class="box-footer">
  <td>
    <div align ="Right"> <a  href="<?php echo base_url(); ?>admin/Petugas"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
    Menambah Data Petugas Perpustakaan, isi form diatas untuk menambahkan data Petugas. 
  </div><!-- box-footer -->
</div><!-- /.box -->


