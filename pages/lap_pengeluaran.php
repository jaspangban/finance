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
  <div align="right" class="judul">PENGELUARAN DAGANG
</div>
</judul>
<p><a href="cetak/lappengeluaran.php"  target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Cetak','','../images/print1.png',1)"><img src="../images/print2.png" alt="Cetak" name="Cetak" width="55" height="43" border="0" id="Cetak" /></a>
<table  >
        <tr>
          <td height="28" class="headertbl"><div align="center"><strong>No</strong></div></td>
          <td class="headertbl"><div align="center"><strong>Kode</strong></div></td>
          <td class="headertbl"><div align="center"><strong>Keterangan</strong></div></td>
          <td class="headertbl"><div align="center"><strong>Pengeluaran</strong></div></td>
        </tr>
       <?
	   
   
	   $no=1;
		
	   $sql=mysql_query("SELECT sum(byr) as pembayaran, sum(sisa) as sisastart, tblpengeluaran.* FROM rekap left join tblpengeluaran on rekap.kepada=tblpengeluaran.idpengeluaran where status='pengeluaran' group by kepada");
	   while($tampil=mysql_fetch_array($sql)){
	   $saldo=$tampil['sisastart']+$tampil['pembayaran'];
//belang
	   	if(($no % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}

	   ?>
	   
	    <tr >
	      <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $no++;?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="center"><? echo $tampil['idpengeluaran']?></div></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><? echo $tampil['ket']?></td>
          <td bgcolor="<? echo $warna;?>" class="corner10"><div align="right"><? echo number_format($tampil['sisastart']+$tampil['pembayaran'],'','','.');?></div></td>
        </tr><? }?>
	    <tr >
	      <td colspan="4" ><hr /></td>
  </tr>
	    <? 
 $sql=mysql_query("SELECT sum(byr) as gpembayaran, sum(sisa) as gsisastart FROM rekap where status='pengeluaran'");
	   
	   $tampil=mysql_fetch_array($sql);
	   $tot=$tampil['gsisastart']+$tampil['gpembayaran'];
?>
		<tr>
	      <td colspan="3"><div align="center"><strong>Total</strong></div></td>
	      <td><div align="right"><strong><? echo number_format($tot,'','','.');?></strong></div></td>
        </tr>
</table>
