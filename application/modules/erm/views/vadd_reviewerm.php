
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
        tr th {
            text-align: center;
            }
    </style>

</head>

<body>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LIST BARANG</h5>
        </button>
      </div>
      <div class="modal-body">
        <h5 align="center" style="color: red;">Silahkan Pilih Unit Terlebih Dahulu</h5>
        <table id="barang" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">

                    Unit&emsp;<select class="selectpicker" onchange="getComboA()" name='unit' id='unit' data-live-search="true">
                        <option value='' selected>Unit</option>
                        <?php
                     foreach ($dunit as $u) 
                     {
                    //     if ($u->kode == $gd_penerima) 
                    //     {echo '<option value="'.$u->kode.'" selected >'.$u->kode.' - '.$u->nama.'</option>';}
                    // else 
                    //      {
                            echo '<option value="'.$u->id_unit2.'" >'.$u->namaunit2.'</option>';
                        // }    
                    
                     }
                    ?>
                    </select>
                    <br><br> <br>

            
        <thead >
         <tr>
            <th>No</th>
            <th>Kode</th>
            <th>No Asset </th>
            <th>Nama</th>
            <th>Kelompok</th>
            <th>Unit </th>
            <th>Aksi</th>
             
        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="span10">
       <h3 class="page-title">Review E-RM Rawat Jalan</h3>               
<div class="well">

<!-- <form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" > -->

       
        
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control" value=""   readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control" value=""   readonly></td>
        <td><input type="hidden" id="id_dpjp" name='id_dpjp' class="form-control" value=""   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control" value=""  readonly></td>

        


<table border="0">
    <td>
        <table>
            <tr>
            <td>
                <label><b>ID</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='iderm' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>Dokter Pemeriksa</b></label>
                </td>
                <td> </td>
                <td>
                    <select name='kode_dokter' id='kode_dokter'>
                    <option value='' disabled selected>Pilih Dokter Pemeriksa</option>
                   <?php
                     foreach ($dpjp as $cdpjp) 
                     {
                      if ($cdpjp->id == $kode_dokter) 
                        {echo '<option value="'.$cdpjp->id.'" selected >'.$cdpjp->nama_dokter.'</option>';}
                    else 
                         {echo '<option value="'.$cdpjp->id.'" >'.$cdpjp->nama_dokter.'</option>';}        
                    
                     }
                    ?>
                    </select>
                </td>
                <td>
            </tr>

            <tr>
                <td>
                    <label><b>Nama Reviewer </b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" value="<?=$userinput?>" id="nreviewer" name="nreviewer" > 
                </td>
                <td>


            </tr>

            
           
        </table>
    </td>
    


 </table>  

  <!-- </form> -->
  <br>
  <hr>



  <table >

        <tr>
            <th rowspan="2">No RM</th>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" id="norm" name="norm" > </td>
           
        </tr>
        
        <tr>
            <th rowspan="4"><label><b>Asesmen Medis </b></label> </th>
        </tr>
        <tr>
            <td ><input type="checkbox" class="form-check-input" id="medlkp" name="medlkp" value=""></td>
            <td> <label > Lengkap</label></td>
        </tr>
        <tr>
            <td><input type="checkbox" id="medtl" name="medtl" value=""></td>
            <td><label > Tidak lengkap</label></td>
        </tr>
        <tr>
            <td></td>
            <td><label > Keterangan</label><br>
                <textarea id="ketmed" name="ketmed"></textarea> </td>
           
        </tr>


        <tr>
            <th rowspan="4"><label><b>Asesmen Keperawatan </b></label></th>
        </tr>
        <tr>
            <td ><input type="checkbox" class="form-check-input" id="keplkp" name="keplkp" value=""></td>
            <td> <label > Lengkap</label></td>
        </tr>
        <tr>
            <td><input type="checkbox" id="keptl" name="keptl" value=""></td>
            <td><label > Tidak lengkap</label></td>
        </tr>
        <tr>
            <td></td>
            <td><label > Keterangan</label><br>
                <textarea id="ketkep" name="ketkep"></textarea> </td>
           
        </tr>

            
            <td><button class="btn btn-info left" id="tambahdata">Tambahkan</button></td>

           
        </table>


  
    <br><br>

      <table id="hasil" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="text-align: center; border: 1px solid black; ">

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>

            <th rowspan="2">No Urut</th>
             <th rowspan="2">No RM</th>
            <th colspan="3">Assesmen Medis</th>
            <th colspan="3">Assesmen Keperawatan</th>
        </tr>

        <tr>

            <th>Lengkap</th>
            <th>Tidak Lengkap</th>
            <th>Keterangan</th>
            <th>Lengkap</th>
            <th>Tidak Lengkap</th>
            <th>Keterangan</th>
            <th>Aksi</th>
           
        </tr>





        </thead>
        <tbody>

        </tbody>


    </table>


    <div style="padding-top:20px">
                    <!-- <button class="btn btn-primary" id="simpan" type="submit">Simpan Hasil Pemeriksaan</button> -->
                     <button class="btn btn-primary" id="submitPermintaan" type="submit">Simpan Permintaan</button>

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




