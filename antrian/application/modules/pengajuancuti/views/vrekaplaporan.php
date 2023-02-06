<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/lib/bootstrap/css/bootstrap-select.min.css" type="text/css">




        
<div class="span10">
            <h3 class="page-title">Data Rekap Cuti Bulanan</h3>
            
<!-- <div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>mutasi/tambahinventaris" role="button">Tambah Inventaris</a>
</div>
 -->




<div class="well">
    <table>
    <input type="hidden" id="kodeinventaris" name='kodeinventaris' class="form-control"  readonly></td>
            
             <tr>
                <td>
                    <label><b>Tanggal Cuti</b></label>
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
                    <select class="selectpicker" name='unit' id='unit' data-live-search="true">
                        <option value='' disabled selected>Unit</option>
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

            <tr><td><button class="btn btn-primary" id="search">Cari</button>
              <button class="btn btn-primary" id="excel">Excel</button>
              <button class="btn btn-primary" id="print">Print</button></td></tr>
           
        </table>
<br><br><br>

    <table id="pengajuan" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">


        <thead >
         <tr>
            <th>Nomor </th>
            <th>Nama Karyawan </th>
            <th>Unit</th>
            <th>Total </th>
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
                "url": base_url+"index.php/pengajuancuti/ajaxrekaplaporan",
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
         unit: $('select[name=unit]').val()

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
        tglawal :$('input[name=tglawal]').val(),
         tglakhir :$('input[name=tglakhir]').val(),
         unit: $('select[name=unit]').val(),

       }
            
                url = "<?php echo base_url();?>pengajuancuti/getfilter";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    window.open(base_url + "pengajuancuti/export/");
                },
            function(isConfirm){
                  
            

                }
            });
        
        });

  $(document).on("click", "#print", function(){

        var data ={
        tglawal :$('input[name=tglawal]').val(),
         tglakhir :$('input[name=tglakhir]').val(),
         unit: $('select[name=unit]').val()

       }
            
                url = "<?php echo base_url();?>pengajuancuti/getfilter";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    window.open(base_url + "pengajuancuti/printrekaplaporan/");
                },
            function(isConfirm){
                  
            

                }
            });
        
        });


    function tampilData(){


    dataTablePencapaian = $('#pengajuan').DataTable({
                "destroy": true,
                "ajax": {
                  "url": base_url+"index.php/pengajuancuti/ajaxrekaplaporan/",
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


