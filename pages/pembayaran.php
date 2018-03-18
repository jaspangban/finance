<?
	//input 
  
	if($_POST['tambah']){	
		//inisialisasi
		$pilih=$_POST['pilih'];
		$in_objek=$_POST['in_objek'];
		$in_jumlah=$_POST['in_jumlah'];
		$in_catatan=$_POST['in_catatan'];
		$now=$_POST['th']."-".$_POST['bl']."-".$_POST['tg'];


		$kosong=array();
		//jika kosong
		if(empty($pilih)){
			$kosong['pilih']='Status harus diisi';} 
		if(empty($in_objek)){
			$kosong['in_objek']='Keterangan harus diisi';} 
		if(empty($in_jumlah)){
			$kosong['in_jumlah']='Jumlah harus diisi';} 
		if(empty($_POST['th']) || empty($_POST['bl']) || empty($_POST['tg'])){
			echo "akses ditolak...";} 

		
		if (empty($kosong)){
		//pasing nilai dari in_jenis
		$jns=$_POST['in_jenis'];
		$pecah=explode('*',$jns);
		$jenis=$pecah[0];
		$pos=$pecah[1];
			if($_POST['pilih']=='penarikan' and $jenis=='tunai'){
			echo "<marquee height='40' direction='up' behavior='slide'><warning>Akses ditolak...!, pada status penarikan, pemilihan jenis kas tidak bisa dijalankan...!</warning></marquee>";	
		}else{
		if($_POST['pilih']=='jaset' || $_POST['pilih']=='piutang' || $_POST['pilih']=='pKaryawan' || $_POST['pilih']=='pProduksi' || $_POST['pilih']=='pendapatan' || ($_POST['pilih']=='penarikan' && $_POST['in_objek']=='bank')){		
		mysql_query("insert into pembayaran (idbyr,tanggal,status,jenis,pos,kepada,jumlah,masuk,catatan,id) values ('".$_POST['in_idbyr']."','$now','".$_POST['pilih']."','$jenis','$pos','".$_POST['in_objek']."','".$_POST['in_jumlah']."','".$_POST['in_jumlah']."','".$_POST['in_catatan']."','".$_SESSION['id']."')");
		}else if($_POST['pilih']=='aset' || $_POST['pilih']=='pengeluaran' || $_POST['pilih']=='hutang' || $_POST['pilih']=='hKaryawan' || $_POST['pilih']=='hProduksi' || ($_POST['pilih']=='penarikan' && $_POST['in_objek']=='kas')){
		mysql_query("insert into pembayaran (idbyr,tanggal,status,jenis,pos,kepada,jumlah,keluar,catatan,id) values ('".$_POST['in_idbyr']."','$now','".$_POST['pilih']."','$jenis','$pos','".$_POST['in_objek']."','".$_POST['in_jumlah']."','".$_POST['in_jumlah']."','".$_POST['in_catatan']."','".$_SESSION['id']."')");
		}
		//batas inputan ke tabel pembayaran
		if($_POST['pilih']=='hutang'){
		//penjual
		mysql_query("insert into rekap2 (id,tanggal,status,jenis,kepada,byr,catatan) values ('".$_POST['in_idbyr']."','$now','".$_POST['pilih']."','$jenis','".$_POST['in_objek']."','".$_POST['in_jumlah']."', '".$_POST['in_catatan']."')");
		}else{
		if($_POST['pilih']=='hKaryawan' || $_POST['pilih']=='hProduksi'){
				mysql_query("insert into rekap (id,tanggal,status,jenis,kepada,byr2,catatan) values ('".$_POST['in_idbyr']."','$now','".$_POST['pilih']."','$jenis','".$_POST['in_objek']."','".$_POST['in_jumlah']."', '".$_POST['in_catatan']."')");
		}else{
		//pembeli dan lain-lain 
		mysql_query("insert into rekap (id,tanggal,status,jenis,kepada,byr,catatan) values ('".$_POST['in_idbyr']."','$now','".$_POST['pilih']."','$jenis','".$_POST['in_objek']."','".$_POST['in_jumlah']."', '".$_POST['in_catatan']."')");
		}}

		
						echo "<meta http-equiv=Refresh content=0;url=?p=pembayaran>"; 
		}	
		}}
