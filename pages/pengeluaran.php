<?
	//input 
  
	if($_POST['tambah']){
		//mengambil nilai idpengeluaran untuk validasi
	  	$data2=mysql_query("select * from tblpengeluaran where idpengeluaran='".$_POST['in_idpengeluaran']."'");
		$valid=mysql_fetch_array($data2);

		if(empty($_POST['in_idpengeluaran']) || empty($_POST['in_ket'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Kode dan Keterangan wajib diisi...!</warning></marquee>";	
		}else if($valid['idpengeluaran']==$_POST['in_idpengeluaran']){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Kode sudah digunakan...!</warning></marquee>";
		}else{
		mysql_query("insert into tblpengeluaran (idpengeluaran,ket) values ('".$_POST['in_idpengeluaran']."','".$_POST['in_ket']."')");
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
  <div align="right" class="judul">DATA PENGELUARAN
</div>
</judul><p>
<table  width="24%" >

  <tr >
    <td width="9%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="34%" class="headertbl"><div align="center" ><strong>Kode</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Keterangan</strong></div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM tblpengeluaran WHERE idpengeluaran='".$_GET['d']."'");}
  	
  	$i=1;
  	$data=mysql_query("select * from tblpengeluaran order by idpengeluaran asc");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['idpengeluaran']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr >
    <td><label>
      <div align="center">
        <input name="ed_idpengeluaran" type="hidden" id="ed_idpengeluaran"  value="<? echo $tampil['idpengeluaran'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#00CCFF">&gt;</font></marquee></div>
    </label></td>
    <td ><label>
      <div align="center"><? echo $tampil['idpengeluaran'];?>        </div>
    </label></td>
    <td><label>
      <div align="right">
        <input name="ed_ket" type="text" id="ed_ket" title="masukan ket baru" size="20" value="<? echo $tampil['ket'];?>"/>
        </div>
    </label></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
		  if(empty($_POST['ed_idpengeluaran']) || empty($_POST['ed_ket'])){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>Kode dan Keterangan wajib diisi...!</warning></marquee>";}else{
	mysql_query("UPDATE tblpengeluaran SET idpengeluaran='".$_POST['ed_idpengeluaran']."', ket='".$_POST['ed_ket']."' WHERE idpengeluaran='".$_POST['ed_idpengeluaran']."'");
	echo "<meta http-equiv=Refresh content=0;url=?p=pengeluaran>"; 	}
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
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['idpengeluaran'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['ket'];?></div></td>
    <td><a href="?p=pengeluaran&amp;e=<? echo $tampil['idpengeluaran'];?>">edit</a> <? if($tampil['level']==1){echo "";}else{?>| <a href="?p=pengeluaran&amp;d=<? echo $tampil['idpengeluaran'];?>" onClick="return konfirm()">hapus </a><? }?></td>
  </tr>
  <?
  	}}
	if(empty($_GET['e'])){

  ?>
  
  <form  name="input" action="?p=pengeluaran" method="post">
  <tr >
    <td colspan="3"><hr /></td>
	<td></td>
  </tr>
  <tr >
    <td><div align="center"><font color="#00CCFF">*</font></div></td>
    
    <td ><label>
      <input name="in_idpengeluaran" type="text" class="corner10" id="in_idpengeluaran" size="8"/>
    </label></td>
    <td ><label>
    <input name="in_ket" type="text" id="in_ket" size="20"  class="corner10"/>
    </label></td>
    <td><label>
      <input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol">
    </label></td>
  </tr>
  </form>
  <? }?>
</table>
<p>&nbsp; </p>
