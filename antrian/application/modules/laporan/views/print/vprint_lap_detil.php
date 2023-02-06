<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all">
  <style type="text/css" media="print">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
</style>
 </head>

<body>
	<button id="printPageButton" onClick="window.print();">Print</button>
    <center><h2>Laporan Rinci Antrian Operasi </h2></center>        

 <center>
		<table >
			
				<tr>			
					<th>No</th>
					<th>No RM</th>
					<th>Nama Pasien</th>
					<!-- <th>Alamat</th> -->
					<th>Kelas Diminta</th>
					<th>No Tlp</th>
					<th>Operasi</th>
					<th>Dokter</th>	
					<th>Penanggung</th>					
					<th>Tanggal Antri</th>
					<th>Tanggal Realisasi</th>	
					<th>Lama Tunggu</th>
					<th>Keterangan</th>
						
					
				</tr>
			
			        <?php $no=1;
			        foreach ($pasien as $b){  
			        ?> 
				<tr>		
				<?php  
				if($b->tgl_real=='-'){$selisih ='0';} else {
					$tgl_real = date_create($b->tgl_real);
					$date1=date_create($b->tgl_antri);
					$date2=date_create($b->tgl_real);
					$diff=date_diff($date1,$date2);
					$selisih =  $diff->format('%d');}
				?>	
					<td><?php echo $no; ?></td>
					<td><?php echo $b->no_rm; ?></td>
					<td><?php echo $b->nama; ?></td>
					<td><?php echo $b->kelas_diminta; ?></td>
					<td><?php echo $b->telp; ?></td>					
					<td><?php echo $b->nama_operasi; ?></td>
					<td><?php echo $b->nama_dokter; ?></td> 
					<td><?php echo $b->nama_penanggung ?></td>       
					<td><?php echo $b->tgl_antri; ?></td> 
					<td><?php echo $b->tgl_real ?></td>  
					<td><?php echo "$selisih Hari"; ?></td> 
					<td><?php if($selisih>2){echo "Lebih Dari 2 Hari";}else{echo "Kurang Dari 2 Hari";} ?></td> 
					
                    					   
				</tr>
                             <?php $no++; } ?>
			
		</table>

 </center>

				

</body>





