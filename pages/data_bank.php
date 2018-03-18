<?
	//input 
  
	if($_POST['tambah']){
		//mengambil nilai kd_bank untuk validasi
	  	$data2=mysql_query("select * from bank where kd_bank='".$_POST['in_kd_bank']."'");
		$valid=mysql_fetch_array($data2);

		if(empty($_POST['in_kd_bank']) || empty($_POST['in_namabank'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Kode Bank dan Keterangan wajib diisi...!</warning></marquee>";	
		}else if($valid['kd_bank']==$_POST['in_kd_bank']){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>ID sudah digunakan...!</warning></marquee>";
		}else{
		mysql_query("insert into bank (kd_bank,namabank) values ('".$_POST['in_kd_bank']."','".$_POST['in_namabank']."')");
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
  <div align="right" class="judul">DATA BANK </div>
</judul><p>
<table  width="24%" >

  <tr >
    <td width="9%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="34%" class="headertbl"><div align="center" ><strong>Kode Bank </strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Keterangan</strong></div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM bank WHERE kd_bank='".$_GET['d']."'");}
  	
  	$i=1;
  	$data=mysql_query("select * from bank where isi='transfer' order by kd_bank asc");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['kd_bank']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr >
    <td><label>
      <div align="center">
        <input name="ed_kd_bank" type="hidden" id="ed_kd_bank"  value="<? echo $tampil['kd_bank'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#00CCFF">&gt;</font></marquee></div>
    </label></td>
    <td ><label>
      <div align="center"><? echo $tampil['kd_bank'];?>        </div>
    </label></td>
    <td><label>
      <div align="right">
        <input name="ed_namabank" type="text" id="ed_namabank" title="masukan namabank baru" size="20" value="<? echo $tampil['namabank'];?>"/>
        </div>
    </label></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
		  if(empty($_POST['ed_kd_bank']) || empty($_POST['ed_namabank'])){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>ID Produk dan Nama Produk wajib diisi...!</warning></marquee>";}else{
	mysql_query("UPDATE bank SET kd_bank='".$_POST['ed_kd_bank']."', namabank='".$_POST['ed_namabank']."' WHERE kd_bank='".$_POST['ed_kd_bank']."'");
	echo "<meta http-equiv=Refresh content=0;url=?p=data_bank>"; 	}
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
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['kd_bank'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namabank'];?></div></td>
    <td><a href="?p=data_bank&amp;e=<? echo $tampil['kd_bank'];?>">edit</a> | <a href="?p=data_bank&amp;d=<? echo $tampil['kd_bank'];?>" onClick="return konfirm()">hapus </a></td>
  </tr>
  <?
  	}}
	if(empty($_GET['e'])){

  ?>
  
  <form  name="input" action="?p=data_bank" method="post">
  <tr >
    <td colspan="3"><hr /></td>
	<td></td>
  </tr>
  <tr >
    <td><div align="center"><font color="#00CCFF">*</font></div></td>
    
    <td ><label>
      <input name="in_kd_bank" type="text" class="corner10" id="in_kd_bank" size="8"/>
    </label></td>
    <td ><label>
    <input name="in_namabank" type="text" id="in_namabank" size="20"  class="corner10"/>
    </label></td>
    <td><label>
      <input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol">
    </label></td>
  </tr>
  </form>
  <? }?>
</table>
<p>&nbsp; </p>
