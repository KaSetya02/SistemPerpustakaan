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
                    <p>Anda akan menghapus Data Denda  ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Denda</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Denda/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Denda"><i class="fa fa-plus"></i>  Tambah Denda</a></div>
   <div class="form-group"></div>
   <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Denda</th>
                <th width="50%">Status</th>
                <th width="15%">Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Denda</th>
                <th width="50%">Status</th>
                <th width="15%">Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_denda->result_array() as $op)
    {
    ?>
            <tr>
                <td width="5%"><?php echo $no++ ;?></td>
                <td width="30%"><?php echo $op['denda'];?></td>
                <td width="40%"><?php $st=$op['status'];
                    if ($st=='A')
                      {echo "Aktif";}
                    else {echo "Non Aktif";} ?>
                </td>
                <td>
                <?php echo 
                    '<div class="btn-group">
                     <a href="'.base_url().'admin/Denda/edit/?id_denda='.$op['id_denda'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                     &nbsp&nbsp
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Denda/delete/?id_denda='.$op['id_denda'].'">
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
    Menampilkan daftar Denda, untuk mengedit dan menghapus denda klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->


