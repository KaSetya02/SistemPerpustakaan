<div class="row">
                <div class="col-md-12">
                   <center> <h4 class="page-head-line">Selamat Datang Di Sistem Perpustakaan SMP PGRI KADUNGORA</h4></center>
                </div>

<div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-info">
                        <div class="panel-heading">
        
                            <?php
                                $years= date ("m");
                                $month= date ("m");
                                 echo "Kalender&nbsp ".date(" F Y",mktime(0,0,$month,$years));
                            ?> 
                            
                        </div>
                                <div class="panel-body">
                                <?php
                                $month= date ("m");
                                $year=date("Y");
                                $day=date("d");
                                $endDate=date("t",time(0,0,0,$month,$day,$year));
                                echo '<font face="arial" size="4">';
                                echo '<table align="center" border="0" cellpadding=5 cellspacing=5 style=""><tr><td align=center>';
                                echo "Hari ini : ".date("d / F / Y ",mktime(0,0,0,$month,$day,$year));
                                echo '<p>';
                                echo '</td></tr></table>';
                                echo '<table width="100%" align="center" border="0" cellpadding=1 cellspacing=1">
                                <tr bgcolor="#bce8f1">
                                <td align=center><font color=red>Minggu</font></td>
                                <td align=center>Senin</td>
                                <td align=center>Selasa</td>
                                <td align=center>Rabu</td>
                                <td align=center>Kamis</td>
                                <td align=center>Jumat</td>
                                <td align=center>Sabtu</td>
                                </tr>';
                                $s=date ("w", mktime (0,0,0,$month,1,$year));
                                for ($ds=1;$ds<=$s;$ds++) {
                                echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFF\">
                                </td>";}
                                for ($d=1;$d<=$endDate;$d++) {
                                if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
                                $fontColor="#000000";
                                if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }
                                echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
                                if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }}
                                echo '</table>';
                                ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-info">
                        <div class="panel-heading">
                            Perpustakaan SMP PGRI KADUNGORA 
                        </div>
                                <div class="panel-body">
                                <ul align="justify">
                                Untuk mendukung kelancaran proses belajar-mengajar dan meningkatkan kualitas pendidikan siswa di SMP PGRI KADUNGORA.
                                Perpustakaan SMP PGRI KADUNGORA telah menyediakan beragam buku dengan beragam kategori yang dapat dimanfaatkan siswa
                                untuk menbaca serta pihak perpustakaan juga menyediakan sistem peminjaman buku kepada siswa/anggota perpustakaan
                                dengan ketentuan yang telah ditetapkan.
                               </ul>  

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>