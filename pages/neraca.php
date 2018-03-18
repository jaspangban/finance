
<judul>
  <div align="right" class="judul">NERACA
</div>
</judul><p>
	  	    <? 
//STARTING POINT		
	//bank
		$skas1=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='transfer' && YEAR(tanggal) <= YEAR(CURDATE())");
		$sdatakas1=mysql_fetch_array($skas1);
	//tunai
		$skas2=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='kas' && objek='tunai'&& YEAR(tanggal) <= YEAR(CURDATE())");
		$sdatakas2=mysql_fetch_array($skas2);
	//hutang
		$shutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hutang'&& YEAR(tanggal) <= YEAR(CURDATE())");
	  	$sdatahutang=mysql_fetch_array($shutang);
	//piutang	
		$spiutang=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='piutang'&& YEAR(tanggal) <= YEAR(CURDATE())");
	  	$sdatapiutang=mysql_fetch_array($spiutang);		
	//hutangK
		$shutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hKaryawan' && YEAR(tanggal) <= YEAR(CURDATE())");
	  	$sdatahutangK=mysql_fetch_array($shutangK);
	//hutangP
		$shutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM start WHERE ket='hProduksi'&& YEAR(tanggal) <= YEAR(CURDATE())");
	  	$sdatahutangP=mysql_fetch_array($shutangP);


//DAGANG
	//transaksi	
		$dagang=mysql_query("SELECT sum(jumlah) as beli, sum(jumlah2) as jual, sum(rugilaba) as rl FROM transaksi where tanggal <= CURDATE()");
	  	$transaksi=mysql_fetch_array($dagang);
	//hutang
		//transfer
		$hutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='transfer'&& tanggal <= CURDATE()");
	  	$datahutang=mysql_fetch_array($hutang);
		//tunai
		$hutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hutang' && jenis='tunai'&& tanggal <= CURDATE()");
	  	$datahutang2=mysql_fetch_array($hutang2);
	//piutang	
		//transfer
		$piutang=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='transfer'&& tanggal <= CURDATE()");
	  	$datapiutang=mysql_fetch_array($piutang);
		//tunai
		$piutang2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='piutang' && jenis='tunai'&& tanggal <= CURDATE()");
	  	$datapiutang2=mysql_fetch_array($piutang2);

//KARYAWAN
	//hutang
		//transfer
		$hutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hKaryawan' && jenis='transfer'&& tanggal <= CURDATE()");
	  	$datahutangK=mysql_fetch_array($hutangK);
		//tunai
		$hutangK2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hKaryawan' && jenis='tunai'&& tanggal <= CURDATE()");
	  	$datahutangK2=mysql_fetch_array($hutangK2);
	//piutang	
		//transfer
		$piutangK=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pKaryawan' && jenis='transfer'&& tanggal <= CURDATE()");
	  	$datapiutangK=mysql_fetch_array($piutangK);
		//tunai
		$piutangK2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pKaryawan' && jenis='tunai'&& tanggal <= CURDATE()");
	  	$datapiutangK2=mysql_fetch_array($piutangK2);

//PENDAPATAN LAINLAIN
	//lainlain
		//transfer
		$lainlainT=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pendapatan' && jenis='transfer'&& tanggal <= CURDATE()");
	  	$datalainlainT=mysql_fetch_array($lainlainT);
		//tunai
		$lainlainT2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pendapatan' && jenis='tunai'&& tanggal <= CURDATE()");
	  	$datalainlainT2=mysql_fetch_array($lainlainT2);

//PRODUKSI
	//hutang
		//transfer
		$hutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hProduksi' && jenis='transfer'&& tanggal <= CURDATE()");
	  	$datahutangP=mysql_fetch_array($hutangP);
		//tunai
		$hutangP2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='hProduksi' && jenis='tunai'&& tanggal <= CURDATE()");
	  	$datahutangP2=mysql_fetch_array($hutangP2);
	//piutang	
		//transfer
		$piutangP=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pProduksi' && jenis='transfer'&& tanggal <= CURDATE()");
	  	$datapiutangP=mysql_fetch_array($piutangP);
		//tunai
		$piutangP2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pProduksi' && jenis='tunai'&& tanggal <= CURDATE()");
	  	$datapiutangP2=mysql_fetch_array($piutangP2);

