             <!-- <script src="<?php echo base_url();?>asset/jquery-1.11.1.min.js"></script> -->

   



 <div class="modal fade" id="detailusers">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <p id="isicontent">
            
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<div class="content-wrapper">      
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example"  class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal Post</th>
                <th>User Post</th>
                <th>Status Tampil</th>
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
                "url": base_url+"index.php/cberita/ajaxListBerita",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
              "bDestroy": true,
    });
} );



    function editberita(id){
         window.location.href = base_url + "index.php/cberita/editberita/"+id;
    }


     function detail(konten){
    
      file = '<embed style="width:100%; height:450px;" src="<?=base_url()?>asset/file/'+konten+'" type="application/pdf"></embed>';
      $('#isicontent').html(file); 
      $('#detailusers').modal('show');
  
  
    }

       

                //update data
function updatestat(id,status){
  // console.log(id);
  var url;
  if (status=='1') {
    url = base_url+"index.php/cberita/updatepasive/"+id;
  }else{
    url = base_url+"index.php/cberita/updateaktiv/"+id;    
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



  function delete_berita(id){
    url = base_url+"index.php/cberita/deleteBerita";
    swal({
        title: "Yakin akan hapus Berita?",
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
        swal("Terhapus!", "Berita berhasil dihapus.", "success");
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
    
