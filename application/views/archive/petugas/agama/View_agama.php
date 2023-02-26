<!--css khusus halaman ini -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


<!--modal dialog untuk hapus -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>
            
                <div class="modal-body">
                    <p>Anda akan menghapus Data Agama  ini</p>
                    <p><strong>Peringatan</strong>  Setelah data dihapus, data tidak dapat dikembalikan!</p>
                    <br />
                    <p>Ingin melanjutkan menghapus?</p>
                    <p class="debug-url"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Agama</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>petugas/Agama/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Agama"><i class="fa fa-plus"></i>  Tambah Agama</a></div>
   <div class="form-group"></div>
   <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="10%">No</th>
                <!--th class="center"> <i class="glyphicon glyphicon-plus"></i></th-->
                <th width="75%">Nama Agama</th>
                <th width="15%">Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="10%">No</th>
                <!--th class="center"> <i class="glyphicon glyphicon-plus"></i></th-->
                <th width="75%">Nama Agama</th>
                <th width="15%">Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_agama->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <!--td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td-->
                <td><?php echo $op['agama'];?></td>
                <td>
                <?php echo 
                    '<div class="btn-group">
                     <a href="'.base_url().'petugas/Agama/edit/?id_agama='.$op['id_agama'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                     &nbsp&nbsp
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'petugas/Agama/delete/?id_agama='.$op['id_agama'].'">
                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                    </span>
                </td>
            </tr>';?>
<?php
    }
  ?>            
         </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar agama, mengedit dan menghapus Agama klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->


