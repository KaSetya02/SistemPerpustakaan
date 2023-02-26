
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-plus"></i> <i class="fa fa-book"></i> Tambah Detail Stok Buku</h3>
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
	<form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>admin/Buku/tambah_det_buku/?id_buku=<?php echo $id_buku;?>"" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Buku</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" value="<?php echo $id_buku;?>" disabled="disabled" name="id_buku1" placeholder="ID Buku" >
                   <input type="hidden" class="form-control" value="<?php echo $id_buku;?>" name="id_buku" >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">No Buku</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="no_buku" placeholder="No Buku">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                  <div class="radio">
                  <label>
                      <input type="radio" name="status" id="optionsRadios1" value="0" checked="">Dipinjamkan
                    </label>
                     <label></label>
                    <label>
                      <input type="radio" name="status" id="optionsRadios1" value="1" checked="">Tersedia
                    </label>
                   
                    
                  </div>
                </div>
                  </div>
                </div>
              <div class="col-sm-3">
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
    Menambah Data Detail Stol Buku Perpustakaan, isi form diatas untuk menambahkan detail stok. 
  </div><!-- box-footer -->
</div><!-- /.box -->


