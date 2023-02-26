
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-plus"></i> <i class="fa fa-book"></i> Tambah Anggota</h3>
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
	<form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>admin/Pinjam/updatedetnobuku" role="form">
              <div class="box-body">
                 <div class="form-group">
                 <label class="col-sm-2 control-label">Anggota</label>
                  <div class="col-sm-5">
                   <select name="id_anggota" class="js-example-basic-single form-control" disabled="disabled" data-placeholder="Klik untuk memilih">
                    <?php foreach($data_anggota->result_array() as $op2)
                            {
                            ?>
                              <option value="<?php echo $op2['id_anggota'];?>" disabled=disable selected><?php echo $op2['nama'];?></option>    
                            <?php
                            }
                            ?>
                  </select>
                </div>
              </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Kembali</label>
                  <div class="col-sm-4">
          <input type="date" required="required" disabled="disabled" class="form-control" value="<?php echo $pinjam['tgl_kembali']?>" name="tgl_kembali">
                  </div>
                </div>
                  <div class="form-group">
                 <label class="col-sm-2 control-label">Buku</label>
                 <div class="col-sm-5">
                <select  name="id_buku" class="js-example-basic-single form-control" disabled="disabled" data-placeholder="Klik untuk memilih">
                  <?php 
                  foreach($data_buku->result_array() as $op3)
                            {

                              if ($op3['id_buku']==$detail_pinjam['id_buku'] ) {
                            ?>
                                <option value="<?php echo $op3['id_buku'];?>"><?php echo $op3['judul'];?></option>
                            <?php
                              
                              }
                            }
                            ?>
            </select>
              </div>
              </div>
              <div class="form-group">
                 <label class="col-sm-2 control-label">NO Buku</label>
                 <div class="col-sm-5">
                <select  name="no_buku" class="js-example-basic-single form-control" required="required" data-placeholder="Klik untuk memilih">
                  <option value=""></option>
                  <?php 
                  foreach($data_detail_buku->result_array() as $op3)
                            {
                              if ($op3['id_buku']==$detail_pinjam['id_buku'] && $op3['status']==1) { 
                            ?>
                                <option value="<?php echo $op3['no_buku'];?>"><?php echo $op3['no_buku'];?></option>
                            <?php
                            }
                          }
                            ?>
            </select>
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
    <!--div class="box-footer">
    <td>
    <div align ="Right"> <a  href="<?php echo base_url(); ?>admin/Pinjam/View_dt_pinjam/?id_pinjam=<?php echo $pinjam['id_pinjam'];?>"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div-->
  <div class="box-footer">
    Menambah Data Aanggota Perpustakaan, isi form diatas untuk menambahkan data Anggota. 
  </div><!-- box-footer -->
</div><!-- /.box -->


