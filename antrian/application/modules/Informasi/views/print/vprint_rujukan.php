<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all"> -->
  <style type="text/css" media="print">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
</style>
 </head>



<body>
<button id="printPageButton" onClick="window.print();">Print</button>
<table border="1" width="608" >
	<th>
		<table border="0" align="center">
			<td>		
				<img src="<?php echo base_url();?>public/images/ki.png" width="400" height="60">
			    <b><center>SURAT RUJUK BALIK </BR> PASIEN PESERTA BPJS KESEHATAN</center> </b>
			</td> 
		</table >   
	
		<?php  foreach ($pasien as $b){?>  
		<?php	
			$tgl_balik = date_create($b->tgl_balik);
			$tgl_lahir = date_create($b->tgl_lahir);
		?>	
		<hr / width="100%">
		<table border="0" width="600"> 
				
			<tr>
				<td width="70">No Surat</td>
				<td>:</td>
				<td><b><?php echo $b->no_surat; ?></b></td>
				<td>Kepada Yth :</td>
			</tr>  
			
			<tr>
				<td>No RM</td>
				<td>:</td>
				<td><?php echo $b->no_rm; ?></td>
				<td ><?php echo $b->kepada; ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $b->nama; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $b->alamat; ?></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td>
				<td>:</td>
				<td><?php echo date_format($tgl_lahir,'d-m-Y'); ?></td>
			</tr>
		</table>
		</br>
		
		<table border="0" >			
			<tr>
				<td valign="top" width="80">Diagnosa :</td>				
				<td align="left"><?php echo nl2br($b->diagnosa); ?></td>	
			</tr>			
		</table>
		<table border="0">
			<tr>
				<td><b>Sudah dilakukan pemeriksaan,  tindak lanjut yang dianjurkan :</b></td>	
			</tr>
			<tr>	
				<td>&bull; Kontrol Kembali ke RS pada Tanggal <?php echo date_format($tgl_balik,'d-m-Y'); ?></td>
			</tr>
			<tr>	
				<td>&bull; Konsultasi Selesai</td>
			</tr>
			<tr>	
				<td>&bull; Terapi dengan obat-obatan, sebagai berikut</td>
			</tr>
		</table>
		<table border="0" >				
			<tr>
				<td valign="top">&bull; Obat :</td>
				<td ><?php echo nl2br($b->obat); ?></td>					
			</tr>
			
		</table>
		<table>	
			<tr>	
				<td>- Kontak Dokter yang merawat</td>
			</tr>
			<tr>	
				<td>
					<ul>
					  <li>Dokter <?php echo $b->nama_dokter; ?></li>
					  <li>Telp (0271) 7144222</li>					 
					</ul>  
				</td>
			</tr>
		</table >
		
		<table border="0">
			<tr>
				<td><b>Terima kasih atas kepercayaan Sejawat mengirim ke Rumah Sakit kami,</b></td>	
			</tr>			
		</table >
		</br>
		<table border="0">
			<tr>
				<td><b>Keterangan :</b></td>	
			</tr>
			<tr>	
				<td><?php echo $b->keterangan; ?></td>
			</tr>
		</table>
	 	</br>
		
		
		<div class="wpr rt" style="Margin-left: 230px;">
				<div class="npm">
					<p align="center" >
						Surakarta, <?php echo date("d-m-Y") ?> 
						<br>  
						<br>  
						<br>
						<br>
						<br>
						<br>
						<?php echo $b->nama_dokter; ?> 
						<br>
						(Ttd dan Nama DPJP) 
					</p>
				</div>
		</div>
		
		
		
	</th>
</table>		
		  
				
                    <?php  } ?>


	


</body>





