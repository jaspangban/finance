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
    <? 
  
  $s=mysql_query("select * from tblpenjual where idpenjual='".$_SESSION['penjual']."'");
  $array=(mysql_fetch_array($s));
  ?>

  <tr valign="bottom">
    <td ><em>
      <judul><strong>Detail Piutang <? echo " Sdr. "; echo $array['namapenjual'];echo " - "; echo $array['hp']; ?> </strong></judul>
<br />
        <judul>          </judul>
    </em>
      <judul><p><em>
        <?
		
		  $tgl=$_GET['thn'].'-'.$_GET['bln'].'-'.$_GET['tgl'];
		  $tgl2=$_GET['thn2'].'-'.$_GET['bln2'].'-'.$_GET['tgl2'];
	?>
        <strong>Tanggal : <? echo $_GET['tgl'].'-'.$_GET['bln'].'-'.$_GET['thn'];?> s/d <? echo $_GET['tgl2'].'-'.$_GET['bln2'].'-'.$_GET['thn2'];?></strong></em></p>
    </judul>    </td>
  </tr>
  <tr valign="top">
    <td height="256"><table  width="100%" cellspacing="0" border="2"  bordercolor="#000000">
      <tr bgcolor="#000000">
        <td width="6%" ><div align="center" class="style5">No</div></td>
        <td width="12%" ><div align="center" class="style5">Tanggal</div></td>
        <td width="32%" ><div align="center" class="style5">Catatan</div></td>
        <td width="16%" ><div align="center" class="style5">Transaksi </div></td>
        <td width="18%" ><div align="center" class="style5">Pembayaran</div></td>
        <td width="16%" ><div align="center" class="style5">Saldo</div></td>
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
	   $sql=mysql_query("SELECT rekap2.*, tblpenjual.namapenjual, tblpenjual.perusahaan FROM rekap2 LEFT JOIN tblpenjual ON rekap2.kepada=tblpenjual.idpenjual WHERE tanggal>='$tgl' && tanggal<='$tgl2' && kepada='".$_SESSION['penjual']."' ORDER BY time ASC");
	   
	   while($tampil=mysql_fetch_array($sql)){
	   $saldo+=$tampil['trx']-$tampil['byr'];
	   //belang
	   	if(($no % 2) == 0){
		$warna="#eeeee";}
	else{
		$warna="#ccccc";}

	   ?>
      <tr>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center">
            <?  echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?>
        </div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><? if($tampil['catatan']==NULL && $tampil['trx']==0){echo "-";}else{echo $tampil['catatan'];} if($tampil['trx']!=0){echo "Transaksi";}else {echo "";}?></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['trx'],'','','.');?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['byr'],'','','.');?></div></td>
        <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right">
            <? echo number_format($saldo,'','','.');?>
        </div></td>
      </tr>
      <? }?>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
<script language="javascript" type="text/javascript">
    window.print();
    window.close();
</script></p>
