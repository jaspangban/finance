<? 
session_start();

if($_GET['piutang']){
$id=$_GET['piutang'];

$sqllog=mysql_query("SELECT * FROM tblpembeli WHERE idpembeli ='$id'");
while($tampillog=mysql_fetch_array($sqllog))
if($tampillog[idpembeli]==$id){

	$_SESSION['pembeli'] = $tampillog['idpembeli'];
	
echo "<meta http-equiv=Refresh content=0;url=?p=detailpiutangdagang>";
	
	
	}
	}
	//batas session piutang
else if($_GET['hutang']){
$id=$_GET['hutang'];

$sqllog=mysql_query("SELECT * FROM tblpenjual WHERE idpenjual ='$id'");
while($tampillog=mysql_fetch_array($sqllog))
if($tampillog[idpenjual]==$id){

	$_SESSION['penjual'] = $tampillog['idpenjual'];
	
echo "<meta http-equiv=Refresh content=0;url=?p=detailhutangdagang>";
	
	
	}
	}
//batas session hutang	
	
	?>