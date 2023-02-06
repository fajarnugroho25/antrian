<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 
 <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">


<script src="<?php echo base_url();?>public/assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
        




<div class="span10">
            <h3 class="page-title">Data All Cuti Karyawan</h3>
            


<div class="well">

  

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
            <th>Diijinkan</th>
            <th>Status</th>
            <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        

      </tbody>
    </table>


</div>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>
 <script type="text/javascript">
  
var  dataTablecuti;
  $(document).ready( function () {
  dataTablecuti=  $('#perbaikan').DataTable({
        "ajax": {
                "url": base_url+"index.php/pengajuancuti/ajaxListCutiAllKar",
                "type": "POST"
              },

              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": true,
                "info":     true,
            
                
            
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

                    var dat2 =new Date(hasil.mohonizintglawal);
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
       if (data.dhari == '' ) {
             alert('hari diizinkan harap diisi');
            
          }else{
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
   
</script>
    
</div>


