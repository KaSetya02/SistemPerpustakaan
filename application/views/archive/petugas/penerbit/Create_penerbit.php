
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-plus"></i> <i class="fa fa-user-secret"></i> Tambah Penerbit</h3>
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
  <form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>petugas/Penerbit/create" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">penerbit</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" required="required" >
                  </div>
                </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">Provinsi</label>
                 <div class="col-sm-5">
                   <select name="provinsi" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
              <option value="">&nbsp;</option>
              <?php foreach($data_provinsi->result_array() as $op)
                    {
                    ?>
                    <option value="<?php echo $op['id_provinsi'];?>"><?php echo $op['nama_provinsi'];?></option>
                    <?php
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
  <div class="box-footer">
    <td>
     <div align ="Right"> <a  href="<?php echo base_url(); ?>petugas/Penerbit"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
    Menambah Data Provinsi, isi form diatas untuk menambahkan data provinsi. 
  </div><!-- box-footer -->
</div><!-- /.box -->