//PENGELUARAN
		//transfer
		$pengeluaran=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='transfer' && tanggal <= CURDATE()");
	  	$datapengeluaran=mysql_fetch_array($pengeluaran);
		//tunai
		$pengeluaran2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='tunai' && tanggal <= CURDATE()");
	  	$datapengeluaran2=mysql_fetch_array($pengeluaran2);


//ASET
		//tetap transfer
		$aset_T=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='aset' && kepada='tetap' && jenis='transfer' && tanggal <= CURDATE()");
	  	$dataaset_T=mysql_fetch_array($aset_T);
		//tetap tunai
		$aset_T2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='aset' && kepada='tetap' && jenis='tunai' && tanggal <= CURDATE()");
	  	$dataaset_T2=mysql_fetch_array($aset_T2);

//JUAL ASET
		//tetap transfer
		$Jaset_T=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='jaset' && kepada='tetap' && jenis='transfer' && tanggal <= CURDATE()");
	  	$Jdataaset_T=mysql_fetch_array($Jaset_T);
		//tetap tunai
		$Jaset_T2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='jaset' && kepada='tetap' && jenis='tunai' && tanggal <= CURDATE()");
	  	$Jdataaset_T2=mysql_fetch_array($Jaset_T2);



//HUTANG PIUTANG KARYAWAN*
		$TpiutangK=($sdatahutangK['jumlah']+$datahutangK['jumlah']+$datahutangK2['jumlah'])-($datapiutangK['jumlah']+$datapiutangK2['jumlah']);

//HUTANG PIUTANG PRODUKSI*
		$TpiutangP=($sdatahutangP['jumlah']+$datahutangP['jumlah']+$datahutangP2['jumlah'])-($datapiutangP['jumlah']+$datapiutangP2['jumlah']);

//PENARIKAN
	//bank
		$nyimpen=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='penarikan' && kepada='bank'&& tanggal <= CURDATE()");
	  	$dataNyimpen=mysql_fetch_array($nyimpen);
	//kas
		$nyandak=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='penarikan' && kepada='kas'&& tanggal <= CURDATE()");
	  	$dataNyandak=mysql_fetch_array($nyandak);
	

