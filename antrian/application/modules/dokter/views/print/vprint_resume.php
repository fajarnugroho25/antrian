<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all"> -->
  <style type="text/css" media="print">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
</style>
 </head>

	<?php  foreach ($resume as $b){?>  
		

<body>

<button id="printPageButton" onClick="window.print();">Print</button><br>
<img src="<?php echo base_url();?>public/images/ki.png" width="300" height="40">

<table border="1" >
	<th>
		<table border="0" align="center">
			RESUME MEDIS
			<hr  width="100%">
		</table >  
		<table border="0" >
			<th width="100" valign="top" align="left">
				Label Pasien
				<li>No.RM</li>
				<li>Nama </li> 
				<li>Umur </li>				
				<li>Alamat </li>
			</th>
		
			<th width="600" align="left">
				<br>

				: <?php echo $b->no_rm; ?><br>
				: <?php echo $b->nama_pasien; ?> <br> 
				:		<br>
				: <?php echo $b->alamat; ?><br>
			</th>
			<th width="150" valign="top" align="left">
				<br>
				Ruang :<?php echo $b->ruang; ?>				
			</th>
		</table> 
		<hr  width="100%">


		<table border="0" width="100%" >
	
			<th width="50%" align="left">
			Tanggal Masuk : <?php echo $b->tgl_masuk; ?>
			</th>
			<th width="50%" valign="top" align="left" >
			Tanggal Keluar	: <?php echo $b->tgl_keluar; ?>			
			</th>
		</table> 
	
	
		<hr  width="100%">
		<table border="0" width="875" cellspacing="10">  
				
			<tr>
				<td width="350">1.Diagnosis Sementara</td>
				<td>:</td>
				<td><?php echo $b->diag_sementara; ?></td>				
			</tr>  
			
			<tr>
				<td>2.Sebab Dirawat</td>
				<td>:</td>
				<td><?php echo $b->sebab_dirawat; ?></td>				
			</tr>
			<tr>
				<td>3.Penemuan Fisik Yang Penting</td>
				<td>:</td>
				<td><?php echo $b->penemuan_fisik; ?></td>
			</tr>
			<tr>
				<td>4.Pemeriksaan Penunjang / Diagnostik Terpenting</td>
				<td>:</td>
				<td><?php echo $b->diag_terpenting; ?></td>
			</tr>
			<tr>
				<td>5.Terapi / Pengobatan Selama Di Rumah Sakit</td>
				<td>:</td>
				<td><?php echo $b->terapi; ?></td>
			</tr>
			<tr>
				<td>6.Diagnosis Utama</td>
				<td>:</td>
				<td><?php echo $b->nama_diag_utama; ?></td>
			</tr>
			<tr>
				<td valign="top">7.Diagnosis Sekunder</td>
				<td valign="top">:</td>
				<td>
					-<?php echo $b->nama_diag_sekunder1; ?> <br>
					-<?php echo $b->nama_diag_sekunder2; ?> <br>
					-<?php echo $b->nama_diag_sekunder3; ?> <br>
				</td>

			</tr>
			<tr>
				<td valign="top">8.Tindakan / Prosedur Yang Telah Dilakukan</td>
				<td valign="top">:</td>
				<td>					
					-<?php echo $b->nama_tindakan_dilakukan1; ?> <br>
					-<?php echo $b->nama_tindakan_dilakukan2; ?> <br>
					-<?php echo $b->nama_tindakan_dilakukan3; ?> <br>					
				</td>
			</tr>
			<tr>
				<td>9.Diet</td>
				<td>:</td>
				<td><?php echo $b->diet; ?></td>
			</tr>
			<tr>
				<td>10.Instruksi Atau Anjuran Dan Edukasi </td>
				<td>:</td>
				<td><?php echo $b->anjuran_edukasi; ?></td>
			</tr>
		</table>
		</br>
		
		<table border="0" >			
			<tr>
				<td valign="top" width="180">Kondisi Waktu Keluar :</td>				
				<td align="left"><?php echo $b->kondisi_keluar; ?></td>	
			</tr>			
		</table>
	
	<table border="0">		
		<div class="wpr rt" style="Margin-left: 500px;">
				
					<p align="center" >
						Surakarta, <?php echo date("d-m-Y") ?> 
						<br>  
						<br>  
						<br>
						<br>
						<br>
						<br>
						<?php echo $b->dpjp_nama; ?> 
						<br>
						(Tandatangan & Nama Dokter) 
					</p>
				
		</div>
		
		<table border="0" >	

			<tr>
				
				<td valign="top" width="80"><small>Lembar 1 :</small></td>	 			
				<td align="left"><small>Rumah Sakit</small></td>
								
			</tr>			
			<tr>
				<td valign="top" width="80"><small>Lembar 2 :</small></td>				
				<td align="left"><small>Pasien</small></td>
			</tr>
			<tr>
				<td valign="top" width="80"><small>Lembar 3 :</small></td>				
				<td align="left"><small>Penjamin</small></td>				
			</tr>
		</table>

		<small>MOHON UNTUK TIDAK MENGGUNAKAN SINGKATAN DALAM PENULISAN DIAGNOSIS DAN TINDAKAN SERTA DITULIS DENGAN RAPIH </small>
	
			
                 
</table>


	</th>

</table>


                    <?php  } ?>

</body>






