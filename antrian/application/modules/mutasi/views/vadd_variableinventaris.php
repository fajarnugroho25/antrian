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

    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
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
       <h3 class="page-title"><?php echo $titel; ?> Data Variable Inventaris</h3>               
<div class="well">

<!-- <form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" > -->

       


  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Kelompok</a></li>
    <li><a data-toggle="tab" href="#menu1">Sub Kelompok</a></li>
    <li><a data-toggle="tab" href="#menu2">Sub Kelompok 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Unit</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
          <h2>Tambah Kelompok</h2>
  
      <table>
            <tr>
            <td>
                <label><b>ID</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='kodekelompok'  id="kodekelompok" class="form-control asset" value="<?=$kodejadikel; ?>" readonly>
            </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>nama</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="nama" class="form-control asset" name="nama" > 
                </td>    
            </tr>
            <br>
            <td><button class="btn btn-info left"  onclick="Simpan(1)">Simpan</button></td>
    </table>
    <br><br>

    <table id="kel" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 99%">

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>
            <th>No Urut</th>
            <th>No Kode</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>


    <div id="menu1" class="tab-pane fade">
        <h2>Tambah Sub Kelompok</h2>  
      <table>
            <tr>
                <td>
                    <label><b>Kelompok </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="selectpicker" name='kelompok' id='kelompok' onchange="kelselect();" data-live-search="true">
                        <option value='' disabled selected>Kelompok</option>
                        <?php
                     foreach ($kelompok as $klp) 
                     {
                    //   if ($klp->kode == $gd_penerima) 
                    //     {echo '<option value="'.$klp->kode.'" selected >'.$klp->kode.' - '.$klp->nama.'</option>';}
                    // else 
                    //      {
                            echo '<option value="'.$klp->id_kelompok.'" >'.$klp->nama.'</option>';
                        // }        
                    
                     }
                    ?>
                    </select>
                </td>
                <td>
                    <br><br><br>
            </tr>

            <tr>
                <td>
                    <label><b>ID</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" name='kodesubkel'  id="kodesubkel" class="form-control asset" value="" readonly>
                </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>nama</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="namasubkel" class="form-control asset" name="namasubkel" > 
                </td>    
            </tr>

            
            
            <td><button class="btn btn-info left"  onclick="Simpan(2)">Simpan</button></td>
    </table>
    <br><br>

    <table id="subkel" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 99%" >

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>
            <th>No Urut</th>
            <th>kode subkelompok</th>
            <th>Nama subkelompok</th>
        </tr>



        </thead>
        <tbody>

        </tbody>


    </table>

    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Tambah Sub Kelompok 2</h2>  
      <table>
            <tr>
                <td>
                    <label><b>Sub Kelompok </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="selectpicker" name='subkelompok' id='subkelompok' onchange="subkelselect();" data-live-search="true">
                        <option value='' disabled selected>Sub Kelompok</option>
                        <?php
                     foreach ($subkelompok as $sub) 
                     {
                      //   if ($sub->kode == $gd_penerima) 
                    //     {echo '<option value="'.$sub->kode.'" selected >'.$sub->kode.' - '.$sub->nama.'</option>';}
                    // else 
                    //      {
                            echo '<option value="'.$sub->id_subkel.'" >'.$sub->id_subkel.' - '.$sub->namasubkel.'</option>';
                        // }        
                    
                     }
                    ?>
                    </select>

                </td>
                <td>
                  <br><br><br>
            </tr>


            <tr>
                <td>
                    <label><b>ID</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" name='kodesubkel2'  id="kodesubkel2" class="form-control asset" value="" readonly>
                </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>nama</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="namasubkel2" class="form-control asset" name="namasubkel2" > 
                </td>    
            </tr>
            <td><button class="btn btn-info left"  onclick="Simpan(3)">Simpan</button></td>
    </table>
    <br><br>

    <table id="subkel2" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 99%" >

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>
            <th>No Urut</th>
            <th>kode subkelompok 2</th>
            <th>Nama subkelompok 2</th>
        </tr>
        </thead>
        <tbody>

        </tbody>


    </table>
    </div>



    <div id="menu3" class="tab-pane fade">
       <h2>Tambah Unit </h2>  
      <table>
          <tr>
                <td>
                    <label><b>Kode Unit</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" name='kodeunit'  id="kodeunit" class="form-control asset" value="<?=$kodejadiDunit?>" readonly>
                </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>nama</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="namaunit" class="form-control asset" name="namaunit" > 
                </td>    
            </tr>
            <td><button class="btn btn-info left"  onclick="Simpan(4)">Simpan</button></td>
    </table>
    <br><br>

    <table id="unit" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 99%" >

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>
            <th>kode Unit</th>
            <th>Nama Unit</th>
        </tr>
        </thead>
        <tbody>

        </tbody>


    </table>
    </div>
  </div>
