        <?php 
        $id   = '';
        $titel   = 'Tambah';
        // $button   = 'Simpan';
        $aksi   = 'AddPasien';
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
        $kode_dokter = '';       
        $tgl_input = date("Y-m-d H:i:s");  
        $poli = '';    
        $kelamin = '';

        ?> 

<head>

    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script>  

    

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
       <h3 class="page-title"><?php echo $titel; ?> Hasil Bank Darah</h3>               
<div class="well">


       
        
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control"    readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control"    readonly></td>
        <td><input type="hidden" id="id_dpjp" name='id_dpjp' class="form-control"   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control"   readonly></td>
        <input type="hidden"  name="kode_dokter"  readonly> 
        

 <!-- <form id="user" method="post" action="<?php echo base_url(); ?>bankdarah/<?php echo $aksi; ?>"> -->
<table border="0" >
    <td>
        <table>
            <tr>
            <td>
                <label><b>ID</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='id_pasien' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
            </tr>
            <tr>
                <td>
                    <label><b>No RM </b></label>
                </td>
                <td></td>
                <td>      
                             
                    <input type="text"  id="no_rm" name="no_rm" placeholder="Input RM, Lalu Klik Fill --->>"   >   
                    <button type="button" id="btnSubmit" class="btn btn-info">Fill</button>
                
                </td>               
            </tr>
            
            
            <tr>
                <td>
                    <label><b>Nama Pasien</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="nama_pasien" name="nama_pasien"  readonly >
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="alamat" name="alamat"  readonly > 
                </td>    
            </tr> 
           
             <tr>
                <td>
                    <label><b>Tanggal Lahir</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="tgl_lahir" name="tgl_lahir"  placeholder="DD/MM/YYYY" readonly >
                </td>    
            </tr> 

             <tr>
                <td>
                    <label><b>Jenis Kelamin</b></label>
                </td>
                <td></td>
                <td>
                    <input type="radio" id="kelamin1" name="kelamin" value="L" <?php if ($kelamin=='L') {echo 'checked';} else  {echo '';}  ?> required> Laki -Laki &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="kelamin2" name="kelamin" value="P" <?php if ($kelamin=='P') {echo 'checked';} else  {echo '';}  ?> required> Perempuan </br></br> 
                </td>    
            </tr> 


            <tr>
                <td>
                    <label><b>Jenis Darah</b></label>
                </td>
                <td> </td>
                <td>
                    <select name='janisdarah' id='janisdarah'>
                        <option value='' selected>Jenis Darah</option>
                        <option value="1">PRC</option>
                        <option value="2">WB</option>
                </select>
                </td>
                <td>
            </tr>

           
        </table>
    </td>
    <td> &nbsp &nbsp &nbsp &nbsp</td>
    <td valign="top">
        <table>
      

            <tr>
                <td>
                    <label><b>No Pemeriksaan</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" name="no_pemeriksaan"   > 

                </td>    
            </tr>  

            <tr>
                <td>
                    <label><b>Tgl / Jam Pemeriksaan</b></label>
                </td>
                <td> </td>
                <td>
                    <div id="datetimepicker" class="input-append date">
                            <input type="text" id="tgl_pemeriksaan" name="tgl_pemeriksaan" readonly="readonly"  required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td>    
            </tr>

            <tr>
                <td>
                    <label><b>Tgl / Jam Selesai</b></label>
                </td>
                <td> </td>
                <td>
                    <div id="datetimepicker1" class="input-append date">
                            <input type="text" id="tgl_selesai" name="tgl_selesai" readonly="readonly" required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td>    
            </tr>

            <tr>
                <td>
                    <label><b>Ruang</b></label>
                </td>
                <td> </td>
                <td>
                     <input type="text" name="ruangan" > 
                </td>
                <td>
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
                    <label><b>Pemeriksa</b></label>
                </td>
                <td> </td>
                <td>
                    <select name='pemeriksa' id='pemeriksa'>
                        <option value='' selected>Pemeriksa</option>
                        <option value="Dyan Surya, A.Md">Dyan Surya, A.Md</option>
                        <option value="Veronica Susi, A.Md">Veronica Susi, A.Md</option>
                        <option value="Setyoningsih Eko, A.Md">Setyoningsih Eko, A.Md</option>
                        <option value="Aprilia Kusumaningrum, A.Md">Aprilia Kusumaningrum, A.Md</option>
                        <option value="Asti Dwi, A.Md">Asti Dwi, A.Md</option>
                        <option value="Vika Hana, A.Md">Vika Hana, A.Md</option>
                        <option value="Agnes Intan, A.Md">Agnes Intan, A.Md</option>
                </select>
                </td>
                <td>
            </tr>
          
            
           
            
        </table>
    </td>


 </table>  

  

  <br>


  <table id="" border="1px"  border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="text-align: center; border: 1px solid black; "  >
        <tr>

            <th rowspan="3" >Identitas</th>
            <th colspan="7">Pemeriksaan Golongan Darah</th>
             <th colspan="4">Pemeriksaan Uji Cocok Serasi</th>
             <th rowspan="3">Keterangan</th>
             <th rowspan="3">aksi</th>

        </tr>



        <tr>

            <th colspan="2">Anti</th>

            <th colspan="3">Sel</th>
            <th rowspan="2">Anti D</th>
            <th rowspan="2">Gol/Rh</th>
            <th colspan="4">Gel Test</th>

        </tr>
        <tr>
            <th>-A</th>
            <th>-B</th>



            <th>A</th>
            <th>B</th>
            <th>O</th>


            <th>Mayor</th>
            <th>Minor</th>
            <th>AC</th>
            <th>AP</th>



        </tr>
        <tr>

            <td><input type="text" style="width:85%;"  name="identitas" ></td>
            <td><select class="form-control ket"  style="width:110%"  name="minA1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="plusA1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="A1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="B1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="O1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="AD1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:100%" name="RH1">
                  <option value="" ></option>
                  <option value="A/+" >A/+</option>
                  <option value="B/+" >B/+</option>
                  <option value="O/+" >O/+</option>
                  <option value="AB/+" >AB/+</option>
                  <option value="A/-" >A/-</option>
                  <option value="B/-" >B/-</option>
                  <option value="O/-" >O/-</option>
                  <option value="AB/-" >AB/-</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="mayor1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="minor1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="AC1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:110%" name="AP1">
                  <option value="" ></option>
                  <option value="-" >-</option>
                  <option value="+" >+</option>
                </select></td>
            <td><select class="form-control ket" style="width:100%" name="ket">
              <option value="" ></option>
              <option value="1" >Compatible</option>
              <option value="2" >Incompatible</option>
            </select>
          </td>
          <td><button class="btn btn-primary left" id="tambahHasilP">Tambahkan</button></td>

        </tr>

    </table>

    <br><br>

      <table id="hasil" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="text-align: center; border: 1px solid black; ">

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>

            <th rowspan="3" >Identitas</th>
            <th colspan="7">Pemeriksaan Golongan Darah</th>
             <th colspan="4">Pemeriksaan Uji Cocok Serasi</th>
             <th rowspan="3">Keterangan</th>
             <th rowspan="3">aksi</th>

        </tr>



        <tr>

            <th colspan="2">Anti</th>

            <th colspan="3">Sel</th>
            <th rowspan="2">Anti D</th>
            <th rowspan="2">Gol/Rh</th>
            <th colspan="4">Gel Test</th>

        </tr>
        <tr>
            <th>-A</th>
            <th>-B</th>



            <th>A</th>
            <th>B</th>
            <th>O</th>


            <th>Mayor</th>
            <th>Minor</th>
            <th>AC</th>
            <th>AP</th>



        </tr>
        </thead>
        <tbody>

        </tbody>


    </table>

    <div style="padding-top:20px">
                    <!-- <button class="btn btn-primary" id="simpan" type="submit">Simpan Hasil Pemeriksaan</button> -->
                     <button class="btn btn-primary" id="submitHasil" type="submit">Simpan Hasil Pemeriksaan</button>

                </div>
   
    <!-- </form> -->



      </div>
  </div>
  
