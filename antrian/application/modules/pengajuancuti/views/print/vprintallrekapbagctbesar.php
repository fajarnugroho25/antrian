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



<h3 style="text-align: center;  text-transform: uppercase;">REKAP CUTI Besar SEMUA BAGIAN </h3>
        <table  border="2">
          <tr>
            <th>No </th>
            <th>Bagian </th>
            <th>Hak Cuti</th>
            <th>Cuti digunakan</th>
            <th>Sisa Cuti</th>
        </tr>
             
        
      <tbody >
        <?php $no=1;?>
        <?php  foreach ($rekcuti as $rc){
          ?>

          <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $rc['unit_nama']; ?></td>          
          <td><?php echo $rc['hakcutibesar']; ?></td> 
          <td><?php echo $rc['digunakan'] ?></td>
          <td><?php echo $rc['sisa'] ?></td>
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