//DATA LABAKOTOR DAN PENGELUARAN

	//starting point
		$slabakotor=($sdatakas1['jumlah']+$sdatakas2['jumlah']+$sdatapiutang['jumlah'])-($sdatahutang['jumlah']);

	//laba bulan sebelumnya dalam tahun ini
		$dagang2=mysql_query("SELECT sum(rugilaba) as rl FROM transaksi where YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) < MONTH(CURDATE())");
	  	$transaksi2=mysql_fetch_array($dagang2);

	//laba bulan sebelumnya dalam tahun ini untuk lainlain
		$lainlain1=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran where status='pendapatan' and YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) < MONTH(CURDATE())");
	  	$datalainlain1=mysql_fetch_array($lainlain1);

	//pengeluaran untuk mengurangi laba ditahan
	//transferPengeluaran
		$luar1=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='transfer' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) < MONTH(CURDATE())");
	  	$dataluar1=mysql_fetch_array($luar1);
	//tunaiPengeluaran
		$luar2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='tunai' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) < MONTH(CURDATE())");
	  	$dataluar2=mysql_fetch_array($luar2);


	//laba bulan penyusutan (bulan ini)		
		$dagang3=mysql_query("SELECT sum(rugilaba) as rl FROM transaksi where YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$transaksi3=mysql_fetch_array($dagang3);

	//laba bulan penyusutan (bulan ini)	untuk lainlain
		$lainlain2=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran where status='pendapatan' and YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$datalainlain2=mysql_fetch_array($lainlain2);
		
	//pengeluaran untuk mengurangi laba berjalan
	//transferPengeluaran
		$luar3=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='transfer' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$dataluar3=mysql_fetch_array($luar3);
	//tunaiPengeluaran
		$luar4=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='tunai' && YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())");
	  	$dataluar4=mysql_fetch_array($luar4);


	//modal
		$dagang4=mysql_query("SELECT sum(rugilaba) as rl FROM transaksi where YEAR(tanggal) < YEAR(CURDATE())");
	  	$transaksi4=mysql_fetch_array($dagang4);

	//lainlain
		$lainlain3=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran where status='pendapatan' and YEAR(tanggal) < YEAR(CURDATE())");
	  	$datalainlain3=mysql_fetch_array($lainlain3);

	//pengeluaran untuk mengurangi modal
	//transferPengeluaran
		$luar5=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='transfer' && YEAR(tanggal) < YEAR(CURDATE())");
	  	$dataluar5=mysql_fetch_array($luar5);
	//tunaiPengeluaran
		$luar6=mysql_query("SELECT sum(jumlah) as jumlah FROM pembayaran WHERE status='pengeluaran' && jenis='tunai' && YEAR(tanggal) < YEAR(CURDATE())");
	  	$dataluar6=mysql_fetch_array($luar6);

//ASET*
	//aset tetap
	$aset_tetap=$dataaset_T['jumlah']+$dataaset_T2['jumlah'];

//JUAL ASET*
	//aset tetap
	$Jaset_tetap=$Jdataaset_T['jumlah']+$Jdataaset_T2['jumlah'];


//LABABERSIH*

		$labaditahan=($transaksi2['rl']+$datalainlain1['jumlah'])-($dataluar1['jumlah']+$dataluar2['jumlah']); // Laba ditahan
		$lababerjalan=($transaksi3['rl']+$datalainlain2['jumlah'])-($dataluar3['jumlah']+$dataluar4['jumlah']); // laba berjalan
		$modal=($transaksi4['rl']+$datalainlain3['jumlah']+$slabakotor+$Jaset_tetap)-($dataluar5['jumlah']+$dataluar6['jumlah']+$aset_tetap); //modal

//KAS*
	//Bank
		$kasbank=($sdatakas1['jumlah']+$datapiutang['jumlah']+$datapiutangK['jumlah']+$datapiutangP['jumlah']+$dataNyimpen['jumlah']+$datalainlainT['jumlah']+$Jdataaset_T['jumlah'])-($datahutang['jumlah']+$datahutangK['jumlah']+$datahutangP['jumlah']+$datapengeluaran['jumlah']+$dataNyandak['jumlah']+$dataaset_T['jumlah']);
	//Tunai
		$kastunai=($sdatakas2['jumlah']+$datapiutang2['jumlah']+$datapiutangK2['jumlah']+$datapiutangP2['jumlah']+$datalainlainT2['jumlah']+$dataNyandak['jumlah']+$Jdataaset_T2['jumlah'])-($datahutang2['jumlah']+$datahutangK2['jumlah']+$datahutangP2['jumlah']+$datapengeluaran2['jumlah']+$dataNyimpen['jumlah']+$dataaset_T2['jumlah']+$sdatahutangK['jumlah']+$sdatahutangP['jumlah']);
		
		
//HUTANG PIUTANG*
		$piutang=($sdatapiutang['jumlah']+$transaksi['jual'])-($datapiutang['jumlah']+$datapiutang2['jumlah']);
		$hutang=($sdatahutang['jumlah']+$transaksi['beli'])-($datahutang['jumlah']+$datahutang2['jumlah']);
		
	
	
		

			

		?>


