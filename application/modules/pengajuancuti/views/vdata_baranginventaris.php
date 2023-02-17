<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/lib/bootstrap/css/bootstrap-select.min.css" type="text/css">




        
<div class="span10">
            <h3 class="page-title">Data Barang Inventaris</h3>
            
<!-- <div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>mutasi/tambahinventaris" role="button">Tambah Inventaris</a>
</div>
 -->




<div class="well">
    <table>
    <input type="hidden" id="kodeinventaris" name='kodeinventaris' class="form-control"  readonly></td>
            
             <tr>
                <td>
                    <label><b>Tanggal Beli</b></label>
                </td>
                <td><p><b>:</b></p> </td>
                <td>
                    <div id="datetimepicker" class="input-append date">
                            <input type="text" id="tglawal" name="tglawal" class="form-control "  required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                <td>   s/d    </td>
                <td><div id="datetimepicker1" class="input-append date">
                            <input type="text" id="tglakhir" name="tglakhir" class="form-control "  required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div></td>    
            </tr> 
             

            <tr>
                <td>
                    <label><b>Unit</b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select class="selectpicker" name='unit' id='unit' data-live-search="true">
                        <option value='' disabled selected>Unit</option>
                        <?php
                     foreach ($unit as $u) 
                     {
                      echo '<option value="'.$u->id_unit2.'" >'.$u->id_unit2.' - '.$u->namaunit2.'</option>';
                     }
                    ?>
                    </select>
                </td>
                <td>
                    <br><br>
            </tr>

            <tr>
                <td>
                    <label><b>Kelompok </b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select class="selectpicker" name='kelompok' id='kelompok' data-live-search="true">
                        <option value='' disabled selected>Kelompok</option>
                        <?php
                     foreach ($kelompok as $klp) 
                     {
                        echo '<option value="'.$klp->id_kelompok.'" >'.$klp->id_kelompok.' - '.$klp->nama.'</option>';
                      }
                    ?>
                    </select>
                </td>
                <td>
                    <br><br>
            </tr>

            
            <tr><td><button class="btn btn-primary" id="search">Cari</button>
              <button class="btn btn-primary" id="excel">Excel</button>
          <button class="btn btn-primary" id="print">Print</button></td></tr>
           
        </table>
<br><br><br>

    <table id="inven" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">


        <thead >
         <tr>
            <th >Nomor </th>
            <th>Kode </th>
            <th>No Asset</th>
            <th>Tanggal Beli</th>
            <th>Nama Asset</th>
            <th>Kelompok</th>
            <th>Sub Kelompok </th>
            <th>Sub Kelompok 2</th>
            <th>Unit</th>
            <th>Status</th>
            <th>Aksi</th>
             
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
    $('#inven').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListInventaris",
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
        tglawal :$('input[name=tglawal]').val(),
         tglakhir :$('input[name=tglakhir]').val(),
         unt: $('select[name=unit]').val(),
         kelompok : $('select[name=kelompok]').val()

       }
            
                url = "<?php echo base_url();?>mutasi/getmutasi";
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
        tglawal :$('input[name=tglawal]').val(),
         tglakhir :$('input[name=tglakhir]').val(),
         unt: $('select[name=unit]').val(),
         kelompok : $('select[name=kelompok]').val()

       }
            
                url = "<?php echo base_url();?>mutasi/getmutasi";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    window.open(base_url + "mutasi/export/");
                },
            function(isConfirm){
                  
            

                }
            });
        
        });



  $(document).on("click", "#print", function(){

        var data ={
        tglawal :$('input[name=tglawal]').val(),
         tglakhir :$('input[name=tglakhir]').val(),
         unt: $('select[name=unit]').val(),
         kelompok : $('select[name=kelompok]').val(),
         // subkelompok : $('select[name=subkelompok]').val(),


       }
            
                url = "<?php echo base_url();?>mutasi/getmutasi";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    window.open(base_url + "mutasi/printLaporanInventaris/");
                },
            function(isConfirm){
                  
            

                }
            });
        
        });
  


    function tampilData(){


    dataTablePencapaian = $('#inven').DataTable({
                "destroy": true,
                "ajax": {
                  "url": base_url+"index.php/mutasi/ajaxListInventaris/",
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


