 
<div class="content-wrapper">      
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kategori</h3>

            </div>
            <!-- /.box-header -->
            <div class="text-right" style="padding-right: 10px;">
              <a class="btn btn-sm btn-primary" title="Tambah Kategori" href="<?=base_url('index.php/cslider/tambahslider')?>" ><i class="fa fa-plus"></i></a>
            </div>

            <div class="box-body" >
              
              <table id="example"  class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>file Slider</th>
                <th>status</th>
                <th>user</th>
                <th>tanggal input</th>
                <th>Aksi</th>
               
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>             

</div>

  <script src="<?=base_url()?>asset/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>asset/datatable/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>public/dist/js/app.min.js"></script>
      <script src="<?php echo base_url();?>asset/datatable/dataTables.bootstrap.js"></script>
      <script src="<?php echo base_url();?>asset/datatable/dataTables.responsive.min.js"></script>

<script src="<?php echo base_url();?>asset/bootstrap.min.js"></script> 

<script type="text/javascript">      

     var  dataTableBerita;
   $(document).ready(function() {
     dataTableBerita = $('#example').DataTable({
    	"ajax": {
                "url": base_url+"index.php/cslider/ajaxListSlider",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
              "bDestroy": true,
    });
} );



    function edit(id){
         var kelas ='.detail-'+id;
      var data = $(kelas).data('id');
      var links;

      // console.log(data);

      // $('h3.semibold').html(data.id_user);

      // $('#isicontent').html(data.id_user); 


      $('#upkategori').modal('show');
      $('input[name=kategoriup]').val(data.nama_kategori);
      $('input[name=id]').val(data.id_kategori);

    }


     function tambah(){
    
      
      $('#tbkategori').modal('show');
  
  
    }




                //update data
function updatestat(id,status){
  // console.log(id);
  var url;
  if (status=='1') {
    url = base_url+"index.php/cslider/updatepasive/"+id;
  }else{
    url = base_url+"index.php/cslider/updateaktiv/"+id;    
  }

  swal({
    title: "Status Berhasil Diubah!",
    type: "success",
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Selesai",
    closeOnConfirm: true,
  },
  function(isConfirm){
    if (isConfirm) {
      $.ajax({
        url:url,
        dataType:"TEXT",
        type:'POST',
        success:function(){
          reload();
        },
        error:function(){
          swal('gagal');
        }}
        );
    } else {
      swal("Dibatalkan", "Data batal diperbaharui", "error");
      reload();

    }
  });
}



  function deleteKat(id){
    url = base_url+"index.php/cslider/delete";
    swal({
        title: "Yakin akan hapus Slider?",
        text: "Anda tidak dapat membatalkan ini.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya,Tetap hapus!",
        closeOnConfirm: false
  },
  function(){
    var datas = {id:id};
    $.ajax({
      dataType: "TEXT",
      data:datas,
      type: "POST",
      url:url,
      success: function(data)
      {
        // console.log(data);
        swal("Terhapus!", "Slider berhasil dihapus.", "success");
        reload();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Error deleting data');
      }
    });
  });
  // }
}





 function reload() {
    dataTableBerita.ajax.reload(null,false);
}
     
   
    </script>
    
