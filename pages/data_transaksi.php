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
  <div align="right" class="judul">TRANSAKSI BULAN <? 	switch ($_POST['bln'])
{
case 01: echo "JANUARI ";
	break; 
case 02: echo "FEBRUARI ";
	break; 
case 03: echo "MARET ";
	break; 
case 04: echo "APRIL ";
	break; 
case 05: echo "MEI ";
	break; 
case 06: echo "JUNI ";
	break; 
case 07: echo "JULI ";
	break; 
case 08: echo "AGUSTUS ";
	break; 
case 09: echo "SEPTEMBER ";
	break; 
case 10: echo "OKTOBER ";
	break; 
case 11: echo "NOVEMBER ";
	break; 
case 12: echo "DESEMBER ";
	break; 
default: echo "kosong ";
	break;  
	}
?> TAHUN <? echo $_POST['thn'];?></div>
</judul><p>
<table width="100%" border="0">
  <tr valign="top">
    <td width="66%" rowspan="3">
	<?
	if(empty($_POST['thn']) || empty($_POST['bln']))
	echo "<warning>Anda belum melakukan pemilihan data</warning>";
	else
	?>
    <table width="100%">
      <tr  >
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
        </tr>
      <?
  	

  	$i=1;
	$day=date(Y.'-'.m.'-'.d);
  	$data=mysql_query("select transaksi.*,tblpembeli.namapembeli,tblpenjual.namapenjual, tblproduk.namaproduk from transaksi left join tblpembeli on transaksi.pembeli=tblpembeli.idpembeli left join tblpenjual on transaksi.penjual=tblpenjual.idpenjual left join tblproduk on transaksi.keterangan=tblproduk.idproduk where year(tanggal)='".$_POST['thn']."' && month(tanggal) ='".$_POST['bln']."' order by tanggal asc");
	while($tampil=mysql_fetch_array($data)){
  	{
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
    <p align="center">
    </td>
    <td width="3%"></td>
    <form id="lihat" name="lihat" method="post" action="?p=data_transaksi">
      <td width="31%"><div align="left">
        <div align="right"><strong>LIHAT DATA PER BULAN</strong>
        <p>        </div>
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
        </label>      </td>
    </form>
  </tr>
  <tr valign="bottom">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
