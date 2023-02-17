<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all"> -->
  <!-- <script src="<?=base_url('assets/js/jquery.min.js')?>"></script> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
  <script>var base_url = '<?php echo base_url() ?>'</script>
  <style type="text/css" media="print">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    @media print {
  #printPageButton {
    display: none;
  }

  @media print {
  #submitNomor {
    display: none;
  }
</style>

<style type="text/css">

table, td, th {  
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 3px;
}
th {
    text-align: center;
}

input {
    background-color: transparent;
    border: 0px solid;
    height: 20px;
    width: 160px;
}
</style>
 </head>

	


<body>

    <input type="" name="getnomor" hidden="true" value="<?php echo $this->uri->segment(3)?>" >



<button id="printPageButton" onClick="window.print();">Print</button><br>
<table border="2">
    <tr>
        <td>
<table >
    <tr>
      <td>
            <p>No:</br>     
Hal : <?=$pengajuan->jenis_cuti?></p>
               
        </td>
        <td>
            <p style="margin-left: 50%"> </p>
               
        </td>
    </tr>
    <tr>
      <td>
               
        </td>
        <td>
            <p style="margin-left: 50%"> Kepada <br>
            Yth. Bapak/Ibu Direktur <br>
            Rumah Sakit KASIH IBU <br>
            di <u>SURAKARTA</u> </p>
               
        </td>
    </tr>
</table>


<table>
    <td>
        <table  style="width: 80%; margin-left: 15%">
            
            <tr>
              <td>1</td>
                <td>
                    <label>Nama</label>
                </td>
                <td>:</td>
                <td><?=$pengajuan->nama?></td>
                  
            </tr> 
         
            <tr>
              <td>2</td>
                <td>
                    <label>Bagian</label>
                </td>
                <td>:</td>
                <td><?=$pengajuan->unit_nama?></td>
                
            </tr> 

            <tr>
              <td>3 &nbsp;a.</td>
                <td>
                    <label>Mohon Ijin Cuti </label>
                </td>
                <td>:</td>
                <td><?=$pengajuan->mohonizinhari?>&emsp; Hari&emsp; (<?=$pengajuan->mohonizintglawal?>&emsp; s/d &emsp; <?=$pengajuan->mohonizintglakhir?>)</td>
                 
            </tr> 

            <tr>
              <td>&emsp;b.</td>
                <td>
                    <label>Diijinkan </label>
                </td>
                <td>:</td>
                <td><?=$pengajuan->diizinkanhari ?>&emsp; Hari&emsp; (<?=$pengajuan->diizinkantglawal?>&emsp; s/d &emsp; <?=$pengajuan->diizinkantglakhir?>) </td>
                
            </tr> 
            <tr>
              <td>4</td>
                <td>
                    <label>Keperluan</label>
                </td>
                <td>:</td>
                <td><?=$pengajuan->keperluan ?>  </td>
                  
            </tr> 
            <tr>
              <td>5</td>
                <td>
                  <?php if ($pengajuan->jenis_cuti == 'Cuti Besar') { ?>
                    <label>Sisa Cuti Besar Sampai Dengan Tahun</label>
                  <?php } 
                  else { ?>
                    <label>Sisa Cuti Tahun</label>
                  <?php } ?> 
                </td>
                <td>:</td>
                <td><?php if ($pengajuan->jenis_cuti == 'Cuti Besar') {
                  echo date('Y', strtotime($pengajuan->tglawalcb)) + 6;
                }
                else {
                echo $pengajuan->sisacutitahun;
                }?>
              </td>
                   
            </tr> 
           


           
        </table>
        <br><br>



            <table width="100%">
            <tr>
              <td style="text-align: center;">
                <p>Mengetahui <br> Bagian Personalia </p>
                        <?php $ttd = explode("|", $pengajuan->mengetahui); 
                if ($pengajuan->mengetahui != ''): ?>
                  <?php 
                $nama = $ttd[0];
                $bag = $ttd[1];
                $td = $ttd[2];
                 ?>
                <?php if ($td == ''): ?>
                  <p></p>
                  <?php else: ?>
                    <img style="width: 100px" src="<?=base_url()?>public/images/<?=$td?>"><br>
                   
                 <?php endif ?>
                <u><?=$nama?></u><br>
                <?=$bag?>
                <?php else: ?>
                  <br>
                  <p>(..................)</p>
                  
                <?php endif ?>
                        
              </td>
              <td style="text-align: center;">


                
                <p>Menyetujui <br> Ka. Bag/Manajer/Direktur </p>
                <?php $ttd = explode("|", $pengajuan->menyetujui); 
                if ($pengajuan->menyetujui != ''): ?>
                	<?php 
                $nama = $ttd[0];
                $bag = $ttd[1];
                $td = $ttd[2];
                 ?>
                    <?php if ($td == ''): ?>
                  <p></p>
                  <?php else: ?>
                    <img style="width: 100px" src="<?=base_url()?>public/images/<?=$td?>"><br>
                   
                 <?php endif ?>
                <u><?=$nama?></u><br>
                <?=$bag?>
                <?php else: ?>
                	<br>
                	<p>(..................)</p>
                	
                <?php endif ?>
                
              </td>
              <td style="text-align: center;">




              	<p>Yang Mengajukan <br> Permohonan</p>
              
                
                  <p></p>
              
      
                    <br>
                  <?php if ($pengajuan->yangmemohon != ''): ?>
                    <p>(<?=$pengajuan->yangmemohon?>)</p>
                    <?php else: ?>
                      <p>(..................)</p>
                  <?php endif ?>
               
                	
                	
                        
              </td>
              
            </tr>

        </table>

        </td>
        </tr>
   

	</table>
    <br><br>
     <!-- <button class="btn btn-primary" id="submitNomor" type="submit">Save Nomor</button> -->
      <input type="" name="getstatus" hidden="true" value="<?php echo $this->session->userdata('status_perizinan')?>" >
     
  <?php $unituser = $get->unituser; 

    if ($unituser == '510'): ?>
       <button class="btn btn-primary" id="submitkonfirmasi" type="submit">Konfirmasi</button>
        
    <?php endif ?>

</body>


<script type="text/javascript">

    $(document).on("click", "#submitkonfirmasi", function(){
        var data ={
         idcuti :$('input[name=getnomor]').val(),
       }


        url = "<?php echo base_url();?>pengajuancuti/KonfirmasiCuti";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                   // console.log(Data);
                alert('Data Telah Dikonfirmasi');
                document.location = "<?php echo base_url();?>pengajuancuti/daftarcutikaryawan";
           
                },
                error:function(){

                }
            });
    });




    
</script>





