<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?
		$start=mysql_query("SELECT jumlah FROM start WHERE objek='C0002'");
	  	$mulai=mysql_fetch_array($start);
echo $mulai['jumlah'];

?>
<body>
</body>
</html>
