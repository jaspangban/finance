<?
	//input 
  
	if($_POST['tambah']){
		if(empty($_POST['in_idpenjual']) || empty($_POST['in_namapenjual'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Nama Penjual wajib diisi...!</warning></marquee>";	
		}else{
		mysql_query("insert into tblpenjual (idpenjual,namapenjual,perusahaan,alamat,telepon,hp) values ('".$_POST['in_idpenjual']."','".$_POST['in_namapenjual']."','".$_POST['in_perusahaan']."','".$_POST['in_alamat']."','".$_POST['in_telepon']."','".$_POST['in_hp']."')");
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
  <div align="right" class="judul">DATA PENJUAL
</div>
</judul><p>
<table  width="24%" >

  <tr >
    <td width="9%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="34%" class="headertbl"><div align="center" ><strong>ID_Penjual </strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Nama Penjual </strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Perusahaan</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Alamat</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Telepon</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Handphone</strong></div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM tblpenjual WHERE idpenjual='".$_GET['d']."'");}
  	
  	$i=1;
  	$data=mysql_query("select * from tblpenjual order by idpenjual asc");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['idpenjual']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr >
    <td><label>
      <div align="center">
        <input name="ed_idpenjual" type="hidden" id="ed_idpenjual"  value="<? echo $tampil['idpenjual'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#00CCFF">&gt;</font></marquee></div>
    </label></td>
    <td ><label>
      <div align="center"><? echo $tampil['idpenjual'];?>        </div>
    </label></td>
    <td><label>
      <div align="right">
        <input name="ed_namapenjual" type="text" id="ed_namapenjual" title="masukan namapenjual baru" size="15" value="<? echo $tampil['namapenjual'];?>"/>
        </div>
    </label></td>
    <td><input name="ed_perusahaan" type="text" id="ed_perusahaan" title="masukan namapenjual baru" size="15" value="<? echo $tampil['perusahaan'];?>"/></td>
    <td><input name="ed_alamat" type="text" id="ed_alamat" title="masukan namapenjual baru" size="15" value="<? echo $tampil['alamat'];?>"/></td>
    <td><input name="ed_telepon" type="text" id="ed_telepon" title="masukan namapenjual baru" size="15" value="<? echo $tampil['telepon'];?>"/></td>
    <td><input name="ed_hp" type="text" id="ed_hp" title="masukan namapenjual baru" size="15" value="<? echo $tampil['hp'];?>"/></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
		  if(empty($_POST['ed_idpenjual']) || empty($_POST['ed_namapenjual'])){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>Nama Pembeli wajib diisi...!</warning></marquee>";}else{
	mysql_query("UPDATE tblpenjual SET idpenjual='".$_POST['ed_idpenjual']."', namapenjual='".$_POST['ed_namapenjual']."', perusahaan='".$_POST['ed_perusahaan']."', alamat='".$_POST['ed_alamat']."', telepon='".$_POST['ed_telepon']."', hp='".$_POST['ed_hp']."' WHERE idpenjual='".$_POST['ed_idpenjual']."'");
	echo "<meta http-equiv=Refresh content=0;url=?p=penjual>"; 	}
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
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['idpenjual'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namapenjual'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['perusahaan'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['alamat'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['telepon'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['hp'];?></td>
    <td><a href="?p=penjual&amp;e=<? echo $tampil['idpenjual'];?>">edit</a> <? if($tampil['level']==1){echo "";}else{?>| <a href="?p=penjual&amp;d=<? echo $tampil['idpenjual'];?>" onClick="return konfirm()">hapus </a><? }?></td>
  </tr>
  <?
  	}}
	if(empty($_GET['e'])){
	
	// membaca urutan

$nomer="S";

$query = "SELECT max(idpenjual) as maxid FROM tblpenjual";
 
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
  
  <form  name="input" action="?p=penjual" method="post">
  <tr >
    <td colspan="7"><hr /></td>
	<td></td>
  </tr>
  <tr >
    <td><div align="center"><font color="#00CCFF">*</font></div></td>
    
    <td ><label>
      <div align="center">
        <input name="in_idpenjual" type="hidden" id="in_idpenjual" size="8" value="<?php echo $newNo; ?>"/>
        <?php echo $newNo; ?>        </div>
    </label></td>
    <td ><label>
      <input name="in_namapenjual" type="text" id="in_namapenjual" size="15"  />
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
