<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all"> -->
  <!-- <script src="<?=base_url('assets/js/jquery.min.js')?>"></script> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style2.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">

  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/buttons.html5.min.js"></script>
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


/*table, td, th {  
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
    border: 1px solid;
}

input {
    background-color: transparent;
    border: 3px solid;
    height: 20px;
    width: 160px;
}
*/




      </style>
    </head>


    <body>


      <button id="printPageButton" onClick="window.print();">Print</button>
      <table >
        <tr>
          <td>



            <h3 style="text-align: center;  text-transform: uppercase;">Review E-Rm Rawat Jalan </h3>
            <h3 style="text-align: center;  text-transform: uppercase;">RS Kasih Ibu Surakarta</h3>


            <table id="" class="display" style="width:100%">

              <td >

                <table  >
                  <tr>
                    <td >
                      <label ><b>Bulan</b></label>
                    </td>
                    <td >:</td>
                    <td>
                      <?=$dataerm->bulan?>
                      
                    </td>    
                  </tr> 
                  <tr>
                    <td>
                      <label><b>Nama DPJP</b></label>
                    </td>
                    <td>:</td>
                    <td>
                      <?=$dataerm->nama_dokter?>
                    </td>    
                  </tr> 




                </table>


                <table class="table1" border="2">
                  <tr>

                    <th rowspan="2">No Urut</th>
                    <th rowspan="2">No RM</th>
                    <th colspan="3">Assesmen Medis</th>
                    <th colspan="3">Assesmen Keperawatan</th>
                    <th rowspan="2">Nama Reviewer</th>
                  </tr>

                  <tr>

                    <th >Lengkap</th>
                    <th>Tidak Lengkap</th>
                    <th>Keterangan</th>
                    <th>Lengkap</th>
                    <th>Tidak Lengkap</th>
                    <th>Keterangan</th>



                  </tr>


                  <tbody align="center" border="2">
                    <?php $no=1;?>
                    <?php  foreach ($isidataerm as $id){
                      ?>

                      <tr>   

                        <td><?php echo $no++;?></td>
                        <td><?php echo $id['norm']; ?></td> 

                        <?php if ($id['amlengkap'] == '1'): ?>

                          <td> &#10004;</td> 
                        <?php else: ?>
                          <td></td> 
                        <?php endif ?>

                        <?php if ($id['amtlengkap'] == '1'): ?>

                          <td> &#10004;</td> 
                        <?php else: ?>
                          <td></td> 
                        <?php endif ?>


                        <td><?php echo $id['amket']; ?></td>  


                        <?php if ($id['aklengkap'] == '1'): ?>

                          <td> &#10004;</td> 
                        <?php else: ?>
                          <td></td> 
                        <?php endif ?>

                        <?php if ($id['aktlengkap'] == '1'): ?>

                          <td> &#10004;</td> 
                        <?php else: ?>
                          <td></td> 
                        <?php endif ?>


                        <td><?php echo $id['akket']; ?></td>
                        <td><?php echo $id['namareviewer']; ?></td>

                      </tr>


                    <?php } ?>



                  </tbody>


                </table>
              </td>
            </tr>


          </table>
          <br>

          <table>
            <tr><td><h4>Total Asesmen Medis </h4></td></tr>
            <?php $tidaklengkap1 = $total->ctotalleng1 - $total->totalleng1;
            $tidaklengkap2 = $total->ctotaltleng1 - $total->totaltleng1; 
            $tidaklengkap3 = $total->ctotalleng2 - $total->totalleng2;
            $tidaklengkap4 = $total->ctotaltleng2 - $total->totaltleng2;
            ?> 

            <tr>
              <td>Lengkap</td>
              <td>:</td>
              <td><?= round($total->totalleng1 / $total->ctotalleng1 * 100,3)  ?> % </td>
            </tr>
            <tr>
              <td>Tidak Lengkap</td>
              <td>:</td>
              <td><?= round( $total->totaltleng1 / $total->ctotaltleng1 * 100,3)  ?> % </td>
            </tr>

            <tr><td><h4>Total Asesmen Keperawatan </h4></td></tr>

            <tr>
              <td>Lengkap</td>
              <td>:</td>
              <td><?= round($total->totalleng2 / $total->ctotalleng2 * 100,3)  ?> % </td>
            </tr>
            <tr>
              <td>Tidak Lengkap</td>
              <td>:</td>
              <td> <?=round($total->totaltleng2 / $total->ctotaltleng2 * 100,3)  ?> %</td>
            </tr>
          </table>


        </body>




        <script type="text/javascript">
            $(document).ready(function(){
            $('.data').DataTable();
          });

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