?>
<script language="JavaScript" type="text/JavaScript">
 
 function showObjek()
 {
 <?php
 
 
    // jika dipilih hutang
   echo "if (document.input.pilih.value == 'hutang')";
   echo "{";
 
   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpenjual order by namapenjual";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Penjual--</option>";  
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpenjual']."'>".$data2['idpenjual']." | ".$data2['namapenjual']."</option>";   
   }
   $content .= "\"";
   echo $content;
   echo "}else ";
   echo "if (document.input.pilih.value == 'piutang')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpembeli order by namapembeli";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Pembeli--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpembeli']."'>".$data2['idpembeli']." | ".$data2['namapembeli']."</option>";   
   }
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'pengeluaran')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpengeluaran order by ket";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Kode--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpengeluaran']."'>".$data2['idpengeluaran']." | ".$data2['ket']."</option>";   
   }
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'pKaryawan' || document.input.pilih.value == 'hKaryawan')";
   echo "{";

   // tampilkan data karyawan
   $query2 = "SELECT * FROM tblkaryawan order by namakaryawan";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value=''>--Pilih Karyawan--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idkaryawan']."'>".$data2['idkaryawan']." | ".$data2['namakaryawan']."</option>";   
   }
   $content .= "\"";
   echo $content;


   echo "}else ";
   echo "if (document.input.pilih.value == 'pProduksi' || document.input.pilih.value == 'hProduksi')";
   echo "{";

   // tampilkan data supplier
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='Produksi'>Produksi</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'penarikan')";
   echo "{";

   // tampilkan data switch
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='bank'>Bank</option>"; 
   $content .= "<option value='kas'>Kas</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.input.pilih.value == 'aset' || document.input.pilih.value == 'jaset')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='tetap'>Aset Tetap</option>"; 
   $content .= "\"";
   echo $content;
   
   echo "}else ";
   echo "if (document.input.pilih.value == 'pendapatan')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek').innerHTML = \"";
   $content .= "<option value='bunga bank'>Bunga Bank</option>"; 
   $content .= "<option value='lain-lain'>Lain-lain</option>"; 
   $content .= "\"";
   echo $content;

   echo "}\n";  
 
 ?> 
 }
</script>

<script language="JavaScript" type="text/JavaScript">
 
 function showObjek2()
 {
 <?php
 
 
    // jika dipilih hutang
   echo "if (document.lihat.pilih1.value == 'hutang')";
   echo "{";
 
   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpenjual order by namapenjual";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Penjual--</option>";  
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpenjual']."'>".$data2['idpenjual']." | ".$data2['namapenjual']."</option>";   
   }
   $content .= "\"";
   echo $content;
   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'piutang')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpembeli order by namapembeli";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Pembeli--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpembeli']."'>".$data2['idpembeli']." | ".$data2['namapembeli']."</option>";   
   }
   $content .= "\"";
   echo $content;
   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pengeluaran')";
   echo "{";

   // tampilkan data supplier
   $query2 = "SELECT * FROM tblpengeluaran order by ket";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Kode--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idpengeluaran']."'>".$data2['idpengeluaran']." | ".$data2['ket']."</option>";   
   }
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pKaryawan' || document.lihat.pilih1.value == 'hKaryawan')";
   echo "{";

   // tampilkan data karyawan
   $query2 = "SELECT * FROM tblkaryawan order by namakaryawan";
   $hasil2 = mysql_query($query2);
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value=''>--Pilih Karyawan--</option>"; 
   while ($data2 = mysql_fetch_array($hasil2))
   {
       $content .= "<option value='".$data2['idkaryawan']."'>".$data2['idkaryawan']." | ".$data2['namakaryawan']."</option>";   
   }
   $content .= "\"";
   echo $content;


   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pProduksi' || document.lihat.pilih1.value == 'hProduksi')";
   echo "{";

   // tampilkan data supplier
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='Produksi'>Produksi</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'penarikan')";
   echo "{";

   // tampilkan data switch
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='bank'>Bank</option>"; 
   $content .= "<option value='kas'>Kas</option>"; 
   $content .= "\"";
   echo $content;

   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'aset' || document.lihat.pilih1.value == 'jaset')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='tetap'>Aset Tetap</option>"; 
   $content .= "\"";
   echo $content;
   
   echo "}else ";
   echo "if (document.lihat.pilih1.value == 'pendapatan')";
   echo "{";

   // tampilkan data aset
   $content = "document.getElementById('in_objek1').innerHTML = \"";
   $content .= "<option value='bunga bank'>Bunga Bank</option>"; 
   $content .= "<option value='lain-lain'>Lain-lain</option>"; 
   $content .= "\"";
   echo $content;

   echo "}\n";  
 
 ?> 
 }
