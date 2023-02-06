<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">


        
    
<div class="span10">
            <h3 class="page-title">Laporan Mutasi</h3>
            

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
                    <label><b>Gudang Penerima</b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select name='unitm' id='unitm'>
                    <option value='' disabled selected>Pilih Unit Pengirim</option>
                   <?php
                     foreach ($unit as $u) 
                     {
                      echo '<option value="'.$u->unit_id.'" >'.$u->unit_id.' - '.$u->unit_nama.'</option>';        
                    
                     }
                    ?>
                    </select>
                </td>
                <td>
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


            </tr>

            
            <tr><td><button class="btn btn-primary" id="search">Cari</button>
              <button class="btn btn-primary" id="excel">Excel</button></td></tr>
           
        </table>
<br><br>

    <table id="lapmutasi" class="table table-striped table-bordered ">
      <thead>
        <tr> 
          <th>No </th>
            <th>Id Mutasi</th>
            <th>No Inventaris</th>
            <th>Nama Barang</th>
            <th>Pengirim</th>
            <th>Gudang Penerima</th>
            <th>Kuantitas</th>
            <th>Satuan</th>
            <th>tanggal Mutasi</th>
            <th>Alasan Mutasi</th>
            <th>Harga Barang</th>
        </tr>
      </thead>
      <tbody>
        

      </tbody>
    </table>


</div>

<script>var base_url = '<?php echo base_url() ?>'</script>
 <script type="text/javascript">


  var  dataTableHasil;

$(document).ready( function () {
    $('#lapmutasi').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListLaporanMutasi",
                "type": "POST"
              },
              
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true
            
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
         unitm: $('select[name=unitm]').val(),
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
         unitm: $('select[name=unitm]').val(),
         kelompok : $('select[name=kelompok]').val()

       }
       console.log(data);
            
                url = "<?php echo base_url();?>mutasi/getmutasiimport";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    // console.log(Data);
                    window.open(base_url + "mutasi/exportMutasi/");

                },
            function(isConfirm){
                  
            

                }
            });
        
        });


    function tampilData(){


    dataTablePencapaian = $('#lapmutasi').DataTable({
                "destroy": true,
                "ajax": {
                  "url": base_url+"index.php/mutasi/ajaxListLaporanMutasi/",
                  "dataSrc": "data"
              },
                "emptyTable": "Tidak Ada Data Pesan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true
    });
   }

</script>
    
</div>


