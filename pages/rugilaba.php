
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
  <p><strong><span>RUGI LABA 
    <? $bulan = Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');?>
    </span><br />
    Per: 
    <?= date("d")." ".$bulan[date("n")-1]." ".date("Y"); ?>
    </strong>  
  <hr />
	  	    <? 

//STARTING POINT		
	//bank
		$skas1=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='transfer' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
		$sdatakas1=mysql_fetch_array($skas1);
	//tunai
		$skas2=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='tunai' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
		$sdatakas2=mysql_fetch_array($skas2);
	//hutang
		$shutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hutang' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$sdatahutang=mysql_fetch_array($shutang);
	//piutang	
		$spiutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='piutang' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$sdatapiutang=mysql_fetch_array($spiutang);
	//hutangK
		$shutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hKaryawan' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$sdatahutangK=mysql_fetch_array($shutangK);
	//piutangK	
		$spiutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='pKaryawan' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$sdatapiutangK=mysql_fetch_array($spiutangK);
	//hutangP
		$shutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hProduksi' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$sdatahutangP=mysql_fetch_array($shutangP);
	//piutangP	
		$spiutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='pProduksi' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$sdatapiutangP=mysql_fetch_array($spiutangP);
			
//DAGANG
	//transaksi	
		$dagang=mysql_query("SELECT sum(jumlah) as beli, sum(jumlah2) as jual, sum(rugilaba) as rl FROM transaksi  WHERE YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$transaksi=mysql_fetch_array($dagang);
	//lainlain
		$lainlain=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pendapatan' and YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$datalainlain=mysql_fetch_array($lainlain);
	//hutang
		//transfer
		$hutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='transfer' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$datahutang=mysql_fetch_array($hutang);
		//tunai
		$hutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='tunai' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$datahutang2=mysql_fetch_array($hutang2);
	//piutang	
		//transfer
		$piutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='transfer' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$datapiutang=mysql_fetch_array($piutang);
		//tunai
		$piutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='tunai' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$datapiutang2=mysql_fetch_array($piutang2);

//PENGELUARAN
		//transfer
		$pengeluaran=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='transfer' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$datapengeluaran=mysql_fetch_array($pengeluaran);
		//tunai
		$pengeluaran2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='tunai' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
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
