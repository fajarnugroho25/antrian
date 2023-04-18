<?php 
$id_laporan = '';
$tgl_input = date("Y-m-d H:i:s");
$nama = '';
$rm = '';
$perhatian = '';
$kotak = '';
$pemantauan ='';
$tgl_pemberitahuan ='';
$diagnosa = '';
$status = '0';
$pembuat = $this->session->nama;

if (!empty($datapajananB)) {
    foreach ($datapajananB as $row) :     
      $kodejadi = $row->id_laporan;
      $tgl_pemberitahuan = $row->tgl_pemberitahuan;
      $nama = $row->nama;
      $rm = $row->rm;
      $kotak = $row->kotak;
      $perhatian = $row->perhatian;
      $pemantauan = $row->pemantauan;
      $tgl_pemberitahuan = $row->tgl_pemberitahuan;
      $diagnosa = $row->diagnosa;
      
      

endforeach;
}

?>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>

<script language="javascript" type="text/javascript"> 
    var maxAmount = 100;
    function textCounter(textField, showCountField) {
        if (textField.value.length > maxAmount) {
            textField.value = textField.value.substring(0, maxAmount);
        } else { 
            showCountField.value = maxAmount - textField.value.length;
        }
    }

</script>

<div class="span10">
    <h3 class="page-title">Laporan Pajanan Form B</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/tambahpajananB">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>
                <input type="hidden" name="pembuat" value="<?php echo $pembuat; ?>" required readonly>
                <input type="hidden" name="tgl_input" value="<?= $tgl_input; ?>" readonly ></input>
        <tr>
            <td>
            <label><b>ID Laporan</b></label>
                </td>
                <td> &nbsp &nbsp</td>
                <td>
                    <input type="text" name='id_laporan' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
        </tr>

         <tr>
            <td valign="top">
                <label><b>Setiap Kotak Dapat diisi :</b></label>
            <td>

                    <td style="padding-bottom:20px;">
                        <?php $kotak = explode(",", $kotak);?>
                        <div class="taglistmenu">
                            <input type="checkbox" name="kotak[]" <?php echo (in_array("Diperiksa Dokter Gawat Darurat", $kotak)) ? 'checked' : ''; ?> value="Diperiksa Dokter Gawat Darurat" > Diperiksa Dokter Gawat Darurat &emsp; <br>
                            <input type="checkbox" name="kotak[]" <?php echo (in_array("Dirujuk ke Dokter Pribadi atau Perusahaan", $kotak)) ? 'checked' : ''; ?> value="Dirujuk ke Dokter Pribadi atau Perusahaan"> Dirujuk ke Dokter Pribadi atau Perusahaan &emsp; <br>
                            <input type="checkbox" name="kotak[]" <?php echo (in_array("Menolak Diperiksa Dokter Gawat Darurat", $kotak)) ? 'checked' : ''; ?> value="Menolak Diperiksa Dokter Gawat Darurat"> Menolak Diperiksa Dokter Gawat Darurat &emsp; <br>
                            <input type="checkbox" name="kotak[]" <?php echo (in_array("Memilih Untuk Mencari Pertolongan Dokter Pribadi", $kotak)) ? 'checked' : ''; ?> value="Memilih Untuk Mencari Pertolongan Dokter Pribadi"> Memilih Untuk Mencari Pertolongan Dokter Pribadi &emsp; <br> 
                        </td>
        </tr>


        <tr>
            <td valign="center">
                <label><b>Untuk Perhatian</b></label>
            <td>

                    <td style="padding-bottom:20px;">
                        <?php $perhatian = explode(",", $perhatian);?>
                        <div class="taglistmenu">
                            <input type="checkbox" name="perhatian[]" <?php echo (in_array("Tim PPI", $perhatian)) ? 'checked' : ''; ?> value="Tim PPI" > Tim PPI &emsp; 
                            <input type="checkbox" name="perhatian[]" <?php echo (in_array("Poliklinik", $perhatian)) ? 'checked' : ''; ?> value="Poliklinik"> Poliklinik &emsp;
                           <input type="checkbox" <?php echo (in_array("Lain-lain", $perhatian)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('lainnya'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Lain-lain" name="perhatian[]"> Lain-lain, sebutkan
                                        <?php $key = array_search('Lain-lain', $perhatian); ?>
                                        <?php if($key === false) { ?>
                                            <input id="lainnya" name="perhatian[]" disabled value=""> <br>
                                        <?php } else { ?>
                                            <input id="lainnya" name="perhatian[]" value="<?= $perhatian[$key+1] ?>"> <br>
                                        <?php } ?>

                        </td>
        </tr>

        <td>
            <h5>Pasien Sumber Darah/Bahan Infeksius</h5>
        </td>
        
        <tr>
            <td>
                <label><b>Nama</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="nama" name="nama" value="<?= $nama; ?>" ></input>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Nomor RM</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="rm" name="rm" value="<?= $rm; ?>" ></input>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Ruang Rawat</b></label>
            </td>
            <td></td>
            <td>
                <select name='ruang' id='ruang' required>
                    <option value=''disabled selected>Pilih Ruang</option>

                    <?php
                    foreach ($cbunit as $cbu) {
                        if ($cbu->unit_id == $unit_utama) { 
                            echo '<option value="' . $cbu->unit_id . '" selected >' . $cbu->unit_nama . '</option>';
                        } else {
                            echo '<option value="' . $cbu->unit_id . '" >' . $cbu->unit_nama . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        
        <tr>
            <td valign="top">
                <label><b>Pemantauan Pajanan </b></label>
                <label><b>(Sumber pajanan dan riwayat infeksi)</b></label>
            </td>
            <td></td>
            <td>
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control " name="pemantauan"></textarea>
                <div id="textarea_feedback"></div>
            </td>
        </tr>

         <tr>
            <td valign="bottom">
                <label><b>Tanggal Pemberitahuan</b></label>
                <label><b>Atasan Langsung yang Terpajan</b></label>
            </td>
            <td> </td>
            <td>
                <div id="datetimepicker" class="input-append date">
                    <input type="text" name="tgl_pemberitahuan" value="<?= $tgl_pemberitahuan; ?>" required></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </td>
        </tr>
        
       <tr>
            <td valign="top">
                <label><b>Diagnosa Pasien </b></label>
            </td>
            <td></td>
            <td>
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control " name="diagnosa"></textarea>
                <div id="textarea_feedback"></div>
            </td>
        </tr>

       

       
</table>
<div style="padding-top:20px">
    <button class="btn btn-primary" id="simpan" type="submit">
    Submit</button>


</div>
</form>

</div>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>



<script type="text/javascript">


    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
    
   //  $(document).ready(function(){
   //     $('#pernah').hide();
   //     $('#klik').click(function(){
   //      $('#pernah').show();

   //  });
   //     $('#tidak').click(function(){
   //      $('#pernah').hide();
   //  });
   // });

    $(document).ready(function(){
       $('#sudah').hide();
       $('#klik').click(function(){
        $('#sudah').show();

    });
       $('#tidak').click(function(){
        $('#sudah').hide();
    });
   });

     $(document).ready(function(){
        var jenis_pertolongan = 
        $('#jenis_pertolongan').val();
        console.log(jenis_pertolongan);
        if (jenis_pertolongan != '') {
         // $('#pernah').show();
         $('#sudah').show();
     }   else{
             // $('#pernah').hide();
             $('#sudah').hide();
        }
    });

     $(document).ready(function() {
    var text_max = 500;
    $('#textarea_feedback');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback');
    });
    });




</script> 


</div> 