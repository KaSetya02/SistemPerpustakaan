
<style type="text/css">
  table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

</style>

   <table>
   <thead align="center">
            <tr>
                <th align="center">No</th>
                <th >ID Buku</th>
                <th>ISBN</th>
                <th >Judul Buku</th>
                <th >Kategori</th>
                <th >Penerbit</th>
                <th >Pengarang</th>
                <th>No. Rak</th>
                <th>Tahun Terbit</th>
                <th>Total Stok</th>
                <th>Keterangan</th>
            </tr>
    </thead>
         <?php
  $no = 1;
    foreach($data_buku->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo $op['id_buku'];?></td>
                <td><?php echo $op['ISBN'];?></td>
                <td><?php echo $op['judul'];?></td>
                <td><?php $kategori=$op['id_kategori'];
                    foreach ($data_kategori ->result_array()  as $op2) {
                      if($op2['id_kategori']==$kategori){
                          echo $op2['kategori'];
                      }
                    }?></td>
                <td><?php $penerbit=$op['id_penerbit'];
                    foreach ($data_penerbit ->result_array()  as $op2) {
                      if($op2['id_penerbit']==$penerbit){
                          echo $op2['nama_penerbit'];
                      }
                    }?></td>
                <td><?php $pengarang=$op['id_pengarang'];
                    foreach ($data_pengarang->result_array()  as $op2) {
                      if($op2['id_pengarang']==$pengarang){
                          echo $op2['nama_pengarang'];
                      }
                    }?></td>
                <td><?php $no_rak=$op['no_rak'];
                    foreach ($data_rak->result_array()  as $op2) {
                      if($op2['no_rak']==$no_rak){
                          echo $op2['nama_rak'];
                      }
                    }?></td>
                <td><?php echo $op['thn_terbit'];?></td>
                <td><?php echo $op['stok'];?></td>
                <td><?php echo $op['ket'];?></td>
                </tr>
<?php
    }
  ?>            
    </table>
  
      
  