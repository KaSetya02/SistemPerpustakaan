<!--css khusus halaman ini -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Kelas</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="form-group"></div>
   <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="10%">No</th>
                <!--th class="center"> <i class="glyphicon glyphicon-plus"></i></th-->
                <th width="75%">Kelas</th>
                <th width="15%">Pilihan</th>
            </tr>
        </thead>
        <tfoot>
             <tr>
                <th width="10%">No</th>
                <!--th class="center"> <i class="glyphicon glyphicon-plus"></i></th-->
                <th width="75%">Kelas</th>
                <th width="15%">Pilihan</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_kelas->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <!--td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td-->
                <td><?php echo $op['kelas'];?></td>
                <td>
                <?php echo 
                    '<div class="btn-group">
                     <a href="'.base_url().'admin/Cetak/barcode_kartu/?id_kelas='.$op['id_kelas'].'" class="btn btn-info" role="button" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                </td>
            </tr>';?>
<?php
    }
  ?>            
         </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar Kelas, untuk keperluan mencetak kartu anggota
  </div><!-- box-footer -->
</div><!-- /.box -->


