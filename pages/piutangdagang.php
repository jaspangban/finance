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
<body onLoad="MM_preloadImages('../images/print1.png')"><judul>
  <div align="right" class="judul">PIUTANG DAGANG
    <? if($_POST){$bulan = Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');?>
    <br />
    <?= "Bulan ".$bulan[$_POST['bln']-1]." ".$_POST['thn']; }?>
  </span></div>
</judul>
<form id="lihat" name="lihat" method="post" action="?p=piutangdagang">
  <label></label>
  <label>
  <div align="right"><strong>LIHAT DATA PER BULAN</strong>:
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
    -
    <select  name="thn">
      <option value="">-Tahun-</option>
      <option>2011</option>
      <option>2012</option>
      <option>2013</option>
      <option>2014</option>
      <option>2015</option>
      <option>2016</option>
    </select>
    |
    <input name="lihat" type="submit" id="lihat" value="Lihat"  class="tombol"/>
  </div>
  </label>
</form>
<p><a href="cetak/lapdetailpiutang.php?bln=<? echo $_POST['bln'];?>&thn=<? echo $_POST['thn'];?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Cetak','','../images/print1.png',1)" target="_blank"><img src="../images/print2.png" alt="Cetak" name="Cetak" width="55" height="43" border="0" id="Cetak" /></a>

<table  >
        <tr>
          <td width="5%" height="28" class="headertbl"><div align="center"><strong>No</strong></div></td>
          <td width="17%" class="headertbl"><div align="center"><strong>Pembeli</strong></div></td>
          <td width="20%" class="headertbl"><div align="center"><strong>HP</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Transaksi</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Pembayaran</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>
            <? if($_POST){}else{?>
          Piutang
          <? }?>
          </strong></div></td>
          <td width="10%">&nbsp;</td>
        </tr>
       <?
	   
   
	   $no=1;
		if($_POST['bln']!=NULL and $_POST['thn']!=NULL){
		$sql=mysql_query("SELECT sum(trx) as transaksi, sum(byr) as pembayaran, sum(sisa) as sisastart, tblpembeli.* FROM rekap left join tblpembeli on rekap.kepada=tblpembeli.idpembeli where status='piutang'  and MONTH(tanggal)='".$_POST['bln']."' and YEAR(tanggal)='".$_POST['thn']."' group by kepada order by namapembeli");}else{
	   $sql=mysql_query("SELECT sum(trx) as transaksi, sum(byr) as pembayaran, sum(sisa) as sisastart, tblpembeli.* FROM rekap left join tblpembeli on rekap.kepada=tblpembeli.idpembeli where status='piutang' group by kepada order by namapembeli");}
	   while($tampil=mysql_fetch_array($sql)){
	   $saldo=($tampil['transaksi']+$tampil['sisastart'])-$tampil['pembayaran'];
//belang
	   	if(($no % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}

	   ?>
	   
	    <tr >
	      <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="left"><? echo $tampil['namapembeli']?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><? echo $tampil['hp']?></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['transaksi'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['pembayaran'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? if($_POST){}else{if($saldo<0){echo "<sekarang>"; echo number_format($saldo,'','','.'); echo "</sekarang>";} else {echo number_format($saldo,'','','.');}}?></div></td>
          <td><div align="center"><a href="?p=session&amp;piutang=<? echo $tampil['idpembeli']?>">detail</a></div></td>
	    </tr><? }?>
	    <tr >
	      <td colspan="6" ><hr /></td>
	      <td>&nbsp;</td>
  </tr>
	    <? 
					if($_POST['bln']!=NULL and $_POST['thn']!=NULL){
 $sql=mysql_query("SELECT sum(trx) as gtransaksi, sum(byr) as gpembayaran, sum(sisa) as gsisastart FROM rekap where status='piutang' and MONTH(tanggal)='".$_POST['bln']."' and YEAR(tanggal)='".$_POST['thn']."'");
}else{

 $sql=mysql_query("SELECT sum(trx) as gtransaksi, sum(byr) as gpembayaran, sum(sisa) as gsisastart FROM rekap where status='piutang'");}
	   
	   $tampil=mysql_fetch_array($sql);
	   $sld=($tampil['gtransaksi']+$tampil['gsisastart'])-$tampil['gpembayaran'];
?>
		<tr>
	      <td colspan="3"><div align="center"><strong>Total</strong></div></td>
	      <td><div align="right"><strong><? echo number_format($tampil['gtransaksi'],'','','.');?></strong></div></td>
	      <td><div align="right"><strong><? echo number_format($tampil['gpembayaran'],'','','.');?></strong></div></td>
	      <td><div align="right"><strong><? if($_POST){}else{echo number_format($sld,'','','.');}?></strong></div></td>
	      <td>&nbsp;</td>
		</tr>
</table>

