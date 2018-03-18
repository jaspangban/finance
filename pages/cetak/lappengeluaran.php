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
     
      <p><i>Pembayaran 
        <? 
	$bln=$_GET['bln'];
	$thn=$_GET['thn'];
	$st=$_GET['pilih'];
	$obj=$_GET['objek'];
	echo "<b>".$st." ";
	echo $_GET['objek']; echo"</b>";
	echo " bulan "; 
	switch ($bln)
{
case 01: echo "Januari ";
	break; 
case 02: echo "Februari ";
	break; 
case 03: echo "Maret ";
	break; 
case 04: echo "April ";
	break; 
case 05: echo "Mei ";
	break; 
case 06: echo "Juni ";
	break; 
case 07: echo "Juli ";
	break; 
case 08: echo "Agustus ";
	break; 
case 09: echo "September ";
	break; 
case 10: echo "Oktober ";
	break; 
case 11: echo "November ";
	break; 
case 12: echo "Desember ";
	break; 
default: echo "kosong ";
	break;  
	}
	echo " "; echo $thn;
	?></i>
        </p>
    </judul>
    </td>
  </tr>
  <tr valign="top">
    <td height="256"><table   width="100%" cellspacing="0" border="2" bordercolor="#000000">
      <tr bgcolor="#000000">
        <td height="28" ><div align="center" class="style5">No</div></td>
        <td ><div align="center" class="style5">Kode</div></td>
        <td ><div align="center" class="style5">Keterangan</div></td>
        <td ><div align="center" class="style5">Pengeluaran</div></td>
      </tr>
      <?
	   
   
	   $no=1;
		
	   $sql=mysql_query("SELECT sum(byr) as pembayaran, sum(sisa) as sisastart, tblpengeluaran.* FROM rekap left join tblpengeluaran on rekap.kepada=tblpengeluaran.idpengeluaran where status='pengeluaran' group by kepada");
	   while($tampil=mysql_fetch_array($sql)){
	   $saldo=$tampil['sisastart']+$tampil['pembayaran'];
//belang
	   	if(($no % 2) == 0){
		$warna="#eeeee";}
	else{
		$warna="#ccccc";}

	   ?>
      <tr >
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $tampil['idpengeluaran']?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><? echo $tampil['ket']?></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['sisastart']+$tampil['pembayaran'],'','','.');?></div></td>
      </tr>
      <? }
 $sql=mysql_query("SELECT sum(byr) as gpembayaran, sum(sisa) as gsisastart FROM rekap where status='pengeluaran'");
	   
	   $tampil=mysql_fetch_array($sql);
	   $tot=$tampil['gsisastart']+$tampil['gpembayaran'];
?>
      <tr>
        <td colspan="3"><div align="center"><strong>Total</strong></div></td>
        <td><div align="right"><strong><? echo number_format($tot,'','','.');?></strong></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
<script language="javascript" type="text/javascript">
    window.print();
    window.close();
</script></p>
