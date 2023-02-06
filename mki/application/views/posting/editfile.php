

<style type="text/css">
    
    #image_preview{
      border: 1px solid black;
      padding: 10px;
      /*width: 700px;*/
      /*margin-left: 200px*/
    }
    #image_preview img{
      width: 200px;
      padding: 5px;
    }
  </style>

<div class="content-wrapper">                   
<section class="content">



<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Input Berita</h3>
                </div>
                <!-- <form class="form-horizontal" method="post" enctype="multipart/form-data"> -->
                    <input type="hidden" name="id" value="<?=$berita['id']?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="dua" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="dua" value="<?php echo isset($_GET['id'])?$data[1]:date('d-m-Y'); ?>" disabled>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Judul Berita</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Judul" name="judul" id="tiga" value="<?php echo  $berita['judul'] ?>">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="oldkat" id="oldkat" value="<?php echo  $berita['kategori'] ?>" hidden="true">
                                <select id="Kategori_name" class="form-control" placeholder="Select category..." name="Kategori_name">
                                
                                </select>
                        </div>
                        </div>
                        <br><br>
                        <?php if ($berita['konten_jenis']=='1'): ?>
                            <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Isi Berita</label>
                            <div class="col-sm-10">
                               <textarea class="form-control content" placeholder="Isi Berita" id="ccc" name="konten"><?php echo isset($data[4])?$data[4]:''; ?><?php echo  $berita['konten'] ?></textarea>

                            </div>
                        </div>
                        <?php elseif($berita['konten_jenis']=='2'): ?>
                            <div class="form-group">

                            

                            <div class="col-sm-10">

                                <label for="uploadFile" class="btn btn-default uploadFile">
                                    Pilih Foto
                                </label>
                                    <input style="display:none;" type="file" id="uploadFile" name="uploadFile[]"  multiple/>
                                
                        </div>
                        </div>
                        <br><br><br>
                        <div id="image_preview" >
                            <?php foreach ($image as $key ): ?>
                                <img style="width: 25%; height: 200px" src="<?=base_url()?>asset/img/<?=$key['nama_image']?>">
                            <?php endforeach ?>
                          

                        </div>
                        <?php elseif($berita['konten_jenis']=='3'): ?>

                            <div class="panel " >
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center" >Preview</h3>
                            </div>  
                        <div class=" prv_foto " >
                            <embed style="width: 100%; height: 500px" style="padding-left: 40%;"  src="<?=base_url()?>asset/file/<?=$berita['konten']?>" class="embed-responsive" type="application/pdf" id="prevfile"></embed>
                                
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
                                    Pilih File
                            </label>
                        <input style="display:none;" type="file" id="filefoto" name="file" onchange="cek_file(this,z='',2);" />
                        </div>
                        </div>
                            </div>
                        </div>  

                        <?php endif ?>
                        
                        <div class="box-footer">
                        <!-- <input type="submit" class="btn btn-info pull-right" value="Save" > -->
                        <?php if ($berita['konten_jenis']=='1'): ?>
                            <button class="btn btn-info pull-right" onclick="edit_konten()">Update</button>
                        <?php elseif($berita['konten_jenis']=='2'): ?>
                             <button class="btn btn-info pull-right" onclick="edit_gambar()">Update</button>
                        <?php elseif($berita['konten_jenis']=='3'): ?>
                            <button class="btn btn-info pull-right" onclick="edit_file()">Update</button>
                        <?php endif ?>
                        <!-- <button class="btn btn-info pull-right" onclick="create_koneten()">Save</button> -->
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
</div>
<script src="<?php echo base_url();?>public/js/jquery.form.js"></script>
<script src="<?=base_url('asset/ajaxfileupload.js')?>"></script>
<script type="text/javascript">      

    loadKategori();

    $(document).ready(function(){
      oldcategory = $('#oldcategory').val();

      if (oldcategory != '') {
        var category = '#category option[value='+oldcategory+']';
        $(category).attr('selected','selected');
      }else{

      }

      

    });

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





      function edit_konten(){
      var datas = {
            id: $('input[name=id]').val(),
            judul : $('input[name=judul]').val(),
            konten : $('textarea[name=konten]').val(),
            kategori : $('select[name=Kategori_name]').val(),
           
        }
        // console.log(datas);
       
        if (datas.judul == "" || datas.konten == "" ) {
            swal('Tidak boleh kosong');
        }else{
            url = "<?php echo base_url();?>index.php/cberita/editKonten";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  console.log(Data);
                    swal({
                    title: "Konten Berhasil Diubah!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,
                },
            function(isConfirm){
                    if (isConfirm) {
                        window.location.href = base_url+"index.php/cberita/list_berita";
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


   function edit_gambar(){
      var form_data = new FormData();
        var ins = document.getElementById('uploadFile').files.length;

        var id = $('input[name=id]').val();
         var Kategori_name = $('select[name=Kategori_name]').val();
         var judul = $('input[name=judul]').val();  // This doesn't seem to hold the value
          form_data.append('Kategori_name', Kategori_name);
          form_data.append('judul', judul);
          form_data.append('id', id);

        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('uploadFile').files[x]);
        }
        //id fileinput
        // console.log(datas);
        
            url = base_url+"index.php/cberita/editText";
            // do_upload
            $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                url:url,
                data:form_data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  // console.log(Data);
                    swal({
                    title: "Gambar Berhasil Diubah!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,
                },
            function(isConfirm){
                    if (isConfirm) {
                        window.location.href = base_url+"index.php/cberita/list_berita";
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


  function edit_file(){
      var datas = {
            judul : $('input[name=judul]').val(),
            id: $('input[name=id]').val(),
            // editor1 : htmlspecialchars(CKEDITOR.instances.editor1.getData()),
            file: $('[name=file]').val(),
            kategori : $('select[name=Kategori_name]').val(),
        }
        //id fileinput
        // console.log(datas);
        var elementId = "filefoto";
        if (datas.judul == ""  ) {
            swal('Tidak boleh kosong');
        }else{
            url = base_url+"index.php/cberita/editFile";
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
                    title: "File Berhasil Dirubah!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,
                },
            function(isConfirm){
                    if (isConfirm) {
                        window.location.href = base_url+"index.php/cberita/list_berita";
                    } 
                    else {
                        swal("Update Data dibatalkan");
                    }
                });
                },
                error:function(){
                    
                }
            });

            
        }

  }



          // show preview foto
  function preview_fileFoto(oInput,z='',cekid) {

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
      if (cekid == 1) {
        if (size>=300) {
        swal('Silahkan cek file size Foto!','File size foto maksimal 300kb','warning');
        // $('#e_size_video').modal('show');
      }else{
        $(".prv_foto"+z).show();
        reader.onload = viewer.load;
        reader.readAsDataURL(file);
        viewer.setProperties(file);
      }
      }
      else{
        if (size>=1000) {
        swal('Silahkan cek file size File!','File size foto maksimal 1000kb','warning');
        // $('#e_size_video').modal('show');
      }else{
        $(".prv_foto"+z).show();
        reader.onload = viewer.load;
        reader.readAsDataURL(file);
        viewer.setProperties(file);
      }

      }
      
  }

  //cek dulu type filenya
  function cek_fileFoto(oInput,z='',cekid) {
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
          
            preview_fileFoto(oInput,z='',cekid);
          
            
        }
      }
    }
          return true;
  }


    //cek dulu type filenya
  function cek_file(oInput,z='',cekid) {
    var _validFileExtensions = [".pdf"]; 
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
                swal('Silahkan cek type extension File! ', 'Type yang bisa di upload hanya ".pdf"', 'warning');
                return false;
        }else{
          
            preview_fileFoto(oInput,z='',cekid);
          
            
        }
      }
    }
          return true;
  }


  function loadKategori() {
     var oldkat = $('#oldkat').val();
        jQuery(document).ready(function () {
            var kategori_id = {"kategori_id": $('#Kategori_name').val()};
            var idKategori;
            $.ajax({
                type: "POST",
                dataType: "json",
                data: kategori_id,
                url: "<?= base_url()?>index.php/ckategori/getKategori",
                success: function (data) {
                    $('#Kategori_name').html('<option value="">-- Pilih Kategori  --</option>');
                    $.each(data, function (i, data) {
                        // console.log(data);

                        if (data.id_kategori == oldkat) {
                            $('#Kategori_name').append("<option value='" + data.id_kategori + "'selected>" + data.nama_kategori + "</option>");
                        }
                        else{
                            $('#Kategori_name').append("<option value='" + data.id_kategori + "'>" + data.nama_kategori + "</option>");
                        }
                        
                        return idKategori = data.id;
                    });
                }
            });


            $('#Kategori_name').change(function () {
                kategori_id = {"kategori_id": $('#Kategori_name').val()};
            })

        })
    };


    $("#uploadFile").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("uploadFile").files.length;

     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append("<img style='width: 25%; height: 200px' src=' "+URL.createObjectURL(event.target.files[i])+"'>");
     }

  });

  $('form').ajaxForm(function() 
   {
    alert("Uploaded SuccessFully");
   }); 



    </script>



</section>
</div>

 <div class="control-sidebar-bg"></div>
        </div>