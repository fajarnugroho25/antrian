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
       <h3 class="page-title"> Edit Pengajuan Cuti</h3>               
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
            <tr>
            <td>
                <label><b>Id Cuti</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='id_cuti' class="form-control" value="<?=$cuti->idcuti?>" readonly>
            </td>
            </tr>
            <tr>
                <td>
                    <label><b>Nama</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='nama' id="nama" class="form-control" value="<?=$cuti->yangmemohon?>" readonly>
                </td>   
            </tr> 
         
            <tr>
                <td>
                    <label><b>Bagian</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='bagian' id="bagian" class="form-control" value="<?= $cuti->unit_nama; ?>" readonly>
                </td>   
            </tr> 

            <tr>
                <td>
                    <label><b>Mohon Ijin Cuti </b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='mhari' id="mhari" value="<?=$cuti->mohonizinhari?>"  class="form-control" value="" required> Hari Kerja 
                </td>   
                <td>
                    <div id="datetimepicker" class="input-append date">
                            <input type="text" id="mtglawal" value="<?=$cuti->mohonizintglawal?>" name="mtglawal" class="form-control "  required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                <td>   s/d    </td>
                <td><div id="datetimepicker1" class="input-append date">
                            <input type="text" id="mtglakhir" value="<?=$cuti->mohonizintglakhir?>" name="mtglakhir" class="form-control "  required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div></td>    
            </tr> 

            <tr>
                <td>
                    <label><b>Diijinkan </b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='dhari' id="dhari" class="form-control" value="" readonly> Hari Kerja 
                </td>   
                <td>
                    <div id="datetimepicker2" class="input-append date">
                            <input type="text" id="dtglawal" name="dtglawal" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                <td>   s/d    </td>
                <td><div id="datetimepicker3" class="input-append date">
                            <input type="text" id="dtglakhir" name="dtglakhir" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div></td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Keperluan</b></label>
                </td>
                <td> </td>
                <td>
                    <textarea id="keperluan" name="keperluan"  required><?=$cuti->keperluan?></textarea> 
                </td>   
            </tr> 
            <tr>
                <td>
                    <label><b>Sisa Cuti Tahun</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='sisacutitahun' id="sisacutitahun" class="form-control" value="<?=$cuti->sisacutitahun?>" readonly>
                </td>   
            </tr> 
            <tr>
                <td>
                    <label><b>Jenis Cuti</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="hidden" name="oldjenis" id="oldjenis" value="<?=$cuti->jenis_cuti?>" >
                    <select id="jeniscuti" name="jeniscuti">
                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                        <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                        <option value="Cuti Besar">Cuti Besar</option>
                        <option value="Cuti Menikah">Cuti Menikah</option>
                        
                    </select>
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
                     <button class="btn btn-primary" id="submitPermintaan" type="submit">Edit Pengajuan</button>

                </div>




      </div>
  </div>
  
</body>



 


<link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script>

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/js/bootstrap-select.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>

<script type="text/javascript">

var  dataTableHasil;
var  dataTableunit;
 function getComboA(){
        unit = $('select[name=unit]').val();
        // console.log(kode);
        tampildata(unit);

    };



function tampildata(unit){
  dataTableunit= $('#barang').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListBarangwithkode/"+unit,
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging": true,
                "ordering": true,
                "info":     true,
                "destroy": true,

            
    });


}

    $(document).ready(function () {
          var tempStatus=  $('#oldjenis').val();
          // console.log(tempPemeriksa);
          if (tempStatus != '') {
            var status ='#jeniscuti option[value="'+tempStatus+'"]';
            $(status).attr('selected','selected');
          }else{
          }
          

    });

// $(document).ready( function () {
//     $('#barang').DataTable({
//         "ajax": {
//                 "url": base_url+"index.php/mutasi/ajaxListBarang",
//                 "type": "POST"
//               },
//               "emptyTable": "Tidak Ada Data Pesan",
//               "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
//                 "paging":   true,
//                 "ordering": false,
//                 "info":     false
            
//     });
// } );


    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker1').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });


    $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker3').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });



</script>


<script type="text/javascript">

 



 $(document).on("click", "#submitPermintaan", function(){

       var data ={
         idcuti :$('input[name=id_cuti]').val(),
         mhari : $('input[name=mhari]').val(),
         mtglawal : $('input[name=mtglawal]').val(),
         mtglakhir : $('input[name=mtglakhir]').val(),
         keperluan: $('textarea[name=keperluan]').val(),
         sisacutitahun: $('input[name=sisacutitahun]').val(),
         jeniscuti: $('select[name=jeniscuti]').val(),
       }

       if (data.mhari == '' || data.mtglawal == '' || data.mtglakhir == '' ||  data.keperluan == '') {
        alert('Mohon Lengkapi Data Hari, Tanggal Mulai , Tanggal Akhir, dan Keperluan')
       }else{

        url = "<?php echo base_url();?>pengajuancuti/AddDataCuti";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>pengajuancuti/daftarcutipribadi";
                },
            function(isConfirm){
                  
               }
            });


        }});

  function pilih(id){
      var kelas ='.detail-'+id;
        var data = $(kelas).data('id');
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


  $(document).on("click", "#submitPermintaan", function(){

       var data ={
         idcuti :$('input[name=id_cuti]').val(),
         mhari : $('input[name=mhari]').val(),
         mtglawal : $('input[name=mtglawal]').val(),
         mtglakhir : $('input[name=mtglakhir]').val(),
         keperluan: $('textarea[name=keperluan]').val(),
         jeniscuti: $('select[name=jeniscuti]').val(),
       }

       if (data.mhari == '' || data.mtglawal == '' || data.mtglakhir == '' ||  data.keperluan == '') {
        alert('Mohon Lengkapi Data Hari, Tanggal Mulai , Tanggal Akhir, dan Keperluan')
       }else{

        url = "<?php echo base_url();?>pengajuancuti/editpengajuan";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>pengajuancuti/daftarcutipribadi";
                },
            function(isConfirm){
                  
               }
            });


        }});





 function reload() {
    dataTableHasil.ajax.reload(null,false);
}

 function reload2() {
    dataTableunit.ajax.reload(null,false);
}

</script>
