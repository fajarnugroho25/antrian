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
			    <b><center>SURAT KETERANGAN DOKTER </BR> PASIEN PESERTA BPJS KESEHATAN</center> </b>
			</td> 
		</table >   
	
		<?php  foreach ($pasien as $b){?>  
		<?php	
			$tgl_penggunaan = date_create($b->tgl_penggunaan);
			$tgl_lahir = date_create($b->tgl_lahir);
		?>	
		<hr / width="100%">
		<table border="0" width="250"> 
				
			<tr>
				<td>No Surat</td>
				<td>:</td>
				<td><b><?php echo $b->no_surat; ?></b></td>
			</tr>  
			
			<tr>
				<td>No RM</td>
				<td>:</td>
				<td><?php echo $b->no_rm; ?></td>
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
				<td width="150">Diagnosa Primer</td>
				<td>:</td>
				<td><?php echo $b->diag_primer; ?></td>
			</tr>
					
			<tr>
				<td valign="top">Diagnosa Sekunder</td>
				<td valign="top">:</td>
				<td ><?php echo nl2br($b->diag_sekunder); ?></td>					
			</tr>			
		</table>
		</br>
		<table>
			<tr>
				<td><b>Tanggal Surat Rujukan</b></td>
				<td>:</td>
				<td><?php echo date("d-m-Y") ?></td>
			</tr>
		</table>
		</br>
		<table border="0">
			<tr>
				<td><b>Belum dapat dikembalikan ke Fasilitas Perujuk dengan alasan :</b></td>	
			</tr>
			<tr>	
				<td><?php echo $b->alasan; ?></td>
			</tr>
		</table >
		</br>
		<table border="0">
			<tr>
				<td><b>Rencana tindak lanjut yang akan dilakukan pada kunjungan selanjutnya :</b></td>	
			</tr>
			<tr>	
				<td><?php echo $b->rencana; ?></td>
			</tr>
		</table>
	 	</br>
		<table border="0">
			<tr>
				<td><b>Surat Keterangan ini diginakan untuk 1 (satu) kali kunjungan dengan diagnosa diatas pada :</b></td>	
			</tr>
			<tr>
				<td>Tanggal : <?php echo date_format($tgl_penggunaan,'d-M-Y'); ?></td>
			</tr>	
		</table>
		
		<div class="wpr rt" style="Margin-left: 230px;">
				<div class="npm">
					<p align="center" >
						Surakarta, <?php echo date("d-M-Y") ?> 
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





