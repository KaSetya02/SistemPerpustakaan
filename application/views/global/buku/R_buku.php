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
                    <p>Anda akan menghapus Data Buku beserta detail stok buku ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Buku</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/buku/tambah_buku"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Data Buku"><i class="fa fa-plus"></i>  Tambah Data Buku</a></div>
   <div class="form-group"></div>
   <table id="table-buku" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>ID Buku</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>No. Rak</th>
                <th>Tahun Terbit</th>
                <th>Stock</th>
                <th>Keterangan</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th class="center"><i class="glyphicon glyphicon-plus"></i></th>
                <th>ID Buku</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>No. Rak</th>
                <th>Tahun Terbit</th>
                <th>Stock</th>
                <th>Keterangan</th>
                <th>Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_buku->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <td><?php echo $op['id_buku'];?></td>
                <td><?php echo $op['ISBN'];?></td>
                <td><?php echo $op['judul'];?></td>
                <td><?php $kategori=$op['id_kategori'];
                    foreach ($data_kategori ->result_array()  as $op2) {
                      if($op2['id_kategori']==$kategori){
                          echo $op2['kategori'];
                      }
                    }?></td>
                <td><?php $penerbit=$op['id_penerbit'];
                    foreach ($data_penerbit ->result_array()  as $op2) {
                      if($op2['id_penerbit']==$penerbit){
                          echo $op2['nama_penerbit'];
                      }
                    }?></td>
                <td><?php $pengarang=$op['id_pengarang'];
                    foreach ($data_pengarang->result_array()  as $op2) {
                      if($op2['id_pengarang']==$pengarang){
                          echo $op2['nama_pengarang'];
                      }
                    }?></td>
                <td><?php $no_rak=$op['no_rak'];
                    foreach ($data_rak->result_array()  as $op2) {
                      if($op2['no_rak']==$no_rak){
                          echo $op2['nama_rak'];
                      }
                    }?></td>
                <td><?php echo $op['thn_terbit'];?></td>
                <td><?php echo $op['stok'];?></td>
                <td><?php echo $op['ket'];?></td>
                <td>
                <?php echo 
                    '<div class="btn-group">
                    <a href="'.base_url().'admin/Buku/detail_stok/?id_buku='.$op['id_buku'].'" class="btn btn-info" role="button" data-toggle="tooltip" title="Detail Stok"><i class="fa fa-list"></i></a>
                    </div>
                     <a href="'.base_url().'admin/Buku/edit_buku/?id_buku='.$op['id_buku'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Buku/hapus_buku/?id_buku='.$op['id_buku'].'">
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
    Menampilkan daftar buku, untuk melihat detail buku klik tombol + dan untuk melihat detail stok, mengedit dan menghapus buku klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->


      
  