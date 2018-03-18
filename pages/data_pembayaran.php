<script language="JavaScript" type="text/JavaScript">
 
 function showObjek()
 {
 <?php
 
 
    // jika dipilih hutang
   echo "if (document.input.pilih.value == 'hutang')";
   echo "{";
 
   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpenjual order by namapenjual";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Penjual--</option>";  
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpenjual']."'>".$data2['idpenjual']." | ".$data2['namapenjual']."</option>";   
   }
   $content .= "\"";
   echo $content;
   echo "}else ";
   echo "if (document.input.pilih.value == 'piutang')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpembeli order by namapembeli";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Pembeli--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpembeli']."'>".$data2['idpembeli']." | ".$data2['namapembeli']."</option>";   
   }
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'pengeluaran')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpengeluaran order by ket";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Kode--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpengeluaran']."'>".$data2['idpengeluaran']." | ".$data2['ket']."</option>";   
   }
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'pKaryawan' || document.input.pilih.value == 'hKaryawan')";
   echo "{";

   // tampilkan data karyawan
   $query2 = "SELECT * FROM tblkaryawan order by namakaryawan";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Karyawan--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idkaryawan']."'>".$data2['idkaryawan']." | ".$data2['namakaryawan']."</option>";   
   }
   $content .= "\"";
   echo $content;


   echo "}else ";
   echo "if (document.input.pilih.value == 'pProduksi' || document.input.pilih.value == 'hProduksi')";
   echo "{";

   // tampilkan data supplier
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='Produksi'>Produksi</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'penarikan')";
   echo "{";

   // tampilkan data switch
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='bank'>Bank</option>"; 
   $content .= "<option value='kas'>Kas</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'aset' || document.input.pilih.value == 'jaset')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='tetap'>Aset Tetap</option>"; 
   $content .= "\"";
   echo $content;
   
      echo "}else ";
   echo "if (document.input.pilih.value == 'pendapatan')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='bunga bank'>Bunga Bank</option>"; 
   $content .= "<option value='lain-lain'>Lain-lain</option>"; 
   $content .= "\"";
   echo $content;


   echo "}\n";  
 
 ?> 
 }
</script>

<script language="JavaScript" type="text/JavaScript">
 
 function showObjek2()
 {
 <?php
 
 
    // jika dipilih hutang
   echo "if (document.lihat.pilih1.value == 'hutang')";
   echo "{";
 
   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpenjual order by namapenjual";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Penjual--</option>";  
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpenjual']."'>".$data2['idpenjual']." | ".$data2['namapenjual']."</option>";   
   }
   $content .= "\"";
   echo $content;
   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'piutang')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpembeli order by namapembeli";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Pembeli--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpembeli']."'>".$data2['idpembeli']." | ".$data2['namapembeli']."</option>";   
   }
   $content .= "\"";
   echo $content;
   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pengeluaran')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpengeluaran order by ket";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Kode--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpengeluaran']."'>".$data2['idpengeluaran']." | ".$data2['ket']."</option>";   
   }
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pKaryawan' || document.lihat.pilih1.value == 'hKaryawan')";
   echo "{";

   // tampilkan data karyawan
   $query2 = "SELECT * FROM tblkaryawan order by namakaryawan";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Karyawan--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idkaryawan']."'>".$data2['idkaryawan']." | ".$data2['namakaryawan']."</option>";   
   }
   $content .= "\"";
   echo $content;


   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pProduksi' || document.lihat.pilih1.value == 'hProduksi')";
   echo "{";

   // tampilkan data supplier
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='Produksi'>Produksi</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'penarikan')";
   echo "{";

   // tampilkan data switch
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='bank'>Bank</option>"; 
   $content .= "<option value='kas'>Kas</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'aset' || document.input.pilih.value == 'jaset')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='tetap'>Aset Tetap</option>"; 
   $content .= "\"";
   echo $content;
   
   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pendapatan')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='bunga bank'>Bunga Bank</option>"; 
   $content .= "<option value='lain-lain'>Lain-lain</option>"; 
   $content .= "\"";
   echo $content;

   echo "}\n";  
 
 ?> 
 }
