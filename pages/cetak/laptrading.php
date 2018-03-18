<?php
session_start();
if(!session_is_registered(id)){
header("location:../../index.php");
}


include ("../koneksi.php");


	$bln=$_GET['bln'];
	$thn=$_GET['thn'];
	$penjual=$_GET['penjual'];
	$pembeli=$_GET['pembeli'];
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
    <td >
	
	
      <judul>
     
      <p><b>Trading
          <? 
		  		$s=mysql_query("select * from tblpenjual where idpenjual='".$_GET['penjual']."'");
		$datas=mysql_fetch_array($s);
		$c=mysql_query("select * from tblpembeli where idpembeli='".$_GET['pembeli']."'");
		$datac=mysql_fetch_array($c);
		
	echo $datas['namapenjual']." - ".$datac['namapembeli']." ";  
	if($_GET['bln']!=NULL and $_GET['thn']!=NULL){
	echo " Bulan "; 
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
	?>
      </b>        </p>
        </p>
        </judul>
        <? }else{echo "";}
		?>
     
    </judul>    </td>
  </tr>
  <tr valign="top">
    <td height="256"><table  width="100%" border="1" cellspacing="0"  bordercolor="#000000">
      <tr  bgcolor="#000000">
        <td  ><div align="center" class="style5" >No</div></td>
        <td  ><div align="center" class="style5" >Tanggal</div></td>
        <td  ><div align="center" class="style5" >Uraian</div></td>
        <td  ><div align="center" class="style5" >No.DO</div></td>
        <td  ><div align="center" class="style5" >Penjual</div></td>
        <td  ><div align="center" class="style5" >Ekor</div></td>
        <td  ><div align="center" class="style5" >Kg</div></td>
        <td  ><div align="center" class="style5" >x</div></td>
        <td  ><div align="center" class="style5" >Harga</div></td>
        <td  ><div align="center" class="style5" >Jumlah</div></td>
        <td  ><div align="center" class="style5" >Lunas</div></td>
        <td  ><div align="center" class="style5" >Pembeli</div></td>
        <td  ><div align="center" class="style5" >Ekor</div></td>
        <td  ><div align="center" class="style5" >Kg</div></td>
        <td  ><div align="center" class="style5" >x</div></td>
        <td  ><div align="center" class="style5" >Harga</div></td>
        <td  ><div align="center" class="style5" >Jumlah</div></td>
        <td  ><div align="center" class="style5" >Sisa</div></td>
        <td  ><div align="center" class="style5" >Lunas</div></td>
        <td  ><div align="center" class="style5" >RugiLaba </div></td>
        <td  ><div align="center" class="style5" >Ket</div></td>
        <td  ><div align="center" class="style5" >JatuhTempo</div></td>
        <td  ><div align="center" class="style5" >ID</div></td>
      </tr>
      <?

  	$i=1;
	if($_GET['bln']==NULL and $_GET['thn']==NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']==NULL){//akumulasi penjual
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_GET['penjual']."' order by tanggal asc");	
	}else
	if($_GET['bln']==NULL and $_GET['thn']==NULL AND $_GET['penjual']==NULL and $_GET['pembeli']!=NULL){//akumulasi pembeli
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where pembeli='".$_GET['pembeli']."' order by tanggal asc");	
	}else
	if($_GET['bln']==NULL and $_GET['thn']==NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']!=NULL){//akumulasi penjual ke pembeli
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_GET['penjual']."' && pembeli='".$_GET['pembeli']."' order by tanggal asc");	
	}else
	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']==NULL and $_GET['pembeli']==NULL){//semua data per bulan
  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."' order by tanggal asc");		
	}else
	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']!=NULL){//jika semua terisi
  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_GET['penjual']."' && pembeli='".$_GET['pembeli']."' && MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."' order by tanggal asc");	
	}	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']==NULL){//penjual perbulan
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_GET['penjual']."' && MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."' order by tanggal asc");	
	}else
	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']==NULL and $_GET['pembeli']!=NULL){//pembeli perbulan
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where pembeli='".$_GET['pembeli']."' && MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."' order by tanggal asc");	
	}
	while($tampil=mysql_fetch_array($data)){
	//tampilan data default
	if(($i % 2) == 0){
		$warna="#eeeee";}
	else{
		$warna="#ccccc";}
	
  ?>
      <tr >
        <td  bgcolor="<? echo $warna;?>"><div align="center"><? echo $i++;?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="center"><? echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namaproduk'];?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['no_do'];?></div></td>
        <td bgcolor="<? echo $warna;?>"><? echo $tampil['namapenjual'];?></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo $tampil['ekor'];?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? printf("%1.2f",$tampil['kg']);?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="center"><? printf("%1.2f <br>",$tampil['x']);?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['harga'],'','','.')?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah'],'','','.')?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="center">
          <? if($tampil['lunas']==0)echo "-"; else echo "Ya";?>
        </div></td>
        <td bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namapembeli'];?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo $tampil['ekor2'];?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? printf("%1.2f",$tampil['kg2']);?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="center"><? printf("%1.2f <br>",$tampil['x2']);?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['harga2'],'','','.')?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah2'],'','','.')?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['sisa'],'','','.')?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="center">
          <? if($tampil['lunas2']==0)echo "-"; else echo "Ya";?>
        </div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['rugilaba'],'','','.')?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="right"><? echo $tampil['catatan'];?></div></td>
        <td bgcolor="<? echo $warna;?>"><div align="center">
          <? 
	$day=date(Y.'-'.m.'-'.d);
	$jt=$tampil['jatuh_tempo'];

	if($tampil['lunas2']==1){?>
          <font color="#999999"><? echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4); ?> </font>
          <? }else if($jt==$day){?>
          <sekarang><? echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4); ?> </sekarang>
          <? }else if($day>$jt){?>
          <lewat><? echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4); ?> </lewat>
          <? }else{echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4);}