<div align="center" id="content">
  <strong>
  <p align="left">
  </strong>
  <table width="100%" border="0">
    <tr>
      <td><div align="right">
        <form id="form3" name="form3" method="post" action="?p=lihatneraca">
          <p>Lihat neraca per tanggal :
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
                <option>2010</option>
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
  <p class="style2"><strong>N E R A C A    <br />
    <span class="style3">Per : 
    <? $bulan = Array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');?>
    <?= date("d")." ".$bulan[date("n")-1]." ".date("Y"); ?>
    </span>
  </strong>
  <hr />

  <table width="542" border="0">
    <tr>
      <td width="134"><strong><u>AKTIVA</u></strong></td>
      <td width="109">&nbsp;</td>
      <td width="10">&nbsp;</td>
      <td  bgcolor="#eee" width="10" rowspan="17">&nbsp;</td>
      <td width="10">&nbsp;</td>
      <td width="139">&nbsp;</td>
      <td width="100"><div align="right"><strong><u>PASSIVA</u></strong></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>KAS</td>
      <td><div align="right"></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>HUTANG</td>
      <td><div align="right"></div></td>
    </tr>
    <tr>
      <td>- Bank</td>
      <td><div align="right"><? number_format($kasbank,'','','.');?></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>- <a href="?p=hutangdagang">Dagang </a></td>
      <td><div align="right"><? echo number_format($hutang,'','','.');?></div></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0">
<?
  	$data=mysql_query("select sum(pembayaran.masuk) as jmlmasuk, sum(pembayaran.keluar) as jmlkeluar, bank.* from pembayaran left join bank on bank.kd_bank=pembayaran.pos where tanggal<=CURDATE() and pos!='T' group by kd_bank");
	while($tampil=mysql_fetch_array($data)){
	$bankkas=$tampil['jmlmasuk']-$tampil['jmlkeluar'];

?>
        <tr>
          <td><? echo "* "; echo $tampil['namabank'];?></td>
          <td><div align="right"><? echo number_format($bankkas,'','','.');?></div></td>
        </tr><? }?>
      </table></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>- Tunai</td>
      <td><div align="right"><? echo number_format($kastunai,'','','.');?></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>PIUTANG</td>

      <td><div align="right"></div></td>
      <td>&nbsp;</td>	
      <td>&nbsp;</td>
      <td>MODAL</td>
      <td><div align="right">
        <? echo number_format($modal,'','','.');?>
      </div></td>
    </tr>
    <tr>
      <td>- <a href="?p=piutangdagang">Dagang</a></td>
      <td><div align="right"><? echo number_format($piutang,'','','.');?></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>- <a href="?p=piutangkaryawan">Karyawan</a></td>
      <td><div align="right"><? echo number_format($TpiutangK,'','','.');?></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>LABA BERSIH </td>
      <td><div align="right"></div></td>
    </tr>
    <tr>
      <td>- <a href="?p=piutangproduksi">Produksi</a></td>
      <td><div align="right"><? echo number_format($TpiutangP,'','','.');?></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>- Ditahan</td>
      <td><div align="right"><? echo number_format($labaditahan,'','','.');?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>- Berjalan </td>
      <td><div align="right"><? echo number_format($lababerjalan,'','','.');?></div></td>
    </tr>
    <tr>
      <td>ASET</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>- Tetap </td>
      <td><div align="right"><? echo number_format($aset_tetap-$Jaset_tetap,'','','.');?></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>- Penyusutan </td>
      <td><div align="right"><? echo number_format(-($aset_tetap-$Jaset_tetap),'','','.');?></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><hr /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><hr /></td>
    </tr>
    <tr>
      <td><div align="center"><strong>Total</strong></div></td>
      <td><div align="right"><strong><? echo number_format($kasbank+$kastunai+$piutang+$lising+$TpiutangK+$TpiutangP,'','','.');?></strong></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="center"><strong>Total</strong></div></td>
      <td><div align="right"><strong><? echo number_format($hutang+$lababerjalan+$labaditahan+$modal+$lising,'','','.');?></strong></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>