</script>


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
<link rel="stylesheet" href="../image/style.css" /><judul>
  <div align="right" class="judul">PEMBAYARAN
</div>
</judul
><table width="100%" border="0">
  <tr valign="top">
  <form id="lihat" name="lihat" method="post" action="?p=data_pembayaran">
    <td colspan="3">
    <p><div align="right">
          <label><strong>LIHAT DATA PER BULAN</strong><br />
          <br />
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
          </select></label>
          - <label>
          <select  name="thn">
            <option value="">-Tahun-</option>
            <option>2011</option>
            <option>2012</option>
            <option>2013</option>
            <option>2014</option>
            <option>2015</option>
            <option>2016</option>
        </select></label> 
          - 
          <label>

          <select name="pilih1" id="pilih1" onchange="showObjek2()">
            <option value="">--Pilih Status--</option>
          <option value="hutang">Hutang</option>
          <option value="piutang">Piutang</option>
          <option value="pengeluaran">Pengeluaran</option>
          <option value="pKaryawan">Piutang Karyawan</option>
          <option value="hKaryawan">Hutang Karyawan</option>
          <option value="pProduksi">Piutang Produksi</option>
          <option value="hProduksi">Hutang Produksi</option>
          <option value="penarikan">Penarikan</option>
          <option value="aset">Aset</option>
          <option value="jaset">Jual Aset</option>
          <option value="pendapatan">Pendapatan</option>
          </select>
          </label>
          - 
          <label>
          <select name="in_objek1" id="in_objek1">
          </select></label>
-<label><select name="jenis" id="jenis">
  <option value="">Jenis</option>
  <option value="tunai">Tunai</option>
  <option value="transfer">Transfer</option>
</select>| </label>
          <input name="lihat" type="submit" id="lihat" value="Lihat"  class="tombol"/>
          </label>
      </div><br />
