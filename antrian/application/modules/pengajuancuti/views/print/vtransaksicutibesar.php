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


<button id="printPageButton" onClick="window.print();">Print</button><br>
<table border="2">
    <tr>
        <td>



<h3 style="text-align: center;  text-transform: uppercase;">TRANSAKSI cuti besar <?=$nama->nama?> BAGIAN <?=$nama->unit_nama?> </h3>
        <table  border="2">
          <tr>
            <th>No </th>
            <th>Hari</th>
            <th>Cuti Awal </th>
            <th>Cuti Hari</th>
            <th>Cuti di Tahun</th>
        </tr>
             
        
      <tbody >
        <?php $no=1;?>
        <?php  foreach ($datacuti as $dc){
          ?>

          <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $dc['mohonizinhari']; ?></td>          
          <td><?php echo $dc['mohonizintglawal']; ?></td> 
          <td><?php echo $dc['mohonizintglakhir'] ?></td>
          <td><?php echo $dc['sisacutitahun'] ?></td>
        </tr>
       
            
          <?php } ?>

        

      </tbody>


        </table>
        </td>
        </tr>
   

  </table>
   
  
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





