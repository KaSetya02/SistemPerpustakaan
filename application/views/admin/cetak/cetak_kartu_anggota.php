<style type="text/css" media="print">
@media print {
  body {-webkit-print-color-adjust: exact;}
  a:link:after, a:visited:after {
    content: "";
}
}
@page {
    size:A4 potrait;
   margin:9mm 20mm 18mm 20mm;  
}

.under{
    position: absolute;
    left:0px;
    top:0px;
    z-index: -1;
}
.over{
    position: absolute;
    left: 40px;
    top: 10px;
    z-index: -1l
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="Pragma" content="no-cache"><meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0"><meta http-equiv="Expires" content="Fry, 02 Oct 2012 12:00:00 GMT"><style type="text/css">
*{font:11px Arial, Helvetica, sans-serif;}
p, li{position: relative;}
p{margin-bottom: 0px;margin-top: 0px;font-weight: bold;}
li{margin-bottom: 0px; margin-top: 0px;list-style-type: disc;font-size: 10px;}
ul{margin: 0px;padding-left: 10px;}
h1{margin: 0px;font-weight: bold;text-align: center;font-size:12px;}
h2{margin: 0px;font-weight: bold;text-align: center;padding-bottom:3px;font-size:12px;}
h3{margin: 0px;font-weight: bold;text-align: center;padding-bottom:3px;font-size:8px;}
hr{margin: 0px;border: 1px solid #000000;position: relative;}
#header1_div{z-index:2;position: absolute;left: 61px;top: 4px;width:245px;height: 45px;color:#000000;}
#header2_div{z-index:3;position: absolute;left: 10px;top: 4px;width:300px;height: 43px;color:#000000;}
#rules_div{z-index:4;position: absolute;left: 12px;top: 58px;width:300px;height: 142px;text-align: justify;}
#address_div{z-index:4;position: absolute;left: 9px;top: 175px;width:300px;height: 20px;font-size:7px;}
#logo_div{z-index:5;position: absolute;left: 10px;top: 4px;width: 35px;height:35px;}
#photo_blank_div{z-index:5;position: absolute;left: 10px;top:130px;font-size: 7px;text-align: center;border:#cccccc solid 1px;width:56.6929133865px; height:68.0314960638px;}
#photo_div{z-index:6;position: absolute;left: 10px;top:130px;border:#cccccc solid 1px;width:56.6929133865px; height:68.0314960638px;}
#front_side{background: url(/senayan/files/membercard/membercard_background1.jpg) center center;}
#back_side{background: url(/senayan/files/membercard/membercard_background3.jpg) center center;}
.container_div{z-index:1;position: relative; width:325.0393700826px; height:204.0944881914px;margin-bottom:3.7795275591px;;border:#CCCCCC solid 1px;-moz-border-radius: 8px;border-radius: 8px;}
.bio_div{z-index:7;position: absolute;left: 0px;top:48px;height: 110px;margin: 0px;text-align: justify;}
.bio_address{z-index:8;top: 0px;}
.bio_label{ z-index:9;float: left;width: 100px;text-align:left;padding-left: 10px;}
.label_address{z-index:10;float: left; width: 200px;margin-bottom:0px;margin-left:3px;}
.stamp_div{z-index:11;position: absolute;left: 200px;top:140px;margin-bottom: 34px;width: 118px;}
.stamp{z-index:12;text-align: left;margin: 0px;}
.city{z-index:13;font-size:7px;margin: 0px;}
.title{z-index:14;font-size:8px;margin: 0px;}
.officials{z-index:15;top: 0px;font-size: 8px;margin: 0px;}
.sign_file_div{z-index:16;position: absolute;left: -15px;top: 10px;width:107px;height: 25px;}
.stamp_file_div{z-index:17;position: absolute;left:-30px;top: 5px;width: 40px;height: 70px;}
.exp_div{z-index:18;position: absolute;left: 120px;top: 142px;width:110px;height: 12px;font-size: 8px;text-align: left;}
.barcode_div{z-index:19;position: absolute;left: 120px;top: 154px;width:150px;height: 42px;}
</style>

<table style="margin: 0; padding: 0;" cellspacing="0" cellpadding="0">
<tbody>
<?php $split=array_chunk($data_kartu->result_array(), 2);

foreach($split as $op) {?>
    <tr>
    <?php foreach ($op as $value) {?>
        <td valign="top">
            <div class="container_div" id="front_side"><div></div>
            <div id="logo_div"><img height="40px" width="40px" src="<?php echo base_url(); ?>assets/membercard/logo.png" >
            </div>
            <div id="header1_div">
                <h1> KARTU ANGGOTA PERPUSTAKAAN<br /> MTsN 4 SLEMAN </h1>
                <h2>Jalan Purbaya 24, Tridadi, Sleman</h2></div>
                    <div class="bio_div"><div id="garis"><hr></div>
                        <p class="bio"><label class="bio_label">ID Anggota</label><span>: </span><?php echo $value['id_anggota'];?></p>
                        <p class="bio"><label class="bio_label">Nama </label><span>: </span><?php echo $value['nama'];?></p>
                        <p class="bio"><label class="bio_label">Kelas</label><span>: </span><?php echo $value['kelas'];?></p><!--<p class="bio_address"><label class="bio_label">Institution</label><span style="float:left">: </span>--><!--<span class="label_address"></span></p>--><!--<p class="bio"><label class="bio_label">E-mail</label><span>: </span></p>-->
                        <p class="bio_address"><label class="bio_label">Jenis Kelamin</label><span style="float:left">: </span><span class="label_address">

                        <?php $jk=$value['jenis_kelamin'];
                            if($jk=='P'){
                                echo "Perempuan";
                            }
                            else{
                                echo "Laki-Laki";
                            }
                        ?></span></p>
                        <p class="bio_address"><label class="bio_label">Address</label><span style="float:left">: </span><span class="label_address"><?php echo $value['alamat'];?></span></p></div>
                        <div id="photo_blank_div"><br>Photo size:<br>1.5 X 1.8 cm</div><div id="photo_div"><img width="56.6929133865px" height="68.0314960638px" src="<?php echo base_url(); ?>assets/membercard/avatar-blank.jpg" ></div><!--<div class="exp_div">Expiry Date : 20 Mei 2018</div>-->
                        <div class="barcode_div"><img width="175px" height="40px" style="width: 100%; border=" 0px"="" src="<?php echo site_url();?>admin/cetak/barcode_anggota/?id_anggota=<?php echo $value['id_anggota'];?>""></div></div>
        </td>

        <td valign="top">
            <div class="container_div" id="back_side"><div></div>
            <div id="logo_div"><img height="35px" width="35px" src="<?php echo base_url(); ?>assets/membercard/logo.png"  ></div>
            <div id="header2_div">
                <h1>KARTU ANGGOTA PERPUSTAKAAN <br /> MTsN 4 SLEMAN</h1><h3>Jalan Purbaya No 24, Tridadi, Sleman <br></h3><hr></div>
            <div id="rules_div">
                <ul>
                    <li>Kartu ini diterbitkan oleh Perpustakaan MTsN 4 Sleman. Segala Penggunaan kartu diatur oleh Perpustakaan MTsN 4 Sleman sesuai ketentuan dan syarat yang berlaku</li>
                    <li>Bila menemukan kartu ini mohon mengembalikan ke MTsN 4 Sleman</li>
                    <li>Kartu ini tidak boleh di alih pinjamkan</li>
                   
                </ul>
                </div>
            <div>
            <div class="stamp_div"><div class="stamp_file_div"><!-- <img class="" height="45px" width="45px" src="<?php echo base_url(); ?>assets/membercard/stamp.png" > --></div>
            <div class="sign_file_div"><!-- <img class="" height="40px" width="100px" src="<?php echo base_url(); ?>assets/membercard/signature.png" > --></div>
                <p class="stamp city">Sleman, </p>
                <p class="stamp title">Kepala Perpustakaan Perpustakaan</p><br>
                <p class="stamp officials">Nama Petugas Perpustakaan<br>NIP</p>
            </div>
            </div>
        </td>

    </tr>
       <?php } ?> 
     <?php } ?> 
    <tr></tr>
</tbody>
</table>
<script type="text/javascript">self.print();</script>