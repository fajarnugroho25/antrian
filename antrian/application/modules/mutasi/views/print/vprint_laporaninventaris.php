<head>

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
  }}


</style>

<style type="text/css">
  body {
        margin-left: auto;
        margin-right: auto;
    }

table, td, th {   
  text-align: left;
  font-size: 13px
}

.table  td, th {   
  border: 2px solid black

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
thead {display: table-header-group;}
  


</style>
 </head>

	


<body>

    <input type="" name="getnomor" hidden="true" value="<?php echo $this->uri->segment(3)?>" >



<button id="printPageButton" onClick="window.print();">Print</button><br>
<img src="<?php echo base_url();?>public/images/logo.JPG" style="margin-left: 10px; padding-right: 10px" width="280" height="50">
<!-- <table  border="2"> -->
    <tr>
        <td>

<?php if ($kel == 'All'): ?>
  <h3  style="margin-left: 40%; text-transform: uppercase;">LAPORAN ASSET <?=$kel?></h3>
  <?php else: ?>
    <h3 style="margin-left: 30%; text-transform: uppercase;">LAPORAN ASSET PERKELOMPOK <?=$kel->nama?></h3>
  
<?php endif ?>

    <table  class="table table-bordered table-hover dt-responsive nowrap">
    <thead >
        <tr style="border: 2px solid black"> 
          <th style="width: 1%">No</th>
            <th style="width: 7%">Unit</th>
            <th style="width: 7% ">No Asset</th>
            <th style="width: 3%">Tanggal Beli</th>
            <th style="width: 10%">Nama Asset</th>
            <th style="width: 7%">Merk</th>
            <th style="width: 8%">Type</th>
            <th style="width: 5%">No Seri</th>
            <th style="width: 2%">Status</th>
        </tr>
      </thead>
      <tbody >
        <?php $no=1;?>
        <?php  foreach ($inven as $i){

            $status = $i->assetstatus;
            if ($status == 1) {
                  $hasil= 'Baik';
              }
              elseif($status == 2){
                  $hasil= 'Di Service';
              }
               elseif($status == 3){
                  $hasil= 'Rusak';
              }
              elseif($status == 4){
                  $hasil= 'Dijual';
              }
              elseif($status == 5){
                  $hasil= 'Dihibahkan ke Pihak Lain';
              }
              elseif($status == 6){
                  $hasil= 'Dihapuskan';
              }

          ?>
        
       
        <tr style="border: 2px solid black">   
          <td><?php echo $no++;?></td>
          <td><?php echo substr($i->namaunit2,0,15) ?></td>
          <td><?php echo $i->assetnoreff; ?></td> 
          <td><?php echo date('d M Y', strtotime($i->assettanggal)); ?></td>
          <td><?php echo substr($i->assetnama,0,25)?></td>
          
          <td><?php echo substr($i->assetmerk,0,100);?></td>
          <td><?php echo substr($i->assettype,0,50); ?></td>
          <td><?php echo substr($i->assetnoseri,0,30); ?></td>
          <td><?php echo $hasil; ?></td>

        </tr>
        <?php } ?>

      </tbody>


        </table>

            <table border="0" width="100%">
              <br>
            <tr>
              <td style="text-align: center;">
              	<p>&emsp;Mengetahui :</p>
                
      
      	          <u></u><br>
                  
                	<br>
                	<p style="text-decoration: overline;">Karu/Kasi</p>
                	
                        
              </td>
              <td style="text-align: center;">
                <p>Dibuat Oleh : </p>

                
                <br>
                	<u></u><br>
                 
                	<br>
                	<p style="text-decoration: overline;">Bagian Inventaris</p>
                	

              </td>
            </tr>

        </table>

        </td>
        </tr>
   
  
</body>


<script type="text/javascript">

    $(document).on("click", "#submitkonfirmasi", function(){
        var data ={
         getnomor :$('input[name=getnomor]').val(),
         status :$('input[name=getstatus]').val()
       }


        url = "<?php echo base_url();?>mutasi/editlaporan";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                   // console.log(Data);
                alert('Data Telah Dikonfirmasi');
                document.location = "<?php echo base_url();?>mutasi/dataTerimaMutasi";
           
                },
                error:function(){

                }
            });
    });




    
</script>





