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



<h3 style="text-align: center;  text-transform: uppercase;">REKAP CUTI KARYAWAN <?=$bagian?> </h3>




      



        <table  border="2">
           <?php if ($this->session->userdata('unit') == ''): ?>
            <tr>
            <th>No </th>
            <th>Nama Karyawan </th>
            <th>Bagian </th>
            <th>Hak Cuti</th>
            <th>Cuti digunakan</th>
            <th>Sisa Cuti</th>
        </tr>
        <?php else: ?>
          <tr>
            <th>No </th>
            <th>Nama Karyawan </th>
            <th>Hak Cuti</th>
            <th>Cuti digunakan</th>
            <th>Sisa Cuti</th>
        </tr>
             
           <?php endif ?>
        
      <tbody >
        <?php $no=1;?>
        <?php  foreach ($rekcuti as $rc){
          ?>
          <?php if ($this->session->userdata('unit') == ''): ?>
            <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $rc['nama']; ?></td> 
          <td><?php echo $rc['unit_nama']; ?></td>           
          <td><?php echo $rc['hakcuti']; ?></td> 
          <td><?php echo $rc['digunakan'] ?></td>
          <td><?php echo $rc['sisa'] ?></td>
        </tr>
        
        <?php else: ?>
          <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $rc['nama']; ?></td>          
          <td><?php echo $rc['hakcuti']; ?></td> 
          <td><?php echo $rc['digunakan'] ?></td>
          <td><?php echo $rc['sisa'] ?></td>
        </tr>
       
            
          <?php endif ?>
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





