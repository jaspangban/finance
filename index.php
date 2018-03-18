<?php
session_start();
include ("pages/koneksi.php");

if($_GET['logout']){
	session_unregister("id");
	session_unregister("level");	
	session_destroy();
}

if(session_is_registered("level")){
	echo "Anda Telah Login<br>";
	echo "<a href=\"javascript:history.back();\">Kembali</a>";
	exit(0);
}

if($_POST){
$username=$_POST['username'];
$pass=$_POST['password'];
$password=md5($pass);

	if(empty($username) || empty($password)){
	echo "<marquee behavior='slide' direction='up' height='50'> <font color=orange>email atau password belum diisi....<br> silahkan ulangi kembali...!</font></marquee>";
	}else{
	$username=stripslashes($username);
	$password=stripslashes($password);
	$username=mysql_real_escape_string($username);
	$password=mysql_real_escape_string($password);
		
	$sql=mysql_query("select * from user where username='$username' and password='$password'");
	$log=mysql_fetch_array($sql);
	
		if($log[username]==$username and $log[password]==$password){		
		session_register("id");
		session_register("level");
		
		$_SESSION['id']=$log['id'];
		$_SESSION['level']=$log['level'];
		
			if($log[level]){
			header("location:pages/layout.php");
			}
			}else{
			echo "<marquee behavior='slide' direction='up' height='50'> <font color=orange> Username atau Password yang anda masukan salah....<br> silahkan ulangi login kembali...!</font></marquee>";
		}
	
	}
}
?>
<link rel="stylesheet" href="pages/jquerycssmenu.css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<body  bgcolor="#333333">
<table width="100%" style="margin-top:10%">
<tr>
<td align="center"><p><marquee width="108"  height="120"  behavior="alternate" direction="up" scrolldelay="250"  onmouseover="this.stop()" onMouseOut="this.start()">
</marquee></p>
  <p>
    <judul><span class="style1"><font face="Verdana, Arial, Helvetica, sans-serif" size="+1"></font></span></judul>
  <p class="style1">

  <form action="" method="post" name="login" id="login">
  <table   background="images/in.png"border="0" id="form_login" cellpadding="5px" cellspacing="5px"  class="sudut">
    <tr>
		<td colspan="3" align="center" class="corner10" style="font-size:14px;background-image:url(images/log.png);color:#FFFFFF"><font face="Geneva, Arial, Helvetica, sans-serif"><b>MENU LOGIN</b></font></td>
	</tr>
	<tr>
      <td ><span class="style2">Username</span></td>
      <td ><span class="style2">:</span></td>
      <td ><input name="username" class="corner10" type="text" id="username"></td>
    </tr>
    <tr>
      <td><span class="style2">Password</span></td>
      <td><span class="style2">:</span></td>
      <td><input name="password" class="corner10" type="password" id="password"></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input name="submit" type="submit" id="submit" value="Login" class="tombol"></td>
    </tr>
  </table>
</form>
<p><font  face="verdana" size="1"  color="#CCCCCC">    powered by: </BR>landyrusland@gmail.com</font></p>
</p>
</td>
</tr>
</table>
</body>