</body>



 


<link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>
<script type="text/javascript">


var  dataTableHasil;

    $(document).ready( function () {
    dataTableHasil = $('#hasil').DataTable({
        "ajax": {
                "url": base_url+"index.php/bankdarah/ajaxListHasil",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   false,
                "ordering": false,
                "info":     false
            
    });
} );



    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker1').datetimepicker({
        format: 'yyyy-MM-dd hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });





  
$(document).ready(function(){
    $('#btnSubmit').click(function(){
        var datas = {
            no_rm: $('#no_rm').val(),
           
        }
   
            url = "<?php echo site_url() . '/pasien/cek_hisys'; ?>";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(data){
                  
                  obj =  JSON.parse(data)

                  $('#nama_pasien').val(obj.nama);
                  $('#alamat').val(obj.alamat);
                  $('#tgl_lahir').val(obj.tgl_lahir); 

                  if (obj.jenis_kelamin == 'L') {
                   document.getElementById("kelamin1").checked = true;
                    }
                else{
                    document.getElementById("kelamin2").checked = true;
                    }              

        
                },
                error:function(){
                    
                }
            });



  });
            });


    $(document).on("click", "#tambahHasilP", function(){
        var data ={
        identitas :$('input[name=identitas]').val(),
         minA1 :$('select[name=minA1]').val(),
         plusA1 : $('select[name=plusA1]').val(),
         A1 : $('select[name=A1]').val(),
         B1 : $('select[name=B1]').val(),
         O1: $('select[name=O1]').val(),
         AD1: $('select[name=AD1]').val(),
         RH1: $('select[name=RH1]').val(),
         mayor1 :$('select[name=mayor1]').val(),
         minor1: $('select[name=minor1]').val(),
         AC1: $('select[name=AC1]').val(),
         AP1: $('select[name=AP1]').val(),
         ket: $('select[name=ket]').val(),
         id_pasien :$('input[name=id_pasien]').val(),
       }

       // console.log(data);

            url = "<?php echo base_url();?>bankdarah/addHasilB";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    console.log(Data);
                    identitas =$('input[name=identitas]').val('');
                    minA1 =$('select[name=minA1]').val('');
                    plusA1 = $('select[name=plusA1]').val('');
                    A1 = $('select[name=A1]').val('');
                    B1 = $('select[name=B1]').val('');
                    O1= $('select[name=O1]').val('');
                    AD1= $('select[name=AD1]').val('');
                    RH1= $('select[name=RH1]').val('');
                    mayor1 =$('select[name=mayor1]').val('');
                    minor1= $('select[name=minor1]').val('');
                    AC1= $('select[name=AC1]').val('');
                    AP1= $('select[name=AP1]').val('');
                    ket= $('select[name=ket]').val('');
                  reload();
         
                },
                error:function(){

                }
            });
});


    $(document).on("blur",".update", function(){

    var data={
         id : $(this).data("id"),
         column :$(this).data('column'),
         value :$(this).text(),
      }
        update_data(data);
   });

   function update_data(data){
    // console.log(data);
        url = base_url+"bankdarah/update_hasil";

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
        document.location = "<?php echo base_url();?>bankdarah/tambahpemeriksaan";
      }
    });
   }


    $(document).on("click", "#submitHasil", function(){

        var data ={
        id_pasien :$('input[name=id_pasien]').val(),
         no_rm :$('input[name=no_rm]').val(),
         nama_pasien :$('#nama_pasien').val(),
         alamat :$('#alamat').val(),
         tgl_lahir : $('#tgl_lahir').val(),
         janisdarah:$("#janisdarah :selected").val(),
         no_pemeriksaan :$('input[name=no_pemeriksaan]').val(),
         tgl_pemeriksaan : $('input[name=tgl_pemeriksaan]').val(),
         tgl_selesai :$('input[name=tgl_selesai]').val(),
         ruangan : $('input[name=ruangan]').val(),
         kode_dokter: $('select[name=kode_dokter]').val(),
         pemeriksa: $('select[name=pemeriksa]').val(),
         kelamin: $('input[name=kelamin]:checked').val(),

       }

            // console.log(data);

        url = "<?php echo base_url();?>bankdarah/AddPasien";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    // console.log(Data);
                    alert('Data Hasil Pemeriksaan Berhasil disimpan !');
                    document.location = "<?php echo base_url();?>bankdarah/tambahpemeriksaan";
                },
            function(isConfirm){
                  
            

                }
            });


        });

  function deleteH(id){
    url = base_url+"index.php/bankdarah/delete";

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

</script>
