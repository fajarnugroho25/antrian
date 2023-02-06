<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 



<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
<div class="span10">
            <h3 class="page-title">Data Cuti Pribadi</h3>
            


<div class="well">

    <table id="cuti" class="table table-striped table-bordered ">
      <thead>
        <tr> 
          <th>No </th>
            <th>Kode Cuti</th>
            <th>Mengajukan</th>
            <th>Pengajuan Cuti Dari</th>
            <th>Pengajuan Cuti Dari</th>
            <th>Diijinkan</th>
            <th>Status</th>
            <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        

      </tbody>
    </table>


</div>
<script>var base_url = '<?php echo base_url() ?>'</script>
 <script type="text/javascript">
  


  var  dataTablecuti;
  $(document).ready( function () {
  dataTablecuti=  $('#cuti').DataTable({
        "ajax": {
                "url": base_url+"index.php/pengajuancuti/ajaxListCutiPribadi",
                "type": "POST"
              },

              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true,
            
                
            
    });
} );


  function deleteCuti(id){
    url = base_url+"index.php/pengajuancuti/delete";

    var datas = {id:id};
    $.ajax({
      dataType: "TEXT",
      data:datas,
      type: "POST",
      url:url,
      success: function(data)
      {
        alert('Data Berhasil Di hapus'); 
        reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        confirm('error data');
      }
    });

  }

  function reload() {
    dataTablecuti.ajax.reload(null,false);
}


function Edit(idcuti){
    window.open(base_url + "pengajuancuti/editPengajuanCuti/"+idcuti);

   }

</script>
    
</div>


