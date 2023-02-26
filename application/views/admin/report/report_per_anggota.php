  <!--css khusus  halaman ini -->
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
                    <p>Anda akan menghapus Data Peminjaman  ini</p>
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
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Peminjaman Buku</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->
  <div class="box-footer">
  <div class="btn-group">
    <td>
     <div align ="left">
      <a  href="<?php echo base_url(); ?>admin/Pinjam"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Pinjam"></i>Pinjam</a>
      <a  href="<?php echo base_url(); ?>admin/pinjam/vw_kembali"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Kembali</a>
      </div>
   </td>
  </div>
  </div>
  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Pinjam/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Peminjaman"><i class="fa fa-plus"></i>Tambah Peminjaman</a></div>
   <?php if (count($data_pinjam->result_array())) {?>
   <table width="100%">
   <tr>
     <td width="10%"><h5><b> Id Anggota </b></h5></td> <td><h5><b>:</b></h5></td>
     <td><h5><b><?php foreach ($data_pinjam->result_array() as $key => $value1) {
      $id_anggota=$value1['id_anggota'];
      //$id_pinjam=$value1['id_pinjam'];
     } 
   foreach ($data_anggota->result_array() as $key => $value) {
     if ($value['id_anggota']== $value1['id_anggota']) {
       echo $value['id_anggota'];
     }
   }?>
      </b></h5></td>
   </tr>
    <tr>
     <td><h5><b>Nama Anggota </b></h5></td> <td><h5><b> : </b></h5></td>
     <td><h5><b><?php foreach ($data_pinjam->result_array() as $key => $value1) {
      $id_anggota=$value1['id_anggota'];
     } 
   foreach ($data_anggota->result_array() as $key => $value) {
     if ($value['id_anggota']== $value1['id_anggota']) {
       echo $value['nama'];
     }
   }?>
      </b></h5></td>
   </tr>
   <tr>
     <td><h5><b> Kelas</b></h5></td> <td><h5><b> : </b></h5></td>
     <td><h5><b><?php foreach ($data_pinjam->result_array() as $key => $value1) {
      $id_anggota=$value1['id_anggota'];
     } 
   foreach ($data_anggota->result_array() as $key => $value) {
     if ($value['id_anggota']== $value1['id_anggota']) {
       echo $value['id_kelas'];
     }
   }?>
    </b></h5></td>
   </tr>
     <tr>
     <td><h5><b> Jumlah Peminjaman</b></h5></td> <td><h5><b> : </b></h5></td>
     <td><h5><b><?php $jumpinjam= count($data_pinjam->result_array()); echo $jumpinjam; echo  "  Kali";   ?>
    </b></h5></td>
   </tr>
   </tr>
     <tr>
     <td><h5><b> Peminjaman Telat</b></h5></td> <td><h5><b> : </b></h5></td>
     <td><h5><b><?php 
     $jum=0;
     foreach ($data_pinjam->result_array() as $key => $value23) {
       $id_pinjam122=$value23['id_pinjam'];
     foreach ($kembali->result_array() as $key => $telat) {
      if ($telat['id_pinjam']==$id_pinjam122) {
        $t=$telat['terlambat'];
          if ($t>0) {
            $jum=$jum+1;
          }
       }
       }
     }   echo $jum; ?>
    </b></h5></td>
   </tr>
    <tr>
     <td><h5><b> keterlambatan</b></h5></td> <td><h5><b> : </b></h5></td>
     <td><h5><b><?php echo number_format( $pers=100-(($jum/$jumpinjam)*100), 2, '.',''); echo " %";  ?>
    </b></h5></td>
   </tr>
   </table>

   <table id="data-pinjam11" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Jumlah Buku</th>
                <th>Telat</th>
                <th>Denda</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
         <?php
  $no = 1;
    foreach($data_pinjam->result_array() as $op)
    {
      
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <?php $oridate=$op['tgl_pinjam'];
                $date=date("d-M-Y",strtotime($oridate));?>
                <td><?php echo $date;?></td>
                 <?php $oridate2=$op['tgl_kembali'];
                $date2=date("d-M-Y",strtotime($oridate2));?>
                <td><?php echo $date2;?></td>
                <td><?php echo $op['total_buku'];?></td>
                <td><?php foreach ($kembali->result_array() as $key => $kembali1) {
                 if ($kembali1['id_pinjam']==$op['id_pinjam']) {
                   echo $kembali1['terlambat'];
                 }
                } ?></td>
                <td><?php foreach ($kembali->result_array() as $key => $kembali1) {
                 if ($kembali1['id_pinjam']==$op['id_pinjam']) {
                   echo $kembali1['denda'];
                 }
                } ?></td>
                <td><?php $status=$op['status'];

                if($status==1){
                          echo '<span class="label label-success">Semua kembali</span>';
                      }
                      else{
                        echo '<span class="label label-danger">Belum Kembali</span>';
                      }
               
                    ?></td> 

                <?php $detail=$model->get_detail('tb_detail_pinjam','id_pinjam',$op['id_pinjam']);?>
                <td>
                  <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Detail Pinjam</h3>
                  </div>
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <tbody><tr>
                        <th>ID Pinjam</th>
                        <th>ID Buku</th>
                        <th>Nama Buku</th>
                        <th>No Buku</th>
                        <th>Status</th>
                      </tr>
                      <tr>
                       <?php foreach ($detail ->result_array()  as $op3) { ?>
                        <td ><?php echo $op3['id_pinjam'];?></td>
                        <td><?php echo $op3['id_buku'];?></td>
                        <td><?php $buku=$op3['id_buku'];
                            foreach ($data_buku ->result_array()  as $op4) {
                              if($op4['id_buku']==$buku){
                                  echo $op4['judul'];
                              }
                            }?>
                        </td>
                        <td><?php echo $op3['no_buku'];?></td>
                        <td><?php $status=$op3['flag'];
                      if($status==1){
                          echo '<span class="label label-success">Dikembalikan</span>';
                      }
                      else{
                        echo '<span class="label label-danger">Belum Dikembalikan</span>';
                      } 
                    ?></td>
                      </tr> <?php }?>
                    </tbody></table>
                  </div>
                </div>
                </td> 
                <td width="15.5%">
                <?php echo 
                    '<div class="btn-group">
                    <a href="'.base_url().'admin/Pinjam/View_dt_pinjam/?id_pinjam='.$op['id_pinjam'].'" class="btn btn-info" role="button" data-toggle="tooltip" title="Detail Pinjam"><i class="fa fa-list"></i></a>
                    </div>';
                    if($op['status']==0)
                    {
                     echo 
                     '<a href="'.base_url().'admin/Pinjam/edit_pinjam/?id_pinjam='.$op['id_pinjam'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>';
                    }
                    echo 
                    '<span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'admin/Pinjam/hapus_pinjam/?id_pinjam='.$op['id_pinjam'].'">
                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>                     
                    </span>
                    <a href="'.base_url().'admin/Kembali/?id_pinjam='.$op['id_pinjam'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Kembalikan"><i class="fa fa-share"></i></a>
                </td>
            </tr>';?>
<?php
    
    
    }
  ?>            
         </tbody>
    </table>
  </div>
   <?php
   } 
   else
    {
      echo "Belum ada report...";
      }?>
  <div class="box-footer">
    Menampilkan daftar Peminjaman, untuk mengedit dan menghapus data peminjaman klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->


