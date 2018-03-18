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
     
      <p><strong><i>Piutang Dagang  
        </i> </strong><strong><i>
        <? if($_GET['bln']!=NULL and $_GET['thn']!=NULL){$bulan = Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');?>
        <?= "Bulan ".$bulan[$_GET['bln']-1]." ".$_GET['thn']; }?>
        </i></strong></p>
    </judul>    </td>
  </tr>
  <tr valign="top">
    <td height="256"><table   width="100%"  cellspacing="0" border="1">
      <tr bgcolor="#000000">
        <td width="5%" height="28" ><div align="center" class="style5">No</div></td>
        <td width="17%" ><div align="center" class="style5">Pembeli</div></td>
        <td width="20%" ><div align="center" class="style5">HP</div></td>
        <td width="16%" ><div align="center" class="style5">Transaksi</div></td>
        <td width="16%" ><div align="center" class="style5">Pembayaran</div></td>
        <td width="16%" ><div align="center" class="style5"><strong>
          <? if($_GET['bln']!=NULL){}else{?>
        </strong>Piutang<strong>
        <? }?>
        </strong></div></td>
        </tr>
      <?
	   
   
	   $no=1;
				if($_GET['bln']!=NULL and $_GET['thn']!=NULL){
					   $sql=mysql_query("SELECT sum(trx) as transaksi, sum(byr) as pembayaran, sum(sisa) as sisastart, tblpembeli.* FROM rekap left join tblpembeli on rekap.kepada=tblpembeli.idpembeli where status='piutang' and MONTH(tanggal)='".$_GET['bln']."' and YEAR(tanggal)='".$_GET['thn']."' group by kepada");

}else{

	   $sql=mysql_query("SELECT sum(trx) as transaksi, sum(byr) as pembayaran, sum(sisa) as sisastart, tblpembeli.* FROM rekap left join tblpembeli on rekap.kepada=tblpembeli.idpembeli where status='piutang' group by kepada");}
	   while($tampil=mysql_fetch_array($sql)){
	   $saldo=($tampil['transaksi']+$tampil['sisastart'])-$tampil['pembayaran'];
//belang
	   	if(($no % 2) == 0){
		$warna="#eeeee";}
	else{
		$warna="#ccccc";}

	   ?>
      <tr >
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="left"><? echo $tampil['namapembeli']?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center">
          <? if($tampil['hp']==NULL){echo "-";}else{echo $tampil['hp'];}?>
        </div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['transaksi'],'','','.');?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['pembayaran'],'','','.');?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right">
          <? if($_GET['bln']!=NULL){}else{if($saldo<0){echo "<sekarang>"; echo number_format($saldo,'','','.'); echo "</sekarang>";} else {echo number_format($saldo,'','','.');}}?>
        </div></td>
        </tr>
      <? }?>

      <? 
	  
	  
	  		if($_GET['bln']!=NULL and $_GET['thn']!=NULL){
 $sql=mysql_query("SELECT sum(trx) as gtransaksi, sum(byr) as gpembayaran, sum(sisa) as gsisastart FROM rekap where status='piutang' and MONTH(tanggal)='".$_GET['bln']."' and YEAR(tanggal)='".$_GET['thn']."' ");
}else{
 $sql=mysql_query("SELECT sum(trx) as gtransaksi, sum(byr) as gpembayaran, sum(sisa) as gsisastart FROM rekap where status='piutang'");}
	   
	   $tampil=mysql_fetch_array($sql);
	   $sld=($tampil['gtransaksi']+$tampil['gsisastart'])-$tampil['gpembayaran'];
?>
      <tr>
        <td colspan="3"><div align="center"><strong>Total</strong></div></td>
        <td><div align="right"><strong><? echo number_format($tampil['gtransaksi'],'','','.');?></strong></div></td>
        <td><div align="right"><strong><? echo number_format($tampil['gpembayaran'],'','','.');?></strong></div></td>
        <td><div align="right"><strong><? if($_GET['bln']!=NULL){}else{echo number_format($sld,'','','.');}?></strong></div></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
<script language="javascript" type="text/javascript">
    window.print();
</script></p>