</div>

      </div>

      
  
</body>



 


<link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>public/assets/js/bootstrap-select.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>

<script type="text/javascript">
    

$(document).ready( function () {
   datasubkel= $('#subkel').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListSubkelompok",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": false,
                "info":     false
            
    });
} );

$(document).ready( function () {
   dataKel= $('#kel').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListKelompok",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": false,
                "info":     false
            
    });
} );

$(document).ready( function () {
   datasubkel2= $('#subkel2').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListSubkelompok2",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": false,
                "info":     false
            
    });
} );


$(document).ready( function () {
   dataunit= $('#unit').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListUnit",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": false,
                "info":     false
            
    });
} );





    $(function () {
    $('select').selectpicker();
});


    function pilih(id){
      var kelas ='.detail-'+id;
        var data = $(kelas).data('id');
        $('#belidr').val(data.supnama);
        $('#alamatsup').val(data.supalamat);
  }



  function Simpan(kode){
      if (kode == 1 ) {
        var data ={
        kodekelompok :$('input[name=kodekelompok]').val(),
        nama :$('input[name=nama]').val(),
        kode : 1,

        }
      }
      else if(kode == 2) {
        var data ={
        kodekel : $('select[name=kelompok]').val(),
        kodesubkel :$('input[name=kodesubkel]').val(),
        nama :$('input[name=namasubkel]').val(),
        kode : 2,

       }
     }

       else if(kode == 3) {
        var data ={
        subkelompok : $('select[name=subkelompok]').val(),
        kodesubkel2 :$('input[name=kodesubkel2]').val(),
        nama :$('input[name=namasubkel2]').val(),
        kode : 3,

       }
      }

      else if(kode == 4) {
        var data ={
        kodeunit :$('input[name=kodeunit]').val(),
        nama :$('input[name=namaunit]').val(),
        kode : 4,

       }
      }
       // console.log(data);
        url = "<?php echo base_url();?>mutasi/addkelompok";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                   alert('Data Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>mutasi/tambahvarinven";

                  
                },
            function(isConfirm){
                  
            

                }
            });


        }

 function kelselect() {
        var data ={
        kelompok :$('select[name=kelompok]').val(),
       }
       // console.log(data);
        url = "<?php echo base_url();?>mutasi/getkodekel";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                  // console.log(data);
                    $('#kodesubkel').val(Data);
                  
                },
            function(isConfirm){
                  
            

                }
            });

}

function subkelselect() {
        var data ={
        subkelompok :$('select[name=subkelompok]').val(),
       }
       // console.log(data);
        url = "<?php echo base_url();?>mutasi/getkodesub";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    $('#kodesubkel2').val(Data);
                  
                },
            function(isConfirm){
                  
            

                }
            });

}


 $(document).on("blur",".update", function(){

    var data={
         id : $(this).data("id"),
         column :$(this).data('column'),
         value :$(this).text(),
      }
        edsub1(data);
   });

   function edsub1(data){
    // console.log(data);
        url = base_url+"mutasi/edsub1";

    $.ajax({
      dataType: "TEXT",
      data:data,
      type: "POST",
      url:url,
      success: function(data)
      {
        reloadsubkel();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Gagal silakan coba lagi !');
        document.location = "<?php echo base_url();?>mutasi/tambahvarinven";
      }
    });
   }

   $(document).on("blur",".update1", function(){

    var data={
         id : $(this).data("id"),
         column :$(this).data('column'),
         value :$(this).text(),
      }
        edsub2(data);
   });



   function edsub2(data){
    // console.log(data);
        url = base_url+"mutasi/edsub2";

    $.ajax({
      dataType: "TEXT",
      data:data,
      type: "POST",
      url:url,
      success: function(data)
      {
        reloadsubkel();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Gagal silakan coba lagi !');
        document.location = "<?php echo base_url();?>mutasi/tambahvarinven";
      }
    });
   }


   $(document).on("blur",".unit", function(){

    var data={
         id : $(this).data("id"),
         column :$(this).data('column'),
         value :$(this).text(),
      }
        eunit(data);
   });
   
   function eunit(data){
    // console.log(data);
        url = base_url+"mutasi/eunit";

    $.ajax({
      dataType: "TEXT",
      data:data,
      type: "POST",
      url:url,
      success: function(data)
      {
        reloadsubkel();

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Gagal silakan coba lagi !');
        document.location = "<?php echo base_url();?>mutasi/tambahvarinven";
      }
    });
   }



 function reloadkel() {
    dataKel.ajax.reload(null,false);
}

function reloadsubkel() {
    datasubkel.ajax.reload(null,false);
}



   
</script>