<div id="content"> 
<center>
<div style="overflow:auto;width:1000px;height:440px;padding:10px; solid #eee">
    <h2><?php echo $title;?></h2>
    <div class="entry">
        <p>
            <?php echo anchor("Admin/Rak/tambah_rak", "Tambah Data Rak[+]");?>
            <?php echo $this->session->flashdata('message');?>
        </p>
        <?php
        if (count($hasil))
            {
                $i=1;
                ?>
                    <table width="50%" border="1"> 
                        <tr> 
                            
							<th width="10%">No</th> 
                            <th width="30%">Nama Rak</th> 
                            <th width="30%">Actions</th>
                        </tr> 
                        <?php
                        foreach ($hasil as $key => $list)
                        {
                            ?>
                                <tr> 
                                    
                                    <td align="center"><?php echo $list['no_rak'];?></td> 
                                    <td><?php echo $list['nama_rak'];?></td>  
                                    <td align="center">
                                        <?php 
                                            $atts= array('onclick' => "return confirm('edit???')", 
                                                        );
                                            echo anchor("admin/Rak/edit/".$list['no_rak'], "Edit", $atts);
                                        ?>
                                        ||
                                         <?php 
                                            $atts= array('onclick' => "return confirm('Are you sure???')", 
                                                        );
                                            echo anchor("admin/Rak/delete/".$list['no_rak'], "Delete", $atts);
                                        ?>
                                     </td>
                                </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </table>
                    <br />
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
</div>
</div>
</center>