             <!-- <script src="<?php echo base_url();?>asset/jquery-1.11.1.min.js"></script> -->

   



 <div class="modal fade" id="tbkategori">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">
                <p class="lead">Form Tambah Ketegori</p>
                <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal" id="dua" value="<?php echo isset($_GET['id'])?$data[1]:date('d-m-Y'); ?>" disabled>
                            </div>
                        </div>
                        <br>
                         
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="kategori" name="kategori" id="kategori" value="<?php echo isset($data[3])?$data[3]:''; ?>">
                            </div>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info pull-left" onclick="createKategori()" data-dismiss="modal">Tambah</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="upkategori">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <p class="lead">Form Edit Ketegori</p>
                      <input type="hidden" name="id" id="id_kategori">
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="kategori" name="kategoriup" id="kategoriup" >
                            </div>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info pull-left" onclick="upKategori()" data-dismiss="modal">Update</button>
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
              <h3 class="box-title">Data Kategori</h3>

            </div>
            <!-- /.box-header -->
            <div class="text-right" style="padding-right: 10px;">
              <a class="btn btn-sm btn-primary" title="Tambah Kategori" onclick="tambah()" href="javascript:void(0)" ><i class="fa fa-plus"></i></a>
            </div>

            <div class="box-body" >
              
              <table id="example"  class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>status</th>
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
                "url": base_url+"index.php/ckategori/ajaxListKategori",
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
    url = base_url+"index.php/ckategori/updatepasive/"+id;
  }else{
    url = base_url+"index.php/ckategori/updateaktiv/"+id;    
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
    url = base_url+"index.php/ckategori/delete";
    swal({
        title: "Yakin akan hapus Kategori?",
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
        swal("Terhapus!", "Kategori berhasil dihapus.", "success");
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


     function createKategori(){
      var datas = {
            tanggal : $('input[name=tanggal]').val(),
            kategori : $('input[name=kategori]').val(),
           
        }
        
        if (datas.kategori == "" ) {
            swal('Tidak boleh kosong');
        }else{
            url = "<?php echo base_url();?>index.php/ckategori/addKategori";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  // console.log(Data);
                    
                    swal({
                    title: "Konten Berhasil Ditambahkan!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,

                })
                    $('#tbkategori').modal('hide');
                    $('#kategori').val("");
                    reload();
                },
                error:function(){
                    
                }
            });

            
        }

  }
  function upKategori(){
      var datas = {
            id : $('input[name=id]').val(),
            kategori : $('#kategoriup').val(),
           
        }
        // console.log(datas);
        if (datas.kategori == "" ) {
            swal('Tidak boleh kosong');
        }else{
            url = "<?php echo base_url();?>index.php/ckategori/editKategori";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  // console.log(Data);
                    swal({
                    title: "Kategori Berhasil Diperbaharui!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,

                })
                    $('#upkategori').modal('hide');
                    $('#kategori').val("");
                    reload();
                },
                error:function(){
                    
                }
            });

            
        }

  }



 function reload() {
    dataTableBerita.ajax.reload(null,false);
}
     
   
    </script>
    
