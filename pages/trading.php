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
<body onLoad="MM_preloadImages('../images/print2.png')"><judul>
  <div align="right" class="judul">TRADING</div>
</judul>
  <form id="lihat" name="lihat" method="post" action="?p=data_trading">
<div align="right"><p>
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
</div></form>
<p>

<table  width="100%">

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
    <td >&nbsp;</td>
  </tr>
  <?
  		// jumlah data yang akan ditampilkan per halaman
 
$dataPerPage = 100;
 
// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.
 
if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;
 
// perhitungan offset
 
$offset = ($noPage - 1) * $dataPerPage;
 
// query SQL untuk menampilkan data perhalaman sesuai offset

  	$i=1;
  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk order by tanggal desc LIMIT $offset, $dataPerPage");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['idtrx']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr   bgcolor="#99CCFF">
    <td><label>
      <div align="center">
        <input name="ed_idtrx" type="hidden" id="ed_idtrx"  value="<? echo $tampil['idtrx'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font  color="#FF00FF">&gt;</font></marquee></div>
    </label></td>
    <td ><label>
      <div align="center"><? echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?></div>
    </label></td>
    <td><label>
      <div align="left"><label><select name="ed_keterangan" id="ed_keterangan">
	  	<option value="<? echo $tampil['keterangan'];?>"><? echo $tampil['keterangan'];?></option>
                <? 
$sqlth = "SELECT * FROM tblproduk ORDER BY idproduk ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idproduk]'>$hasilth[idproduk]</option>";
} ?></select></label></div>
    </label></td>
    <td><div align="left"><? echo $tampil['no_do'];?></div></td>
    <td><label><select name="ed_penjual" id="ed_penjual">
	  	<option value="<? echo $tampil['penjual'];?>"><? echo $tampil['penjual'];?></option>
      <? 
$sqlth = "SELECT * FROM tblpenjual ORDER BY idpenjual ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idpenjual]'>$hasilth[idpenjual] | $hasilth[namapenjual]</option>";
} ?></select></label></td>
    <td><input name="ed_ekor" type="text" id="ed_ekor" class="angka"  size="4" value="<? echo $tampil['ekor'];?>"/></td>
    <td><input name="ed_kg" type="text" class="angka" id="ed_kg"  size="4" value="<? echo $tampil['kg'];?>"/></td>
    <td><div align="center"><? printf("%1.2f <br>",$tampil['x']);?></div></td>
    <td><input name="ed_harga"  class="angka" type="text" id="ed_harga"  size="4" value="<? echo $tampil['harga'];?>"/></td>
    <td><div align="right"><? echo number_format($tampil['jumlah'],'','','.')?></div></td>
    <td><label>
      <div align="center">
        <input name="ed_lunas" type="checkbox" id="ed_lunas" value="1" />
        </div>
    </label></td>
    <td><label><select name="ed_pembeli" id="ed_pembeli">
	  	<option value="<? echo $tampil['pembeli'];?>"><? echo $tampil['pembeli'];?></option>
                <? 
