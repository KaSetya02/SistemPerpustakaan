<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <p>
            <?php echo anchor("adm/Pengarangg/create", "Tambah Pengarang");?>
            <?php echo $this->session->flashdata('message');?>
        </p>
            <div class="box-body">
            <?php
          if (count($isi))
            {
                $i=1;
                ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id pengarang</th>
                  <th>Nama pengarang</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($isi as $key => $list)
                        {
                            ?>
                <tr>
                  <td><?php echo $list['id_pengarang'];?></td>
                  <td><?php echo $list['nama_pengarang'];?></td>
                  <td align="center">
                                        <?php 
                                            $atts= array('onclick' => "return confirm('edit???')", 
                                                        );
                                            echo anchor("adm/pengarangg/edit/".$list['id_pengarang'], "Edit", $atts);
                                        ?>
                                        ||
                                         <?php 
                                            $atts= array('onclick' => "return confirm('Are you sure???')", 
                                                        );
                                            echo anchor("adm/pengarangg/delete/".$list['id_pengarang'], "Delete", $atts);
                                        ?>
                                     </td>
                </tr>
                </tbody>
                <?php
                            $i++;
                        }
                        ?>
              </table>
               <?php   
            }
        else
            {
                ?>
                    Data not available...
                <?php   
            }
        ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

        
        