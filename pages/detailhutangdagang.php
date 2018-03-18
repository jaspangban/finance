<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../image/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

</head>

<body >
<table width="100%" border="0">
  <? 
  
  $s=mysql_query("select * from tblpenjual where idpenjual='".$_SESSION['penjual']."'");
  $array=(mysql_fetch_array($s));
  ?>
  <tr>
    <td colspan="3"><p>
      <judul><strong>Detail Hutang <? echo " Sdr. "; echo $array['namapenjual'];echo " - "; echo $array['hp']; ?> </strong></judul>
    </p>
        <p align="right"><a href="aksi/unsetcust.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('tutup','','images/ttp.png',1)"></a></p>
      <form id="form3" name="form3" method="post" action="">
          <p>dari tanggal:
                <label>
                  <select style="font-size:11px" name="tgl">
                    <option value="">Tanggal</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                    <option>29</option>
                    <option>30</option>
                    <option>31</option>
                  </select>
                  </label>
                /
                <label>
                  <select style="font-size:11px" name="bln">
                    <option value="">Bulan</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                  </select>
                </label>
                /
                <label>
                  <select style="font-size:11px" name="thn">
                    <option value="">Tahun</option>
                    <option>2010</option>
                    <option>2011</option>
                    <option>2012</option>
                    <option>2013</option>
                    <option>2014</option>
                    <option>2015</option>
                    <option>2016</option>
                  </select>
              </label> sampai tanggal:
                <label>
                      <select name="tgl2" id="tgl2" style="font-size:11px">
                        <option value="">Tanggal</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                      </select>
                      </label>
                /
                <label>
                  <select name="bln2" id="bln2" style="font-size:11px">
                    <option value="">Bulan</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                  </select>
                </label>
                /
                <label>
                  <select name="thn2" id="thn2" style="font-size:11px">
                    <option value="">Tahun</option>
                    <option>2010</option>
                    <option>2011</option>
                    <option>2012</option>
                    <option>2013</option>
                    <option>2014</option>
                    <option>2015</option>
                    <option>2016</option>
                  </select>
                </label>
                
				
                  | 
                  <input style="font-size:11px" type="submit" name="Submit4" value="Ok"  class="tombol"/>
              </p>

        <p> </p>
      </form>
      </p></td>
  </tr>
  <tr>
    <td colspan="3"><div>
      <div align="left">
        <?
		
	if($_POST){
		  $tgl=$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
		  $tgl2=$_POST['thn2'].'-'.$_POST['bln2'].'-'.$_POST['tgl2'];
		  	if(empty($_POST['thn']) || empty($_POST['bln']) || empty($_POST['tgl']) || empty($_POST['thn2']) || empty($_POST['bln2']) || empty($_POST['tgl2'])){echo "<marquee  scrolldelay='200' width=625 behavior='alternate'><warning>Pengisian bulan / tahun tidak komplit...!</warning></marquee>";
			}else{
	?>
        <strong>Tanggal : <? echo $_POST['tgl'].'-'.$_POST['bln'].'-'.$_POST['thn'];?> s/d <? echo $_POST['tgl2'].'-'.$_POST['bln2'].'-'.$_POST['thn2'];?> </strong> <marquee scrolldelay="200"  direction="left" width="200" behavior="alternate"onmouseover="this.stop()" onMouseOut="this.start()"><a  class="tombol" href="cetak/laphutang.php?thn=<? echo $_POST['thn']?>&bln=<? echo $_POST['bln']?>&tgl=<? echo $_POST['tgl']?>&thn2=<? echo $_POST['thn2']?>&bln2=<? echo $_POST['bln2']?>&tgl2=<? echo $_POST['tgl2']?>" target="_blank">--Cetak--</a></marquee></div>
      <table >
        <tr>
          <td width="6%" class="headertbl"><div align="center"><strong>No</strong></div></td>
          <td width="12%" class="headertbl"><div align="center"><strong>Tanggal</strong></div></td>
          <td width="32%" class="headertbl"><div align="center"><strong>Catatan</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Transaksi </strong></div></td>
          <td width="18%" class="headertbl"><div align="center"><strong>Pembayaran</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Saldo</strong></div></td>
        </tr>
        <?
	   //starting point penjual
		$start=mysql_query("SELECT jumlah FROM start WHERE objek='".$_SESSION['penjual']."'");
	  	$mulai=mysql_fetch_array($start);
		
		$sld=$mulai['jumlah'];
		
	   //mengambil nilai dari tanggal sebelumnya
	   $t=mysql_query("SELECT rekap2.*, tblpenjual.namapenjual, tblpenjual.perusahaan FROM rekap2 LEFT JOIN tblpenjual ON rekap2.kepada=tblpenjual.idpenjual WHERE tanggal<'$tgl' && kepada='".$_SESSION['penjual']."'");
	   
	   while($m=mysql_fetch_array($t)){
	   $sld+=$m['trx']-$m['byr'];
	   }
	   $saldo=$sld;
   
	   //data yang ditampilkan 
	   $no=1; 
	   $sql=mysql_query("SELECT rekap2.*, tblpenjual.namapenjual, tblpenjual.perusahaan FROM rekap2 LEFT JOIN tblpenjual ON rekap2.kepada=tblpenjual.idpenjual WHERE tanggal>='$tgl' && tanggal<='$tgl2' && kepada='".$_SESSION['penjual']."' ORDER BY tanggal ASC");
	   
	   while($tampil=mysql_fetch_array($sql)){
	   $saldo+=$tampil['trx']-$tampil['byr'];
	   //belang
	   	if(($no % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}

	   ?>
        <tr>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center">
            <?  echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?>
          </div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><? echo $tampil['catatan']; if($tampil['trx']!=0){echo "Transaksi";}else {echo "";}?></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['trx'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['byr'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right">
            <? if($saldo<0){echo $saldo;} else {echo number_format($saldo,'','','.');}?>
          </div></td>
        </tr>
        <? }?>
      </table>
      <? }}?>
    </div></td>
  </tr>
</table>
</body>
</html>
