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
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> -->

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
       <h3 class="page-title"><?php echo $titel; ?> Data Inventaris</h3>               
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
             <input type="text" name='kodeasset'  id="kodeasset" class="form-control asset" value="<?= $asset->assetnomor; ?>" readonly>
            </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>Tanggal Beli</b></label>
                </td>
                <td> </td>
                <td>
                    <div id="datetimepicker" class="input-append date">
                            <input type="text" id="tglbeli" name="tglbeli" class="form-control asset" value="<?=$asset->assettanggal?>"  required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td>    
            </tr> 

             <tr>
                <td>
                    <label><b>Nomor Asset </b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="noasset" value="<?=$asset->assetnoreff?>" class="form-control asset" name="noasset" > 
                </td>    
            </tr> 

             <tr>
                <td>
                    <label><b>Nama Asset</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="nmasset" value="<?=$asset->assetnama?>" class="form-control asset" name="nmasset" > 
                </td>    
            </tr> 

            <tr>
                <td>
                    <label><b>Kelompok </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="selectpicker" name='kelompok' id='kelompok' data-live-search="true">
                        <option value='' disabled selected>Kelompok</option>
                        <?php
                     foreach ($kelompok as $klp) 
                     {
                      if ($klp->id_kelompok == $asset->assetkelompok) 
                        {echo '<option value="'.$klp->id_kelompok.'" selected >'.$klp->id_kelompok.' - '.$klp->nama.'</option>';}
                    else 
                         {
                            echo '<option value="'.$klp->id_kelompok.'" >'.$klp->id_kelompok.' - '.$klp->nama.'</option>';
                        }        
                    
                     }
                    ?>
                    </select>

                </td>
                <td>


            </tr>

            <tr>
                <td>
                    <label><b>Sub Kelompok </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="selectpicker" name='subkelompok' id='subkelompok' data-live-search="true">
                        <option value='' disabled selected>Sub Kelompok</option>
                        <?php
                     foreach ($subkelompok as $sub) 
                     {
                        if ($sub->id_subkel == $asset->assetsubkelompok) 
                        {echo '<option value="'.$sub->id_subkel.'" selected >'.$sub->id_subkel.' - '.$sub->namasubkel.'</option>';}
                    else 
                         {
                            echo '<option value="'.$sub->id_subkel.'" >'.$sub->id_subkel.' - '.$sub->namasubkel.'</option>';
                        }        
                    
                     }
                    ?>
                    </select>

                </td>
                <td>


            </tr>

            <tr>
                <td>
                    <label><b>Sub Kelompok2 </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="selectpicker" name='subkelompok2' id='subkelompok2' data-live-search="true">
                        <option value='' disabled selected>Sub Kelompok2</option>
                        <?php
                     foreach ($subkelompok2 as $sub2) {
                        if ($sub2->idsubkel2 == $asset->assetsubkelompok2) 
                        {echo '<option value="'.$sub2->idsubkel2.'" selected >'.$sub2->idsubkel2.' - '.$sub2->namasubkel2.'</option>';}
                    else 
                         {
                            echo '<option value="'.$sub2->idsubkel2.'" >'.$sub2->idsubkel2.' - '.$sub2->namasubkel2.'</option>';
                        }        
                    
                     }
                    ?>
                    </select>

                </td>
                <td>


            </tr>
            
            <tr>
                <td>
                    <label><b>Unit (Terkini) </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="selectpicker" name='unit' id='unit' data-live-search="true">
                        <option value='' disabled selected>Unit</option>
                        <?php
                     foreach ($unit as $u) 
                     {
                        if ($u->id_unit2 == $asset->assetunit) 
                        {echo '<option value="'.$u->id_unit2.'" selected >'.$u->id_unit2.' - '.$u->namaunit2.'</option>';}
                    else 
                         {
                            echo '<option value="'.$u->id_unit2.'" >'.$u->id_unit2.' - '.$u->namaunit2.'</option>';
                        }    
                    
                     }
                    ?>
                    </select>

                </td>
                <td>


            </tr>

            <tr>
                <td>
                    <label><b>Lokasi Sekarang</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="lsekarang" value="<?=$asset->assetlokasi?>" class="form-control asset" name="lsekarang" > 
                </td>    
            </tr> 

                <td>
                    <label><b>Beli dari</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="belidr" class="form-control asset" value="<?=$asset->assetbelinama?>" name="belidr" value=""  readonly > 
                    <button type="button" id="btnSubmit" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info">Barang</button>                </td>    
            </tr> 

            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="alamatsup" class="form-control asset" value="<?=$asset->assetbelialamat?>" name="alamatsup" > 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>jumlah Qty</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="jmlhqty" class="form-control asset" value="<?=$asset->assetbanyak?>" name="jmlhqty" value="1" > 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Satuan</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="satuan" value="<?=$asset->assetsatuan?>"  class="form-control asset" name="satuan" > 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Harga Beli</b></label>
                </td>
                <td> </td>
                <td>
                   Rp. <input type="text" id="hargabel" value="<?=$asset->assetbelijumlah?>" class="form-control asset" name="hargabel" style="width:275px;" > 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Status</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="hidden" name="oldstatus" id="oldstatus" value="<?=$asset->assetstatus?>" >
                    <select id="stattbrng" name="stattbrng">
                        <option value="1">Baik</option>
                        <option value="2">Di Service</option>
                        <option value="3">Rusak</option>
                        <option value="4">Dijual</option>
                        <option value="5">Dihibahkan ke Pihak Lain</option>
                        <option value="6">Dihapuskan</option>
                    </select>
                </td>     
            </tr>

            <tr>
                <td>
                    <label><b>Catatan </b></label>
                </td>
                <td> </td>
                <td>
                    <textarea id="catatan" value="" class="form-control asset" name="catatan"><?=$asset->assetketerangan?></textarea>
                </td>    
            </tr> 
            <td><button class="btn btn-info left" id="submitAsset">Simpan</button></td>

           
        </table>


  
    <br><br>

      </div>
  </div>
  
</body>



 


<link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script>

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> 
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


    $(document).ready(function () {
          var tempStatus=  $('#oldstatus').val();
          // console.log(tempPemeriksa);
          if (tempStatus != '') {
            var status ='#stattbrng option[value="'+tempStatus+'"]';
            $(status).attr('selected','selected');
          }else{
          }
          

    });


    
    $(function () {
    $('select').selectpicker();
});

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



  $(document).on("click", "#submitAsset", function(){

        var data ={
        kodeasset :$('input[name=kodeasset]').val(),
         tglbeli :$('input[name=tglbeli]').val(),
         noasset: $('input[name=noasset]').val(),
         nmasset : $('input[name=nmasset]').val(),
         kelompok :$('select[name=kelompok]').val(),
         subkelompok :$('select[name=subkelompok]').val(),
         subkelompok2 :$('select[name=subkelompok2]').val(),
         unit :$('select[name=unit]').val(),
         lsekarang :$('input[name=lsekarang]').val(),
         belidr : $('input[name=belidr]').val(),
         alamatsup :$('input[name=alamatsup]').val(),
         hargabel :$('input[name=hargabel]').val(),
         jmlhqty :$('input[name=jmlhqty]').val(),
         satuan: $('input[name=satuan]').val(),
         stattbrng : $('select[name=stattbrng]').val(),
         catatan : $('textarea[name=catatan]').val(),

       }
       // console.log(data);
        url = "<?php echo base_url();?>mutasi/SimpanEdit";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    // console.log(Data);
                    alert('Data Edit Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>mutasi/dataInventaris";
                },
            function(isConfirm){
                  
            

                }
            });


        });


   
</script>