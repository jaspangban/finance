<?

	//input 
 
	if($_POST['tambah']){		
		
		//inisialisasi
		$nodo=$_POST['in_nodo'];
		$keterangan=$_POST['in_keterangan'];
		$penjual=$_POST['in_penjual'];
		$banyak=$_POST['in_banyak'];
		$berat=$_POST['in_berat'];
		$harga=$_POST['in_harga'];
		$pembeli=$_POST['in_pembeli'];
		$banyak2=$_POST['in_banyak2'];
		$berat2=$_POST['in_berat2'];
		$harga2=$_POST['in_harga2'];
		
		//membentuk array untuk pesan jika kosong
		$kosong=array();

		//jika kosong
		
		if(empty($nodo)){
			$kosong['nodo']='No DO harus diisi';} 
		if(empty($keterangan)){
			$kosong['keterangan']='Keterangan harus diisi';} 
		if(empty($penjual)){
			$kosong['penjual']='Penjual harus diisi';} 
		if(empty($berat)){
			$kosong['berat']='Berat harus diisi';} 
		if(empty($harga)){
			$kosong['harga']='Harga harus diisi';} 
		if(empty($pembeli)){
			$kosong['pembeli']='Pembeli harus diisi';} 
		if(empty($berat2)){
			$kosong['berat2']='Berat harus diisi';} 
		if(empty($harga2)){
			$kosong['harga2']='Harga harus diisi';} 
		if(empty($_POST['th']) || empty($_POST['bl']) || empty($_POST['tg'])){
			echo "akses ditolak...";} 
			if (empty($kosong)){
		
		//rumus 
		if($banyak==NULL){$x=0;}else{
		$x=$berat/$banyak;}
		if($banyak2==NULL){$x2=0;}else{
		$x2=$berat2/$banyak2;}
		$jumlah=$harga*$berat;
		$jumlah2=$harga2*$berat2;
		$rugilaba=$jumlah2-$jumlah;
		$now=$_POST['th']."-".$_POST['bl']."-".$_POST['tg'];
		//menentukan tanggal jatuh tempo
		$add_date=7;
		$add_time=mktime(0,0,0,$_POST['bl'],$_POST['tg'],$_POST['th'])+($add_date * 24 * 60 * 60);
		$get_add_date=(date('Y-m-d', $add_time));
		$jatuh_tempo=$get_add_date;//tanggal yang diambil

					
		//proses input
		mysql_query("insert into transaksi (idtrx, tanggal, no_do, keterangan, penjual, ekor, kg, x, harga, jumlah, pembeli, ekor2, kg2, x2, harga2, jumlah2, sisa, rugilaba, catatan, jatuh_tempo, id) values ('".$_POST['in_idtrx']."', '$now', '$nodo', '$keterangan', '$penjual', '$banyak', '$berat', '$x', '$harga', '$jumlah', '$pembeli', '$banyak2', '$berat2', '$x2', '$harga2', '$jumlah2', '$jumlah2', '$rugilaba', '".$_POST['in_catatan']."', '$jatuh_tempo', '".$_SESSION['id']."')");

		//rekap pembeli, pengeluaran dll.
		mysql_query("insert into rekap (id, tanggal, kepada, trx, rugilaba, status,catatan) values ('".$_POST['in_idtrx']."', '$now', '$pembeli', '$jumlah2', '$rugilaba','piutang', '".$_POST['in_catatan']."')");
		//rekap khusus penjual
		mysql_query("insert into rekap2 (id, tanggal, kepada, trx, status,catatan) values ('".$_POST['in_idtrx']."', '$now', '$penjual', '$jumlah','hutang', '".$_POST['in_catatan']."')");

			echo "<meta http-equiv=Refresh content=0;url=?p=transaksi>"; 
		
		}		
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
  <div align="right" class="judul">TRANSAKSI</div>
</judul><p>
<table width="100%" border="0">
<tr><td>&nbsp;</td><td>&nbsp;</td><td><div align="left">
    <form id="lihat" name="lihat" method="post" action="?p=data_transaksi">

    <div align="right"><strong>LIHAT DATA PER BULAN</strong>
        <p> </p>
    </div>
    <label></label>
    <label>
    <div align="right">
      <select name="bln">
        <option value="">-Bulan-</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
      -
  <select  name="thn">
    <option value="">-Tahun-</option>
    <option>2011</option>
    <option>2012</option>
    <option>2013</option>
    <option>2014</option>
    <option>2015</option>
    <option>2016</option>
  </select>
      |
  <input name="lihat" type="submit" id="lihat" value="Lihat"  class="tombol"/>
    </div>
    </label>
	</form>
</td>
</tr>
  <tr valign="top">
    <td width="66%" rowspan="3">
    <table width="100%">
      <tr   valign="top">
        <td width="5%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
          <td width="11%" class="headertbl"><div align="center" ><strong>ID Trx</strong></div></td>
          <td width="13%" class="headertbl"><div align="center" ><strong>Tanggal</strong></div></td>
          <td width="13%" class="headertbl"><div align="center" ><strong>No_DO</strong></div></td>
          <td width="13%" class="headertbl"><div align="center"><strong>Ket</strong></div></td>
          <td width="12%" class="headertbl"><div align="center" >
            <div align="center"><strong>Dari</strong></div>
          </div></td>
          <td width="12%" class="headertbl"><div align="center" ><strong>Banyak</strong></div></td>
          <td width="11%" class="headertbl"><div align="center" ><strong>Ke</strong></div></td>
          <td width="8%" class="headertbl"><div align="center" ><strong>Harga</strong></div></td>
          <td width="8%" class="headertbl"><div align="center" ><strong>Jumlah</strong></div></td>
          <td width="15%">&nbsp;</td>
        </tr>
      <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM transaksi WHERE idtrx='".$_GET['d']."'");
	mysql_query("DELETE FROM rekap WHERE id='".$_GET['d']."'");
	mysql_query("DELETE FROM rekap2 WHERE id='".$_GET['d']."'");
	
	}
  	
	// jumlah data yang akan ditampilkan per halaman
 
