<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css" media="print"  > 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all">  -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css" media="all"  >
 </head>
<body>
	<button id="printPageButton" onClick="window.print();">Print</button>
    <center><h2>Laporan Rekap </h2></center>
        

 <center>
		<table >
			
				<tr>			
					<th>No</th>
					<th>Nama Dokter</th>
					<th>Nama Operasi</th>
					<th>Jumlah Pasien</th>			
					
				</tr>
			
			        <?php $no=1;
			        foreach ($pasien as $b){  
			        ?> 
				<tr>		
				
					<td><?php echo $no; ?></td>
					<td><?php echo $b->nama_dokter; ?></td>
					<td><?php echo $b->nama_operasi; ?></td>
					<td align="right"><?php echo $b->jumlah; ?></td>
					
                    					   
				</tr>
                             <?php $no++; } ?>
			
		</table>
 </center>
</body>





