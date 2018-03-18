<?
if($_POST['lihat']){
	$bln=$_POST['bln'];
	$thn=$_POST['thn'];
	$penjual=$_POST['penjual'];
	$pembeli=$_POST['pembeli'];
?>
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<body onLoad="MM_preloadImages('../images/print2.png','../images/print1.png')">
<judul>
  <div align="right" class="judul">TRADING</div>
</judul>
<table width="100%" border="0">
  <tr>
    <td><a href="cetak/laptrading.php?penjual=<? echo $penjual;?>&pembeli=<? echo $pembeli;?>&bln=<? echo $bln;?>&thn=<? echo $thn;?>"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Cetak','','../images/print1.png',1)" target="_blank"><img src="../images/print2.png" alt="Cetak" name="Cetak" width="55" height="43" border="0"></a></td>
    <td><form id="lihat" name="lihat" method="post" action="?p=data_trading">
      <div align="right">
        <p>
          <label><strong>LIHAT DATA PER BULAN</strong><br />
          <br />
		  
  <select name="penjual" id="penjual">
    <option value="">Pilih Penjual</option>
    <? 
$sqlth = "SELECT * FROM tblpenjual ORDER BY idpenjual ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idpenjual]'>$hasilth[namapenjual]</option>";
} ?>
  </select></label>
  -<label>
  <select name="pembeli" id="pembeli">
    <option value="">Pilih Pembeli</option>
    <? 
$sqlth = "SELECT * FROM tblpembeli ORDER BY idpembeli ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idpembeli]'>$hasilth[namapembeli]</option>";
} ?>
  </select></label>
  -<label>
          <select name="bln">
            <option value="">-Bulan-</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          </label>
          -
          <label>
            <select  name="thn">
              <option value="">-Tahun-</option>
              <option>2011</option>
              <option>2012</option>
              <option>2013</option>
              <option>2014</option>
              <option>2015</option>
              <option>2016</option>
            </select>
            </label>
          <label>| </label>
          <input name="lihat" type="submit" id="lihat" value="Lihat"  class="tombol"/>
        </div>
    </form></td>
  </tr>
