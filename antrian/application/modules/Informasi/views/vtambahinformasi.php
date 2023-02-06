        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambahhasil';
        $button   = 'Simpan';
        $no_rm = '';
        $nama_pasien = '';
        $alamat = '';
        $no_pemeriksa = '';
        $ruang = '';       
        $hasil = '';       
        $status = '1';       
        $tgl_lahir = '';             
        $tgl_pemeriksaan  = '';
        $tgl_selesai = '';
        $jam=date("H:i:s");       
        $gd_penerima = '';       
        $tgl_input = date("Y-m-d H:i:s");  
        $poli = '';    
        $kelamin = '';
   
        ?> 

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/lib/bootstrap/css/bootstrap-select.min.css" type="text/css">
    <script src="<?= base_url('public/assets/sal/sweetalert-dev.js');?>"></script>
    <link rel="stylesheet" href="<?= base_url('public/assets/sal/sweetalert.css');?>">
    
<!-- Latest compiled and minified JavaScript -->

    <link href="<?php echo base_url(); ?>public/assets/css/jquery-ui.css" rel="Stylesheet"></link>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery-ui.js" ></script>

    <style type="text/css">
        th {
            text-align: center;
            }
    </style>

</head>

<body>




<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Data tambah file informasi</h3>               
<div class="well">

<!-- <form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" > -->

       
        
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control" value="<?php echo  $tgl_input ; ?>"   readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>"   readonly></td>
        <td><input type="hidden" id="id_dpjp" name='id_dpjp' class="form-control" value="<?php echo  $this->session->nama; ?>"   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control" value="<?php echo  $status ; ?>"  readonly></td>
        <input type="hidden"  name="gd_penerima" value="<?php echo $gd_penerima; ?>" readonly> 

        


<table border="0">
    <td>
        <table>
          <!--   <tr>
            <td>
                <label><b>Id Cuti</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='id_cuti' class="form-control"  readonly>
            </td>
            </tr>
            <tr> -->
                <td>
                    <label><b>Judul</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" placeholder="Judul" name="judul" id="tiga" value="">
                </td>   
            </tr> 
         

            <tr>
                <td>
                    <label><b>FIle </b></label>
                </td>
                <td> </td>
                <td>
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
                </td>   
                
            </tr> 

           


           
        </table>
    </td>
    


 </table>  

  <!-- </form> -->
  <br>

    <br><br>

      


    <div style="padding-top:20px">
                    <!-- <button class="btn btn-primary" id="simpan" type="submit">Simpan Hasil Pemeriksaan</button> -->
                     <button class="btn btn-primary" id="submitPermintaan" onclick="create_file()" type="submit">Simpan Permintaan</button>

                </div>




      </div>
  </div>
  
</body>



 

  <script>var base_url = '<?php echo base_url() ?>'</script>
<script src="<?php echo base_url();?>public/assets/js/jquery.form.js"></script>
<script src="<?=base_url('public/assets/ajaxfileupload.js')?>"></script>
<script type="text/javascript">      


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
            file: $('input[name=file]').val(),
        }
        //id fileinput
        console.log(datas);
        var elementId = "filefoto";
        if (datas.judul == ""  || datas.file == "") {
            swal('Tidak boleh kosong');
        }else{
            url = base_url+"index.php/informasi/addFile";
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
                        window.location.href = base_url+"index.php/informasi/tambahinformasi";
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
              $('#sizefile'+z).text(Math.round(file.size/100024));
          },
        }
   

      var file = oInput.files[0];
      var reader = new FileReader();
      var size=Math.round(file.size/100024);
      // start pengecekan ukuran file
      if (size>=100000) {
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