</script>

<script>
function konfirm(){
var pesan;
pesan="Anda yakin akan menghapus data ini?";
var setuju=confirm(pesan);
if(setuju)
return true;
else
return false;
}
</script>
<link rel="stylesheet" href="../image/style.css" /><judul>
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
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
<body onLoad="MM_preloadImages('../images/print1.png')"><div align="right" class="judul">PEMBAYARAN
</div>
</judul
><table width="100%" border="0">
  <tr valign="top">
  <form id="lihat" name="lihat" method="post" action="?p=data_pembayaran">
    <td colspan="3">
    <p><div align="right">
          <strong>LIHAT DATA PER BULAN</strong><br />
          <br /><label>
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
          </select></label>
          - <label>
          <select  name="thn">
            <option value="">-Tahun-</option>
            <option>2011</option>
            <option>2012</option>
            <option>2013</option>
            <option>2014</option>
            <option>2015</option>
            <option>2016</option>
        </select></label> 
          - 

          <label>
          <select name="pilih1" id="pilih1" onChange="showObjek2()">
            <option value="">--Pilih Status--</option>
          <option value="hutang">Hutang</option>
          <option value="piutang">Piutang</option>
          <option value="pengeluaran">Pengeluaran</option>
          <option value="pKaryawan">Piutang Karyawan</option>
          <option value="hKaryawan">Hutang Karyawan</option>
          <option value="pProduksi">Piutang Produksi</option>
          <option value="hProduksi">Hutang Produksi</option>
          <option value="penarikan">Penarikan</option>
          <option value="aset">Aset</option>
          <option value="jaset">Jual Aset</option>
          <option value="pendapatan">Pendapatan</option>

          </select>
          </label>
          - 
          <label>
          <select name="in_objek1" id="in_objek1">
          </select></label>
          -
  <label>        <select name="jenis" id="jenis">
            <option value="">Jenis</option>
            <option value="tunai">Tunai</option>
            <option value="transfer">Transfer</option>
          </select>
