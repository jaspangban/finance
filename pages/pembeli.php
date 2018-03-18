<?
	//input 
  
	if($_POST['tambah']){
		if(empty($_POST['in_idpembeli']) || empty($_POST['in_namapembeli'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Nama Pembeli wajib diisi...!</warning></marquee>";	
		}else{
		mysql_query("insert into tblpembeli (idpembeli,namapembeli,perusahaan,alamat,telepon,hp) values ('".$_POST['in_idpembeli']."','".$_POST['in_namapembeli']."','".$_POST['in_perusahaan']."','".$_POST['in_alamat']."','".$_POST['in_telepon']."','".$_POST['in_hp']."')");
		}}
?>

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

<judul>
  <div align="right" class="judul">DATA PEMBELI
</div>
</judul><p>
<table  width="24%" >

  <tr >
    <td width="9%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="34%" class="headertbl"><div align="center" ><strong>ID_Pembeli </strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Nama Pembeli </strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Perusahaan</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Alamat</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Telepon</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Handphone</strong></div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM tblpembeli WHERE idpembeli='".$_GET['d']."'");}
  	
  	$i=1;
  	$data=mysql_query("select * from tblpembeli order by idpembeli asc");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['idpembeli']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr >
    <td><label>
      <div align="center">
        <input name="ed_idpembeli" type="hidden" id="ed_idpembeli"  value="<? echo $tampil['idpembeli'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#00CCFF">&gt;</font></marquee></div>
    </label></td>
    <td ><label>
      <div align="center"><? echo $tampil['idpembeli'];?>        </div>
    </label></td>
    <td><label>
      <div align="right">
        <input name="ed_namapembeli" type="text" id="ed_namapembeli" title="masukan namapembeli baru" size="15" value="<? echo $tampil['namapembeli'];?>"/>
        </div>
    </label></td>
    <td><input name="ed_perusahaan" type="text" id="ed_perusahaan" title="masukan namapembeli baru" size="15" value="<? echo $tampil['perusahaan'];?>"/></td>
    <td><input name="ed_alamat" type="text" id="ed_alamat" title="masukan namapembeli baru" size="15" value="<? echo $tampil['alamat'];?>"/></td>
    <td><input name="ed_telepon" type="text" id="ed_telepon" title="masukan namapembeli baru" size="15" value="<? echo $tampil['telepon'];?>"/></td>
    <td><input name="ed_hp" type="text" id="ed_hp" title="masukan namapembeli baru" size="15" value="<? echo $tampil['hp'];?>"/></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
		  if(empty($_POST['ed_idpembeli']) || empty($_POST['ed_namapembeli'])){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>Nama Pembeli wajib diisi...!</warning></marquee>";}else{
	mysql_query("UPDATE tblpembeli SET idpembeli='".$_POST['ed_idpembeli']."', namapembeli='".$_POST['ed_namapembeli']."', perusahaan='".$_POST['ed_perusahaan']."', alamat='".$_POST['ed_alamat']."', telepon='".$_POST['ed_telepon']."', hp='".$_POST['ed_hp']."' WHERE idpembeli='".$_POST['ed_idpembeli']."'");
	echo "<meta http-equiv=Refresh content=0;url=?p=pembeli>"; 	}
	}
  	}else{
	//tampilan data default
	if(($i % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}
	
  ?>
  <tr >
    <td class="corner10" bgcolor="<? echo $warna;?>"><div align="center"><? echo $i++;?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['idpembeli'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namapembeli'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['perusahaan'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['alamat'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['telepon'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['hp'];?></td>
    <td><a href="?p=pembeli&amp;e=<? echo $tampil['idpembeli'];?>">edit</a> <? if($tampil['level']==1){echo "";}else{?>| <a href="?p=pembeli&amp;d=<? echo $tampil['idpembeli'];?>" onClick="return konfirm()">hapus </a><? }?></td>
  </tr>
  <?
  	}}
	if(empty($_GET['e'])){
	
	// membaca urutan

$nomer="C";

$query = "SELECT max(idpembeli) as maxid FROM tblpembeli";
 
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$nomerMax = $data['maxid'];
 
// mengambil angka atau bilangan dalam kode anggota terbesar, 
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 5 karakter 
// setelah substring bilangan diambil lantas dicasting menjadi integer
 
$noUrut = (int) substr($nomerMax,1,4);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya 
 
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%05s", $noUrut); digunakan untuk memformat string sebanyak 5 karakter
// misal sprintf("%05s", 12); maka akan dihasilkan '00012' 
// atau misal sprintf("%05s", 1); maka akan dihasilkan string '00001'
 
$newNo = $nomer . sprintf("%04s", $noUrut);
 
// kode anggota yang baru di atas nanti akan ditampilkan dalam komponen text box

  ?>
  
  <form  name="input" action="?p=pembeli" method="post">
  <tr >
    <td colspan="7"><hr /></td>
	<td></td>
  </tr>
  <tr >
    <td><div align="center"><font color="#00CCFF">*</font></div></td>
    
    <td ><label>
      <div align="center">
        <input name="in_idpembeli" type="hidden" id="in_idpembeli" size="8" value="<?php echo $newNo; ?>"/>
        <?php echo $newNo; ?>        </div>
    </label></td>
    <td ><label>
      <input name="in_namapembeli" type="text" id="in_namapembeli" size="15"  />
    </label></td>
    <td ><input name="in_perusahaan" type="text" id="in_perusahaan" size="15"  /></td>
    <td ><input name="in_alamat" type="text" id="in_alamat" size="15"  /></td>
    <td ><input name="in_telepon" type="text" id="in_telepon" size="15"  /></td>
    <td ><input name="in_hp" type="text" id="in_hp" size="15"  /></td>
    <td><label>
      <input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol">
    </label></td>
  </tr>
  </form>
  <? }?>
</table>
<p>&nbsp; </p>
