
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-pencil"></i> <i class="fa fa-book"></i>Edit Detail Stok Buku</h3>
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
	<form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>admin/Buku/update_det_buku/?id_det_buku=<?php echo $id_detail_buku;?>"" role="form">

  <?php
  foreach($det_buku->result_array() as $op)
  {
?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Buku</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $op['id_buku'];?>"  class="form-control" name="id" disabled=disabled placeholder="ID Buku" >
                    <input type="hidden" value="<?php echo $op['id_buku'];?>"  name="id_buku" >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">No Buku</label>
                  <div class="col-sm-3">
                    <input type="text" value="<?php echo $op['no_buku'];?>" class="form-control" name="no_buku" placeholder="no_buku">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                  <div class="radio">
                  <label>
                      <input type="radio" name="status" id="optionsRadios1"  <?php echo ($op['status']=="0")?'checked':''?> value="0">Dipinjamkan
                    </label>
                     <label></label>
                    <label>
                      <input type="radio" name="status" id="optionsRadios1" <?php echo ($op['status']=="1")?'checked':''?>  value="1" >Tersedia
                    </label>
                  </div>
                </div>
                 </div>
                  <div class="col-sm-3">
              </div>
              <div class="col-sm-4">
                  <div class="btn-group">
                   <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Reset</button>
				          </div>
                   <div class="btn-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Update</button>
                  </div>
              </div>
            </div>
<?php }?>

              <!-- /.box-footer -->
            </form>
  </div>
  <div class="box-footer">
    Update Data Detail Stok Buku Perpustakaan, edit form diatas untuk mengubah data detail buku. 
  </div><!-- box-footer -->
</div><!-- /.box -->


