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
<table>
    <tr>
        <td style="padding-left: 0px">
            <img src="<?php echo base_url();?>public/images/rskialamat.png" width="300" height="60">
        </td>
        <td style="padding-right: 0px">
            
                <?php $date = new DateTime($get->tanggal) ?>
                Tanggal :<?php echo $date->format('d-m-Y');?>
            </p>
        </td>
    </tr>
</table>


<h3 style="text-align: center;">LAPORAN PENJUALAN / PEMUSNAHAN INVENTARIS</h3>
<p style="text-align: center;">Bagian: <?php echo $get->nama_gudang ?> </p>

        <table  border="2">
           
        <tr> 
          <th style="width: 5%">No Urut </th>
            <th style="width: 10%">No Inventaris</th>
            <th style="width: 50% ">Nama Barang</th>
            <th style="width: 5%">Kuantitas</th>
            <th style="width: 5%">Satuan</th>
            <th style="width: 30%">Keterangan</th>
        </tr>
      <tbody >
        <?php $no=1;?>
        <?php  foreach ($jual as $j){?>
        
       
        <tr>   
          <td><?php echo $no++;?></td>
          <td><div contenteditable class="update" data-id="<?php echo $j->noinventaris; ?>" data-column="nokodebarang"><?php echo $j->noinventaris; ?></div></td>          
          <td><?php echo $j->namabarang; ?></td> 
          <td><?php echo $j->kuantitas; ?></td>
          <td><?php echo $j->satuan; ?></td>
          <?php if ($j->dijual ==1) {
              ?>  <td><?php  echo "Dijual ->". $j->keterangan;?></td>
          <?php }elseif ($j->dijual ==2) { ?>
                 <td><?php echo "Dimusnahkan ->". $j->keterangan;?></td>
          <?php } ?>

          

        </tr>
        <?php } ?>

      </tbody>


        </table>

            <table width="100%">
            <tr>
              <td style="text-align: center;">
                <p>Dibukukan Oleh : </p>
                        <?php $ttd = explode("|", $get->ttddibukakan); 
                if ($get->ttddibukakan != ''): ?>
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
                  <p style="text-decoration: overline;">Bag.Akuntansi & Keuangan</p>
                  
                <?php endif ?>
                        
              </td>
              <td style="text-align: center;">


                
                <p>Diketahui Oleh : </p>
                <?php $ttd = explode("|", $get->ttddiket); 
                if ($get->ttddiket != ''): ?>
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
                	<p style="text-decoration: overline;">Wakil Direktur Umum Dan Keuangan</p>
                	
                <?php endif ?>
                
              </td>
              <td style="text-align: center;">




              	<p>Disetujui Oleh : </p>
                <?php $ttd = explode("|", $get->ttdditerima);
                if ($get->ttdditerima != ''): ?>

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
                	<p style="text-decoration: overline;">Manager umum</p>
                	
                <?php endif ?>
                        
              </td>
              <td style="text-align: center;">





                <p>Dibuat Oleh : </p>

                <?php $ttd = explode("|", $get->ttddibuat);
                if ($get->ttddibuat != ''): ?>

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
                	<p style="text-decoration: overline;">Kasi Rumah Tangga</p>
                	
                <?php endif ?>

              </td>
            </tr>

        </table>

        </td>
        </tr>
   

	</table>
    <p>Rangkap 3 : 1. Akuntansi dan Keuangan  </br>
    &emsp;&emsp;&emsp;&emsp;&ensp;&ensp;2. Manager Umum </br>
    &emsp;&emsp;&emsp;&emsp;&ensp;&ensp;3. Kabag yang menerima </br>
	&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;3. Kabag yang mengirim barang </p>

    <br><br>
     <!-- <button class="btn btn-primary" id="submitNomor" type="submit">Save Nomor</button> -->
      <input type="" name="getstatus" hidden="true" value="<?php echo $this->session->userdata('nik')?>" >
     
       <button class="btn btn-primary" id="submitkonfirmasi" type="submit">Konfirmasi</button>
        


</body>


<script type="text/javascript">

    $(document).on("click", "#submitkonfirmasi", function(){
        var data ={
         getnomor :$('input[name=getnomor]').val(),
         nik :$('input[name=getstatus]').val()
       }


        url = "<?php echo base_url();?>mutasi/editlaporanJual";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                   // console.log(Data);
                alert('Data Telah Dikonfirmasi');
                document.location = "<?php echo base_url();?>mutasi/dataJualBarang";
           
                },
                error:function(){

                }
            });
    });


  $(document).on("blur",".update", function(){

    var data={
         id : $(this).data("id"),
         column :$(this).data('column'),
         value :$(this).text(),
      }
        update_data(data);
   });

   function update_data(data){
    // console.log(data);
        url = base_url+"mutasi/update_hasil";

    $.ajax({
      dataType: "TEXT",
      data:data,
      type: "POST",
      url:url,
      success: function(data)
      {
        reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Gagal silakan coba lagi !');
        document.location = "<?php echo base_url();?>bankdarah/tambahpemeriksaan";
      }
    });
   }




    
</script>





