<?php
session_start();
if(!session_is_registered(id)){
header("location:../../index.php");
}


include ("../koneksi.php");

$tg=$_GET['tgl'];
$bl=$_GET['bln'];
$th=$_GET['thn'];

 


//STARTING POINT		
	//bank
		$skas1=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
		$sdatakas1=mysql_fetch_array($skas1);
	//tunai
		$skas2=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
		$sdatakas2=mysql_fetch_array($skas2);
	//hutang
		$shutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hutang' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatahutang=mysql_fetch_array($shutang);
	//piutang	
		$spiutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='piutang' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatapiutang=mysql_fetch_array($spiutang);
	//hutangK
		$shutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hKaryawan' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatahutangK=mysql_fetch_array($shutangK);
	//piutangK	
		$spiutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='pKaryawan' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatapiutangK=mysql_fetch_array($spiutangK);
	//hutangP
		$shutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hProduksi' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatahutangP=mysql_fetch_array($shutangP);
	//piutangP	
		$spiutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='pProduksi' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatapiutangP=mysql_fetch_array($spiutangP);
			
//DAGANG
	//transaksi	
		$dagang=mysql_query("SELECT sum(jumlah) as beli, sum(jumlah2) as jual, sum(rugilaba) as rl FROM transaksi  WHERE YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$transaksi=mysql_fetch_array($dagang);
	//lainlain
		$lainlain=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pendapatan' and YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datalainlain=mysql_fetch_array($lainlain);
	//hutang
		//transfer
		$hutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datahutang=mysql_fetch_array($hutang);
		//tunai
		$hutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datahutang2=mysql_fetch_array($hutang2);
	//piutang	
		//transfer
		$piutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapiutang=mysql_fetch_array($piutang);
		//tunai
		$piutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapiutang2=mysql_fetch_array($piutang2);

//PENGELUARAN
		//transfer
		$pengeluaran=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapengeluaran=mysql_fetch_array($pengeluaran);
		//tunai
		$pengeluaran2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapengeluaran2=mysql_fetch_array($pengeluaran2);

//LABAKOTOR
	//starting point
		//$slabakotor=
	//transaksi
		$labakotor=$transaksi['rl']+$datalainlain['jumlah'];


//LABABERSIH*
		$lababersih=$labakotor-($datapengeluaran['jumlah']+$datapengeluaran2['jumlah']);

?>

<link rel="stylesheet" href="../jquerycssmenu.css" />
<style type="text/css">
<!--
.style3 {font-size: 16px}
.style4 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<p>
<table width="100%" border="0" >
  <tr valign="top">
    <td width="63%" class="header"><div align="center">
      <p><img src="../../images/logo.png" alt="Logo" width="100" height="100"><br />
        <span class="style3"><font face="Verdana, Arial, Helvetica, sans-serif" size="+3">Danas Farm </font></span> <br />
        Jl. Raya Arwinda Km. 8 Mande - Cianjur Telp. 081563144552 </p>
      <p><hr /></p>
    </div></td>
  </tr>
  <tr valign="bottom">
    <td >
    </td>
  </tr>
  <tr valign="top">
    <td height="256" align="center"><p ><strong>RUGI LABA  <br />
            <span class="style3">Per :
              <? $bulan = Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');?>
            <?= $tg." ".$bulan[$bl-1]." ".$th; ?>
          </span> </strong> </p>
      <table width="288" border="0">
        <tr>
          <td><strong>Pendapatan</strong></td>
          <td><strong>:</strong></td>
          <td><div align="right"><strong><? echo number_format($transaksi['rl'],'','','.');?></strong></div></td>
        </tr>
        <tr>
          <td><strong>Lain-lain</strong></td>
          <td><strong>:</strong></td>
          <td><div align="right"><strong><? echo number_format($datalainlain['jumlah'],'','','.');?></strong></div></td>
        </tr>
        <tr>
          <td width="154"><div align="right"><strong>Laba Kotor </strong></div></td>
          <td width="12"><strong>:</strong></td>
          <? 
//STARTING POINT		
	//bank
		$skas1=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
		$sdatakas1=mysql_fetch_array($skas1);
	//tunai
		$skas2=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
		$sdatakas2=mysql_fetch_array($skas2);
	//hutang
		$shutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hutang' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatahutang=mysql_fetch_array($shutang);
	//piutang	
		$spiutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='piutang' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatapiutang=mysql_fetch_array($spiutang);
	//hutangK
		$shutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hKaryawan' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatahutangK=mysql_fetch_array($shutangK);
	//piutangK	
		$spiutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='pKaryawan' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatapiutangK=mysql_fetch_array($spiutangK);
	//hutangP
		$shutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hProduksi' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatahutangP=mysql_fetch_array($shutangP);
	//piutangP	
		$spiutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='pProduksi' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$sdatapiutangP=mysql_fetch_array($spiutangP);
			
//DAGANG
	//transaksi	
		$dagang=mysql_query("SELECT sum(jumlah) as beli, sum(jumlah2) as jual, sum(rugilaba) as rl FROM transaksi  WHERE YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$transaksi=mysql_fetch_array($dagang);
	//lainlain
		$lainlain=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pendapatan' and YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datalainlain=mysql_fetch_array($lainlain);
	//hutang
		//transfer
		$hutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datahutang=mysql_fetch_array($hutang);
		//tunai
		$hutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datahutang2=mysql_fetch_array($hutang2);
	//piutang	
		//transfer
		$piutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapiutang=mysql_fetch_array($piutang);
		//tunai
		$piutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapiutang2=mysql_fetch_array($piutang2);

//PENGELUARAN
		//transfer
		$pengeluaran=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='transfer' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapengeluaran=mysql_fetch_array($pengeluaran);
		//tunai
		$pengeluaran2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='tunai' && YEAR(tanggal) = '$th' AND MONTH(tanggal) = '$bl' AND DAY(tanggal) <= '$tg'");
	  	$datapengeluaran2=mysql_fetch_array($pengeluaran2);

//LABAKOTOR
	//starting point
		//$slabakotor=
	//transaksi
		$labakotor=$transaksi['rl']+$datalainlain['jumlah'];


//LABABERSIH*
		$lababersih=$labakotor-($datapengeluaran['jumlah']+$datapengeluaran2['jumlah']);

?>
          <td width="108"><div align="right"><strong><? echo number_format($labakotor,'','','.');?></strong></div></td>
        </tr>
        <tr>
          <td><strong>Pengeluaran (Beban Biaya) </strong></td>
          <td><strong>:</strong></td>
          <td><div align="right"><strong><? echo number_format($datapengeluaran['jumlah']+$datapengeluaran2['jumlah'],'','','.');?></strong></div></td>
        </tr>
        <tr>
          <td colspan="3"><hr /></td>
        </tr>
        <tr>
          <td><strong>Laba Bersih </strong></td>
          <td><strong>:</strong></td>
          <td><div align="right"><strong><? echo number_format($lababersih,'','','.');?></strong></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>&nbsp; </p>
<script language="javascript" type="text/javascript">
    window.print();
    window.close();
</script></p>
