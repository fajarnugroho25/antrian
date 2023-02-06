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
       <h3 class="page-title"><?php echo $titel; ?>  Hasil Pemeriksaan </h3>               
<div class="well">

<!-- <form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" > -->

       
        
<input type="hidden" id="idpasien" name='idpasien' class="form-control" value="<?=$pasien->idpasien;?>"   readonly>
<input type="hidden" id="idkamar" name='idkamar' class="form-control" value="<?=$pasien->idkamar;?>"   readonly>

  <table>
            
            <tr>
                <td>
                    <label><b>No RM</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="norm" class="form-control asset" value="<?=$pasien->rmpasien;?>" name="norm" readonly> 
                </td>    
            </tr> 
             

            <tr>
                <td>
                    <label><b>Nama Pasien </b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="namapasien" class="form-control asset" value="<?=$pasien->namapasien;?>" name="namapasien" readonly> 
                </td>    
            </tr> 

             
            <tr>
                <td>
                    <label><b>Umur</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="umurpasien" class="form-control asset" value="<?=$pasien->umurpasien;?>" name="umurpasien" readonly> 
                </td>    
            </tr> 
       
            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td> </td>
                <td>
                  <textarea  id="alamat" name="alamat" class="form-control asset" readonly><?=$pasien->alamatpasien;?></textarea>
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>DPJP</b></label>
                </td>
                <td> </td>
                <td>
                
                    <select class="form-control asset" name='dokter' id='dokter' data-live-search="true">
                        <?php
                     foreach ($dokterdpjp as $dktr) 
                     {

                      if ($dktr->id == $pasien->id) {
                            echo '<option value="'.$dktr->id.'" selected>'.$dktr->nama_dokter.'</option>';                      
                  }
                   else{
                            echo '<option value="'.$dktr->id.'" >'.$dktr->nama_dokter.'</option>';
                          }
                    
                     }
                    ?>
                    </select> 
                </td>    
            </tr> 



            <tr>
                <td>
                    <label><b>Ruang</b></label>
                </td>
                <td> </td>
                <td>
                  <!--  <input type="text" id="kamar" class="form-control asset" value="<?=$pasien->namakamar;?>" name="kamar" readonly> -->
                  

                  <select class="form-control asset" name='kamar' id='kamar' data-live-search="true">
                        <option value=''  selected>Kamar</option>
                        <?php
                     foreach ($kamarload as $kmr) 
                     {

                      if ($kmr->idkamar == $pasien ->idkamar) {
                            echo '<option value="'.$kmr->idkamar.'" selected>'.$kmr->idkamar.' - '.$kmr->namakamar.'</option>';                      
                  }
                   else{
                            echo '<option value="'.$kmr->idkamar.'" >'.$kmr->idkamar.' - '.$kmr->namakamar.'</option>';
                          }
                    
                     }
                    ?>
                    </select> 
                </td>    
            </tr> 
           
        </table>
        <hr><hr>
        <table>


          <tr>
                <td>
                    <label><b>Keterangan</b></label>
                </td>
                <td> </td>
                <td>
                  <textarea class="form-control asset"  id="keterangan"  name="keterangan"></textarea>
                </td>    
            </tr> 


            <tr>
                <td>
                    <label><b>Hasil Pemeriksaan</b></label>
                </td>
                <td> </td>
                <td>
                  <textarea class="form-control content asset" placeholder="Isi Berita" id="hasilpem" name="hasilpem"><?php echo isset($data[4])?$data[4]:''; ?></textarea>
                  <!-- <textarea class="form-control " cols="0" rows="20" id="hasilpem"  name="hasilpem"></textarea> -->
                </td>    
            </tr> 

             
            </tr> 
        </table>
         <br><br>

        <button class="btn btn-primary" id="submitHasil" type="submit">Simpan Hasil</button>

      <br><br> <br>
  
   

      <table id="hasil" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="text-align: center; border: 1px solid black; ">

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>
            <th>Nomor</th>
            <th>Nomor RM</th>
            <th>Nama</th>
            <th>Hasil Pemeriksaan</th>
            <th>Tanggal</th>
            <th>Hari Ke</th>
        

        </tr>



        </thead>
        <tbody>

        </tbody>


    </table>


    <div style="padding-top:20px">
                    <!-- <button class="btn btn-primary" id="simpan" type="submit">Simpan Hasil Pemeriksaan</button> -->

                </div>




      </div>
  </div>
  
</body>



 


<link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script>

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/jquery.form.js"></script>
<link href="<?php echo base_url();?>public/assets/summernote/summernote-bs4.css" rel="stylesheet">
      <script src="<?php echo base_url();?>public/assets/summernote/summernote-bs4.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>

<script type="text/javascript">

var  dataTableHasil;
var  dataTableunit;
 function getComboA(){
        unit = $('select[name=unit]').val();
        // console.log(kode);
        tampildata(unit);

    };


rmpasien = document.getElementById("norm").value; 
$(document).ready( function () {

   dataTableHasil= $('#hasil').DataTable({
    
        "ajax": {
                "url": base_url+"index.php/daftarpasien/ajaxListpemeriksaan/"+rmpasien,
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": false,
                "info":     false,



            
    });
} );
</script>


<script type="text/javascript">


  //edtor summernote
    $('#hasilpem').summernote({
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
 

    $(document).on("click", "#submitHasil", function(){
        var data ={
         rmpasien :$('input[name=norm]').val(),
         hasilpem : $('textarea[name=hasilpem]').val(),
         kamar :$('select[name=kamar]').val(),
         idpasien :$('input[name=idpasien]').val(),
         idkamar :$('input[name=idkamar]').val(),
         keterangan :$('textarea[name=keterangan]').val(),
         dokter :$('select[name=dokter]').val(),
       }
       // console.log(data.dokter);
        url = "<?php echo base_url();?>daftarpasien/addhasilpemeriksaan";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    // console.log(Data);
                    $('#hasilpem').summernote('code', '');
                    ket =$('textarea[name=keterangan]').val('');
                    
                  reload();
           
                },
                error:function(){

                }
            });
    });



  function pilih(id){
      var kelas ='.detail-'+id;
        var data = $(kelas).data('id');
        // console.log(data);
        $('#nokodebar').val(data.assetnoreff);
        $('#namabarang').val(data.assetnama);
        $('#kodeinventaris').val(data.assetnomor);
  }

  function deleteH(id){
    url = base_url+"index.php/mutasi/delete";

    var datas = {id:id};
    $.ajax({
      dataType: "TEXT",
      data:datas,
      type: "POST",
      url:url,
      success: function(data)
      {
        reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        confirm('error data');
      }
    });

  }





 function reload() {
    dataTableHasil.ajax.reload(null,false);
}

 function reload2() {
    dataTableunit.ajax.reload(null,false);
}

</script>
