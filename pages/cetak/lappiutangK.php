<?php
session_start();
if(!session_is_registered(id)){
header("location:../../index.php");
}


include ("../koneksi.php");
?>
<link rel="stylesheet" href="../jquerycssmenu.css" />
<style type="text/css">
<!--
.style3 {font-size: 16px}
.style5 {
	color: #FFFFFF;
	font-weight: bold;
}
.style6 {font-weight: bold}
-->
</style>
<p>
<table width="100%" border="0" >
  <tr valign="top">
    <td width="63%" class="header"><div align="center">
      <p><img src="../../images/logo.png" alt="Logo" width="100" height="100"><br />
        <span class="style3"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3">Danas Farm </font></span> <br />
        Jl. Raya Arwinda Km. 8 Mande - Cianjur Telp. 081563144552 </p>
      <p><hr /></p>
    </div></td>
  </tr>
  <tr valign="bottom">
    <td ><br />
      <judul>
     
      <p><span class="style6"><i>Piutang Karyawa</i><em>n

          s.d
          <? 
	
$bulan = array ("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember") ;

$hari = array ("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu") ; $idproduk_hari = (integer) date("w") ;
$idproduk_bulan = (integer) date("m") ; $tanggal = (integer) date("d") ;
$tahun = date("Y") ;
$nama_hari = $hari[$idproduk_hari] ;
$nama_bulan = $bulan[$idproduk_bulan] ;

print(" $nama_hari, ") ;
print("$tanggal $nama_bulan ") ;
print($tahun) ;

?>
      </em></span></p>
    </judul>    </td>
  </tr>
  <tr valign="top">
    <td height="256"><table  width="100%" cellspacing="0" border="2" bordercolor="#000000">
      <tr bgcolor="#000000">
        <td width="5%" height="28" ><div align="center" class="style5">No</div></td>
        <td width="17%" ><div align="center" class="style5">Karyawan</div></td>
        <td width="20%" ><div align="center" class="style5">HP</div></td>
        <td width="16%" ><div align="center" class="style5">Hutang</div></td>
        <td width="16%" ><div align="center" class="style5">Bayar</div></td>
        <td width="16%" ><div align="center" class="style5">Piutang</div></td>
      </tr>
      <?
	   
   
	   $no=1;
		
	   $sql=mysql_query("SELECT sum(byr) as bayar, sum(byr2) as hutang, sum(sisa) as sisastart, tblkaryawan.* FROM rekap left join tblkaryawan on rekap.kepada=tblkaryawan.idkaryawan where status='hKaryawan' || status='pKaryawan' group by kepada");
	   while($tampil=mysql_fetch_array($sql)){ 
	   $saldo=($tampil['hutang']+$tampil['sisastart'])-$tampil['bayar'];
//belang
	   	if(($no % 2) == 0){
		$warna="#eeeee";}
	else{
		$warna="#ccccc";}

	   ?>
      <tr >
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="left"><? echo $tampil['namakaryawan']?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><? echo $tampil['hp']?></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['hutang']+$tampil['sisastart'],'','','.');?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['bayar'],'','','.');?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right">
          <? if($saldo<0){echo "<sekarang>"; echo number_format($saldo,'','','.'); echo "</sekarang>";} else {echo number_format($saldo,'','','.');}?>
        </div></td>
      </tr>
      <? }
 $sql=mysql_query("SELECT sum(byr) as gbayar, sum(byr2) as ghutang, sum(sisa) as gsisastart FROM rekap where status='hKaryawan' || status='pKaryawan'");
	   
	   $tampil=mysql_fetch_array($sql);
	   $sld=($tampil['ghutang']+$tampil['gsisastart'])-$tampil['gbayar'];
?>
      <tr>
        <td colspan="3"><div align="center"><strong>Total</strong></div></td>
        <td><div align="right"><strong><? echo number_format($tampil['ghutang']+$tampil['gsisastart'],'','','.');?></strong></div></td>
        <td><div align="right"><strong><? echo number_format($tampil['gbayar'],'','','.');?></strong></div></td>
        <td><div align="right"><strong><? echo number_format($sld,'','','.');?></strong></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
<script language="javascript" type="text/javascript">
    window.print();
    window.close();
</script></p>
