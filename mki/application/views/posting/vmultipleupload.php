
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

          
               <!--  <form class="form-horizontal" action="<?=base_url()?>index.php/cberita/UpBeritaImg" method="post" enctype="multipart/form-data"> -->


                    
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
                                <input type="text" class="form-control" placeholder="Judul" name="judul" id="tiga" value="<?php echo isset($data[3])?$data[3]:''; ?>">
                            </div>
                        </div>
                         <br><br>
                          <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <select id="Kategori_name" class="form-control" placeholder="Select category..." name="Kategori_name">
                                
                                </select>
                        </div>
                        </div>

                        <br><br>
                          <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Cover</label>
                            <div class="col-sm-10" >
                                <p>*Ukuran gambar tidak boleh melebihi 500kb</p>

                                <label  for="uploadCover" class="btn btn-default uploadFile" >
                                    Pilih Cover
                                </label>
                                    <input style="display:none;" type="file" id="uploadCover" name="file" onchange="preview_image(event)"/>
                            </div>
                        </div>
                        <br><br>

                        <img style="margin-left: 18%"  id="output_image" />

                         <br><br>



                         <div class="form-group">

                            <div class="form-group">
                            
                        </div>

                            <div class="col-sm-10">

                                <label style="margin-left: 20.5%"  for="uploadFile" class="btn btn-default uploadFile">
                                    Pilih Foto
                                </label>
                                    <input style="display:none;" type="file" id="uploadFile" name="uploadFile[]"  multiple/>
                                
                        </div>
                        </div>
                        <br><br><br>
                        <div style="width: 82%; margin-left: 18%" id="image_preview" ></div>
                        
                            
                            <div class="box-footer">
                            <!-- <input type="submit" class="btn btn-info pull-right" value="Save" > -->
                            <button class="btn btn-info pull-right" onclick="create_gambar()">Save</button>
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
            data = new FormData(this);
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






  function create_gambar(){

    var form_data = new FormData();
        var ins = document.getElementById('uploadFile').files.length;

         var Kategori_name = $('select[name=Kategori_name]').val();
         var judul = $('input[name=judul]').val();  // This doesn't seem to hold the value
         var foto = document.getElementById('uploadCover').files;
          form_data.append('Kategori_name', Kategori_name);
          form_data.append('judul', judul);
          form_data.append('foto', foto[0]);

        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('uploadFile').files[x]);
        }
      
        // console.log(form_data);
       
            url = base_url+"index.php/cberita/UpBeritaImg";
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
                    title: "Gambar Berhasil Ditambahkan!",
                    type: "success",  
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,
                },
            function(isConfirm){
                    if (isConfirm) {
                        window.location.href = base_url+"index.php/cberita/tambahgambar";
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

  

  function preview_image(event){
      var reader = new FileReader();
      reader.onload = function()
    {
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
      reader.readAsDataURL(event.target.files[0]);
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
      if (size>=300) {
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


  function loadKategori() {
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
                        $('#Kategori_name').append("<option value='" + data.id_kategori + "'>" + data.nama_kategori + "</option>");
                        return idKategori = data.id;
                    });
                }
            });


            $('#Kategori_name').change(function () {
                kategori_id = {"kategori_id": $('#Kategori_name').val()};
            })

        })
    };



   
    </script>



</section>
</div>

 <div class="control-sidebar-bg"></div>
        </div>