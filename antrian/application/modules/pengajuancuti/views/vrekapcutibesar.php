<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/lib/bootstrap/css/bootstrap-select.min.css" type="text/css">



        
<div class="span10">
            <h3 class="page-title">Data Cuti Karyawan</h3>
            
<!-- <div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>mutasi/tambahinventaris" role="button">Tambah Inventaris</a>
</div>
 -->




<div class="well">
    <table >
            <tr>
                <td>
                    <label><b>Bagian</b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select class="selectpicker" name='unit' id='unit' data-live-search="true">
                        <option value='' disabled selected>Unit</option>
                        <?php
                     foreach ($unit as $u) 
                     {
                      echo '<option value="'.$u->unit_id.'" >'.$u->unit_nama.'</option>';
                     }
                    ?>
                    </select>
                </td>
                <td>
                  <br><br><br>
            </tr>



           <tr>
                <td>
                    <label><b>Tahun Cuti</b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select class="selectpicker" name='tahun' id='tahun'>
                          <option value='' disabled selected>Tahun</option>
                          <?php 
                          $now = date('Y');
                          for ($a=2020; $a<= $now;$a++)
                          {
                           echo  '<option value='.$a.'>'.$a.'</option>';
                          }
                            ?></select>
                </td>
                <td>
                  <br><br><br>
            </tr>

            <tr>
                <td colspan="3"><button class="btn btn-primary" id="search">Cari</button>
              <!-- <button class="btn btn-primary" id="excel">Excel</button> -->
              <button class="btn btn-primary" id="print">Print</button>
              </td>
          </tr>
           
        </table>
<br><br><br>

    <table id="pengajuan" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">


        <thead >
         <tr>
            <th>Nomor </th>
            <th>Nama Karyawan </th>
            <th>NIK</th>
            <th>Hak Cuti</th>
            <th>Cuti digunakan</th>
            <th>Sisa Cuti</th>
            <th>Transaksi Cuti Besar</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>

      


</div>

<!-- <link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script> -->
<script src="<?php echo base_url(); ?>public/assets/js/bootstrap-select.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>
 <script type="text/javascript">


  var  dataTableHasil;

$(document).ready( function () {
    $('#pengajuan').DataTable({
        "ajax": {
                "url": base_url+"index.php/pengajuancuti/ajaxrekapcutiBesar",
                "type": "POST"
              },

              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true,
            
                
            
    });
} );


    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker1').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });


    $(document).on("click", "#search", function(){

        var data ={
         unit: $('select[name=unit]').val(),
         tahun: $('select[name=tahun]').val()

       }
     
            
                url = "<?php echo base_url();?>pengajuancuti/getfilter";
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

  $(document).on("click", "#excel", function(){

        var data ={
   
         unit: $('select[name=unit]').val(),
         tahun: $('select[name=tahun]').val()

       }
            
                url = "<?php echo base_url();?>pengajuancuti/getfilter";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    window.open(base_url + "pengajuancuti/exportcuti/");
                },
            function(isConfirm){
                  
            

                }
            });
        
        });

  $(document).on("click", "#print", function(){

        var data ={
        
         unit: $('select[name=unit]').val(),
         tahun: $('select[name=tahun]').val()

       }
            
                url = "<?php echo base_url();?>pengajuancuti/getfilter";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    window.open(base_url + "pengajuancuti/printrekapcutibesar/");
                },
            function(isConfirm){
                  
            

                }
            });
        
        });

  $(document).on("click", "#printall", function(){

       window.open(base_url + "pengajuancuti/printAllrekapcutiBesar/");
        
        });


    function tampilData(){


    dataTablePencapaian = $('#pengajuan').DataTable({
                "destroy": true,
                "ajax": {
                  "url": base_url+"index.php/pengajuancuti/ajaxrekapcutiBesar/",
                  "dataSrc": "data"
              },
                "emptyTable": "Tidak Ada Data Pesan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true
    });
   }

   function Edit(nomoraset){
    window.open(base_url + "mutasi/editAsset/"+nomoraset);

   }
</script>
    
</div>


