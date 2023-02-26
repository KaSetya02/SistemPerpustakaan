<!--css khusus halaman ini -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!--modal dialog untuk hapus -->
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Buku Kembali</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <!--div class="btn-group"><a href="<?php echo base_url(); ?>admin/Kembali/edit"  class="btn btn-success" role="button" data-toggle="tooltip" title="Kembalikan"><i class="fa fa-plus"></i> Kembalikan Buku</a></div-->
   
   <table cellspacing="0"  width="70%">
   <tr><td colspan="3"> <h4><b>Detail Pengembalian Buku</b></h4></td></tr>
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
   <div class="form-group"></div>
   <table id="" class="table table-striped table-bordered" cellspacing="0" width="70%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">ID Buku</th>
                <th>Judul Buku</th>
                <th width="15%">No Buku</th>
            </tr>
        </thead>
        <tbody>
         <?php
  $no = 1;
    foreach($data_detail_pinjam->result_array() as $op)
    {
      if ($op['id_pinjam']==$data_pinjam['id_pinjam']) 
      {
        $buku=$op['id_buku'];
        $no_buku=$op['no_buku'];
        foreach ($data_buku->result_array() as $op2) 
        {
         if($op2['id_buku']==$buku && $op['id_pinjam']==$data_pinjam['id_pinjam'])
          { 
                  ?>
                  <tr>
                      <td><?php echo $no++ ;?></td>
                      <td><?php echo $op['id_buku'];?></td>
                      <td><?php echo $op2['judul'];?></td>
                      <td align="center"><?php echo $op['no_buku'];?></td>
                  </tr>
<?php           }
        }
      }
    }
    ?>
    <tr>
      <td colspan="3" align="right"><b> Jumlah Buku </b></td>
      <td align="right"><?php echo $data_pinjam['total_buku'];?> </td>
    </tr>
    <tr>
      <td colspan="3" align="right"><b> Terlambat</b></td>
      <td align="right"><?php echo $kembali['terlambat'];?> </td>
    </tr>
     <tr>
      <td colspan="3" align="right"><b> Denda (perhari)</b></td>
      <td align="right">Rp. <?php 
                              $id_denda=$kembali['id_denda'];
                              $this->db->where('id_denda',$id_denda);
                              $tt=$this->db->get('tb_denda')->result_array();
                              foreach ($tt as $key => $value11) {
                                echo number_format($value11['denda'],2,",",".")."<br>";
                              } 
                              ?> </td>
    </tr>
    <tr>
      <td colspan="3" align="right"><b> Jumlah denda</b></td>
      <td align="right"><b>Rp.<?php echo number_format($kembali['denda'],2,",",".")."<br>";?></b> </td>
    </tr> 
         </tbody>
    </table>
  </div>
    <div class="box-footer">
    <td>
    <div align ="left"> <a  href="<?php echo base_url(); ?>admin/Pinjam/vw_kembali"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
  </div><!-- box-footer -->
</div><!-- /.box -->


      
  