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
                    <p>Anda akan menghapus Data Petugas ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Petugas</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Petugas/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Petugas"><i class="fa fa-plus"></i>  Tambah Petugas</a></div>
   <div class="form-group"></div>
   <table id="table-petugas1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>ID Petugas</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Hp</th>
                <th>Password Login</th>
                <th>keterangan</th>
                <th>Foto</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>ID Petugas</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Hp</th>
                <th>Password Login</th>
                <th>keterangan</th>
                <th>Foto</th>
                <th>Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_petugas->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <td><?php echo $op['id_petugas'];?></td>
                <td><?php echo $op['nama'];?></td>
                <td><?php if ($op['jenis_kelamin']=='L') {echo "Laki-Laki";}
                else{echo "Perempuan";}?></td>
                <td><?php echo $op['alamat'];?></td>
                <td><?php $agama=$op['id_agama'];
                    foreach ($data_agama ->result_array()  as $op2) {
                      if($op2['id_agama']==$agama){
                          echo $op2['agama'];
                      }
                    }?></td>
                <td><?php echo $op['hp'];?></td>
                <td><?php echo $op['password'];?></td>
                <td><?php echo $op['ket'];?></td>
                <td><img style="width:64px;height:64px" src="<?php echo base_url();?>gambar_petugas/<?php echo $op['img'];?>"></td>
                <td>
                <?php echo 
                    '<div class="btn-group">
                     <a href="'.base_url().'admin/Petugas/edit/?id_petugas='.$op['id_petugas'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                     &nbsp&nbsp
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Petugas/delete/?id_petugas='.$op['id_petugas'].'">
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
    Menampilkan daftar Petugas, untuk melihat detail Petugas klik tombol +, mengedit dan menghapus Petugas klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->

