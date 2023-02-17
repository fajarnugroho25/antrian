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

   
    <table id="inven" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">


        <thead >
         <tr>
            <th >Nomor </th>
            <th>No RM</th>
            <th>Nama Pasien</th>
           
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
                "url": base_url+"index.php/covid/ajaxdaftar",
                "type": "POST"
              },

              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true,
            
                
            
    });
} );




   function pilih(nomorpasien){
    window.open(base_url + "covid/printLaporanCovid/"+nomorpasien);

   }
</script>
    
</div>


