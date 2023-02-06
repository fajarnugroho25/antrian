
<div class="content-wrapper">                   
<section class="content">



<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Tambah Slider</h3>
                </div>
                <!-- <form class="form-horizontal" method="post" enctype="multipart/form-data"> -->
                    
					<div class="box-body">
                         <br><br>
                        <div class="panel " >
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center" >Preview</h3>
                            </div>  
                        <div class="panel-body pb0 pt0 pl0 pr0">
                        <!-- START Statistic Widget -->
                        <center>
                
                            <div class=" prv_foto ">
                                <img src="<?=base_url('asset/img/bus.jpg')?>" alt="Image"  class="img-responsive" id="prevfile">
                            </div>
                        </center>
                                      
                    <!--/ END Statistic Widget -->
                        </div>
                        
                        </div>     
                        <div class="col-md-5 left"> 
                            <h6>Name: <span id="namefile"></span></h6> 
                        </div> 
                        <div class="col-md-4 left"> 
                            <h6>Size: <span id="sizefile"></span>Kb</h6> 
                        </div> 
                        <div class="col-md-3 bottom"> 
                            <h6>Type: <span id="typefile"></span></h6> 
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                            <div class="form-inline upload_1">
                        <div class="form-group">
                            <label for="filefoto" class="btn btn-default filefoto">
                                    Pilih Foto
                            </label>
                        <input style="display:none;" type="file" id="filefoto" name="foto" onchange="cek_fileFoto(this,z='',1);" />
                        </div>
                        </div>
                            </div>
                        </div>   
                        <br><br>    
                            <div class="box-footer">
                            <!-- <input type="submit" class="btn btn-info pull-right" value="Save" > -->
                            <button class="btn btn-info pull-right" onclick="create_gambar()">Save</button>
                            </div>
					   </div>
                <!-- </form> -->
            </div>
        </div>
</div>

<script src="<?=base_url('asset/ajaxfileupload.js')?>"></script>
<script type="text/javascript">      
    //edtor summernote
    $('#ccc').summernote({
      height: 200,
       focus: true,
      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],       
        ['insert',['picture']]
      ],

            callbacks: {
                    onImageUpload: function(files) {
                        uploadFile(files[0]);
                    }
                }

    });

    function uploadFile(file) {
            data = new FormData();
            data.append('file', file);
            console.log(data);

            $.ajax({
                data: data,
                type: "POST",
                url: "<?php echo base_url();?>index.php/cberita/upload_image",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {                                 
                 console.log(data);                                        
                 $('#ccc').summernote("insertImage", data);
                }
            });
        }


  function create_gambar(){
      var datas = {
            // editor1 : htmlspecialchars(CKEDITOR.instances.editor1.getData()),
            kategori : $('select[name=Kategori_name]').val(),
        }
        //id fileinput
        // console.log(datas);
        var elementId = "filefoto";
        if (datas.judul == ""  || datas.foto == "") {
            swal('Tidak boleh kosong');
        }else{
            url = base_url+"index.php/cslider/addSlider";
            // do_upload
            $.ajaxFileUpload({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                fileElementId :elementId,
                success:function(Data){
                  // console.log(Data);
                    swal({
                    title: "Gambar Berhasil Ditambahkan!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,
                },
            function(isConfirm){
                    if (isConfirm) {
                        window.location.href = base_url+"index.php/cslider/tambahslider";
                    } 
                    else {
                        swal("Tambah Data dibatalkan");
                    }
                });
                },
                error:function(){
                    
                }
            });

            
        }

  }



        // show preview foto
  function preview_fileFoto(oInput,z='') {

    var viewer = {
          load : function(e){
              $('#prevfile'+z).attr('src', e.target.result);
          },
          setProperties : function(file){
              $('#namefile'+z).text(file.name);
              $('#typefile'+z).text(file.type);
              $('#sizefile'+z).text(Math.round(file.size/1024));
          },
        }
   

      var file = oInput.files[0];
      var reader = new FileReader();
      var size=Math.round(file.size/1024);
      // start pengecekan ukuran file
      if (size>=1000) {
        swal('Silahkan cek file size Foto!','File size foto maksimal 100kb','warning');
        // $('#e_size_video').modal('show');
      }else{
        $(".prv_foto"+z).show();
        reader.onload = viewer.load;
        reader.readAsDataURL(file);
        viewer.setProperties(file);
      }
  }

  //cek dulu type filenya
  function cek_fileFoto(oInput,z='') {
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"]; 
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {
                swal('Silahkan cek type extension gambar! ', 'Type yang bisa di upload hanya ".jpg", ".jpeg", ".bmp", ".gif", ".png', 'warning');
                return false;
        }else{
          
            preview_fileFoto(oInput,z='');
          
            
        }
      }
    }
          return true;
  }




   
    </script>



</section>
</div>

 <div class="control-sidebar-bg"></div>
        </div>