<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap.css?ts=<?=time()?>">   -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style2.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css?ts=<?= time() ?>" media="all"> -->
    <style type="text/css" media="print">
        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

    
    </style>
 </head>

	
		

<body>

<button id="printPageButton" onClick="window.print();">Print</button><br>

<?php  foreach ($pasien as $b){?> 

     <?php $jdarah = $b->jdarah;;

            if ($jdarah == '1') {
                $isi = 'PRC';
            }
            else{
                $isi = 'WB';
            }
             ?>
<img src="<?php echo base_url();?>public/images/bd.JPG" style="margin-left: 30px" width="500" height="150">
<table width="62%">
	<th>

<br><br>	
		
<table border="0" class="identitas">

    <td width="50%">

        <table  border="0">
            <tr>
                <td >
                    <label><b>Nama Pasien</b></label>
                </td>
                <td >:</td>
                <td width="55%">
                     <?php echo $b->nama_pasien; ?>    
                </td>    
            </tr> 
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
                <td valign="top">
                    <label ><b>Alamat</b></label>
                </td>
                <td valign="top">:</td>
                <td>      
                    <?php echo $b->alamat; ?>    
                
                </td>               
            </tr>

           <tr>
                <td>
                    <label><b>Nama Dokter</b></label>
                </td>
                <td>:</td>
                <td>      
                    <?php echo $b->nama_dokter; ?>    
                
                </td>               
            </tr>
            
            
            
            </form>   
            
           
             <tr>
                <td>
                    <label><b>Jenis Darah</b></label>
                </td>
                <td>:</td>
                <td>
                     <?php echo $isi; ?>    
                </td>    
            </tr> 

             
            

           
        </table>
    </td>
    <td width="1%"> &nbsp &nbsp &nbsp &nbsp</td>
    <td width="50%" valign="top">
        
        <table  border="0">
            
            <tr>
                <td width="55%" >
                    <label><b>No.RM</b></label>
                </td>
                <td>:</td>
                <td>
                   <?php echo $b->no_rm; ?>    
                </td>    
            </tr> 
           
           <tr>
                <td>
                    <label><b>No.Pemeriksaan</b></label>
                </td>
                <td>:</td>
                <td>
                      <?php echo $b->no_pemeriksaan; ?>    
                </td>    
            </tr>
            <tr>
                <td >
                    <label><b>Tgl/ Jam Pemeriksaan</b></label>
                </td>
                <td >:</td>
                <td>
                    <?php echo $b->tgl_pemeriksaan; ?>
                </td>    
            </tr>

            <tr>
                <td>
                    <label><b>Tgl/ Jam Selesai</b></label>
                </td>
                <td>:</td>
                <td>
                    <?php echo $b->tgl_selesai; ?>    
                </td>    
            </tr>

            <tr>
                <td>
                    <label><b>Ruang</b></label>
                </td>
                <td>:</td>
                <td>
                    <?php echo $b->ruangan; ?>    
                </td>    
            </tr>  
                    
            

        </table>

    </td>

                    <?php  } ?>

 </table>  

        <br><br><br>
		<!-- <hr  width="100%"> -->
        <table>
            HASIL PEMERIKSAAN UJI COCOK SERASI (CROSS MATCHING)
            <!-- <hr  width="100%"> -->
        </table>  
    <br><br>
	<div align="left">
	
	<div>

	<table class="table1" width="110%" >

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr  >

            <th rowspan="3">Identitas</th>
            <th colspan="7">Pemeriksaan Golongan Darah</th>
             <th colspan="4">Pemeriksaan Uji Cocok Serasi</th>
             <th rowspan="3">Keterangan</th>

        </tr>
        <tr>

            <th colspan="2">Anti</th>

            <th colspan="3">Sel</th>
            <th rowspan="2">Anti D</th>
            <th rowspan="2">Gol/Rh</th>
            <th colspan="4">Gel Test</th>

        </tr>
        <tr>
            <th>-A</th>
            <th>-B</th>



            <th>A</th>
            <th>B</th>
            <th>O</th>


            <th>Mayor</th>
            <th>Minor</th>
            <th>AC</th>
            <th>AP</th>



        </tr>
        </thead>
        <tbody >
            <?php foreach ($datahasil as $HB ): ?>
                <?php $ket = $HB->keterangan;;

            if ($ket == '1') {
                $isi = 'Compatible';
            }
            else if($ket == '2'){
                $isi = 'Incompatible';
            }
            else{
                $isi = '';
            }
             ?>
            <tr>

                <td><?php echo $HB->identitas; ?> </td>
                <td><?php echo $HB->minA1; ?></td>
                <td><?php echo $HB->plusA1; ?></td>
                <td><?php echo $HB->A1; ?></td>
                <td><?php echo $HB->B1; ?></td>
                <td><?php echo $HB->O1; ?></td>
                <td><?php echo $HB->AntiD1; ?></td>
                <td><?php echo $HB->RH1; ?></td>
                <td><?php echo $HB->mayor1; ?></td>
                <td><?php echo $HB->minor1; ?></td>
                <td><?php echo $HB->ac1; ?></td>
                <td><?php echo $HB->ap1; ?></td>
                <td><?php echo $isi; ?></td></tr>
                <?php endforeach ?>

        </tbody>


    </table>
    <br><br>
    <table border="0">      
        <div class="wpr rt" style="Margin-left: 65%;">
                    <p align="center" >
                        Pemeriksa
                        <br>  
                        <br>  
                        <br>
                        <br>
                        <br>
                        <br>
                        (<?php echo $b->pemeriksa_bd; ?>)
                        <br>
                        
                    </p>
                
        </div>
    
    
            
                 
</table>


	</th>

</table>





</body>






