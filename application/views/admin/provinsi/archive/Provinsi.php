<!--
sufhdfsjhfjksfdkjhdsfkjhsfdikjhsdjkfhsdkjfhsdkhf
roso pancen fuck -->

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <p>
            <?php echo anchor("adm/provinsi/create", "Tambah provinsi");?>
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
                  <th>Id Provinsi</th>
                  <th>Nama Provinsi</th>
                  <th>Kota</th>               
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($isi as $key)
                        {
                            ?>
                <tr>
                  <td><?php echo $key['id_provinsi'];?></td>
                  <td><?php echo $key['nama_provinsi'];?></td>
                  <td><?php echo $key['kota'];?></td>
                  
                  
                  <td align="center">
                      <a href="<?php echo base_url();?>adm/provinsi/edit/<?php echo $key['id_provinsi'];?>">Edit</a>
                                        <!--?php 
                                            $atts= array('onclick' => "return confirm('edit???')", 
                                                        );
                                            echo anchor("adminin/provinsi/edit/".$list['id_provinsi'], "Edit", $atts);
                                        ?-->
                                        ||
                                         <?php 
                                            $atts= array('onclick' => "return confirm('Are you sure???')", 
                                                        );
                                            echo anchor("adm/provinsi/delete/".$key['id_provinsi'], "Delete", $atts);
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

        
        