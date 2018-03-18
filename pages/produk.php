<?
	//input 
  
	if($_POST['tambah']){
		//mengambil nilai idproduk untuk validasi
	  	$data2=mysql_query("select * from tblproduk where idproduk='".$_POST['in_idproduk']."'");
		$valid=mysql_fetch_array($data2);

		if(empty($_POST['in_idproduk']) || empty($_POST['in_namaproduk'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>ID Produk dan Nama Produk wajib diisi...!</warning></marquee>";	
		}else if($valid['idproduk']==$_POST['in_idproduk']){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>ID sudah digunakan...!</warning></marquee>";
		}else{
		mysql_query("insert into tblproduk (idproduk,namaproduk) values ('".$_POST['in_idproduk']."','".$_POST['in_namaproduk']."')");
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
  <div align="right" class="judul">DATA PRODUK
</div>
</judul><p>
<table  width="24%" >

  <tr >
    <td width="9%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="34%" class="headertbl"><div align="center" ><strong>ID Produk</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Nama Produk</strong></div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM tblproduk WHERE idproduk='".$_GET['d']."'");}
  	
  	$i=1;
  	$data=mysql_query("select * from tblproduk order by idproduk asc");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['idproduk']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr >
    <td><label>
      <div align="center">
        <input name="ed_idproduk" type="hidden" id="ed_idproduk"  value="<? echo $tampil['idproduk'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#00CCFF">&gt;</font></marquee></div>
    </label></td>
    <td ><label>
      <div align="center"><? echo $tampil['idproduk'];?>        </div>
    </label></td>
    <td><label>
      <div align="right">
        <input name="ed_namaproduk" type="text" id="ed_namaproduk" title="masukan namaproduk baru" size="20" value="<? echo $tampil['namaproduk'];?>"/>
        </div>
    </label></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
		  if(empty($_POST['ed_idproduk']) || empty($_POST['ed_namaproduk'])){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>ID Produk dan Nama Produk wajib diisi...!</warning></marquee>";}else{
	mysql_query("UPDATE tblproduk SET idproduk='".$_POST['ed_idproduk']."', namaproduk='".$_POST['ed_namaproduk']."' WHERE idproduk='".$_POST['ed_idproduk']."'");
	echo "<meta http-equiv=Refresh content=0;url=?p=produk>"; 	}
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
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['idproduk'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namaproduk'];?></div></td>
    <td><a href="?p=produk&amp;e=<? echo $tampil['idproduk'];?>">edit</a> <? if($tampil['level']==1){echo "";}else{?>| <a href="?p=produk&amp;d=<? echo $tampil['idproduk'];?>" onClick="return konfirm()">hapus </a><? }?></td>
  </tr>
  <?
  	}}
	if(empty($_GET['e'])){

  ?>
  
  <form  name="input" action="?p=produk" method="post">
  <tr >
    <td colspan="3"><hr /></td>
	<td></td>
  </tr>
  <tr >
    <td><div align="center"><font color="#00CCFF">*</font></div></td>
    
    <td ><label>
      <input name="in_idproduk" type="text" class="corner10" id="in_idproduk" size="8"/>
    </label></td>
    <td ><label>
    <input name="in_namaproduk" type="text" id="in_namaproduk" size="20"  class="corner10"/>
    </label></td>
    <td><label>
      <input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol">
    </label></td>
  </tr>
  </form>
  <? }?>
</table>
<p>&nbsp; </p>
