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
  padding: 5px;
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
<table>
    <tr>
        <td style="padding-left: 0px">
            <img src="<?php echo base_url();?>public/images/rskialamat.png" width="300" height="60">
        </td>
        <td style="padding-right: 0px">
                <p> Nomor : <?php echo $get->nomor ?>
                <br>
                <?php $date = new DateTime($get->tanggal_input) ?>
                Tanggal :<?php echo $date->format('d-m-Y');?>
            </p>
        </td>
    </tr>
</table>


<h3 style="text-align: center;">SURAT PERINTAH MUTASI BARANG INVENTARIS</h3>
<p>Kepada Yth : <?php echo $get->unit_nama ?> </br>      
Harap Barang-Barang dibawah ini diserahakan Kepada : <?php echo $get->nama_gudang ?> </br>
Pada Tanggal : <?php echo $date->format('d-m-Y');?></br> Alasan Mutasi : <?php echo $get->alasan_mutasi ?></p>


			



        <table  border="2">
           
        <tr> 
          <th style="width: 5%">No Urut </th>
            <th style="width: 10%">No. Kode Barang</th>
            <th style="width: 50% ">Nama Barang</th>
            <th style="width: 5%">Kuantitas</th>
            <th style="width: 5%">Satuan</th>
            <th style="width: 30%">Keterangan</th>
        </tr>
      <tbody >
        <?php $no=1;?>
        <?php  foreach ($mutasi as $M){?>
        <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $M->nokodebarang; ?></td>          
          <td><?php echo $M->nama_barang; ?></td> 
          <td><?php echo $M->kuantitas; ?></td>
          <td><?php echo $M->satuan; ?></td>
          <td><?php echo $M->keterangan; ?></td>

        </tr>
        <?php } ?>

      </tbody>


        </table>

            <table width="100%" >
            <tr>
              <td style="text-align: center;">
                <?php $ttd = explode("|", $get->ttdpenerima);
                if ($get->ttdpenerima != ''): ?>

                <?php
                $nama = $ttd[0];
                $bag = $ttd[1];
                $td = $ttd[2];
                 ?>
                <p>Diterima Oleh : </p>
                  <?php if ($td == ''): ?>
                  <p></p>
                  <?php else: ?>
                    <img style="width: 100px" src="<?=base_url()?>public/images/<?=$td?>"><br>
                   
                 <?php endif ?>
                        

                       <u><?=$nama?></u><br>
                        <?=$bag?>

                 <?php else: ?>
                  <br>
                  <p style="text-decoration: overline;">...........</p>
                  
                <?php endif ?>
                        
              </td>
              <td style="text-align: center;">

                

                
                <p>Dibuat Oleh : </p>

                <?php $ttd = explode("|", $get->ttdrt);
                if ($get->ttdrt != ''): ?>
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
                  <p style="text-decoration: overline;">Manager Umum</p>
                  
                <?php endif ?>
              </td>
            </tr>
        </table>

        </td>
        </tr>
   

	</table>
    <p>Rangkap 3 : 1. Penerima Perintah </br>
    &emsp;&emsp;&emsp;&emsp;&ensp;&ensp;2. Bagian Akuntansi & Keuangan </br>
    &emsp;&emsp;&emsp;&emsp;&ensp;&ensp;3. Arsip</p>

    <br><br>
    <?php $status = $this->session->userdata('status_perizinan');
    if ($status == 1): ?>
       <button class="btn btn-primary" id="submitkonfirmasi" type="submit">Konfirmasi</button>
    <?php else: ?>
      
    <?php endif ?>
    



</body>


<script type="text/javascript">

    $(document).on("click", "#submitkonfirmasi", function(){
        var data ={
         getnomor :$('input[name=getnomor]').val()
         
        
       }
        url = "<?php echo base_url();?>mutasi/edittd";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                   // console.log(Data);
                alert('Data Telah Dikonfirmasi');
                document.location = "<?php echo base_url();?>mutasi/dataKirimMutasi";
           
                },
                error:function(){

                }
            });
    });
    
</script>





