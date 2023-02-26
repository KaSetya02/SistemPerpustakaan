<!--css khusus halaman ini -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Buku</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="form-group"></div>
   <table id="table-buku" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="5%" class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th width="10%">ID Buku</th>
                <th>ISBN</th>
                <th width="20%">Judul Buku</th>
                <th width="18%">Kategori</th>
                <th width="12%">Penerbit</th>
                <th width="14%">Pengarang</th>
                <th>Stok Tersedia</th>
                <th>Stok Dipinjam</th>
                <th>No. Rak</th>
                <th>Tahun Terbit</th>
                <th>Total Stok</th>
                <th>Keterangan</th>
                <th width="20%">Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="5%">No</th>
                <th width="5%" class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th width="10%">ID Buku</th>
                <th>ISBN</th>
                <th width="20%">Judul Buku</th>
                <th width="18%">Kategori</th>
                <th width="12%">Penerbit</th>
                <th width="14%">Pengarang</th>
                <th>Stok Tersedia</th>
                <th>Stok Dipinjam</th>
                <th>No. Rak</th>
                <th>Tahun Terbit</th>
                <th>Total Stok</th>
                <th>Keterangan</th>
                <th width="20%">Pilihan</th>
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
                <td><?php $model->countRow(1,$op['id_buku']);?></td>
                <td><?php $model->countRow(0,$op['id_buku']);?></td>
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
                    <a href="'.base_url().'petugas/Cetak/barcode_buku/?id_buku='.$op['id_buku'].'" class="btn btn-info" role="button" data-toggle="tooltip" title="Cetak Barcode Buku"><i class="fa fa-print"></i></a>
                    </div>
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


      
  