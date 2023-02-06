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
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>public/lib/bootstrap/css/bootstrap-select.min.css" type="text/css"> -->
    
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
        <h5 class="modal-title" id="exampleModalLongTitle">LIST SUPPLIER</h5>
        </button>
      </div>
      <div class="modal-body">
        <table id="barang" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">

        <thead >
         <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat </th>
            <th>Kota</th>
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
       <h3 class="page-title"><?php echo $titel; ?> Pasien</h3>               
<div class="well">

<!-- <form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" > -->

       
        
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control" value="<?php echo  $tgl_input ; ?>"   readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>"   readonly></td>
        <td><input type="hidden" id="id_dpjp" name='id_dpjp' class="form-control" value="<?php echo  $this->session->nama; ?>"   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control" value="<?php echo  $status ; ?>"  readonly></td>
        <input type="hidden"  name="gd_penerima" value="<?php echo $gd_penerima; ?>" readonly> 
        


<table border="0" >
    <td>
        <table>
            <tr>
            <td>
                <label><b>ID</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='kodepasien'  id="kodepasien" class="form-control asset" value="<?= $kodejadi; ?>" readonly>
            </td>
            </tr>
         
             <tr>
                <td>
                    <label><b>No RM </b></label>
                </td>
                <td></td>
                <td>      
                             
                    <input type="text" class="form-control asset" id="no_rm" name="no_rm" placeholder="Input RM, Lalu Klik Fill --->>"   >   
                    <button type="button" id="btnSubmit" class="btn btn-info">Fill</button>
                
                </td>               
            </tr>
            
            
            <tr>
                <td>
                    <label><b>Nama Pasien</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" class="form-control asset" id="nama_pasien" name="nama_pasien"  readonly >
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" class="form-control asset" id="alamat" name="alamat"  readonly > 
                </td>    
            </tr> 
           
             <tr>
                <td>
                    <label><b>Tanggal Lahir</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" class="form-control asset" id="tgl_lahir" name="tgl_lahir"  placeholder="DD/MM/YYYY" readonly >
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
                    <label><b>Umur</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" class="form-control asset" id="umur" name="umur" >
                </td>    
            </tr>


            <tr>
                <td>
                    <label><b>Kamar </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="form-control asset" name='kamar' id='kamar' data-live-search="true">
                        <option value=''  selected>Kamar</option>
                        <?php
                     foreach ($kamarload as $kmr) 
                     {
                   
                            echo '<option value="'.$kmr->idkamar.'" >'.$kmr->idkamar.' - '.$kmr->namakamar.'</option>';
                    
                     }
                    ?>
                    </select>
              </tr> 



              <tr>
                <td>
                    <label><b>DPJP </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="form-control asset" name='dokter' id='dokter' data-live-search="true">
                        <option value=''  selected>DPJP</option>
                        <?php
                     foreach ($dokterdpjp as $dtr) 
                     {
                   
                            echo '<option value="'.$dtr->id.'" >'.$dtr->nama_dokter.'</option>';
                    
                     }
                    ?>
                    </select>
              </tr> 
              <!-- <tr>
                <td>
                    <label><b>Status Huni</b></label>
                </td>
                <td> </td>
                <td>
                    <select name='statushuni' id='statushuni'>
                        <option value='' selected>Status Huni</option>
                        <option value="1">Inap</option>
                        <option value="2">Keluar</option>
                </select>
                </td>
                <td>
            </tr> -->


 
            <td><button class="btn btn-info left" id="submitpasien">Simpan</button></td>

           
        </table>


  
    <br><br>

      </div>
  </div>
  
</body>



 


<link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script>

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-select.min.js"></script> -->
<script>var base_url = '<?php echo base_url() ?>'</script>

<script type="text/javascript">

    $(document).ready( function () {
    $('#barang').DataTable({
        "ajax": {
                "url": base_url+"index.php/mutasi/ajaxListSupplier",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   true,
                "ordering": false,
                "info":     false
            
    });
} );
    
//     $(function () {
//     $('select').selectpicker();
// });

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

    function pilih(id){
      var kelas ='.detail-'+id;
        var data = $(kelas).data('id');
        $('#belidr').val(data.supnama);
        $('#alamatsup').val(data.supalamat);
  }


  $(document).ready(function(){
    $('#btnSubmit').click(function(){
        var datas = {
            no_rm: $('#no_rm').val(),
           
        }

        // if (datas.no_rm != 6) {
        //     alert('No rm tidak boleh kurang dari 6 digit!'); 

        // }else{
   
            url = "<?php echo site_url() . 'pasien/cek_hisys'; ?>";
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


// }
  });
            });






  $(document).on("click", "#submitpasien", function(){

        var data ={
        kodepasien :$('input[name=kodepasien]').val(),
         norm :$('input[name=no_rm]').val(),
         namapasien: $('input[name=nama_pasien]').val(),
         alamat : $('input[name=alamat]').val(),
         ttl :$('input[name=tgl_lahir]').val(),
         umur :$('input[name=umur]').val(),
         kelamin: $('input[name=kelamin]:checked').val(),         
         kamar :$('select[name=kamar]').val(),
         dokter :$('select[name=dokter]').val(),
         // statushuni :$('select[name=statushuni]').val(),

       }

       // nomor = parseInt(data.norm);


       // if (nomor.value.lenght !=6) {
       //  alert('Data tidak boleh kurang atau lebih dari 0'); 
       // }else{



       // console.log(data);
        url = "<?php echo base_url();?>daftarpasien/AddDatapasien";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    // console.log(Data);
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>daftarpasien/datapasien";
                },
            function(isConfirm){
                  
            

                }
            });
        // }


        });


   
</script>