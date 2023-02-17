<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/lib/bootstrap/css/bootstrap-select.min.css" type="text/css">



        
<div class="span10">
            <h3 class="page-title">Data Cuti Karyawan</h3>
            
<!-- <div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>mutasi/tambahinventaris" role="button">Tambah Inventaris</a>
</div>
 -->

<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Unit Karyawan</h5>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name='nik' id="nik"  class="form-control"  readonly>
        
        <table>

          <tr>
                <td>
                    <label><b>Unit Lama</b></label>
                </td>
                <td> </td>
                <td>
                  <input type="text" value = '' name='unitlama' id="unitlama"  class="form-control"  readonly>
                </td>   
            </tr> 
         
          
        <tr>
                <td>
                    <label><b>Unit Baru</b></label>
                </td>
                <td> </td>
                <td>
                   <select class="selectpicker" name='unitkary' id='unitkary' data-live-search="true">
                    <option value='' disabled selected>Unit Karyawan</option>
                    <?php

                     foreach ($unit as $uk) 
                     {
                     echo '<option value="'.$uk->unit_id.'" >'.$uk->unit_id.' - '.$uk->unit_nama.'</option>';
                     }
                    ?>
                    </select>
                </td>   
            </tr> 
         
           
            
        </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info left" id="ubah" data-dismiss="modal">Ubah Unit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 



<div class="well">
    <table >
    <input type="hidden" id="kodeinventaris" name='kodeinventaris' class="form-control"  readonly></td>
            <tr>
                <td>
                    <label><b>Bagian</b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select class="selectpicker" name='unit' id='unit' data-live-search="true">
                        <option value='' disabled selected>Unit</option>
                        <?php
                     foreach ($unit as $u) 
                     {
                      echo '<option value="'.$u->unit_id.'" >'.$u->unit_nama.'</option>';
                     }
                    ?>
                    </select>
                </td>
                <td>
                  <br><br><br>
            </tr>

            <tr>
                <td colspan="3"><button class="btn btn-primary" id="simpan">simpan</button>
              
          </tr>
           
        </table>
<br><br><br>

    <table id="pengajuan" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">


        <thead >
         <tr>
            <th>Nomor </th>
            <th>Nama Karyawan </th>
            <th>NIK</th>
            <th>Hak Cuti Tahunan</th>
            <th>Hak Cuti Besar</th>
            <th>Bagian</th>
            <!-- <th>Aksi</th> -->
        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>


</div>

<!-- <link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script> -->
<script src="<?php echo base_url(); ?>public/assets/js/bootstrap-select.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>
 <script type="text/javascript">


  var  dataTableHasil;

$(document).ready( function () {
   datapengajuan=  $('#pengajuan').DataTable({
        "ajax": {
                "url": base_url+"index.php/pengajuancuti/hakcutibesar",
                "type": "POST"
              },

              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true,
            
                
            
    });
} );

// function cutibesar(id){
//     var data ={
//          id :id
        
//        }

//         url = "<?php echo base_url();?>pengajuancuti/getinfokar";
//             // do_upload
//             $.ajax({
//                 url:url,
//                 data:data,
//                 dataType:"TEXT",
//                 type:"POST",
//                 success:function(data){
//                   hasil = JSON.parse(data);
//                     $("#mymodal").modal("show");
//                     $('input[name=nama]').val(hasil.nama);
//                     $('input[name=nik]').val(hasil.nik);
//                     $('input[name=id]').val(id);
                    
           
//                 },
//                 error:function(){

//                 }
//             });
//           }


  $(document).on("click", "#Simpan", function(){

       var data ={
         id : $('input[name=id]').val(),
         jcb : $('input[name=jcb]').val(),
         
       }
       console.log(data.id);
     
        url = "<?php echo base_url();?>pengajuancuti/editcutibesar";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  $('input[name=jcb]').val('');
                
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    reload();
                },
            function(isConfirm){
                  
               }
            });


        });


   $(document).on("click", "#ubah", function(){

       var data ={
         nik : $('input[name=nik]').val(),
         unitkary: $('select[name=unitkary]').val()
         
       }
       // console.log(data);
     
        url = "<?php echo base_url();?>pengajuancuti/editunitkar";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  $('input[name=unitlama]').val('');
                  reload();
                
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    
                },
            function(isConfirm){
                  
               }
            });


        });



  $(document).on("blur",".hakcuti", function(){

    var data={
         id : $(this).data("id"),
         column :$(this).data('column'),
         value :$(this).text(),
      }
        hakcuti(data);
   });



   function hakcuti(data){
    // console.log(data);
        url = base_url+"pengajuancuti/hakcutiedit";

    $.ajax({
      dataType: "TEXT",
      data:data,
      type: "POST",
      url:url,
      success: function(data)
      {
        reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Gagal silakan coba lagi !');
        document.location = "<?php echo base_url();?>pengajuancuti/daftarkarki";
      }
    });
   }



    function ubahunit(nik){
    var data ={
         nik :nik
        
       }

        url = "<?php echo base_url();?>pengajuancuti/datakar";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(data){   
                    hasil = JSON.parse(data);
                    // console.log(hasil);
                    
                    $("#mymodal").modal("show");
                    $('input[name=unitlama]').val(hasil.unit_nama);
                    $('input[name=nik]').val(hasil.nik);

                   
           
                },
                error:function(){

                }
            });
          }





   $(document).on("blur",".hakcutibesar", function(){

    var data={
         id : $(this).data("id"),
         column :$(this).data('column'),
         value :$(this).text(),
      }
        hakcutibesar(data);
   });



   function hakcutibesar(data){
    // console.log(data);
        url = base_url+"pengajuancuti/hakcutiedit";

    $.ajax({
      dataType: "TEXT",
      data:data,
      type: "POST",
      url:url,
      success: function(data)
      {
        reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Gagal silakan coba lagi !');
        document.location = "<?php echo base_url();?>pengajuancuti/daftarkarki";
      }
    });
   }



   function reload() {
    datapengajuan.ajax.reload(null,false);
}

</script>
    
</div>