$dataPerPage = 100;
 
// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.
 
if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;
 
// perhitungan offset
 
$offset = ($noPage - 1) * $dataPerPage;
 
// query SQL untuk menampilkan data perhalaman sesuai offset

  	$i=1;
	$day=date(Y.'-'.m.'-'.d);
  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk  order by tanggal desc LIMIT $offset, $dataPerPage");
	while($tampil=mysql_fetch_array($data)){
  ?>
      <? {
	//tampilan data default
	if(($i % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}
	
  ?>
      <tr >
        <td  bgcolor="<? echo $warna;?>"><div align="center"><? echo $i++;?></div></td>
          <td bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['idtrx'];?></div></td>
          <td bgcolor="<? echo $warna;?>"><div align="center"><? echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?></div></td>
          <td bgcolor="<? echo $warna;?>"><? echo $tampil['no_do'];?></td>
          <td bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namaproduk'];?></div></td>
          <td bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namapenjual'];?></div></td>
          <td bgcolor="<? echo $warna;?>"><div align="right"><? echo $tampil['ekor2'];?></div></td>
          <td bgcolor="<? echo $warna;?>"><div align="left"><? echo $tampil['namapembeli'];?></div></td>
          <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['harga2'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah2'],'','','.');?></div></td>
          <td><a href="?p=transaksi&amp;page=<? echo $noPage;?>&amp;d=<? echo $tampil['idtrx'];?>" onclick="return konfirm()">hapus </a></td>
        </tr>
      <?
  	}}
	if(empty($_GET['e'])){
?>
      <tr >
        <td colspan="10"><hr /></td>
          <td></td>
        </tr>
      <? }?>
    </table>
    <p align="left">
  <? // mencari jumlah semua data dalam tabel 
 
$query   = "SELECT COUNT(*) AS jumData FROM transaksi";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);
 
$jumData = $data['jumData'];
 
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
 
$jumPage = ceil($jumData/$dataPerPage);
 
// menampilkan link previous
 
if ($noPage > 1) echo  "<a href='?p=transaksi&page=".($noPage-1)."'>&lt;&lt; Sebelumnya</a>";
 
// memunculkan nomor halaman dan linknya
 
for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='?p=transaksi&page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}
 
// menampilkan link next
 
if ($noPage < $jumPage) echo "<a href='?p=transaksi&page=".($noPage+1)."'>Berikutnya &gt;&gt;</a>";
?>
    </td>
    <td width="3%"></td>
  </tr>
  <tr valign="top">
    <td>&nbsp;</td>
    <td><div align="right">
      <?
$newNo = "Trx".date("YmdHis",time(now)).rand(100,999);
  ?>
    </div>
      <form action="?p=transaksi" method="post"  name="input" id="input">
        <div align="right">
          <table  border="0"   bgcolor="#eee" class="sudut">
            <tr>
              <td width="35%">Tanggal</td>
              <td width="6%">:</td>
              <td width="59%"><label>
                <select name="tg" id="tg" style="font-size:11px">
                  <option><? echo date("d");?></option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
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
<select name="bl" id="bl" style="font-size:11px">
  <option><? echo date("m");?></option>
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
<select name="th" id="th" style="font-size:11px">
  <option><? echo date("Y");?></option>
  <option>2010</option>
  <option>2011</option>
  <option>2012</option>
  <option>2013</option>
  <option>2014</option>
  <option>2015</option>
  <option>2016</option>
</select>
</label></td>
            </tr>
            <tr>
              <td>ID_Transaksi</td>
              <td>:</td>
              <td><input name="in_idtrx" type="hidden"  id="in_idtrx" size="8" value="<?php echo $newNo; ?>"/>
                  <?php echo $newNo; ?></td>
            </tr>
            <tr>
              <td>No_DO</td>
              <td>:</td>
              <td><input name="in_nodo" type="text" id="in_nodo" size="10"   value="<? echo isset($_POST['in_nodo'])? $_POST['in_nodo'] : '';?>"/><div style="color:red"><? echo isset ($kosong['nodo'])?$kosong['nodo']:''?></div></td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td><label>
                <select name="in_keterangan" id="in_keterangan">
                <? 
$sqlth = "SELECT * FROM tblproduk ORDER BY idproduk ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idproduk]'>$hasilth[idproduk] | $hasilth[namaproduk]</option>";
} ?>                </select><div style="color:red"><? echo isset ($kosong['keterangan'])?$kosong['keterangan']:''?></div>
              </label></td>
            </tr>
            <tr>
              <td colspan="3"><hr /></td>
            </tr>
            <tr>
              <td>Penjual </td>
              <td>:</td>
              <td><select name="in_penjual" id="in_penjual">
                  <? 
