  <style>

    .bs-glyphicons {
      padding-left: 0;
      padding-bottom: 1px;
      margin-bottom: 20px;
      list-style: none;
      overflow: hidden;
    }

    .bs-glyphicons li {
      float: left;
      width: 25%;
      height: 115px;
      padding: 10px;
      margin: 0 -1px -1px 0;
      font-size: 12px;
      line-height: 1.4;
      text-align: center;
      border: 1px solid #ddd;
    }

    .bs-glyphicons .glyphicon {
      margin-top: 5px;
      margin-bottom: 10px;
      font-size: 24px;
    }

    .bs-glyphicons .glyphicon-class {
      display: block;
      text-align: center;
      word-wrap: break-word; /* Help out IE10+ with class names */
    }

    .bs-glyphicons li:hover {
      background-color: rgba(86, 61, 124, .1);
    }

    @media (min-width: 768px) {
      .bs-glyphicons li {
        width: 12.5%;
      }
    }
  </style>
  <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#fa-icons" data-toggle="tab">Pinjam</a></li>
              <li ><a href="#glyphicons" data-toggle="tab">Kembali</a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane active" id="fa-icons">
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

   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Pinjam/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Peminjaman"><i class="fa fa-plus"></i>Tambah Peminjaman</a></div>
   <table id="data-pinjam" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>Tanggal Pinjam</th>
                <th>ID Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kembali</th>
                <th>Total Buku</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>Tanggal Pinjam</th>
                <th>ID Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kembali</th>
                <th>Total Buku</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_pinjam->result_array() as $op)
    {
        if ($op['status']==0) {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <?php $oridate=$op['tgl_pinjam'];
                $date=date("d-M-Y",strtotime($oridate));?>
                <td><?php echo $date;?></td>
                <td><?php echo $op['id_anggota'];?></td>
                <td><?php $nama=$op['id_anggota'];
                    foreach ($anggota ->result_array()  as $op2) {
                      if($op2['id_anggota']==$nama){
                          echo $op2['nama'];
                      }
                    }?></td>
                 <?php $oridate2=$op['tgl_kembali'];
                $date2=date("d-M-Y",strtotime($oridate2));?>
                <td><?php echo $date2;?></td>
                <td><?php echo $op['total_buku'];?></td>
   
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
    }
  ?>            
         </tbody>
    </table>
  <div class="box-footer">
    Menampilkan daftar Peminjaman, untuk mengedit dan menghapus data peminjaman klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
<!-- /.box -->
              </div>
              <!-- /#fa-icons -->

              <!-- glyphicons-->
              <div class="tab-pane" id="glyphicons">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!--modal dialog untuk hapus -->
<div class="modal fade" id="confirm-delete_kembali" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>  

                <div class="modal-body">
                    <p>Anda akan menghapus Data Pengembalian ini</p>
                    <p><strong>Peringatan</strong>  Setelah data dihapus, data tidak dapat dikembalikan!</p>
                    <br/>
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

   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/Pinjam/create"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Peminjaman"><i class="fa fa-plus"></i>  Tambah Peminjaman</a></div>
   <table id="data-pinjam1" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>Tanggal Pinjam</th>
                <th>ID Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kembali</th>
                <th>Total Buku</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th class="center"> <i class="glyphicon glyphicon-plus"></i></th>
                <th>Tanggal Pinjam</th>
                <th>ID Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kembali</th>
                <th>Total Buku</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_pinjam->result_array() as $op)
    {
        if ($op['status']==1) {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <?php $oridate=$op['tgl_pinjam'];
                $date=date("d-M-Y",strtotime($oridate));?>
                <td><?php echo $date;?></td>
                <td><?php echo $op['id_anggota'];?></td>
                <td><?php $nama=$op['id_anggota'];
                    foreach ($anggota ->result_array()  as $op2) {
                      if($op2['id_anggota']==$nama){
                          echo $op2['nama'];
                      }
                    }?></td>
                 <?php $oridate2=$op['tgl_kembali'];
                $date2=date("d-M-Y",strtotime($oridate2));?>
                <td><?php echo $date2;?></td>
                <td><?php echo $op['total_buku'];?></td>
   
                <td><?php $status=$op['status'];

                if($status==1){
                          echo '<span class="label label-success">Semua kembali</span>';
                      }
                      else{
                        echo '<span class="label label-danger">Belum Kembali</span>';
                      }
               
                    ?></td> 

                <?php $detail=$model->get_detail('tb_detail_pinjam','id_pinjam','tb_kembali','id_kembali',$op['id_pinjam']);?>
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
                   
                    </div>';
                    if($op['status']==0)
                    {
                     echo 
                     '<a href="'.base_url().'admin/Pinjam/edit_pinjam/?id_pinjam='.$op['id_pinjam'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>';
                    }
                    echo 
                    '<span data-toggle="modal" data-target="#confirm-delete_kembali" data-href="'.base_url().'admin/Pinjam/hapus_pinjam_kembali/?id_pinjam='.$op['id_pinjam'].'">
                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>                     
                    </span>
                </td>
            </tr>';?>
<?php
 }
    }
  ?>            
         </tbody>
    </table>
  <div class="box-footer">
    Menampilkan daftar Peminjaman, untuk mengedit dan menghapus data peminjaman klik tombol pada kolom pilihan.
  </div>
              </div>
              <!-- /#ion-icons -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>