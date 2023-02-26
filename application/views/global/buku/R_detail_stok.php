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
                    <p>Anda akan menghapus Detail Stok buku ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Detail Stok Buku</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Buku/tambah_det_buku/?id_buku=<?php echo $id;?>"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Data Detail Stok Buku"><i class="fa fa-plus"></i>Tambah Detail Stok</a></div>
   <div class="form-group"></div>
   <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>No Buku</th>
                <th>Status</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>No Buku</th>
                <th>Status</th>
                <th>Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_stok_buku->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo $op['id_buku'];?></td>
                <td><?php echo $op['no_buku'];?></td>
                <td><?php $status=$op['status'];
                      if($status==1){
                          echo "Tersedia";
                      }
                      else{
                        echo "Dipinjam";
                      }
                    ?></td>
                <td>     
                <?php echo 
                    '<div class="btn-group">
                     <a href="'.base_url().'admin/Buku/edit_det_buku/?id_detail_buku='.$op['id_detail_buku'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Buku/hapus_det_buku/?id_detail_buku='.$op['id_detail_buku'].'&id_buku='.$op['id_buku'].'">
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
    Menampilkan Detail Stok Buku, Melihat Status Stok Buku. (Tersedia atau Dipinjam).
  </div><!-- box-footer -->
</div><!-- /.box -->


