<?php 
$id_laporan = '';
$tgl_laporan = date("d-m-Y H:i:s");
$tgl_kejadian = '';
$tempat_kejadian = '';

$nama = '';
$alamat1 = '';
$atasan = '';
$alamat2 = '';
$route = '';
$sumber = '';
$bagian_tubuh = '';
$tempat_pertolongan = '';
$kejadian = '';
$kronologi_kejadian ='';
$pertolongan = '';
$jenis_pertolongan = '';
$verifikasi = '';
$tindaklajut = '';
$status = '0';
$tgl_input =  date("Y-m-d H:i:s");
$pembuat = $this->session->nama;

if (!empty($datapajanan)) {
    foreach ($datapajanan as $row) :     
      $kodejadi   =  $row->id_laporan;
      $tgl_laporan = $row->tgl_laporan;
      $tgl_kejadian   =  $row->tgl_kejadian;
      $tempat_kejadian   =  $row->tempat_kejadian;
      $nama = $row->nama;
      $alamat1 = $row->alamat1;
      $atasan = $row->atasan;
      $alamat2 = $row->alamat2;
      $route = $row->route;
      $bagian_tubuh = $row->bagian_tubuh;
      $pertolongan = $row->pertolongan;
      $jenis_pertolongan = $row->jenis_pertolongan;
      $sumber = $row->sumber;
      $kejadian   =  $row->kejadian;
      $kronologi_kejadian   =  $row->kronologi_kejadian;
      $tempat_pertolongan = $row->tempat_pertolongan;

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
    <h3 class="page-title">Laporan Pajanan Form A</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/tambahpajanan">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>
                <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly>
                <input type="hidden" name="pembuat" value="<?php echo $pembuat; ?>" required readonly>
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
            <td>
                <label><b>Tanggal & Waktu Laporan</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="tgl_kejadian" name="tgl_kejadian" value="<?= $tgl_laporan; ?>" readonly ></input>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Tanggal & Waktu Pajanan</b></label>
            </td>
            <td> </td>
            <td>
                <div id="datetimepicker" class="input-append date">
                    <input type="text" id="tgl_kejadian" name="tgl_kejadian" required></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Tempat Kejadian</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="tempat_kejadian" name="tempat_kejadian" value="<?= $tempat_kejadian; ?>" ></input>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Unit Kerja Terpajan</b></label>
            </td>
            <td></td>
            <td>
                <select name='unit_terpajan' id='unit_terpajan' required>
                    <option value=''disabled selected>Pilih Bagian</option>

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
        <td>
            <h5>Identitas</h5>
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
                <label><b>Alamat</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="alamat1" name="alamat1" value="<?= $alamat1; ?>" ></input>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Atasan Langsung</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="atasan" name="atasan" value="<?= $atasan; ?>" ></input>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Alamat Atasan</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="alamat2" name="alamat2" value="<?= $alamat2; ?>" ></input>
                </div>
            </td>
        </tr>

        <tr>
            <td valign="top">
                <label><b>Route Pajanan</b></label>
            <td>

                    <td>
                        <?php $route = explode(",", $route);?>
                        <div class="taglistmenu">
                            <input type="checkbox" name="route[]" <?php echo (in_array("Tusukan Jarum Suntik", $route)) ? 'checked' : ''; ?> value="Tusukan Jarum Suntik" > Tusukan Jarum Suntik &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Luka Pada Kulit", $route)) ? 'checked' : ''; ?> value="Luka Pada Kulit"> Luka Pada Kulit &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Gigitan", $route)) ? 'checked' : ''; ?> value="Gigitan"> Gigitan &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Mata", $route)) ? 'checked' : ''; ?> value="Mata"> Mata &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Mulut", $route)) ? 'checked' : ''; ?> value="Mulut"> Mulut &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Lain-lain", $route)) ? 'checked' : ''; ?> value="Lain-lain"> Lain-lain &emsp; <br>

                        </td>
        </tr>

        <tr>
            <td valign="top">
                <label><b>Sumber Pajanan</b></label>
            <td>

                    <td>
                        <?php $sumber = explode(",", $sumber);?>
                        <div class="taglistmenu">
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Darah", $sumber)) ? 'checked' : ''; ?> value="Darah" > Darah &emsp; 
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Sputum", $sumber)) ? 'checked' : ''; ?> value="Sputum"> Sputum &emsp;
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Air Liur", $sumber)) ? 'checked' : ''; ?> value="Air Liur"> Air Liur &emsp;
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Faeses", $sumber)) ? 'checked' : ''; ?> value="Faeses"> Faeses &emsp; 
                           <input type="checkbox" <?php echo (in_array("Lain-lain", $sumber)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('lainnya'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Lain-lain" name="sumber[]"> Lain-lain, sebutkan
                                        <?php $key = array_search('Lain-lain', $sumber); ?>
                                        <?php if($key === false) { ?>
                                            <input id="lainnya" name="sumber[]" disabled value=""> <br>
                                        <?php } else { ?>
                                            <input id="lainnya" name="sumber[]" value="<?= $sumber[$key+1] ?>"> <br>
                                        <?php } ?>

                        </td>
        </tr>

        <tr>
            <td valign="bottom">
                <label><b>Bagian Tubuh yang Terpajan</b></label>
                <label><b>(sebut secara jelas)</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="bagian_tubuh" name="bagian_tubuh" value="<?= $bagian_tubuh; ?>" ></input>
                </div>
            </td>
        </tr>

        <tr>
            <td valign="top">
                <label><b>Jelaskan Urutan Kejadian </b></label>
                <label><b>(Kronologis)</b></label>
            </td>
            <td></td>
            <td>
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control " name="kronologi"></textarea>
                <div id="textarea_feedback"></div>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Imunisasi Hepatitis B</b></label>
            </td>
            <td></td>
            <td>
                <input type="radio" name="imunisasi"
                <?php if (isset($imunisasi) && $imunisasi=="Sudah") echo "checked";?>
                value="Sudah" reqiured checked>  Sudah
                <input type="radio" name="imunisasi"
                <?php if (isset($imunisasi) && $imunisasi=="Belum") echo "checked";?>
                value="Belum" reqiured>  Belum
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Alat Pelindung</b></label>
            </td>
            <td></td>
            <td>
                <input type="radio" name="pelindung"
                <?php if (isset($pelindung) && $pelindung=="Dipakai") echo "checked";?>
                value="Dipakai" reqiured checked>  Dipakai
                <input type="radio" name="pelindung"
                <?php if (isset($pelindung) && $pelindung=="Tidak") echo "checked";?>
                value="Tidak" reqiured>  Tidak
            </td>
        </tr>

        <tr>
        <td>
            <label><b>Pertolongan Pertama</b></label>
        </td>
        <td></td>
        <td>
            <?php if ($jenis_pertolongan!= '') { ?>
                <input type="radio" name="pertolongan"
                <?php if (isset($pertolongan) && $pertolongan=="Ada");?>
                value="Ada" id="klik" checked> Ada
                <input type="radio" name="pertolongan" 
                <?php if (isset($pertolongan) && $pertolongan=="Tidak") ;?>
                value="Tidak" id="tidak" > Tidak 
            <?php } else{ ?>
                <input type="radio" name="pertolongan"
                <?php if (isset($pertolongan) && $pertolongan=="Ada");?>
                value="Ada" id="klik" > Ada
                <input type="radio" name="pertolongan" 
                <?php if (isset($pertolongan) && $pertolongan=="Tidak") ;?>
                value="Tidak" id="tidak" checked > Tidak 
            <?php } ?>
        <br></td>
    </tr>

   <tr id="pernah">
            <td valign="top">
                <label><b>Jenis Pertolongan</b></label>
            <td>

                    <td>
                        <?php $jenis_pertolongan = explode(",", $jenis_pertolongan);?>
                        <div class="taglistmenu">
                            <input type="checkbox" name="jenis_pertolongan[]" <?php echo (in_array("Bilas dengan air mengalir dan diberi sabun antiseptic", $jenis_pertolongan)) ? 'checked' : ''; ?> value="Bilas dengan air mengalir dan diberi sabun antiseptic" > Bilas dengan air mengalir dan diberi sabun antiseptic &emsp; <br>
                            <input type="checkbox" name="jenis_pertolongan[]" <?php echo (in_array("Ludahkan dan kumur-kumur", $jenis_pertolongan)) ? 'checked' : ''; ?> value="Ludahkan dan kumur-kumur"> Ludahkan dan kumur-kumur &emsp; <br>
                            <input type="checkbox" name="jenis_pertolongan[]" <?php echo (in_array("Mata dicuci dengan air mengalir", $jenis_pertolongan)) ? 'checked' : ''; ?> value="Mata dicuci dengan air mengalir"> Mata dicuci dengan air mengalir &emsp; <br><br>

                        </td>
        </tr>

    <tr>
            <td valign="center">
                <label><b>Tempat Pertolongan</b></label>
            </td>
            <td> </td>
            <td>
                    <input type="text" id="tempat_pertolongan" name="tempat_pertolongan" value="<?= $tempat_pertolongan; ?>" ></input>
                </div>
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
    
    $(document).ready(function(){
       $('#pernah').hide();
       $('#klik').click(function(){
        $('#pernah').show();

    });
       $('#tidak').click(function(){
        $('#pernah').hide();
    });
   });

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
        var unit_edit = 
        $('#unit_edit').val();
        console.log(unit_edit);
        if (unit_edit != '') {
         $('#pernah').show();
         $('#sudah').show();
     }   else{
             $('#pernah').hide();
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