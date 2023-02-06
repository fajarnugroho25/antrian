
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
                    
                        
                        <br><br>
                        <div class="box-footer">
                        <!-- <input type="submit" class="btn btn-info pull-right" value="Save" > -->
                        <button class="btn btn-info pull-right" onclick="create_koneten()">Save</button>
                        </div>
					</div>
                <!-- </form> -->
            </div>
        </div>
</div>


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





      function create_koneten(){
      var datas = {
            judul : $('input[name=judul]').val(),
            konten : $('textarea[name=konten]').val(),
            kategori : $('select[name=category]').val(),
            // editor1 : htmlspecialchars(CKEDITOR.instances.editor1.getData()),
            // foto: $('[name=foto]').val(),
        }
        console.log(datas);
        //id fileinput
        // console.log(datas);
        // var elementId = "filefoto";
        if (datas.judul == "" || datas.konten == "" ) {
            swal('Tidak boleh kosong');
        }else{
            url = "<?php echo base_url();?>index.php/cberita/addKonten";
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





   
    </script>



</section>
</div>

 <div class="control-sidebar-bg"></div>
        </div>