?>
        </div></td>
        <td bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['id'];?></div></td>
      </tr>
      <?
  	}
	
  	if($_GET['bln']==NULL and $_GET['thn']==NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']==NULL){//akumulasi penjual
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_GET['penjual']."' ");
	}else
	if($_GET['bln']==NULL and $_GET['thn']==NULL AND $_GET['penjual']==NULL and $_GET['pembeli']!=NULL){//akumulasi pembeli
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where pembeli='".$_GET['pembeli']."'");
	}else
	if($_GET['bln']==NULL and $_GET['thn']==NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']!=NULL){//akumulasi penjual ke pembeli
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_GET['penjual']."' && pembeli='".$_GET['pembeli']."'");
	}else
	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']==NULL and $_GET['pembeli']==NULL){//semua data per bulan
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."'");
	}else
	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']!=NULL){//jika semua terisi
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_GET['penjual']."' && pembeli='".$_GET['pembeli']."' && MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."'");
	}	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']!=NULL and $_GET['pembeli']==NULL){//penjual perbulan
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_GET['penjual']."' && MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."'");
	}else
	if($_GET['bln']!=NULL and $_GET['thn']!=NULL AND $_GET['penjual']==NULL and $_GET['pembeli']!=NULL){//pembeli perbulan
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where pembeli='".$_GET['pembeli']."' && MONTH(tanggal)='".$_GET['bln']."' && YEAR(tanggal) = '".$_GET['thn']."'");
	}
	$tampil=mysql_fetch_array($data1);
	
	
  ?>
  <tr >
    <td colspan="5"  ><div align="center"><strong>TOTAL</strong></div></td>
    <td ><div align="right"><strong><? echo $tampil['ekor'];?></strong></div></td>
    <td ><div align="right"><strong><? printf("%1.2f",$tampil['kg']);?></strong></div></td>
    <td ><div align="center"></div></td>
    <td ><div align="right"></div></td>
    <td ><div align="right"><strong><? echo number_format($tampil['jumlah'],'','','.')?></strong></div></td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td ><div align="right"><strong><? echo $tampil['ekor2'];?></strong></div></td>
    <td ><div align="right"><strong><? printf("%1.2f",$tampil['kg2']);?></strong></div></td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td ><div align="right"><strong><? echo number_format($tampil['jumlah2'],'','','.')?></strong></div></td>
    <td ><div align="right"><strong><? echo number_format($tampil['sisa'],'','','.')?></strong></div></td>
    <td ><div align="center"></div></td>
    <td ><div align="right"><strong><? echo number_format($tampil['rugilaba'],'','','.')?></strong></div></td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>

    </table></td>
  </tr>
  <tr valign="top">
    <td height="256">&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
<script language="javascript" type="text/javascript">
    window.print();
</script>


</p>
