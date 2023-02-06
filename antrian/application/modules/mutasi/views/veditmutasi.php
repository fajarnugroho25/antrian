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
       <h3 class="page-title"><?php echo $titel; ?> Permintaan Mutasi</h3>               
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
                <label><b>ID</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='id_mutasi' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>Bagian</b></label>
                </td>
                <td> </td>
                <td>
                    <select name='bagian' id='bagian'>
                   <?php
                     foreach ($unit as $u) 
                     {
                      echo '<option value="'.$u->unit_id.'" >'.$u->unit_nama.'</option>';}  
                   
                    ?>
                    </select>
                </td>   
            </tr> 

            <tr>
                <td>
                    <label><b>Gudang Penerima </b></label>
                </td>
                <td> </td>
                <td>
                    <select name='gd_penerima' id='gd_penerima'>
                    <option value='' disabled selected>Pilih Gudang Penerima</option>
                   <?php
                     foreach ($gudang as $gd) 
                     {
                      if ($gd->gudang_id == $gd_penerima) 
                        {echo '<option value="'.$gd->gudang_id.'" selected >'.$gd->nama_gudang.'</option>';}
                    else 
                         {echo '<option value="'.$gd->gudang_id.'" >'.$gd->nama_gudang.'</option>';}        
                    
                     }
                    ?>
                    </select>
                </td>
                <td>


            </tr>

            <tr>
                <td>
                    <label><b>Alasan Mutasi </b></label>
                </td>
                <td> </td>
                <td>
                    <textarea id="alasan" name="alasan"></textarea> 
                </td>    
            </tr> 

           
        </table>
    </td>
    


 </table>  

  <!-- </form> -->
  <br>
  <hr>



  <table>
    <input type="hidden" id="kodeinventaris" name='kodeinventaris' class="form-control"  readonly></td>
            
            <tr>
                <td>
                    <label><b>No Kode Barang</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="nokodebar" name="nokodebar" > 
                    <button type="button" id="btnSubmit" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info">Barang</button>
                </td>    
            </tr> 
             

            <tr>
                <td>
                    <label><b>Nama Barang </b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="namabarang" name="namabarang" > 
                </td>    
            </tr> 

            <tr>
                <td>
                    <label><b>Kuantitas</b></label>
                </td>
                <td> </td>
                <td>
                    <select id="kuantitas" name="kuantitas">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Satuan</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="satuan" name="satuan" value=""  > 
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Keterangan</b></label>
                </td>
                <td> </td>
                <td>
                    <textarea id="keterangan" name="keterangan"></textarea> 
                </td>    
            </tr> 

            
            <td><button class="btn btn-info left" id="tambahdata">Tambahkan</button></td>

           
        </table>


  
    <br><br>

      <table id="hasil" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="text-align: center; border: 1px solid black; ">

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>

            <th>No Urut</th>
            <th>No Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kualitas</th>
            <th>Satuan</th>
            <th>Keterangan</th>
            <th>Delete</th>

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




$(document).ready( function () {
   dataTableHasil= $('#hasil').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListBarangMutasi",
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
        var data ={
         nokodebar :$('input[name=nokodebar]').val(),
         kuantitas : $('select[name=kuantitas]').val(),
         namabarang : $('input[name=namabarang]').val(),
         satuan : $('input[name=satuan]').val(),
         keterangan: $('textarea[name=keterangan]').val(),
         
        
       }
       // console.log(data);
        url = "<?php echo base_url();?>mutasi/addbarangMutasi";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    // console.log(Data);
                    nokodebar =$('input[name=nokodebar]').val('');
                    kualitas = $('input[name=kualitas]').val('');
                    namabarang = $('input[name=namabarang]').val('');
                    satuan = $('input[name=satuan]').val('');
                    keterangan= $('textarea[name=keterangan]').val('');
                    kodeinven= $('textarea[name=kodeinventaris]').val('');
                  reload();
           
                },
                error:function(){

                }
            });
    });


 $(document).on("click", "#submitPermintaan", function(){

        var data ={
        id_mutasi :$('input[name=id_mutasi]').val(),
         bagian :$('select[name=bagian]').val(),
         gd_penerima: $('select[name=gd_penerima]').val(),
         alasan : $('textarea[name=alasan]').val()

       }

       // console.log(data);
            
          if (data.gd_penerima == null || data.alasan == '') {
             alert('Harap semua data diisi');
             document.location = "<?php echo base_url();?>mutasi/tambahmutasi";
          }else{

        url = "<?php echo base_url();?>mutasi/AddDataMutasi";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    // console.log(Data);
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>mutasi/tambahmutasi";
                },
            function(isConfirm){
                  
            

                }
            });
        }


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