$sqlth = "SELECT * FROM tblpembeli ORDER BY idpembeli ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idpembeli]'>$hasilth[idpembeli] | $hasilth[namapembeli]</option>";
} ?></select></label></td>
    <td><input name="ed_ekor2" type="text" id="ed_ekor2" class="angka"  size="4" value="<? echo $tampil['ekor2'];?>"/></td>
    <td><input name="ed_kg2" type="text" class="angka" id="ed_kg2"  size="4" value="<? echo $tampil['kg2'];?>"/></td>
    <td><div align="center"><? printf("%1.2f <br>",$tampil['x2']);?></div></td>
    <td><input name="ed_harga2"  class="angka" type="text" id="ed_harga2"  size="4" value="<? echo $tampil['harga2']?>"/></td>
    <td><div align="right"><? echo number_format($tampil['jumlah2'],'','','.')?></div></td>
    <td bgcolor="#FF00CC"><input name="ed_sisa"  class="angka" type="text" id="ed_sisa"  size="8" value="<? echo $tampil['sisa']?>"/></td>
    <td><div align="center">
      <input name="ed_lunas2" type="checkbox" id="ed_lunas2" value="1" />
    </div></td>
    <td><div align="right"><? echo number_format($tampil['rugilaba'],'','','.')?></div></td>
    <td><input name="ed_catatan"  type="text" id="ed_catatan"  size="8" value="<? echo $tampil['catatan'];?>"/></td>
    <td><div align="center"><? echo substr($tampil['jatuh_tempo'],8,2); echo"-"; echo substr($tampil['jatuh_tempo'],5,2); echo"-"; echo substr($tampil['jatuh_tempo'],0,4)?></div></td>
    <td><div align="center"><? echo $tampil['id'];?></div></td>
    <td bgcolor="#FFFFFF"><label>
      <div align="center"><? echo $tampil['idtrx'];?>
          <br />
        <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
        </div>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){

		$banyak=$_POST['ed_ekor'];
		$berat=$_POST['ed_kg'];
		$harga=$_POST['ed_harga'];
		$banyak2=$_POST['ed_ekor2'];
		$berat2=$_POST['ed_kg2'];
		$harga2=$_POST['ed_harga2'];
		
		if($banyak==NULL){$x=0;}else{
		$x=$berat/$banyak;}
		if($banyak2==NULL){$x2=0;}else{
		$x2=$berat2/$banyak2;}
		$jumlah=$harga*$berat;
		$jumlah2=$harga2*$berat2;
		$rugilaba=$jumlah2-$jumlah;
  
	mysql_query("UPDATE transaksi SET penjual='".$_POST['ed_penjual']."', pembeli='".$_POST['ed_pembeli']."', keterangan='".$_POST['ed_keterangan']."', ekor='".$_POST['ed_ekor']."', kg='".$_POST['ed_kg']."', harga='".$_POST['ed_harga']."', lunas='".$_POST['ed_lunas']."', catatan='".$_POST['ed_catatan']."',ekor2='".$_POST['ed_ekor2']."', kg2='".$_POST['ed_kg2']."', harga2='".$_POST['ed_harga2']."', lunas2='".$_POST['ed_lunas2']."', x='$x', x2='$x2', jumlah='$jumlah', jumlah2='$jumlah2', sisa='".$_POST['ed_sisa']."', rugilaba='$rugilaba' WHERE idtrx='".$_POST['ed_idtrx']."'");
	
	
	//edit ke rekap pembeli 
	mysql_query("UPDATE rekap SET  trx='$jumlah2', kepada='".$_POST['ed_pembeli']."', rugilaba='$rugilaba' WHERE id='".$_POST['ed_idtrx']."'");
	mysql_query("UPDATE rekap2 SET  trx='$jumlah', kepada='".$_POST['ed_penjual']."' WHERE id='".$_POST['ed_idtrx']."'");



	echo "<meta http-equiv=Refresh content=0;url=?p=trading&amp;page=$noPage;>"; 	}
	
  	}else{
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
    <td><a href="?p=trading&amp;page=<? echo $noPage;?>&amp;e=<? echo $tampil['idtrx'];?>">edit</a></td>
  </tr>
  <?
  	}}
	
  ?>
  
  <tr >
    <td colspan="23"><hr /></td>
	<td></td>
  </tr>
</table>
	<p align="left">
<? // mencari jumlah semua data dalam tabel 
 
$query   = "SELECT COUNT(*) AS jumData FROM transaksi";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);
 
$jumData = $data['jumData'];
 
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
 
$jumPage = ceil($jumData/$dataPerPage);
 
// menampilkan link previous
 
if ($noPage > 1) echo  "<a href='?p=trading&page=".($noPage-1)."'>&lt;&lt; Sebelumnya</a>";
 
// memunculkan nomor halaman dan linknya
 
for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='?p=trading&page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}
 
// menampilkan link next
 
if ($noPage < $jumPage) echo "<a href='?p=trading&page=".($noPage+1)."'>Berikutnya &gt;&gt;</a>";
?>
