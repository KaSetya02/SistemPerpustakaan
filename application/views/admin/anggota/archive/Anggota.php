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
            <?php echo anchor("adm/Anggota/create", "Tambah Anggota");?>
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
                  <th>Id Anggota</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Agama</th>
                  <th>JK</th>
                  <th>HP</th>
                  <th>Alamat</th>
                  <th>ket</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($isi as $key => $list)
                        {
                            ?>
                <tr>
                  <td><?php echo $list['id_anggota'];?></td>
                  <td><?php echo $list['nama'];?></td>
                  <?php $id=$list['id_kelas'];?>
                        <?php $col="id_kelas";
                              $quer=$this->Kelas_model->Get_by_id('tb_kelas',$col,$id);?>
                              <?php foreach ($quer as $key);
                              {?>
                              <td><?php echo $key;?></td>
                              <?php
                              }
                              ?>
                  <?php $id=$list['id_agama'];?>
                        <?php $col="id_agama";
                              $quer=$this->Agama_model->Get_by_id('tb_agama',$col,$id);?>
                              <?php foreach ($quer as $key);
                              {?>
                              <td><?php echo $key;?></td>
                              <?php
                              }
                              ?>
                  <td><?php
                          if ($list['jenis_kelamin']=="L") {
                            echo "Laki - Laki";
                          }
                          else
                          {
                            echo "Perempuan";
                          }
                  ?></td>
                  <td><?php echo $list['hp'];?></td>
                  <td><?php echo $list['alamat'];?></td>
                  <td><?php echo $list['ket'];?></td>
                  <td align="center">
                      <a href="<?php echo base_url();?>adm/Anggota/edit/<?php echo $list['id_anggota'];?>">Edit</a>
                                        <!--?php 
                                            $atts= array('onclick' => "return confirm('edit???')", 
                                                        );
                                            echo anchor("adm/Anggota/edit/".$list['id_anggota'], "Edit", $atts);
                                        ?-->
                                        ||
                                         <?php 
                                            $atts= array('onclick' => "return confirm('Are you sure???')", 
                                                        );
                                            echo anchor("adm/Anggota/delete/".$list['id_anggota'], "Delete", $atts);
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

        
        