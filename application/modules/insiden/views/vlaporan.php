<!-- <?php

$tgl_awal='';
$tgl_akhir = ''; ?> -->

<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/buttons.html5.min.js"></script> 




<div class="span10">
    <h3 class="page-title">Data Laporan Insiden</h3>

    <div class="well">
    <table >
        <tr>
            <td>
                <label><b>Unit</b></label>
            </td>
            <td> <p><b>:</b></p></td>
            <td>
             <select class='js-example-basic-single' name='unit_utama' id='unit_utama'>
                <option value='' disabled selected>Pilih Unit</option>

                <?php
                foreach ($cbunit as $cbu) {
                    if ($cbu->unit_id == $unit_utama) { 
                        echo '<option value="' . $cbu->unit_id . '" selected >' . $cbu->unit_nama . '</option>';
                    } else {
                        echo '<option value="' . $cbu->unit_id . '" >' . $cbu->unit_nama . '</option>';
                    }
                }
                ?>
            </select>
        </td>
                <td>
                  <br><br><br>
            </tr>



           <tr>
                <td>
                    <label><b>Tahun Insiden</b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select class="selectpicker" name='tahun' id='tahun'>
                         <option value='' disabled selected>Pilih Tahun</option>
                          <?php 
                          $now = date('Y');
                          for ($a=2021; $a<= $now;$a++)
                          {
                           echo  '<option value='.$a.'>'.$a.'</option>';
                          }
                            ?></select>
                </td>
                <td>
                  <br><br><br>
            </tr>
           
            <tr>
                <td>
                    <label><b>Klasifikasi Insiden</b></label>
                </td>
                <td></td>
                <td>
                 <select class='selectpicker' name='k_insiden' id='k_insiden'>
                    <option value='' disabled selected>Pilih Insiden</option>

                    <?php
                    foreach ($cbinsiden as $i) { 
                            echo '<option value="' . $i->id_klasifikasi . '" >' . $i->nama_insiden . '</option>';
                        }
                    ?>
                </select>
            </td>
                <td>
                  <br><br><br>
            </tr>

            <tr>
                <td colspan="3"><button class="btn btn-primary" id="search">Cari</button>
              <button class="btn btn-primary" id="excel">Excel</button>
              <button class="btn btn-primary" id="print">Print</button>
              
              </td>
          </tr>
           
        </table>
<br><br><br>

 <table id="laporan" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">


        
        </table>

</div>
<script type="text/javascript">
    
   var  dataTableHasil;

   $(document).ready( function () {
    $('#laporan').DataTable({
        "ajax": {
            "url": base_url+"index.php/insiden/ajaxlaporan",
            "type": "POST"
        },

        "emptyTable": "Tidak Ada Data Pesan",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
        "paging":   true,
        "ordering": true,
        "info":     true,



    });
} );

   $(document).on("click", "#search", function(){

        var data ={
         unit: $('select[name=unit]').val(),
         jeniscuti: $('select[name=jeniscuti]').val(),
         tahun: $('select[name=tahun]').val()

       }
       // console.log(data);
       
            
                url = "<?php echo base_url();?>insiden/getfilter";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    
                    tampilData()
                },
            function(isConfirm){
                  
            

                }
            });
        
        });

        function tampilData(){


    dataTablePencapaian = $('#laporan').DataTable({
                "destroy": true,
                "ajax": {
                  "url": base_url+"index.php/insiden/ajaxlaporan/",
                  "dataSrc": "data"
              },
                "emptyTable": "Tidak Ada Data Pesan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true
    });
   }


    $(document).ready(function() {
        $('.data').DataTable();
    });


    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
    $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
</script>

</div> 