</table>

  <table  width="100%">

  <tr >
    <td colspan="23"  ><b>Trading 
        <?
		$s=mysql_query("select * from tblpenjual where idpenjual='".$_POST['penjual']."'");
		$datas=mysql_fetch_array($s);
		$c=mysql_query("select * from tblpembeli where idpembeli='".$_POST['pembeli']."'");
		$datac=mysql_fetch_array($c);
		
	echo $datas['namapenjual']." - ".$datac['namapembeli']." ";  
	if($_POST['lihat'] and $_POST['bln']!=NULL and $_POST['thn']!=NULL){
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
	}?>
        </b>
        </p>
        </p>
    </judul><? 
	}else{echo "";}?></td>
  </tr>
  <tr >
    <td  class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Tanggal</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Uraian</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>No.DO</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Penjual</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Ekor</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Kg</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>x</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Harga</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Jumlah</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Lunas</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Pembeli</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Ekor</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Kg</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>x</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Harga</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Jumlah</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Sisa</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Lunas</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>RugiLaba </strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>Ket</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>JatuhTempo</strong></div></td>
    <td  class="headertbl"><div align="center" ><strong>ID</strong></div></td>
  </tr>
  <?

  	$i=1;
	if($_POST['bln']==NULL and $_POST['thn']==NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']==NULL){//akumulasi penjual
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_POST['penjual']."' order by tanggal asc");	
	}else
	if($_POST['bln']==NULL and $_POST['thn']==NULL AND $_POST['penjual']==NULL and $_POST['pembeli']!=NULL){//akumulasi pembeli
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where pembeli='".$_POST['pembeli']."' order by tanggal asc");	
	}else
	if($_POST['bln']==NULL and $_POST['thn']==NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']!=NULL){//akumulasi penjual ke pembeli
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_POST['penjual']."' && pembeli='".$_POST['pembeli']."' order by tanggal asc");	
	}else
	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']==NULL and $_POST['pembeli']==NULL){//semua data per bulan
  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."' order by tanggal asc");		
	}else
	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']!=NULL){//jika semua terisi
  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_POST['penjual']."' && pembeli='".$_POST['pembeli']."' && MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."' order by tanggal asc");	
	}	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']==NULL){//penjual perbulan
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where penjual='".$_POST['penjual']."' && MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."' order by tanggal asc");	
	}else
	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']==NULL and $_POST['pembeli']!=NULL){//pembeli perbulan
	  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where pembeli='".$_POST['pembeli']."' && MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."' order by tanggal asc");	
	}
	
	while($tampil=mysql_fetch_array($data)){
	
  ?>
  <? 
	//tampilan data default
	if(($i % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}
	
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
    <td bgcolor="<? echo $warna;?>"><div align="center"><? if($tampil['lunas']==0)echo "-"; else echo "Ya";?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namapembeli'];?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="right"><? echo $tampil['ekor2'];?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="right"><? printf("%1.2f",$tampil['kg2']);?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="center"><? printf("%1.2f <br>",$tampil['x2']);?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['harga2'],'','','.')?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah2'],'','','.')?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['sisa'],'','','.')?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="center"><? if($tampil['lunas2']==0)echo "-"; else echo "Ya";?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['rugilaba'],'','','.')?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="right"><? echo $tampil['catatan'];?></div></td>
    <td bgcolor="<? echo $warna;?>"><div align="center"><? 
	$day=date(Y.'-'.m.'-'.d);
	$jt=$tampil['jatuh_tempo'];

	if($tampil['lunas2']==1){?><font color="#999999"><? echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4); ?> </font><? }else if($jt==$day){?><sekarang><? echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4); ?> </sekarang><? }else if($day>$jt){?><lewat><? echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4); ?> </lewat><? }else{echo substr($jt,8,2); echo"-"; echo substr($jt,5,2); echo"-"; echo substr($jt,0,4);}

?>

</div></td>
    <td bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['id'];?></div></td>
  </tr>
  <?
  	}
	
  ?>
  
  <tr >
    <td colspan="23"><hr /></td>
  </tr>
  <?
  	if($_POST['bln']==NULL and $_POST['thn']==NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']==NULL){//akumulasi penjual
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_POST['penjual']."' ");
	}else
	if($_POST['bln']==NULL and $_POST['thn']==NULL AND $_POST['penjual']==NULL and $_POST['pembeli']!=NULL){//akumulasi pembeli
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where pembeli='".$_POST['pembeli']."'");
	}else
	if($_POST['bln']==NULL and $_POST['thn']==NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']!=NULL){//akumulasi penjual ke pembeli
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_POST['penjual']."' && pembeli='".$_POST['pembeli']."'");
	}else
	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']==NULL and $_POST['pembeli']==NULL){//semua data per bulan
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."'");
	}else
	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']!=NULL){//jika semua terisi
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_POST['penjual']."' && pembeli='".$_POST['pembeli']."' && MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."'");
	}	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']!=NULL and $_POST['pembeli']==NULL){//penjual perbulan
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where penjual='".$_POST['penjual']."' && MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."'");
	}else
	if($_POST['bln']!=NULL and $_POST['thn']!=NULL AND $_POST['penjual']==NULL and $_POST['pembeli']!=NULL){//pembeli perbulan
    	$data1=mysql_query("select sum(ekor) as ekor, sum(kg) as kg, sum(jumlah) as jumlah, sum(ekor2) as ekor2, sum(kg2) as kg2, sum(jumlah2) as jumlah2, sum(sisa) as sisa, sum(rugilaba) as rugilaba  from transaksi where pembeli='".$_POST['pembeli']."' && MONTH(tanggal)='".$_POST['bln']."' && YEAR(tanggal) = '".$_POST['thn']."'");
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
</table>
<p align="left">
