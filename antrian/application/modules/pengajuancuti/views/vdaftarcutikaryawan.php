<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 
 <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">


<script src="<?php echo base_url();?>public/assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
        

<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">KONFIRMASI CUTI</h5>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name='idcuti' id="idcuti" class="form-control"  readonly>
        <table>
          
        <tr>
                <td>
                    <label><b>Nama</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='nama' id="nama" class="form-control"  readonly>
                </td>   
            </tr> 
         
            <tr>
                <td>
                    <label><b>Bagian</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='bagian' id="bagian" class="form-control" readonly>
                </td>   
            </tr> 

            <tr>
                <td>
                    <label><b>Mohon Ijin Cuti </b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" name='mhari' id="mhari" class="form-control" value="" readonly> Hari Kerja 
                </td>   
                <td>
                    <input type="text" id="mtglawal" name="mtglawal" class="form-control "  readonly></input>
                </td> 
                <td>   s/d    </td>
                <td><input type="text" id="mtglakhir" name="mtglakhir" class="form-control "  readonly></input></td>    
            </tr> 

            <tr>
                <td>
                    <label><b>Diijinkan </b></label>
                </td>
                <td> </td>
                <td>
                     <label style="color: red">* harus diisi</label><input type="text" name='dhari' id="dhari" class="form-control" value="" > Hari Kerja 
                </td>   
                <td>
                    <div id="datetimepicker2" class="input-append date">
                            <label style="color: red">* diisi bila tgl diizinkan dan tgl pengajuan tidak sesuai</label> <input type="text" id="dtglawal" name="dtglawal" class="form-control "  ></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                <td>  <br> s/d    </td>
                <td><div id="datetimepicker3" class="input-append date">
                            <br><input type="text" id="dtglakhir" name="dtglakhir" class="form-control "  ></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div></td>    
            </tr> 
        </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info left" id="konfirmasi" data-dismiss="modal">Konfirmasi</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 


<div class="span10">
            <h3 class="page-title">Data Cuti Karyawan</h3>
            


<div class="well">

   <table >
 
           
            <tr>
                <td>
                    <label><b>Jenis Cuti</b></label>
                </td>
                <td> <p><b>:</b></p></td>
                <td>
                    <select class="selectpicker" name='jeniscuti' id='jeniscuti'>
                        <option value='' selected>Jenis Cuti</option>
                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                        <option value="Cuti Besar">Cuti Besar</option>
                        <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                        <option value="Cuti Menikah">Cuti Menikah</option>
                        
                        
                </select>
                </td>
                <td>
                  <br><br><br>
            </tr>

            <tr>
                <td colspan="3"><button class="btn btn-primary" id="search">Cari</button>
              </td>
          </tr>
           
        </table>
<br><br><br>
    <div class="table-responsive">
        <table id="perbaikan" class="table table-striped table-bordered ">
      <thead>
        <tr> 
          <th>No </th>
            <th>Kode Cuti</th>
            <th>Nama Karyawan</th>
            <th>Bagian</th>
            <th>Mengajukan</th>
            <th>Pengajuan Cuti Dari</th>
            <th>Pengajuan Cuti Sampai</th>
            <th>Keperluan</th>
            <th>Jenis Cuti</th>
            <th>Diijinkan</th>
            <th>Status</th>
            <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        

      </tbody>
    </table>
    </div>
    


</div>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>
 <script type="text/javascript">
  