<hr /></td>
    </form>
  </tr>
  <tr valign="top">
    <td width="65%"><table  width="100%" >

  <tr  >		
    <td width="4%" class="headertbl"><div align="center" ><strong>No</strong></div></td>
    <td width="9%" class="headertbl"><div align="center" ><strong>Tanggal</strong></div></td>
    <td width="14%" class="headertbl"><div align="center" ><strong>Keterangan</strong></div></td>
    <td width="14%" class="headertbl"><div align="center"><strong>Jenis</strong></div></td>
    <td width="15%" class="headertbl"><div align="center" ><strong>Jumlah</strong></div></td>
    <td width="21%" class="headertbl"><div align="center" ><strong>Catatan</strong></div></td>
    <td width="12%" class="headertbl"><div align="center" ><strong>Status</strong></div></td>
    <td width="11%">&nbsp;</td>
  </tr>
  <?
  if(isset($_GET['d'])){
  	mysql_query("DELETE FROM pembayaran WHERE idbyr='".$_GET['d']."'");
  	mysql_query("DELETE FROM rekap WHERE id='".$_GET['d']."'");
  	mysql_query("DELETE FROM rekap2 WHERE id='".$_GET['d']."'");}
	
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
  	$data=mysql_query("select pembayaran.*,tblpembeli.*,tblpenjual.*,tblpengeluaran.*, tblkaryawan.*, bank.* from pembayaran left join tblpembeli on pembayaran.kepada=tblpembeli.idpembeli left join tblpenjual on pembayaran.kepada=tblpenjual.idpenjual left join tblpengeluaran on pembayaran.kepada=tblpengeluaran.idpengeluaran left join tblkaryawan on pembayaran.kepada=tblkaryawan.idkaryawan left join bank on pembayaran.pos=bank.kd_bank where status!='' order by tanggal desc LIMIT $offset, $dataPerPage");
	while($tampil=mysql_fetch_array($data)){
	if($tampil['idbyr']==$_GET['e']){
	
  ?>
  <form name="edit" action="" method="post">  
  <tr bgcolor="#99CCFF">
    <td><label>
      <div align="center">
        <input name="ed_idbyr" type="hidden" id="ed_idbyr"  value="<? echo $tampil['idbyr'];?>"/>
		
        <marquee direction="left" width="10" behavior="alternate" scrolldelay="250"><font color="#FF00FF">&gt;</font></marquee></div>
    </label></td>
    <td ><div align="center"><? echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?></div></td>
    <td ><label><span class="corner10"><? echo $tampil['nama']; echo $tampil['kepada'];?></span></label></td>
    <td><div align="center">
      <select name="ed_jenis" id="ed_jenis">
	  	<option value="<? echo $tampil['jenis']; echo "*"; echo $tampil['pos'];?>"><? echo $tampil['jenis']; echo " | "; echo $tampil['namabank'];?></option>

        <? 
$sqlth = "SELECT * FROM bank ORDER BY kd_bank ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[isi]*$hasilth[kd_bank]'>$hasilth[isi] | $hasilth[namabank]</option>";
} ?>
            </select>
    </div></td>
    <td><div align="right">
      <input name="ed_jumlah" type="text" id="ed_jumlah"   class="angka" value="<? echo $tampil['jumlah'];?>" size="8"/>
    </div></td>
    <td><input name="ed_catatan" type="text" id="ed_catatan"  value="<? echo $tampil['catatan'];?>" size="24"/></td>
    <td><div align="center">
      <input name="ed_status" type="hidden" id="ed_status"  value="<? echo $tampil['status'];?>" size="10"/>
      <? echo $tampil['status'];?></div></td>
    <td><label>
      <input name="edit" type="submit" id="edit" value="Simpan" class="tombol"/>
    </label></td>
  </tr>
  </form>
  <? if($_POST['edit']){
  
  		//pasing nilai dari in_jenis
		$jns1=$_POST['ed_jenis'];
		$pecah1=explode('*',$jns1);
		$jenis1=$pecah1[0];
		$pos1=$pecah1[1];

	mysql_query("UPDATE pembayaran SET jenis='$jenis1', pos='$pos1', jumlah='".$_POST['ed_jumlah']."', catatan='".$_POST['ed_catatan']."', status='".$_POST['ed_status']."', id='".$_SESSION['id']."' WHERE idbyr='".$_POST['ed_idbyr']."'");
	
	if($_POST['ed_status']=='hutang'){//tabel rekap hutang terpisah
	mysql_query("UPDATE rekap2 SET byr='".$_POST['ed_jumlah']."', jenis='$jenis1', catatan='".$_POST['ed_catatan']."' WHERE id='".$_POST['ed_idbyr']."'");
	}else{
		if($_POST['ed_status']=='hKaryawan' || $_POST['ed_status']=='hProduksi'){
	mysql_query("UPDATE rekap SET byr2='".$_POST['ed_jumlah']."', jenis='$jenis1', catatan='".$_POST['ed_catatan']."' WHERE id='".$_POST['ed_idbyr']."'");}else{
	mysql_query("UPDATE rekap SET byr='".$_POST['ed_jumlah']."', jenis='$jenis1', catatan='".$_POST['ed_catatan']."' WHERE id='".$_POST['ed_idbyr']."'");}
	

	
	}
	
	
	
	echo "<meta http-equiv=Refresh content=0;url=?p=pembayaran&amp;page=$noPage>";
	 	
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
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo substr($tampil['tanggal'],8,2); echo"-"; echo substr($tampil['tanggal'],5,2); echo"-"; echo substr($tampil['tanggal'],0,4)?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? if($tampil['status']=='hProduksi' || $tampil['status']=='pProduksi') {echo "Produksi";}else if($tampil['kepada']=='tetap'){echo "Aset Tetap";}else if($tampil['kepada']=='bunga bank'){echo "Bunga Bank";}else if($tampil['kepada']=='lain-lain'){echo "Lain-lain";}else if($tampil['kepada']=='bank'){echo "Bank";}else if($tampil['kepada']=='kas'){echo "Kas";}else{ echo $tampil['namapenjual']; echo $tampil['namapembeli']; echo $tampil['ket']; echo $tampil['namakaryawan'];}?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['jenis']; ?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="right"><? echo number_format($tampil['jumlah'],'','','.')?></div></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><? echo $tampil['catatan'];?></td>
    <td class="corner10"bgcolor="<? echo $warna;?>"><div align="center"><? echo $tampil['status'];?></div></td>
    <td><a href="?p=pembayaran&amp;page=<? echo $noPage;?>&amp;e=<? echo $tampil['idbyr'];?>">edit</a><? if($tampil['level']==1){echo "";}else{?>|<a href="?p=pembayaran&amp;page=<? echo $noPage;?>&amp;d=<? echo $tampil['idbyr'];?>" onClick="return konfirm()">hapus </a><? }?></td>
  </tr>
  <?
  	}}
	?>
  <tr >
    <td colspan="7"><hr /></td>
	<td></td>
  </tr>
  
