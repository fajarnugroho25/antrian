<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all"> -->
  <style type="text/css" media="print">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
</style>
 </head>

	<?php  foreach ($rad as $b){?>  
		

<body>

<button id="printPageButton" onClick="window.print();">Print</button><br>
<img src="<?php echo base_url();?>public/images/ki.png" width="300" height="48">

<table border="1" >
	<th>
		<table border="1" >
			HASIL PEMERIKSAAN PENUNJANG MEDIS 
			<hr  width="100%">
		</table >  
		
<table border="0">
    <td width="40%" valign="top">
        <table  border="0">
           <tr>
                <td>
                    <label><b>No.RM </b></label>
                </td>
                <td>:</td>
                <td>      
                    <?php echo $b->no_rm; ?>    
                
                </td>               
            </tr>
            
            
            <tr>
                <td  valign="top">
                    <label><b>Nama Pasien</b></label>
                </td>
                <td valign="top">:</td>
                <td width="60%">
                     <?php echo $b->nama_pasien; ?>    
                </td>    
            </tr> 
            </form>   
            <tr>
                <td>
                    <label><b>Tgl Lahir</b></label>
                </td>
                <td>:</td>
                <td>
                     <?php echo $b->tgl_lahir; ?>    
                </td>    
            </tr> 
           
             <tr>
                <td>
                    <label><b>No.Photo</b></label>
                </td>
                <td>:</td>
                <td>
                     <?php echo $b->no_photo; ?>    
                </td>    
            </tr> 

             <tr>
                <td>
                    <label><b>Penjamin</b></label>
                </td>
                <td>:</td>
                <td>
                     <?php echo $b->penjamin; ?>    
                </td>    
            </tr> 
             <tr>
                <td width="40%">
                    <label><b>Jenis Kelamin</b></label>
                </td>
                <td>:</td>
                <td>
                     <?php if($b->kelamin=='P'){ echo "Perempuan";} else {echo "Laki-Laki";} ; ?>    
                </td>    
            </tr> 

           
        </table>
    </td>
    <td width="1%"> &nbsp &nbsp &nbsp &nbsp</td>
    <td width="59%" valign="top">
        <table  border="0">
            
            <tr>
                <td width="40%" >
                    <label><b>No.Order</b></label>
                </td>
                <td>:</td>
                <td>
                   <?php echo $b->id_hasil_rad; ?>    
                </td>    
            </tr> 
           
           <tr>
                <td>
                    <label><b>Tgl Pemeriksaan</b></label>
                </td>
                <td>:</td>
                <td>
                      <?php echo $b->tgl_pemeriksaan; ?>    
                </td>    
            </tr>
            <tr>
                <td valign="top">
                    <label><b>Jenis Pemeriksaan</b></label>
                </td>
                <td valign="top">:</td>
                <td>
                    <?php $jenis=explode(',',$b->jenis_pemeriksa) ?>
                   <?php echo $jenis[0].' '. $jenis[1]; ?>
                </td>    
            </tr>

            <tr>
                <td>
                    <label><b>Dokter Pemeriksa</b></label>
                </td>
                <td>:</td>
                <td>
                    <?php echo $b->dpjp_nama; ?>    
                </td>    
            </tr>

            <tr>
                <td>
                    <label><b>Poliklinik</b></label>
                </td>
                <td>:</td>
                <td>
                    <?php echo $b->nama_poli; ?>    
                </td>    
            </tr>  
                    

            

            <tr>
                <td valign="top">
                    <label><b>Alamat</b></label>
                </td>
                <td valign="top">:</td>
                <td>
                   <?php echo $b->alamat; ?>    
                </td>    
            </tr>
            

              
                  
       
          
            
           
            
        </table>
    </td>


 </table>  
		<hr  width="100%">

	<div align="left">
	<?php echo $b->hasil; ?>
	<div>

	<table border="0">		
		<div class="wpr rt" style="Margin-left: 500px;">
				
					<p align="center" >
						Dokter Pemeriksa
						<br>  
						<br>  
						<br>
						<br>
						<br>
						<br>
						<?php echo $b->dpjp_nama; ?> 
						<br>
						
					</p>
				
		</div>
	
	
			
                 
</table>


	</th>

</table>


                    <?php  } ?>

</body>






