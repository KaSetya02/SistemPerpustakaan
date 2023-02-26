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
                    <p>Anda akan menghapus Data Anggota  ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Anggota</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>petugas/Anggota/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Anggota"><i class="fa fa-plus"></i>  Tambah Anggota</a></div>
   <div class="form-group"></div>
   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="10%">No</th>
                <th width="10%" class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th width="15%">ID Anggota</th>
                <th width="20%">Nama</th>
                <th width="15%">Gender</th>
                <th width="10%">Kelas</th>
                <th >Agama</th>
                <th >HP</th>
                <th >alamat</th>
                <th >ket</th>
                <th width="15%">Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th width="10%">No</th>
                <th width="10%" class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th width="15%">ID Anggota</th>
                <th width="20%">Nama</th>
                <th width="15%">Gender</th>
                <th width="10%">Kelas</th>
                <th >Agama</th>
                <th >HP</th>
                <th >alamat</th>
                <th >ket</th>
                <th width="15%">Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_anggota->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <td><?php echo $op['id_anggota'];?></td>
                <td><?php echo $op['nama'];?></td>
                <td><?php $t=$op['jenis_kelamin'];
                          if ($t=='L') {
                            echo "Laki-laki";
                          }
                          else
                          {
                            echo "Perempuan";
                          }
                 ?></td>
                <td><?php $kelas=$op['id_kelas'];
                    foreach ($data_kelas ->result_array()  as $op2) {
                      if($op2['id_kelas']==$kelas){
                          echo $op2['kelas'];
                      }
                    }?></td>
                <td><?php $agama=$op['id_agama'];
                    foreach ($data_agama ->result_array()  as $op2) {
                      if($op2['id_agama']==$agama){
                          echo $op2['agama'];
                      }
                    }?></td>
                <td><?php echo $op['hp'];?></td>
                <td><?php echo $op['alamat'];?></td>
                <td><?php echo $op['ket'];?></td>
                <td>
                <?php echo 
                    '<div class="btn-group">
                     <a href="'.base_url().'petugas/Anggota/edit/?id_anggota='.$op['id_anggota'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'petugas/Anggota/delete/?id_anggota='.$op['id_anggota'].'">
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
    Menampilkan daftar Anggota, untuk melihat detail buku klik tombol +, mengedit dan menghapus buku klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->


