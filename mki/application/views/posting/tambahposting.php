
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
                        <br><br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <select id="Kategori_name" class="form-control" placeholder="Select category..." name="Kategori_name">
                                
                                </select>
                        </div>
                        </div>
                         <br><br>
                        <div class="form-group">
                            <label for="tiga" class="col-sm-2 control-label">Isi Berita</label>
                            <div class="col-sm-10">
                               <textarea class="form-control content" placeholder="Isi Berita" id="ccc" name="konten"><?php echo isset($data[4])?$data[4]:''; ?></textarea>
                                <br><br>
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
                                    <input style="display:none;" type="file" id="uploadCover" name="file" onchange="preview_image(event,this)"/>
                                     <br><br>
                            </div>
                        </div>

                        <img style="margin-left: 18%; width: 50%"  id="output_image" />
                        
                        <div class="box-footer" >
                        <!-- <input type="submit" class="btn btn-info pull-right" value="Save" > -->
                        <button class="btn btn-info pull-right" onclick="create_koneten()">Save</button>
                        </div>
					</div>
                <!-- </form> -->
            </div>
        </div>
</div>

<script src="<?php echo base_url();?>public/js/jquery.form.js"></script>
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

    $(document).ready(function(){
    $("img").addClass("img-responsive");
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
                 // console.log(data);                                        
                 $('#ccc').summernote('insertImage', data, function ($image) {
                $image.addClass('img-responsive');
            });
                }
            });
        }

     function preview_image(event,tes){
        var sizze = document.getElementById('uploadCover').files[0].size;
        var reader = new FileReader();

        var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
        if (tes.type == "file") {
            var sFileName = tes.value;
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

                if (sizze >= 500000) {
                    swal('Silahkan cek size gambar! ', 'size tidak boleh lebih dari 500kb', 'warning');

                }else{

                reader.onload = function()
              {
                var output = document.getElementById('output_image');
                output.src = reader.result;
              }
                reader.readAsDataURL(event.target.files[0]);

                }
            }
          }
        }
              return true;


      }





    function create_koneten(){
      var form_data = new FormData();

        var Kategori_name = $('select[name=Kategori_name]').val();
        var judul = $('input[name=judul]').val();
        var konten = $('textarea[name=konten]').val();
        var foto = document.getElementById('uploadCover').files;
          form_data.append('konten', konten);
          form_data.append('judul', judul);
          form_data.append('kategori', Kategori_name);
          form_data.append('foto', foto[0]);
        // console.log(datas);
        //id fileinput
        // var elementId = "filefoto";
        if (judul == "" || konten == "" ) {
            swal('Tidak boleh kosong');
        }else{
            url = "<?php echo base_url();?>index.php/cberita/addKonten";
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
                    title: "Konten Berhasil Ditambahkan!",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Selesai",
                    closeOnConfirm: false,
                },
            function(isConfirm){
                    if (isConfirm) {
                        window.location.href = base_url+"index.php/cberita/tambahposting";
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