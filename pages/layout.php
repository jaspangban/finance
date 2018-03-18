<?php
session_start();
if(!session_is_registered(id)){
header("location:../index.php");
}

include "koneksi.php";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function Konfirmasi() {
var msg;
msg= "Anda yakin akan menghapus data ini?" ;
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Index</title>
<link rel="stylesheet" type="text/css" href="jquerycssmenu.css" />
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquerycssmenu.js"></script>
<style type="text/css">
body { font: 11px Tahoma, sans-serif; margin: 0; padding: 0; }
a { color: #3150a9; text-decoration: none; }
#content { padding: 10px; margin: 10px; border: 1px solid #ccc; width:auto; background: #fafafa; }
#content2 { padding: 10px; margin: 10px; border: 1px solid #ccc; width: 325px; background: #fafafa; }
</style>
</head>
<body>

<?
	  if($_POST['Submit']){
	  mysql_query("update about set uraian='".$_POST['isiprofile']."' where id='1'");
	  	echo "<meta http-equiv=Refresh content=0;url=layout.php>";

	  }

	  if($_POST['Submit2']){
	  mysql_query("update about set uraian='".$_POST['isiberita']."' where id='2'");
	  	echo "<meta http-equiv=Refresh content=0;url=layout.php>";

	  }

	  $q=mysql_query("select * from about where id='2'");
	  $tampil2=mysql_fetch_array($q);

?>
<table width="100%"  cellspacing="0">
  <tr  valign="top" class="backhead">
    <td  class="bulet"width="14%"><div align="center"><img src="../images/logo.png" alt="LOGO" /></div></td>
    <td  width="73%"><p align="center"><strong>
      <div align="left"><font  size="4"  color="#000033">APLIKASI PEMBUKUAN
    </font></p>
    <br />
    <br /></div>
    </strong>
      <div align="right"><blink>
        <? 
	
$bulan = array ("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember") ;

$hari = array ("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu") ; $idproduk_hari = (integer) date("w") ;
$idproduk_bulan = (integer) date("m") ; $tanggal = (integer) date("d") ;
$tahun = date("Y") ;
$nama_hari = $hari[$idproduk_hari] ;
$nama_bulan = $bulan[$idproduk_bulan] ;
echo "<font color=orange>";
print(" $nama_hari, ") ;
print("$tanggal $nama_bulan ") ;
print($tahun) ;
echo "</font>";

?></blink>
      </div></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td bgcolor="#000000"></td>
  </tr>
  <tr valign="top">
    <td align="center"><marquee width="108"  height="120"   behavior="scroll" direction="up" scrolldelay="250"  onmouseover="this.stop()" onMouseOut="this.start()">
      <p><?
	  $p=mysql_query("select * from about where id='1'");
	  $tampil=mysql_fetch_array($p);
	  echo $tampil['uraian'];
	  ?> </p></marquee>
      <p>
	  <? if($_SESSION['level']==1){?>
	  <a href="?edit=1">Edit Profile</a></p>
      <p><a href="?edit=2">Edit Berita </a> <? } else{echo "";}?></p>
      <? if($_GET['edit']==1){?>
      <form id="form1" name="form1" method="post" action="">
        <label>Pembaharuan Profile <br />
        <textarea name="isiprofile"  class="strip1" id="isiprofile" ><? echo $tampil['uraian']?></textarea>
        </label>
	  
        <p>
          <label>
          <input type="submit" name="Submit" value="Submit"  class="tombol"/>
          </label>
        </p>
      </form><? }
	  ?>
      <? if($_GET['edit']==2){?>
<form id="form2" name="form2" method="post" action="">
        <label>Pembaharuan Berita Berjalan  <br />
        <textarea name="isiberita"  class="strip1" id="isiberita" ><? echo $tampil2['uraian']?></textarea>
        </label>
	  
        <p>
          <label>
          <input name="Submit2" type="submit"  class="tombol" id="Submit2" value="Submit"/>
          </label>
        </p>
      </form><? }
	  ?>
    <p>&nbsp;</p></td>
    <td>
	<div id="myjquerymenu" class="jquerycssmenu">
<?php echo $menu; ?> <?
	  ?> <marquee direction="left" width="200"  scrolldelay="250"><? echo $tampil2['uraian']?></marquee>
<br style="clear: left" />
</div>

<div id="content" class="sudut">
<?
	if(!empty($_GET['p'])){
		include("".$_GET['p'].".php");
	}else {
	 	include ("tentang.php");
	}
	
	?>
</div>	</td>
  </tr>
  <tr    class="rightarrowclass">
    <td>&nbsp;</td>
    <td ><div align="center" class="style2"><em>powered by : landi ruslandi </em></div></td>
  </tr>
</table>
<p>&nbsp;</p>


</body>
</html>