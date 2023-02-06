
<div class="content-wrapper">                   
<section class="content">



<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Input Berita</h3>
                </div>
                <!-- <form class="form-horizontal" method="post" enctype="multipart/form-data"> -->
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
                            <label for="tiga" class="col-sm-2 control-label">Konten File</label>
                            <div class="col-sm-10">
                                <textarea class="form-control content" placeholder="Isi konten file" id="kfile" name="kfile"></textarea>
                        </div>
                        </div>
                         <br><br>
                        <div class="panel " >
                            <!-- <div class="panel-heading">
                                <h3 class="panel-title" align="center" style="padding-right: 120px;">Preview</h3>
                            </div>   -->
                        <div class="panel-body pb0 pt0 pl0 pr0">
                        <!-- START Statistic Widget -->
                                      
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
                                    Pilih File
                            </label>
                        <input style="display:none;" type="file" id="filefoto" name="file" onchange="cek_fileFoto(this,z='',1);" />
                        </div>
                        </div>
                            </div>
                        </div> 
                        <br><br>      
                            <div class="box-footer">
                            <!-- <input type="submit" class="btn btn-info pull-right" value="Save" > -->
                            <button class="btn btn-info pull-right" onclick="create_file()">Save</button>
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


  function create_file(){
      var datas = {
            judul : $('input[name=judul]').val(),
            // editor1 : htmlspecialchars(CKEDITOR.instances.editor1.getData()),
            file: $('[name=file]').val(),
            kategori : $('select[name=Kategori_name]').val(),
            kfile : $('textarea[name=kfile]').val(),
        }
        //id fileinput
        console.log(datas);
        var elementId = "filefoto";
        if (datas.judul == ""  || datas.file == "") {
            swal('Tidak boleh kosong');
        }else{
            url = base_url+"index.php/cberita/addFile";
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
                    title: "File Berhasil Ditambahkan!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,
                },
            function(isConfirm){
                    if (isConfirm) {
                        window.location.href = base_url+"index.php/cberita/tambahfile";
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
        swal('Silahkan cek file size Foto!','File size foto maksimal 1000kb','warning');
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
                swal('Silahkan cek type extension gambar! ', 'Type yang bisa di upload hanya ".pdf"', 'warning');
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