<? 
if($_POST)
$th=$_POST['thn'];
$bl=$_POST['bln'];
$tg=$_POST['tgl'];
?>
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>


<judul>
  <div align="right" class="judul">RUGI LABA
</div>
</judul><p>
<div align="center" id="content" >
  <p align="left">

  <table width="100%" border="0">
    <tr>
      <td><div align="right">
        <form id="form3" name="form3" method="post" action="?p=lihatrl">
          <p>Lihat rugilaba per tanggal :
            <label>
              <select style="font-size:11px" name="tgl">
                <option value="">Tanggal</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
              </select>
              </label>
            /
            <label>
              <select style="font-size:11px" name="bln">
                <option value="">Bulan</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
              </label>
            /
            <label>
              <select style="font-size:11px" name="thn">
                <option value="">Tahun</option>
                <option>2011</option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
              </select>
              </label>
            <input style="font-size:11px" type="submit" name="ok" value="Ok"  class="tombol"/>
          </p>
          <p> </p>
        </form>
      </div></td>
    </tr>
  </table>
  <p align="left"><a href="cetak/laprl.php?tgl=<? echo $tg;?>&bln=<? echo $bl;?>&thn=<? echo $th;?>"  target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Cetak','','../images/print1.png',0)"><img src="../images/print2.png" alt="Cetak" name="Cetak" width="55" height="43" border="0" id="Cetak" /></a>
  <p><strong><span>RUGI LABA 
    <? $bulan = Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');?>
    </span><br />
    Per: 
    <?= $tg." ".$bulan[$bl-1]." ".$th; ?>
    </strong>  
  <hr />
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
  </table>
  <p>&nbsp;</p>
</div>
