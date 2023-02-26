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
                    <p>Anda akan menghapus Detail Peminjaman buku ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Detail Peminjaman Buku</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group">
   <a href="<?php echo base_url(); ?>admin/Pinjam/createdet"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Data Detail Stok  Buku"><i class="fa fa-plus"></i>Tambah Detail Pinjam</a></div>
   <div class="btn-group">
    <a  href="<?php echo base_url(); ?>admin/pinjam/vw_kembali"  class="btn btn-success" role="button" data-toggle="tooltip" title="Record Peminjaman"><i class="glyphicon glyphicon-file"></i>Record Peminjaman</a>
   </div>

   <div class="form-group"></div>
   <table cellspacing="0"  width="70%">
   <tr><td colspan="3"> <h4><b>Detail Peminjaman Buku</b></h4></td></tr>
   <tr>
      <td width="25%"><h5><b> Nama Peminjam</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php foreach ($data_anggota->result_array() as $value) 
           {
             if ($value['id_anggota']==$data_pinjam['id_anggota']) 
             {
                echo $value['nama'];
             }
           } ?>
      </b></h5>
        </td>
    </tr>  
      <tr>
      <td width="25%"><h5><b> Tanggal Pinjam</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php $oridate=$data_pinjam['tgl_pinjam'];
                $date=date("d-M-Y",strtotime($oridate));
                echo $date;
              ?>
      </b></h5>
        </td>
    </tr>  
    <tr>
      <td width="25%"><h5><b> Tanggal Kembali</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php $oridate=$data_pinjam['tgl_kembali'];
                $date=date("d-M-Y",strtotime($oridate));
                echo $date;
              ?>
      </b></h5>
        </td>
    </tr>  
   </table>
   <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pinjam</th>
                <th>Buku</th>
                <th>No Buku</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Pinjam</th>
                <th>Buku</th>
                <th>No Buku</th>
                <th>Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_detail_pinjam1->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo $op['id_pinjam'];?></td>
                <td width="20%"><?php $buku=$op['id_buku'];
                    foreach ($data_buku ->result_array()  as $op2) {
                      if($op2['id_buku']==$buku){
                          echo $op2['judul'];
                      }
                    }?>
                </td>
                <td><?php echo $op['no_buku'];?></td>
                <td>     
                <?php echo 
                    '<div class="btn-group">
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Pinjam/delete_det/?id_detail_pinjam='.$op['id_detail_pinjam'].'&id_buku='.$op['id_buku'].'">
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
    <td>
    <div align ="Right"> <a  href="<?php echo base_url(); ?>admin/Pinjam"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
    Menampilkan Detail Stok Buku, Melihat Status Stok Buku. (Tersedia atau Dipinjam).
  </div><!-- box-footer -->
</div><!-- /.box -->


