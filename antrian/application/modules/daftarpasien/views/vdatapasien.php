<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 




<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
<div class="span10">
            <h3 class="page-title">Data Kamar</h3>





<div class="well">

    <table id="pasien" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">
      <thead>
        <tr> 
          <th>Kamar</th>   
          <th>No RM</th>
          <th>Nama Pasien</th>
          <th>Alamat</th>  
          <th>keterangan</th>                             
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
   
      </tbody>
    </table>


</div>
<script>var base_url = '<?php echo base_url() ?>'</script>
 <script type="text/javascript">


  $(document).ready( function () {
    dataPasien =$('#pasien').DataTable({
        "ajax": {
                "url": base_url+"index.php/daftarpasien/ajaxListdatapasien",
                "type": "POST"
              },

              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   false,
                "ordering": true,
                "info":     true,
                "processing": true,
                // "serverSide": true,
                
                // "scrollCollapse": true,
                // "scrollY":        "1000px",
            
                
            
    });
} );


  setInterval(function(){
    dataPasien.draw();
}, 5000);



function pindahkamar(id){
    var data ={
         id :id
        
       }

        url = "<?php echo base_url();?>daftarpasien/getdatapasien";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(data){
                    hasil = JSON.parse(data);
                    $("#mymodal").modal("show");
                    $('#kamar').val(hasil.namakamar);
                  
           
                },
                error:function(){

                }
            });
          }

  function Edit(idpasien){
    window.open(base_url + "daftarpasien/TambahPemeriksaan/"+idpasien);

   }


   function keluar(id){
    url = base_url+"index.php/daftarpasien/keluar";

    var datas = {id:id};
    // console.log(datas);
    $.ajax({
      dataType: "TEXT",
      data:datas,
      type: "POST",
      url:url,
      success: function(data)
      {
        // console.log(data);
        alert('Pasien Pulang'); 
        reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        confirm('error data');
      }
    });

  }


  function reload() {
    dataPasien.ajax.reload(null,false);
}
</script>
    
</div>


