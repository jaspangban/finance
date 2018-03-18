<judul>
  <div align="right" class="judul">DATA AWAL</div>
</judul><p>
<?
	//input 
  
	if($_POST['tambah'])
		if(empty($_POST['in_jumlah']) || empty($_POST['pilih']) || empty($_POST['in_objek'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Data yang diinput belum komplit...!</warning></marquee>";	
		}else if($_POST['pilih']=='kas'){
		$wkt=mktime(0,0,0,12,31,2010);
		$now=date('Y-m-d',$wkt);
		//pasing nilai dari in_jenis
		$obj=$_POST['in_objek'];
		$pecah=explode('*',$obj);
		$objek=$pecah[0];
		$pos=$pecah[1];

		mysql_query("insert into start (id,ket,objek,pos,jumlah,tanggal) values ('".$_POST['idstart']."','".$_POST['pilih']."','$objek','$pos','".$_POST['in_jumlah']."','$now')");
		mysql_query("insert into pembayaran (idbyr,kepada,pos,masuk,tanggal) values ('".$_POST['idstart']."','$objek','$pos','".$_POST['in_jumlah']."','$now')");
		
		}else{
		mysql_query("insert into start (id,ket,objek,jumlah,tanggal) values ('".$_POST['idstart']."','".$_POST['pilih']."','".$_POST['in_objek']."','".$_POST['in_jumlah']."','$now')");
		if($_POST['pilih']=='hutang'){
		mysql_query("insert into rekap2 (id,status,kepada,sisa) values ('".$_POST['idstart']."','".$_POST['pilih']."','".$_POST['in_objek']."','".$_POST['in_jumlah']."')");}else{
		mysql_query("insert into rekap (id,status,kepada,sisa) values ('".$_POST['idstart']."','".$_POST['pilih']."','".$_POST['in_objek']."','".$_POST['in_jumlah']."')");
		}
		}
?>
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
   echo "if (document.input.pilih.value == 'hKaryawan')";
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
   echo "if (document.input.pilih.value == 'hProduksi')";
   echo "{";

   // tampilkan data supplier
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='Produksi'>Produksi</option>"; 
   $content .= "\"";
   echo $content;
   
   echo "}else ";
   echo "if (document.input.pilih.value == 'kas')";
   echo "{";

   // tampilkan data bank
   $query2 = "SELECT * FROM bank order by kd_bank";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Pos--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['isi']."*".$data2['kd_bank']."'>".$data2['isi']." | ".$data2['namabank']."</option>";   
   }
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
<link rel="stylesheet" href="../image/style.css" /><p>
<table width="90%" border="0">
  <tr valign="top">
    <td width="63%"><table  width="95%" >

  <tr  >		
    <td width="4%" class="headertbl"><div align="center"><strong>No</strong></div></td>
    <td width="11%" class="headertbl"><div align="center"><strong>ID</strong></div></td>
    <td width="16%" class="headertbl"><div align="center"><strong>Keterangan</strong></div></td>
    <td width="14%" class="headertbl"><div align="center"><strong>Objek</strong></div></td>
    <td width="13%" class="headertbl"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="12%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM start WHERE id='".$_GET['d']."'");
	mysql_query("DELETE FROM rekap WHERE id='".$_GET['d']."'");
	mysql_query("DELETE FROM rekap2 WHERE id='".$_GET['d']."'");
	mysql_query("DELETE FROM pembayaran WHERE idbyr='".$_GET['d']."'");
	}
	
  	
  	$i=1;
  	$data=mysql_query("select start.*,tblpembeli.*,tblpenjual.*,tblkaryawan.* from start left join tblpembeli on start.objek=tblpembeli.idpembeli left join tblpenjual on start.objek=tblpenjual.idpenjual left join tblkaryawan on start.objek=tblkaryawan.idkaryawan order by id asc");
	while($tampil=mysql_fetch_array($data)){
{
	//tampilan data default
	if(($i % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}
	
  ?>
  <tr >
    <td class="corner10" bgcolor="<? echo $warna;?>"><div align="center"><? echo $i++;?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['id'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['ket'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namapembeli'];  echo $tampil['namapenjual']; echo $tampil['namakaryawan']; if($tampil['ket']=='pProduksi' || $tampil['ket']=='hProduksi'){echo $tampil['objek'];} else if($tampil['ket']=='kas'){echo $tampil['objek'];}?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah'],'','','.');?></div></td>
    <td><a href="?p=mulai&amp;d=<? echo $tampil['id'];?>" onClick="return konfirm()">hapus</a></td>
  </tr>
  <?
  	}}
?>
  <tr >
    <td colspan="5"><hr /></td>
	<td></td>
  </tr>
  
</table></td>
    <td width="10%">&nbsp;</td>
    <td width="27%">
  <? 
// membaca urutan

$nomer="At";

$query = "SELECT max(id) as maxtgl FROM start";
 
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$nomerMax = $data['maxtgl'];
 
// mengambil angka atau bilangan dalam kode anggota terbesar, 
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 5 karakter 
// setelah substring bilangan diambil lantas dicasting menjadi integer
 
$noUrut = (int) substr($nomerMax,2,4);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya 
 
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%05s", $noUrut); digunakan untuk memformat string sebanyak 5 karakter
// misal sprintf("%05s", 12); maka akan dihasilkan '00012' 
// atau misal sprintf("%05s", 1); maka akan dihasilkan string '00001'
 
$newNo = $nomer . sprintf("%04s", $noUrut);
 
// kode anggota yang baru di atas nanti akan ditampilkan dalam komponen text box 

  ?>
  
  <form  name="input" action="?p=mulai" method="post">
	<table width="128%" border="0">
      <tr>
        <td width="35%">Kategori
          <input name="idstart" type="hidden"  id="idstart" size="8" value="<?php echo $newNo; ?>"/></td>
        <td width="6%">:</td>
        <td width="59%"><label>
		
        <select name="pilih" id="pilih" onChange="showObjek()">
          <option value="">--Pilih Kategori--</option>
          <option value="hutang">Hutang</option>
          <option value="piutang">Piutang</option>
          <option value="hKaryawan">Hutang Karyawan</option>
          <option value="hProduksi">Hutang Produksi</option>
          <option value="kas">Kas</option>
        </select>
        </label></td>
      </tr>
      <tr>
        <td>Objek</td>
        <td>:</td>
        <td><select name="in_objek" id="in_objek">
                    </select></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><input name="in_jumlah" type="text" id="in_jumlah" size="10"  class="corner10"/></td>
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
