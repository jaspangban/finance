<judul>
  <div align="right" class="judul">PIUTANG PRODUKSI
</div>
</judul>
<p>

<table  >
        <tr>
          <td width="5%" height="28" class="headertbl"><div align="center"><strong>No</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Hutang</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Bayar</strong></div></td>
          <td width="16%" class="headertbl"><div align="center"><strong>Piutang</strong></div></td>
        </tr>
       <?
	   
   
	   $no=1;
		
	   $sql=mysql_query("SELECT sum(byr) as bayar, sum(byr2) as hutang, sum(sisa) as sisastart FROM rekap where status='hProduksi' || status='pProduksi' group by kepada");
	   while($tampil=mysql_fetch_array($sql)){ 
	   $saldo=($tampil['hutang']+$tampil['sisastart'])-$tampil['bayar'];
//belang
	   	if(($no % 2) == 0){
		$warna="#eee";}
	else{
		$warna="#ccc";}

	   ?>
	   
	    <tr >
	      <td bgcolor="<? echo $warna;?>" ><div align="center"><? echo $no++;?></div></td>
          <td bgcolor="<? echo $warna;?>" ><div align="right"><? echo number_format($tampil['hutang']+$tampil['sisastart'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" ><div align="right"><? echo number_format($tampil['bayar'],'','','.');?></div></td>
          <td bgcolor="<? echo $warna;?>" ><div align="right"><? if($saldo<0){echo "<sekarang>"; echo number_format($saldo,'','','.'); echo "</sekarang>";} else {echo number_format($saldo,'','','.');}?></div></td>
        </tr>
	    <tr >
	      <td colspan="4" ><hr /></td>
  </tr>
	    <? }?>
	    <? 
 $sql=mysql_query("SELECT sum(byr) as gbayar, sum(byr2) as ghutang, sum(sisa) as gsisastart FROM rekap where status='hProduksi' || status='pProduksi'");
	   
	   $tampil=mysql_fetch_array($sql);
	   $sld=($tampil['ghutang']+$tampil['gsisastart'])-$tampil['gbayar'];
?>
</table>
