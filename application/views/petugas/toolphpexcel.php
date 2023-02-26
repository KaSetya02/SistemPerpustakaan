
  
    <div class="container">
       
        <div class="alert alert-info">Set dahulu konfigurasi databasenya berdasarkan konfigurasi database server anda</div>
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                 <?php echo $this->session->flashdata('message');?>
                    <div class="panel-heading">Import Xls/Xlsx ke database (Kategori, Buku, Anggota)</div>
                    <div class="panel-body">
                         <?php
                        $att=array(
                        'class'=>'form-horizontal',
                        'id'=>'formimport',
                        );
                        echo form_open_multipart("",$att);
                        ?>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Tabel</label>
                            <div class="col-sm-8">
                              <select name="tb1" id="tb1" class="form-control" required="">
                                  <option value="">-Pilih Tabel</option>
                                  <?php
                                  $t1 = $this->db->list_tables();
                                  foreach($t1 as $rf1)
                                  {
                                      ?>
                                      <option value="<?=$rf1;?>"><?=ucwords($rf1);?></option>
                                      <?php
                                  }
                                  ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Pilih File (xls/xlsx)</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="file" name="file" required="" placeholder="Pilih File" cept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Baris Ke</label>
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="mulai" name="mulai" required="">
                              
                            </div>
                        </div>                        
                              <!-- <span class="text-info">
                                  <ul>
                                      <li>1. Buat tabel baru,untuk contoh bisa download <a href="<?=base_url();?>client.sql" class="btn btn-xs btn-flat btn-info"><i class="glyphicon glyphicon-download"></i> data sql</a></li>
                                      <li>2. Kolom harus sesuai dengan nama field (contoh : nama_ibu,tanggal_lahir), untuk contoh bisa download <a href="<?=base_url();?>data.xlsx" class="btn btn-xs btn-flat btn-info"><i class="glyphicon glyphicon-download"></i> data excel</a></li>
                                      <li>3. Baris data adalah letak data pada file. <a href="javascript:showelement('img1','bd');" id="bd" data-id="0" class="btn btn-xs btn-flat btn-success"><i class="glyphicon glyphicon-picture"></i> Lihat contoh gambar</a> <img src="<?=base_url();?>img1.jpg" class="img-responsive" id="img1" style="display:none"/></li>
                                  </ul>
                              </span> -->
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <button type="submit" id="importbtn" class="btn btn-flat btn-md btn-primary">Import Data</button>
                              <button type="reset" id="resetbtn" class="btn btn-flat btn-md btn-default">Reset Form</button>
                            </div>
                        </div>
                        <div id="respon1"></div>
                         <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
             <div class="col-md-5">
                <div class="panel panel-default">
                 <?php echo $this->session->flashdata('message');?>
                    <div class="panel-heading">Import Xls/Xlsx ke database (Tanpa ID)</div>
                    <div class="panel-body">
                         <?php
                        $att=array(
                        'class'=>'form-horizontal',
                        'id'=>'formimport_ai',
                        );
                        echo form_open_multipart("",$att);
                        ?>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Tabel</label>
                            <div class="col-sm-8">
                              <select name="tb1" id="tb1" class="form-control" required="">
                                  <option value="">-Pilih Tabel</option>
                                  <?php
                                  $t1 = $this->db->list_tables();
                                  foreach($t1 as $rf1)
                                  {
                                      ?>
                                      <option value="<?=$rf1;?>"><?=ucwords($rf1);?></option>
                                      <?php
                                  }
                                  ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Pilih File (xls/xlsx)</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="file" name="file" required="" placeholder="Pilih File" cept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Baris Ke</label>
                            <div class="col-sm-3">
                              <input type="number" class="form-control" id="mulai" name="mulai" required="">
                              
                            </div>
                        </div>                        
                              <!-- <span class="text-info">
                                  <ul>
                                      <li>1. Buat tabel baru,untuk contoh bisa download <a href="<?=base_url();?>client.sql" class="btn btn-xs btn-flat btn-info"><i class="glyphicon glyphicon-download"></i> data sql</a></li>
                                      <li>2. Kolom harus sesuai dengan nama field (contoh : nama_ibu,tanggal_lahir), untuk contoh bisa download <a href="<?=base_url();?>data.xlsx" class="btn btn-xs btn-flat btn-info"><i class="glyphicon glyphicon-download"></i> data excel</a></li>
                                      <li>3. Baris data adalah letak data pada file. <a href="javascript:showelement('img1','bd');" id="bd" data-id="0" class="btn btn-xs btn-flat btn-success"><i class="glyphicon glyphicon-picture"></i> Lihat contoh gambar</a> <img src="<?=base_url();?>img1.jpg" class="img-responsive" id="img1" style="display:none"/></li>
                                  </ul>
                              </span> -->
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <button type="submit" id="importbtn" class="btn btn-flat btn-md btn-primary">Import Data</button>
                              <button type="reset" id="resetbtn" class="btn btn-flat btn-md btn-default">Reset Form</button>
                            </div>
                        </div>
                        <div id="respon1"></div>
                         <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Export Table ke Xlsx</div>
                    <div class="panel-body">
                    <?php
                        $att=array(
                        'class'=>'form-horizontal',
                        'id'=>'formexport',
                        );
                        echo form_open("",$att);
                        ?>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Tabel</label>
                            <div class="col-sm-8">
                              <select name="tb1" id="tb1" class="form-control" required="">
                                  <option value="">-Pilih Tabel</option>
                                  <?php                                  
                                  foreach($t1 as $rf1)
                                  {
                                      ?>
                                      <option value="<?=$rf1;?>"><?=ucwords($rf1);?></option>
                                      <?php
                                  }
                                  ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Judul</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="title" name="title" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" id="description" name="description" required="" placeholder="Masukkan deskripsi dokumen"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <button type="submit" id="exportbtn" class="btn btn-flat btn-md btn-primary">Export Data</button>
                            </div>
                        </div>
                        <div id="respon2"></div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
        <script>
      function showelement(id,container)
      {
        var did=$("#"+container).attr('data-id');
        if(did==0)
        {
            $("#"+id).show();
            $("#"+container).attr('data-id','1');
        }else if(did==1){
            $("#"+id).hide();
            $("#"+container).attr('data-id','0');
        }
      }
      $(document).ready(function(){
        
        $("#formimport").on('submit',function(e){
            e.preventDefault();            
            var tb=$("#tb1").val();
            var fl=$("#file").val();
            var br=$("#mulai").val();
            $.ajax({
                type:'post',
                dataType:'json',
                url:'<?=site_url();?>admin/Excel/importdata',
                data:  new FormData(this),
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                beforeSend:function(){
                    $("#respon1").html('<img src="<?=base_url();?>ajax-loader.gif"/><span>harap tunggu...</span>');
                    return true;
                },
                success:function(x){
                    $("#respon1").html(x);
                    $("#resetbtn").trigger('click');
                    // return false;
                },
            });
        });

        $("#formimport_ai").on('submit',function(e){
            e.preventDefault();            
            var tb=$("#tb1").val();
            var fl=$("#file").val();
            var br=$("#mulai").val();
            $.ajax({
                type:'post',
                dataType:'json',
                url:'<?=site_url();?>admin/Excel/importdata_ai',
                data:  new FormData(this),
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                beforeSend:function(){
                    $("#respon1").html('<img src="<?=base_url();?>ajax-loader.gif"/><span>harap tunggu...</span>');
                    return true;
                },
                success:function(x){
                    $("#respon1").html(x);
                    $("#resetbtn").trigger('click');
                    // return false;
                },
            });
        });
        
        $("#formexport").on('submit',function(e){
            e.preventDefault(); 
            $.ajax({
                type:'post',
                dataType:'json',
                url:'<?=site_url();?>admin/Excel/exportdata',
                data:$(this).serialize(),
                beforeSend:function(){
                    $("#respon2").html('<img src="<?=base_url();?>ajax-loader.gif"/><span>harap tunggu...</span>');
                },
                success:function(x){
                    $("#respon2").html(x);
                    return false;
                },
            });
        });
                  
      });
  </script>
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

</script>
