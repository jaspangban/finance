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
.style4 {
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
	if($bln==NULL){echo "";}else{
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
default: echo " ";
	break;  
	}}
	echo " "; echo $thn." ".$_GET['tunai'];
	?></i>
        </p>
    </judul>
    </td>
  </tr>
  <tr valign="top">
    <td height="256"><table  width="100%" border="1" bordercolor="#000000" cellspacing="0">
      <tr   bgcolor="#000000">
        <td width="5%" ><div align="center" class="style4" >No</div></td>
        <td width="10%" ><div align="center" class="style4" >Tanggal</div></td>
        <td width="23%" ><div align="center" class="style4" >Keterangan</div></td>
        <td width="10%" ><div align="center" class="style4">Jenis</div></td>
        <td width="12%" ><div align="center" class="style4" >Jumlah</div></td>
        <td width="25%" ><div align="center" class="style4" >Catatan</div></td>
        <td width="10%" ><div align="center" class="style4" >Status</div></td>
        <td width="5%" ><div align="center" class="style4">ID</div></td>
        </tr>
      <?
	
  	
  	$i=1;
	if($obj!=NULL && $thn==NULL && $bln==NULL and $_GET['jenis']==NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && kepada ='$obj' order by tanggal asc");}
else	if($obj!=NULL and $_GET['jenis']==NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && year(tanggal)='$thn' && month(tanggal) ='$bln' && kepada ='$obj' order by tanggal asc");}
else if($st!=NULL and $_GET['jenis']==NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where  year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' order by tanggal asc");}
else	if($obj!=NULL && $thn==NULL && $bln==NULL and $_GET['jenis']!=NULL){//tambahan jenis
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && kepada ='$obj' && jenis='".$_GET['jenis']."' order by tanggal asc");}
else	if($obj!=NULL and $_GET['jenis']!=NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && year(tanggal)='$thn' && month(tanggal) ='$bln' && kepada ='$obj'  && jenis='".$_GET['jenis']."' order by tanggal asc");}
else if($st!=NULL and $_GET['jenis']!=NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where  year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st'  && jenis='".$_GET['jenis']."' order by tanggal asc");}
else if($_GET['jenis']!=NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where year(tanggal)='$thn' && month(tanggal) ='$bln'   && jenis='".$_GET['jenis']."' order by tanggal asc");}
else{
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where year(tanggal)='$thn' && month(tanggal) ='$bln'  order by tanggal asc");}
	while($tampil=mysql_fetch_array($data)){
	
  ?>
      <? 
  	{
	//tampilan data default
	if(($i % 2) == 0){
		$warna="#eeeee";}
	else{
		$warna="#ccccc";}
	
  ?>
      <tr >
        <td class="corner10" bgcolor="<? echo $warna;?>"><div align="center"><? echo $i++;?></div></td>
        <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?></div></td>
        <td class="corner10"bgcolor="<? echo $warna;?>"><? if($tampil['status']=='hProduksi' || $tampil['status']=='pProduksi') {echo "Produksi";}else if($tampil['kepada']=='tetap'){echo "Aset Tetap";}else if($tampil['kepada']=='bunga bank'){echo "Bunga Bank";}else if($tampil['kepada']=='lain-lain'){echo "Lain-lain";}else if($tampil['kepada']=='bank'){echo "Bank";}else if($tampil['kepada']=='kas'){echo "Kas";}else{ echo $tampil['namapenjual']; echo $tampil['namapembeli']; echo $tampil['ket']; echo $tampil['namakaryawan'];}?></td>
        <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['jenis']; ?></div></td>
        <td class="corner10"bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah'],'','','.')?></div></td>
        <td class="corner10"bgcolor="<? echo $warna;?>"><? if($tampil['catatan']==NULL){echo "<div align=center>-</div>";}else{echo $tampil['catatan'];}?></td>
        <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['status'];?></div></td>
        <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['id'];?></div></td>
        </tr>
      <?
  	}}
	?>
      <?
  	if($obj!=NULL && $thn==NULL && $bln==NULL and $_GET['jenis']==NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where status='$st' && kepada ='$obj'");}
else if($obj!=NULL and $_GET['jenis']==NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' && kepada ='$obj'");}
else if($st!=NULL and $_GET['jenis']==NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st'");}
else  	if($obj!=NULL && $thn==NULL && $bln==NULL and $_GET['jenis']!=NULL){//penambahan jenis
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where status='$st' && kepada ='$obj' && jenis='".$_GET['jenis']."'");}
else if($obj!=NULL and $_GET['jenis']!=NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' && kepada ='$obj' && jenis='".$_GET['jenis']."'");}
else if($st!=NULL and $_GET['jenis']!=NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' && jenis='".$_GET['jenis']."'");}
else if($_GET['jenis']!=NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln'  && jenis='".$_GET['jenis']."'");}
else{
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' ");}
	$tampil=mysql_fetch_array($data);

  ?>
      <tr >
        <td colspan="4" ><div align="center"><strong>TOTAL</strong></div>
            <div align="center"></div>
          <div align="center"></div></td>
        <td ><div align="right"><strong><? echo number_format($tampil['total'],'','','.')?></strong></div></td>
        <td >&nbsp;</td>
        <td ><div align="center"></div></td>
        <td ><div align="center"></div></td>
        </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp; </p>
<script language="javascript" type="text/javascript">
    window.print();
</script></p>