| </label>
          <input name="lihat" type="submit" id="lihat" value="Lihat"  class="tombol"/>
          </label>
      </div></td>
    
    </form>
  </tr>
  <tr valign="top">
    <td><judul>
      <p><a href="cetak/lappembayaran.php?bln=<? echo $_POST['bln'];?>&thn=<? echo $_POST['thn'];?>&pilih=<? echo $_POST['pilih1'];?>&objek=<? echo $_POST['in_objek1'];?>&jenis=<? echo $_POST['jenis'];?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Cetak','','../images/print1.png',1)" target="_blank"><img src="../images/print2.png" alt="Cetak" name="Cetak" width="55" height="43" border="0" id="Cetak" /></a></p>
      <p>Pembayaran 
        <? if($_POST['lihat']){
	$bln=$_POST['bln'];
	$thn=$_POST['thn'];
	$st=$_POST['pilih1'];
	$obj=$_POST['in_objek1'];
	echo "<b>".$st." ";
	echo $_POST['in_objek1']; echo"</b>";
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
	echo " "; echo $thn." ".$_POST['jenis'];
	}?>
        </p>
    </judul></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr valign="top">
    <td><table  width="100%" >

  <tr  >		
    <td width="4%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="9%" class="headertbl"><div align="center" ><strong>Tanggal</strong></div></td>
    <td width="12%" class="headertbl"><div align="center" ><strong>Keterangan</strong></div></td>
    <td width="11%" class="headertbl"><div align="center"><strong>Jenis</strong></div></td>
    <td width="11%" class="headertbl"><div align="center" ><strong>Jumlah</strong></div></td>
    <td width="29%" class="headertbl"><div align="center" ><strong>Catatan</strong></div></td>
    <td width="9%" class="headertbl"><div align="center" ><strong>Status</strong></div></td>
    <td width="4%" class="headertbl"><div align="center"><strong>ID</strong></div></td>
    <td width="11%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM pembayaran WHERE idbyr='".$_GET['d']."'");
  	mysql_query("DELETE FROM rekap WHERE id='".$_GET['d']."'");}
	
  	
  	$i=1;
	if($obj!=NULL && $thn==NULL && $bln==NULL and $_POST['jenis']==NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && kepada ='$obj' order by tanggal asc");}
else	if($obj!=NULL and $_POST['jenis']==NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && year(tanggal)='$thn' && month(tanggal) ='$bln' && kepada ='$obj' order by tanggal asc");}
else if($st!=NULL and $_POST['jenis']==NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where  year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' order by tanggal asc");}
else	if($obj!=NULL && $thn==NULL && $bln==NULL and $_POST['jenis']!=NULL){//tambahan jenis
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && kepada ='$obj' && jenis='".$_POST['jenis']."' order by tanggal asc");}
else	if($obj!=NULL and $_POST['jenis']!=NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where status='$st' && year(tanggal)='$thn' && month(tanggal) ='$bln' && kepada ='$obj'  && jenis='".$_POST['jenis']."' order by tanggal asc");}
else if($st!=NULL and $_POST['jenis']!=NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where  year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st'  && jenis='".$_POST['jenis']."' order by tanggal asc");}
else if($_POST['jenis']!=NULL){
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where year(tanggal)='$thn' && month(tanggal) ='$bln'   && jenis='".$_POST['jenis']."' order by tanggal asc");}
else{
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan where year(tanggal)='$thn' && month(tanggal) ='$bln'  order by tanggal asc");}
	while($tampil=mysql_fetch_array($data)){
	
  ?>
  <? 
  	{
	//tampilan data default
	if(($i % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}
	
  ?>
  <tr >
    <td class="corner10" bgcolor="<? echo $warna;?>"><div align="center"><? echo $i++;?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? if($tampil['status']=='hProduksi' || $tampil['status']=='pProduksi') {echo "Produksi";}else if($tampil['kepada']=='tetap'){echo "Aset Tetap";}else if($tampil['kepada']=='bunga bank'){echo "Bunga Bank";}else if($tampil['kepada']=='lain-lain'){echo "Lain-lain";}else if($tampil['kepada']=='bank'){echo "Bank";}else if($tampil['kepada']=='kas'){echo "Kas";}else{ echo $tampil['namapenjual']; echo $tampil['namapembeli']; echo $tampil['ket']; echo $tampil['namakaryawan'];}?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['jenis']; ?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah'],'','','.')?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['catatan'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['status'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['id'];?></div></td>
    <td><a href="?p=pembayaran&amp;d=<? echo $tampil['idbyr'];?>" onClick="return konfirm()">hapus </a></td>
  </tr>
  <?
  	}}
	?>
  <tr >
    <td colspan="8"><hr /></td>
	<td></td>
  </tr>
  <?
  
  	if($obj!=NULL && $thn==NULL && $bln==NULL and $_POST['jenis']==NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where status='$st' && kepada ='$obj'");}
else if($obj!=NULL and $_POST['jenis']==NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' && kepada ='$obj'");}
else if($st!=NULL and $_POST['jenis']==NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st'");}
else  	if($obj!=NULL && $thn==NULL && $bln==NULL and $_POST['jenis']!=NULL){//penambahan jenis
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where status='$st' && kepada ='$obj' && jenis='".$_POST['jenis']."'");}
else if($obj!=NULL and $_POST['jenis']!=NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' && kepada ='$obj' && jenis='".$_POST['jenis']."'");}
else if($st!=NULL and $_POST['jenis']!=NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' && status='$st' && jenis='".$_POST['jenis']."'");}
else if($_POST['jenis']!=NULL){
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln'  && jenis='".$_POST['jenis']."'");}
else{
  	$data=mysql_query("select sum(jumlah) as total from pembayaran where year(tanggal)='$thn' && month(tanggal) ='$bln' ");}
	$tampil=mysql_fetch_array($data);

  ?>
  <tr >
    <td colspan="4" class="corner10 style1"><div align="center">TOTAL</div>      <div align="center"></div>      <div align="center"></div></td>
    <td ><div align="right"><strong><? echo number_format($tampil['total'],'','','.')?></strong></div></td>
    <td >&nbsp;</td>
    <td ><div align="center"></div></td>
    <td ><div align="center"></div></td>
    <td><a href="?p=pembayaran&amp;d=<? echo $tampil['idbyr'];?>" onClick="return konfirm()"></a></td>
  </tr>
  
</table></td>
    <td>&nbsp;</td>
    <td>
	<?
$newNo = "Byr".date("YmdHis",time(now)).rand(100,999);

  ?>
  
  <form  name="input" action="?p=pembayaran" method="post">
	<table   align="right"class="sudut" bgcolor="#eee" border="0">
      <tr>
        <td width="35%">Tanggal</td>
        <td width="6%">:</td>
        <td width="59%"><label>
          <select name="tg" id="tg" style="font-size:11px">
            <option><? echo date("d");?></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
          </select>
        </label>
/
<label>
<select name="bl" id="bl" style="font-size:11px">
  <option><? echo date("m");?></option>
  <option>01</option>
  <option>02</option>
  <option>03</option>
  <option>04</option>
  <option>05</option>
  <option>06</option>
  <option>07</option>
  <option>08</option>
  <option>09</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
</select>
</label>
/
<label>
<select name="th" id="th" style="font-size:11px">
  <option><? echo date("Y");?></option>
  <option>2011</option>
  <option>2012</option>
  <option>2013</option>
  <option>2014</option>
  <option>2015</option>
  <option>2016</option>
</select>
</label></td>
      </tr>
      <tr>
        <td>ID_Pembayaran</td>
        <td>:</td>
        <td><input name="in_idbyr" type="hidden"  id="in_idbyr" size="8" value="<?php echo $newNo; ?>"/>
          <?php echo $newNo; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>:</td>
        <td><label>
        <select name="pilih" id="pilih" onChange="showObjek()">
          <option value="<? echo isset($_POST['pilih'])? $_POST['pilih'] : ''?>"><? echo isset($_POST['pilih'])? $_POST['pilih'] : '--Pilih Status--'?></option>
          <option value="hutang">Hutang</option>
          <option value="piutang">Piutang</option>
          <option value="pengeluaran">Pengeluaran</option>
          <option value="pKaryawan">Piutang Karyawan</option>
          <option value="hKaryawan">Hutang Karyawan</option>
          <option value="pProduksi">Piutang Produksi</option>
          <option value="hProduksi">Hutang Produksi</option>
          <option value="penarikan">Penarikan</option>
          <option value="aset">Aset</option>
          <option value="jaset">Jual Aset</option>
          <option value="pendapatan">Pendapatan</option>

        </select><div style="color:red"><? echo isset ($kosong['pilih'])?$kosong['pilih']:''?></div>
        </label></td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td><select name="in_objek" id="in_objek">
		  <option value="<? echo isset($_POST['in_objek'])? $_POST['in_objek'] : ''?>"><? echo isset($_POST['in_objek'])? $_POST['in_objek'] : ''?></option>

                    </select><div style="color:red"><? echo isset ($kosong['in_objek'])?$kosong['in_objek']:''?></div></td>
      </tr>
      <tr>
        <td>Jenis</td>
        <td>:</td>
        <td><select name="in_jenis" id="in_jenis">
          <? 
$sqlth = "SELECT * FROM bank ORDER BY kd_bank ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[isi]*$hasilth[kd_bank]'>$hasilth[isi] | $hasilth[namabank]</option>";
} ?>
        </select></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><input name="in_jumlah" type="text" id="in_jumlah" size="10"  value="<? echo isset($_POST['in_jumlah'])? $_POST['in_jumlah'] : '';?>"/><div style="color:red"><? echo isset ($kosong['in_jumlah'])?$kosong['in_jumlah']:''?></div></td>
      </tr>
      <tr>
        <td>Catatan</td>
        <td>:</td>
        <td><input name="in_catatan" type="text" id="in_catatan" size="10"  class="corner10"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol" /></td>
      </tr>
    </table>
  </form></td>
  </tr>
</table>

<p>&nbsp; </p>
