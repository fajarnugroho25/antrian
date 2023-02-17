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



<h3 style="text-align: center;  text-transform: uppercase;">REKAP CUTI KARYAWAN BULAN </h3>




      



        <table  border="2">
           
        <tr>
            <th>No </th>
            <th>Nama Karyawan </th>
            <th>Unit</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
            <th>19</th>
            <th>20</th>
            <th>21</th>
            <th>22</th>
            <th>23</th>
            <th>24</th>
            <th>25</th>
            <th>26</th>
            <th>27</th>
            <th>28</th>
            <th>29</th>
            <th>30</th>
            <th>31</th>
             
        </tr>
      <tbody >
        <?php $no=1;?>
        <?php  foreach ($rekcuti as $rc){

            
          ?>
        
       
        <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $rc['nama']; ?></td>          
          <td><?php echo $rc['unit_nama']; ?></td> 
          <td><?php echo $rc['1'] ?></td>
          <td><?php echo $rc['2'] ?></td>
          <td><?php echo $rc['3'] ?></td>
          <td><?php echo $rc['4'] ?></td>
          <td><?php echo $rc['5'] ?></td>
          <td><?php echo $rc['6'] ?></td>
          <td><?php echo $rc['7'] ?></td>
          <td><?php echo $rc['8'] ?></td>
          <td><?php echo $rc['9'] ?></td>
          <td><?php echo $rc['10'] ?></td>
          <td><?php echo $rc['11'] ?></td>
          <td><?php echo $rc['12'] ?></td>
          <td><?php echo $rc['13'] ?></td>
          <td><?php echo $rc['14'] ?></td>
          <td><?php echo $rc['15'] ?></td>
          <td><?php echo $rc['16'] ?></td>
          <td><?php echo $rc['17'] ?></td>
          <td><?php echo $rc['18'] ?></td>
          <td><?php echo $rc['19'] ?></td>
          <td><?php echo $rc['20'] ?></td>
          <td><?php echo $rc['21'] ?></td>
          <td><?php echo $rc['22'] ?></td>
          <td><?php echo $rc['23'] ?></td>
          <td><?php echo $rc['24'] ?></td>
          <td><?php echo $rc['25'] ?></td>
          <td><?php echo $rc['26'] ?></td>
          <td><?php echo $rc['27'] ?></td>
          <td><?php echo $rc['28'] ?></td>
          <td><?php echo $rc['29'] ?></td>
          <td><?php echo $rc['30'] ?></td>
          <td><?php echo $rc['31'] ?></td>
     
     
         

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