$(document).ready( function () {
   dataTableHasil= $('#hasil').DataTable({
        "ajax": {
                "url": base_url+"index.php/erm/ajaxListisierm",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": false,
                "info":     false
            
    });
} );
    
    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd'+'/'+' hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker1').datetimepicker({
        format: 'yyyy-MM-dd'+'/'+' hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });



</script>


<script type="text/javascript">

 

    $(document).on("click", "#tambahdata", function(){

        medlkp = document.getElementById("medlkp");  
        medtl = document.getElementById("medtl");  
        keplkp = document.getElementById("keplkp"); 
        keptl = document.getElementById("keptl"); 

        if (medlkp.checked  ==true) {
            hslmedlkp = '1';
        }else{
            hslmedlkp = '0';
        }

         if (medtl.checked  == true ) {
            hslmedtl = '1';
        }else{
            hslmedtl = '0';
        }

         if (keplkp.checked == true ) {
            hslkeplkp = '1';
        }else{
            hslkeplkp = '0';
        }

         if (keptl.checked == true ) {
            hslkeptl = '1';
        }else{
            hslkeptl = '0';
        }


        var data ={
         norm :$('input[name=norm]').val(),
         // medlkp : $('input[name=medlkp]').val(),
         hslmedlkp,
         hslmedtl,
         hslkeplkp,
         hslkeptl,
         ketmed : $('textarea[name=ketmed]').val(),
         ketkep: $('textarea[name=ketkep]').val(),
         iderm: $('input[name=iderm]').val(),
         
         
        
       }
       // console.log(data);
        url = "<?php echo base_url();?>erm/adddatasesmen";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    console.log(Data);
                    norm =$('input[name=norm]').val('');
                    medlkp = document.getElementById("medlkp").checked = false;
                    medtl = document.getElementById("medtl").checked = false;
                    keplkp = document.getElementById("keplkp").checked = false;
                    keptl= document.getElementById("keptl").checked = false;
                    ketmed= $('textarea[name=ketmed]').val('');
                    ketkep= $('textarea[name=ketkep]').val('');
                  reload();
           
                },
                error:function(){

                }
            });
    });


 $(document).on("click", "#submitPermintaan", function(){

        var data ={
        iderm: $('input[name=iderm]').val(),
         kode_dokter :$('select[name=kode_dokter]').val(),
         nreviewer: $('input[name=nreviewer]').val(),

       }

       // console.log(data);
        url = "<?php echo base_url();?>erm/AddDataMutasi";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    // console.log(Data);
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>erm/daftarlisterm";
                },
            function(isConfirm){
                  
            

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
    url = base_url+"index.php/erm/delete";

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
