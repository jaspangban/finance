<?
	//input 
  
	if($_POST['tambah'])
		if(empty($_POST['in_username']) || empty($_POST['in_password'])){
		echo "<marquee height='40' direction='up' behavior='slide'><warning>Username dan Password wajib diisi...!</warning></marquee>";	
		}else{
		mysql_query("insert into user (username,password,level) values ('".$_POST['in_username']."',md5('".$_POST['in_password']."'),'2')");
		}
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
  <div align="right" class="judul">DATA PENGGUNA
</div>
</judul><p>
  <? if($_SESSION['level']==1){?>
<table  width="24%" >

  <tr >
    <td width="9%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="34%" class="headertbl"><div align="center"><strong>ID</strong></div></td>
    <td width="34%" class="headertbl"><div align="center" ><strong>Username</strong></div></td>
    <td width="23%" class="headertbl"><div align="center" ><strong>Password</strong></div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM user WHERE id='".$_GET['d']."'");}
  	
  	$i=1;
  	$data=mysql_query("select * from user order by username asc");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['id']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr >
    <td><label>
      <div align="center">
        <input name="ed_id" type="hidden" id="ed_id"  value="<? echo $tampil['id'];?>"/>
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#00CCFF">&gt;</font></marquee></div>
    </label></td>
    <td ><div align="center"><span class="corner10"><? echo $tampil['id'];?></span></div></td>
    <td ><label>
      <input name="ed_username" type="text" id="ed_username"  value="<? echo $tampil['username'];?>"/>
    </label></td>
    <td><label>
      <div align="right">
        <input name="ed_password" type="password" id="ed_password" title="masukan password baru" size="37"/>
        </div>
    </label></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan"  class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
		  if(empty($_POST['ed_username']) || empty($_POST['ed_password'])){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>Username dan Password wajib diisi...!</warning></marquee>";}else{
	mysql_query("UPDATE user SET username='".$_POST['ed_username']."', password=md5('".$_POST['ed_password']."') WHERE id='".$_POST['ed_id']."'");
	echo "<meta http-equiv=Refresh content=0;url=?p=user>"; 	}
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
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['id'];?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['username'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['password'];?></div></td>
    <td><a href="?p=user&amp;e=<? echo $tampil['id'];?>">edit</a> <? if($tampil['level']==1){echo "";}else{?>| <a href="?p=user&amp;d=<? echo $tampil['id'];?>" onClick="return konfirm()">hapus </a><? }?></td>
  </tr>
  <?
  	}}
	if(empty($_GET['e'])){

  ?>
  
  <form  name="input" action="?p=user" method="post">
  <tr >
    <td colspan="4"><hr /></td>
	<td></td>
  </tr>
  <tr >
    <td><div align="center"><font color="#00CCFF">*</font></div></td>
    
    <td >&nbsp;</td>
    <td ><label>
      <input name="in_username" type="text" id="in_username" class="corner10"/>
    </label></td>
    <td ><label>
      <input name="in_password" type="password" id="in_password" size="30"  class="corner10"/>
      </label></td>
    <td><label>
      <input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol">
    </label></td>
  </tr>
  </form>
  <? }?>
</table>
<p>
  <? } else{echo "<warning>Halaman ini tidak bisa diakses....!</warning>";}?>
</p>
