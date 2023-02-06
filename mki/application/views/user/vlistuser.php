             <!-- <script src="<?php echo base_url();?>asset/jquery-1.11.1.min.js"></script> -->

 <div class="modal fade" id="tbkategori">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">
                <p class="lead">Form Tambah User</p>
                <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal" id="dua" value="<?php echo isset($_GET['id'])?$data[1]:date('d-m-Y'); ?>" disabled>
                            </div>
                        </div>
                        <br><br>
                         
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Username" name="Username" id="Username" value="<?php echo isset($data[3])?$data[3]:''; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Password" name="Password" id="Password" value="<?php echo isset($data[3])?$data[3]:''; ?>">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Status Admin</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="statusadmin">
                                  <option>--Pilih Status--</option>
                                  <option value="1">Admin</option> 
                                  <option value="2">Non Admin</option> 
                                </select>
                            </div>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info pull-left" onclick="createUser()" data-dismiss="modal">Tambah</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="upuser">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <p class="lead">Form Edit User</p>
                      <input type="hidden" name="id_user" id="id_user"><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Username" name="Upusername" id="Upusername" >
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Password" name="Uppass" id="Uppass" >
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Status Admin</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="oldstatus">
                                <select class="form-control" name="newstatus" id="newstatus">
                                  <option>--Pilih Status--</option>
                                  <option value="1">Admin</option> 
                                  <option value="2">Non Admin</option> 
                                </select>
                            </div>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info pull-left" onclick="upuser()" data-dismiss="modal">Update</button>
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
              <h3 class="box-title">Data User</h3>

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
                <th>Nama User</th>
                <th>Status Admin</th>
                <th>Tanggal input</th>
                <th>Status Aktif</th>
                
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
                "url": base_url+"index.php/cuser/ajaxListUser",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
              "bDestroy": true,
    });
} );


   

    // if (oldstatus == '') {
    //       nstatus ='#statusadmin option[value="'+oldstatus+'"]';
    //       $(nstatus).attr('selected','selected');
    // }else{

    // }


    function edit(id){
         var kelas ='.detail-'+id;
      var data = $(kelas).data('id');
      var links;

      // console.log(data);

      // $('h3.semibold').html(data.id_user);

      // $('#isicontent').html(data.id_user); 

      $('#upuser').modal('show');
      $('input[name=Upusername]').val(data.user);
      // $('input[name=Uppass]').val(data.pass);
      $('input[name=id_user]').val(data.id);
      $('input[name=oldstatus]').val(data.admin_status);
      var oldstatus = $('input[name=oldstatus]').val();
      if (oldstatus != '') {
          var statid = '#newstatus option[value='+oldstatus+']';
            $(statid).attr('selected','selected');
      }else{

      } 
      
      

    }

     function tambah(){
      $('#tbkategori').modal('show');
    }

       

                //update data
function updatestat(id,status){
  // console.log(id);
  var url;
  if (status=='1') {
    url = base_url+"index.php/cuser/updatepasive/"+id;
  }else{
    url = base_url+"index.php/cuser/updateaktiv/"+id;    
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


     function createUser(){
      var datas = {
            Username : $('input[name=Username]').val(),
            Password : $('input[name=Password]').val(),
            statusadmin : $('select[name=statusadmin]').val(),
           
        }
        
        if (datas.kategori == "" ) {
            swal('Tidak boleh kosong');
        }else{
            url = "<?php echo base_url();?>index.php/cuser/addUser";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  console.log(Data);
                    
                    swal({
                    title: "User Berhasil Ditambahkan!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,

                })
                    $('#tbkategori').modal('hide');
                    $('#Username').val("");
                    reload();
                },
                error:function(){
                    
                }
            });
        }
  }

  function upuser(){
      var datas = {
            id : $('input[name=id_user]').val(),
            user : $('#Upusername').val(),
            pass : $('#Uppass').val(),
            statadmin : $('select[name=newstatus]').val(),
        }
        // console.log(datas);
        if (datas.kategori == "" ) {
            swal('Tidak boleh kosong');
        }else{
            url = "<?php echo base_url();?>index.php/cuser/editUser";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  // console.log(Data);
                    swal({
                    title: "User Berhasil Diperbaharui!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,

                })
                    $('#upuser').modal('hide');
                    $('#Upusername').val("");
                    $('#Uppass').val("");
                    reload();
                },
                error:function(){
                    
                }
            });

            
        }

  }


  function drop(id){
    url = base_url+"index.php/cuser/deleteUser";
    swal({
        title: "Yakin akan hapus user ini?",
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
        swal("Terhapus!", "User berhasil dihapus.", "success");
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
    
