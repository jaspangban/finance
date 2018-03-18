<?
	//input 
  
	if($_POST['tambah']){
		if(empty($_POST['in_namakaryawan'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Nama karyawan wajib diisi...!</warning></marquee>";	
		}else{
		mysql_query("insert into tblkaryawan (idkaryawan,namakaryawan,kelahiran,alamat,jeniskelamin,hp) values ('".$_POST['in_idkaryawan']."','".$_POST['in_namakaryawan']."','".$_POST['in_kelahiran']."','".$_POST['in_alamat']."','".$_POST['in_jeniskelamin']."','".$_POST['in_hp']."')");
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
  <div align="right" class="judul">DATA KARYAWAN
</div>
</judul><p>
<table  width="24%" >

  <tr >
    <td width="9%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="34%" class="headertbl"><div align="center" ><strong>ID_Karyawan </strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Nama Karyawan </strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Kelahiran</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Alamat</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Kelamin</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Handphone</strong></div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM tblkaryawan WHERE idkaryawan='".$_GET['d']."'");}
  	
  	$i=1;
  	$data=mysql_query("select * from tblkaryawan order by idkaryawan asc");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['idkaryawan']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr >
    <td><label>
      <div align="center">
        <input name="ed_idkaryawan" type="hidden" id="ed_idkaryawan"  value="<? echo $tampil['idkaryawan'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#00CCFF">&gt;</font></marquee></div>
    </label></td>
    <td ><label>
      <div align="center"><? echo $tampil['idkaryawan'];?>        </div>
    </label></td>
    <td><label>
      <div align="right">
        <input name="ed_namakaryawan" type="text" id="ed_namakaryawan" title="masukan namakaryawan baru" size="15" value="<? echo $tampil['namakaryawan'];?>"/>
        </div>
    </label></td>
    <td><input name="ed_kelahiran" type="text" id="ed_kelahiran" title="masukan namakaryawan baru" size="15" value="<? echo $tampil['kelahiran'];?>"/></td>
    <td><input name="ed_alamat" type="text" id="ed_alamat" title="masukan namakaryawan baru" size="15" value="<? echo $tampil['alamat'];?>"/></td>
    <td><select name="ed_jeniskelamin" id="ed_jeniskelamin">
      <option  selected="selected"<? echo $tampil['jeniskelamin'];?>><? echo $tampil['jeniskelamin'];?></option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select></td>
    <td><input name="ed_hp" type="text" id="ed_hp" title="masukan namakaryawan baru" size="15" value="<? echo $tampil['hp'];?>"/></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
		  if(empty($_POST['ed_idkaryawan']) || empty($_POST['ed_namakaryawan'])){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>Nama karyawan wajib diisi...!</warning></marquee>";}else{
	mysql_query("UPDATE tblkaryawan SET idkaryawan='".$_POST['ed_idkaryawan']."', namakaryawan='".$_POST['ed_namakaryawan']."', kelahiran='".$_POST['ed_kelahiran']."', alamat='".$_POST['ed_alamat']."', jeniskelamin='".$_POST['ed_jeniskelamin']."', hp='".$_POST['ed_hp']."' WHERE idkaryawan='".$_POST['ed_idkaryawan']."'");
	echo "<meta http-equiv=Refresh content=0;url=?p=karyawan>"; 	}
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
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['idkaryawan'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namakaryawan'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['kelahiran'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['alamat'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['jeniskelamin'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['hp'];?></div></td>
    <td><a href="?p=karyawan&amp;e=<? echo $tampil['idkaryawan'];?>">edit</a> <? if($tampil['level']==1){echo "";}else{?>| <a href="?p=karyawan&amp;d=<? echo $tampil['idkaryawan'];?>" onClick="return konfirm()">hapus </a><? }?></td>
  </tr>
  <?
  	}}
	if(empty($_GET['e'])){
	
	// membaca urutan

$nomer="DF";

$query = "SELECT max(idkaryawan) as maxid FROM tblkaryawan";
 
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$nomerMax = $data['maxid'];
 
// mengambil angka atau bilangan dalam kode anggota terbesar, 
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 5 karakter 
// setelah substring bilangan diambil lantas dicasting menjadi integer
 
$noUrut = (int) substr($nomerMax,2,3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya 
 
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%05s", $noUrut); digunakan untuk memformat string sebanyak 5 karakter
// misal sprintf("%05s", 12); maka akan dihasilkan '00012' 
// atau misal sprintf("%05s", 1); maka akan dihasilkan string '00001'
 
$newNo = $nomer . sprintf("%03s", $noUrut);
 
// kode anggota yang baru di atas nanti akan ditampilkan dalam komponen text box

  ?>
  
  <form  name="input" action="?p=karyawan" method="post">
  <tr >
    <td colspan="7"><hr /></td>
	<td></td>
  </tr>
  <tr  valign="top">
    <td><div align="center"><font color="#00CCFF">*</font></div></td>
    
    <td ><label>
      <div align="center">
        <input name="in_idkaryawan" type="hidden" id="in_idkaryawan" size="8" value="<?php echo $newNo; ?>"/>
        <?php echo $newNo; ?>        </div>
    </label></td>
    <td ><label>
      <input name="in_namakaryawan" type="text" id="in_namakaryawan" size="15"  />
    </label></td>
    <td >
      <div align="center">
        
          <input name="in_kelahiran" type="text" id="in_kelahiran" size="15"  />
          <br />
          Thn-Bln-Tgl<br />
          contoh: 1981-09-17<br />
          </p>
          </p>
      </div></td>
    <td ><input name="in_alamat" type="text" id="in_alamat" size="15"  /></td>
    <td ><label>
      <select name="in_jeniskelamin" id="in_jeniskelamin">
        <option value="">--Pilih Kelamin--</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </label></td>
    <td ><input name="in_hp" type="text" id="in_hp" size="15"  /></td>
    <td><label>
      <input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol">
    </label></td>
  </tr>
  </form>
  <? }?>
</table>
<p>&nbsp; </p>