</table>
	<p align="left">
<? // mencari jumlah semua data dalam tabel 
 
$query   = "SELECT COUNT(*) AS jumData FROM pembayaran";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);
 
$jumData = $data['jumData'];
 
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
 
$jumPage = ceil($jumData/$dataPerPage);
 
// menampilkan link previous
 
if ($noPage > 1) echo  "<a href='?p=pembayaran&page=".($noPage-1)."'>&lt;&lt; Sebelumnya</a>";
 
// memunculkan nomor halaman dan linknya
 
for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='?p=pembayaran&page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}
 
// menampilkan link next
 
if ($noPage < $jumPage) echo "<a href='?p=pembayaran&page=".($noPage+1)."'>Berikutnya &gt;&gt;</a>";
?>
</td>
    <td width="2%">&nbsp;</td>
    <td width="33%">
	<?
	$newNo = "Byr".date("YmdHis",time(now)).rand(100,999);

  ?>
  
  <form  name="input" action="?p=pembayaran" method="post">
	<table   align="right"class="sudut" bgcolor="#eee" border="0">
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
        <td>ID_Pembayaran</td>
        <td>:</td>
        <td><input name="in_idbyr" type="hidden"  id="in_idbyr" size="8" value="<?php echo $newNo; ?>"/>
          <?php echo $newNo; ?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>:</td>
        <td><label>
        <select name="pilih" id="pilih" onChange="showObjek()">
          <option value="<? echo isset($_POST['pilih'])? $_POST['pilih'] : ''?>"><? echo isset($_POST['pilih'])? $_POST['pilih'] : '--Pilih Status--'?></option>
          <option value="hutang">Hutang</option>
          <option value="piutang">Piutang</option>
          <option value="pengeluaran">Pengeluaran</option>
          <option value="pKaryawan">Piutang Karyawan</option>
          <option value="hKaryawan">Hutang Karyawan</option>
          <option value="pProduksi">Piutang Produksi</option>
          <option value="hProduksi">Hutang Produksi</option>
          <option value="penarikan">Penarikan</option>
          <option value="aset">Aset</option>
          <option value="jaset">Jual Aset</option>
          <option value="pendapatan">Pendapatan</option>
        </select><div style="color:red"><? echo isset ($kosong['pilih'])?$kosong['pilih']:''?></div>
        </label></td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td><select name="in_objek" id="in_objek">
		  <option value="<? echo isset($_POST['in_objek'])? $_POST['in_objek'] : ''?>"><? echo isset($_POST['in_objek'])? $_POST['in_objek'] : ''?></option>

                    </select><div style="color:red"><? echo isset ($kosong['in_objek'])?$kosong['in_objek']:''?></div></td>
      </tr>
      <tr>
        <td>Jenis</td>
        <td>:</td>
        <td><select name="in_jenis" id="in_jenis">
          <? 
$sqlth = "SELECT * FROM bank ORDER BY kd_bank ASC";
$prosesth = mysql_query($sqlth);
while($hasilth=mysql_fetch_array($prosesth)) {
echo "<option value='$hasilth[isi]*$hasilth[kd_bank]'>$hasilth[isi] | $hasilth[namabank]</option>";
} ?>
                </select></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><input name="in_jumlah" type="text" id="in_jumlah" size="10"  value="<? echo isset($_POST['in_jumlah'])? $_POST['in_jumlah'] : '';?>"/><div style="color:red"><? echo isset ($kosong['in_jumlah'])?$kosong['in_jumlah']:''?></div></td>
      </tr>
      <tr>
        <td>Catatan</td>
        <td>:</td>
        <td><input name="in_catatan" type="text" id="in_catatan" size="10"  class="corner10"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="tambah" type="submit" id="tambah" value="Tambah"  class="tombol" /></td>
      </tr>
    </table>
  </form></td>
  </tr>
</table>

<p>&nbsp; </p>