var  dataTablecuti;
  $(document).ready( function () {
  dataTablecuti=  $('#perbaikan').DataTable({
        // "scrollX": true,
        "ajax": {
                "url": base_url+"index.php/pengajuancuti/ajaxListCutiKar",
                "type": "POST"
              },

              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true,
                "autoWidth": true,
            
                
            
    });
} );




    $('#datetimepicker2').datetimepicker({
        format: 'dd-MM-yyyy',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker3').datetimepicker({
        format: 'dd-MM-yyyy',
        language: 'pt-BR',
         locale: 'ru'

    });





  function konfirmasiCuti(id){
    var data ={
         id :id
        
       }

        url = "<?php echo base_url();?>pengajuancuti/getdatakar";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(data){
                    hasil = JSON.parse(data);
                    console.log(hasil);
                    var dat1 =new Date(hasil.mohonizintglawal);
                    var dd = dat1.getDate();
                    var mm = dat1.getMonth()+1; 
                    var yyyy = dat1.getFullYear();

                    var dat2 =new Date(hasil.mohonizintglakhir);
                    var dd2 = dat2.getDate();
                    var mm2 = dat2.getMonth()+1; 
                    var yyyy2 = dat2.getFullYear();


                    $("#mymodal").modal("show");
                    $('input[name=nama]').val(hasil.nama);
                    $('input[name=bagian]').val(hasil.unit_nama);
                    $('input[name=mhari]').val(hasil.mohonizinhari);
                    

                    $('input[name=mtglawal]').val(dat1 =dd+'-'+mm+'-'+yyyy);
                    $('input[name=mtglakhir]').val(dat2 =dd2+'-'+mm2+'-'+yyyy2);
                    $('input[name=idcuti]').val(hasil.idcuti);
           
                },
                error:function(){

                }
            });
          }


  $(document).on("click", "#konfirmasi", function(){

       var data ={
        idcuti :$('input[name=idcuti]').val(),
         dhari : $('input[name=dhari]').val(),
         dtglawal : $('input[name=dtglawal]').val(),
         dtglakhir : $('input[name=dtglakhir]').val(),

         mhari: $('input[name=mhari]').val(),
         mawal : $('input[name=mtglawal]').val(),
         mtglakhir : $('input[name=mtglakhir]').val(),
         
       }
      if (data.dhari == '') {
             alert('Mohon hari diisi dengan benar');
      }
      else if(data.dhari != data.mhari && data.dtglawal == '' && data.dtglakhir == '' ){
            alert('Hari tidak sesuai dengan permintaan mohon isi tanggal');

      }else{
            alert('berhasil simpan');
        url = "<?php echo base_url();?>pengajuancuti/editDataCuti";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  $('input[name=dhari]').val('');
                  $('input[name=dtglawal]').val('');
                  $('input[name=dtglakhir]').val('');
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    reload();
                  // console.log(Data);
                },
            function(isConfirm){
                  
               }
            });
}
        });


    function submitkonfirmasi(idcuti){
        var data ={
         idcuti :idcuti,
       }


        url = "<?php echo base_url();?>pengajuancuti/KonfirmasiCuti";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                alert('Data Telah Dikonfirmasi');
                reload();
           
                },
                error:function(){

                }
            });
    }


function deleteCuti(id){
    url = base_url+"index.php/pengajuancuti/delete";

    var datas = {id:id};
    $.ajax({
      dataType: "TEXT",
      data:datas,
      type: "POST",
      url:url,
      success: function(data)
      {
        alert('Data Berhasil Di hapus'); 
        reload();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        confirm('error data');
      }
    });

  }

  function reload() {
    dataTablecuti.ajax.reload(null,false);
}



$(document).on("click", "#search", function(){

        var data ={
         jeniscuti: $('select[name=jeniscuti]').val(),

       }
       // console.log(data);
       
            
                url = "<?php echo base_url();?>pengajuancuti/getfilter";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    
                    tampilData()
                },
            function(isConfirm){
                  
            

                }
            });
        
        });


function tampilData(){


    dataTablePencapaian = $('#perbaikan').DataTable({
                "destroy": true,
                "ajax": {
                  "url": base_url+"index.php/pengajuancuti/ajaxListCutiKar/",
                  "dataSrc": "data"
              },
                "emptyTable": "Tidak Ada Data Pesan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true
    });
   }
   
</script>
    
</div>


