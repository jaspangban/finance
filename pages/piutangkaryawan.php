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
<body onload="MM_preloadImages('../images/print1.png')"><judul>
  <div align="right" class="judul">PIUTANG KARYAWAN
</div>
</judul>
<p><a href="cetak/lappiutangK.php"  target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Cetak','','../images/print1.png',1)"><img src="../images/print2.png" alt="Cetak" name="Cetak" width="55" height="43" border="0" id="Cetak" /></a>
<table  >
        <tr>
          <td width="5%" height="28" class="headertbl"><div align="center"><strong>No</strong></div></td>
          <td width="17%" class="headertbl"><div align="center"><strong>Karyawan</strong></div></td>
          <td width="20%" class="headertbl"><div align="center"><strong>HP</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Hutang</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Bayar</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Piutang</strong></div></td>
        </tr>
       <?
	   
   
	   $no=1;
		
	   $sql=mysql_query("SELECT sum(byr) as bayar, sum(byr2) as hutang, sum(sisa) as sisastart, tblkaryawan.* FROM rekap left join tblkaryawan on rekap.kepada=tblkaryawan.idkaryawan where status='hKaryawan' || status='pKaryawan' group by kepada");
	   while($tampil=mysql_fetch_array($sql)){ 
	   $saldo=($tampil['hutang']+$tampil['sisastart'])-$tampil['bayar'];
//belang
	   	if(($no % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}

	   ?>
	   
	    <tr >
	      <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="left"><? echo $tampil['namakaryawan']?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><? echo $tampil['hp']?></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['hutang']+$tampil['sisastart'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['bayar'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? if($saldo<0){echo "<sekarang>"; echo number_format($saldo,'','','.'); echo "</sekarang>";} else {echo number_format($saldo,'','','.');}?></div></td>
        </tr><? }?>
	    <tr >
	      <td colspan="6" ><hr /></td>
  </tr>
	    <? 
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
</table>