$sqlth = "SELECT * FROM tblpenjual ORDER BY idpenjual ASC";
$prosesth = mysql_query($sqlth);?>
  <option value="<? echo isset($_POST['in_penjual'])? $_POST['in_penjual'] : ''?>"><? echo isset($_POST['in_penjual'])? $_POST['in_penjual'] : '--Penjual--'?></option>
  <? while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idpenjual]'>$hasilth[idpenjual] | $hasilth[namapenjual]</option>";
} ?>
                  </select>
                  <div style="color:red"><? echo isset ($kosong['penjual'])?$kosong['penjual']:''?></div></td>
            </tr>
            <tr>
              <td>Banyak</td>
              <td>:</td>
              <td><input name="in_banyak" type="text" id="in_banyak" size="5"  class="angka" value="<? echo isset($_POST['in_banyak'])? $_POST['in_banyak'] : '';?>" /> 
              ekor </td>
            </tr>
              
            <tr>
              <td>Berat</td>
              <td>:</td>
              <td><input name="in_berat" type="text" class="angka" id="in_berat" size="5"  value="<? echo isset($_POST['in_berat'])? $_POST['in_berat'] : '';?>"/> 
              kg <div style="color:red"><? echo isset ($kosong['berat'])?$kosong['berat']:''?></div></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>:</td>
              <td><input name="in_harga" type="text" class="angka" id="in_harga" size="10"  value="<? echo isset($_POST['in_harga'])? $_POST['in_harga'] : '';?>"/><div style="color:red"><? echo isset ($kosong['harga'])?$kosong['harga']:''?></div></td>
            </tr>
            <tr>
              <td colspan="3"><hr /></td>
            </tr>
            <tr>
              <td>Pembeli</td>
              <td>:</td>
              <td><select name="in_pembeli" id="in_pembeli">
                  <? 
$sqlth = "SELECT * FROM tblpembeli ORDER BY idpembeli ASC";
$prosesth = mysql_query($sqlth);?>
  <option value="<? echo isset($_POST['in_pembeli'])? $_POST['in_pembeli'] : ''?>"><? echo isset($_POST['in_pembeli'])? $_POST['in_pembeli'] : '--Pembeli--'?></option>
  <? while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[idpembeli]'>$hasilth[idpembeli] | $hasilth[namapembeli]</option>";
} ?>
                  </select><div style="color:red"><? echo isset ($kosong['pembeli'])?$kosong['pembeli']:''?></div></td>
            </tr>
            <tr>
              <td>Banyak</td>
              <td>:</td>
              <td><input name="in_banyak2" type="text" id="in_banyak2" size="5"  class="angka" value="<? echo isset($_POST['in_banyak2'])? $_POST['in_banyak2'] : '';?>" />
                ekor </td>
            </tr>
            <tr>
              <td>Berat</td>
              <td>:</td>
              <td><input name="in_berat2" type="text" id="in_berat2" size="5" class="angka" value="<? echo isset($_POST['in_berat2'])? $_POST['in_berat2'] : '';?>"/>
                kg <div style="color:red"><? echo isset ($kosong['berat2'])?$kosong['berat2']:''?></div></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>:</td>
              <td><input  class="angka" name="in_harga2" type="text" id="in_harga2" size="10"  value="<? echo isset($_POST['in_harga2'])? $_POST['in_harga2'] : '';?>"/><div style="color:red"><? echo isset ($kosong['harga2'])?$kosong['harga2']:''?></div></td>
            </tr>
            <tr>
              <td>Catatan</td>
              <td>:</td>
              <td><input name="in_catatan" type="text" id="in_catatan" size="10"   value="<? echo isset($_POST['in_catatan'])? $_POST['in_catatan'] : '';?>"/></td>
            </tr>
            <tr>
              <td colspan="3"><hr /></td>
            </tr>
            <tr>
              <td colspan="3"><div align="center">
                  <input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol" />
              </div></td>
            </tr>
          </table>
        </div>
    </form></td>
  </tr>
</table>
<p>&nbsp; </p>
