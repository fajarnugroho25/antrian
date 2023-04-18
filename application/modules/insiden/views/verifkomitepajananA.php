<?php 


    foreach ($datainsiden as $row) :     
      $kodejadi   =  $row->id_insiden;
      $nama = $row->nama;
      $alamat1 = $row->alamat1;
      $no_rm = $row->no_rm;
      $ruangan = $row->ruangan;
      $umur = $row->umur;
      $kelompokumur = $row->kelompok_umur;
      $jenis_kelamin = $row->jenis_kelamin;
      $penanggung = $row->penanggung;
      $tgl_masuk = $row->tgl_masuk;
      $pembuat = $row->pembuat;
      $k_insiden = $row->k_insiden;
      $tgl_input=$row->tgl_input;
      $tgl_terima = $row->tgl_terima;
      $tgl_pajanan = $row->tgl_pajanan;
      $tempat_kejadian   =  $row->tempat_kejadian;
      $unit_terpajan = $row->unit_terpajan;
      $atasan = $row->atasan;
      $alamat2 = $row->alamat2;
      $route = $row->route;
      $bagian_tubuh = $row->bagian_tubuh;
      $kronologi_pajanan = $row->kronologi_pajanan;
      $pertolongan = $row->pertolongan;
      $jenis_pertolongan = $row->jenis_pertolongan;
      $sumber = $row->sumber;
      $imunisasi = $row->imunisasi;
      $tempat_pertolongan = $row->tempat_pertolongan;
      $status = $row->status;
      $titel   = 'Perbarui';
      $aksi   = 'perbarui';
      $button   = 'Perbarui';

  endforeach;
?>


<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery210.min.js"></script>


<div class="span10">
    <h3 class="page-title">Laporan Insiden (Internal)</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/inputkomitepajananA">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <!-- <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>-->
                


                <h4>A. DATA IDENTITAS</h4>
                <tr>
                    <td>
                        <label><b>ID Laporan</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="text" name='id_insiden' class="form-control" value="<?= $kodejadi; ?>" >
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Nama</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="nama" value="<?php echo $nama; ?>"  >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Alamat</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="alamat1" value="<?php echo $alamat1; ?>"  >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>No RM / NIK</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="no_rm" value="<?php echo $no_rm; ?>"  >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Ruangan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="ruangan" value="<?php echo $ruangan; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Umur</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="umur" placeholder="Dalam Tahun / Bulan" value="<?php echo $umur; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Kelompok Umur</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='kelompok_umur' id='kelompok_umur'  >
                        <option value='' disabled selected>Pilih Kelompok Umur</option>

                        <?php
                        foreach ($cbumur as $cb) {
                            if ($cb->id_umur == $kelompokumur) {
                                echo '<option value="' . $cb->id_umur . '" selected >' . $cb->kelompok . '</option>';
                            } else {
                                echo '<option value="' . $cb->id_umur . '" >' . $cb->kelompok . '</option>';
                            }
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Jenis Kelamin</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="radio" name="jenis_kelamin"
                        <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Laki-laki") echo "checked";?>
                        value="Laki-laki"  >  Laki-laki
                        <input type="radio" name="jenis_kelamin"
                        <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Perempuan") echo "checked";?>
                        value="Perempuan"  >  Perempuan
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Penanggung Biaya</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='penanggung' id='penanggung'  >
                            <option value='' disabled selected>Pilih Penanggung</option>
                            <?php
                            foreach ($cbpenanggung as $cb) {
                             if ($cb->id_penanggung == $penanggung) {
                                echo '<option value="' . $cb->id_penanggung . '" selected >' . $cb->nama_penanggung . '</option>';
                            } else {
                                echo '<option value="' . $cb->id_penanggung . '" >' . $cb->nama_penanggung . '</option>';
                            }
                        }
                         ?>
                     </select>
                 </td>
             </tr>
             <tr>
                <td>
                    <label><b>Tanggal Masuk RS</b></label>
                </td>
                <td> </td>
                <td>
                    <!-- <div id="datetimepicker" class="input-append date"> -->
                        <input type="text" id="tgl_masuk" name="tgl_masuk" readonly="readonly" value="<?php echo $tgl_masuk ?>"  ></input>
                        <!-- <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> -->
                        </span>
                    </div>
                </td>
            </tr>

            <tr>
            <td>
                <label><b>Pembuat Laporan</b></label>
            </td>
            <td></td>
            <td>
                <input type="text" id="pembuat" name="pembuat" value="<?php echo $pembuat; ?>" required readonly>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Tanggal Pembuatan Laporan</b></label>
            </td>
            <td> </td>
            <td>

                <input type="text" id="tgl_input" name="tgl_input" value="<?php echo $tgl_input ?>" required readonly></input>
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                </span>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <label><b>Klasifikasi Insiden</b></label>

        </td>
        <td></td>
        <td>
            <select name='k_insiden' id='k_insiden' readonly>
                <option value='' disabled selected>Pilih Insiden</option>
                <?php
                foreach ($cbinsiden as $cb) {
                 if ($cb->id_klasifikasi == $k_insiden) {
                    echo '<option value="' . $cb->id_klasifikasi . '" selected >' . $cb->nama_insiden . '</option>';
                } else {
                    echo '<option value="' . $cb->id_klasifikasi . '" >' . $cb->nama_insiden . '</option>';
                }
            }
            ?>
        </select>
    </td>
</tr>


        </table>
<table>
     <h4>B. RINCIAN KEJADIAN</h4>

     <tr>
        <td>
            <label><b>Tanggal & Waktu Pajanan</b></label>
        </td>
        <td> </td>
        <td>
            <div id="datetimepicker3" class="input-append date">
                <input type="text" id="tgl_pajanan" name="tgl_pajanan" value="<?= $tgl_pajanan; ?>"></input>
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
        <select name='unit_terpajan' id='unit_terpajan'>
            <option value=''disabled selected>Pilih Unit</option>

            <?php
            foreach ($cbunit as $cbu) {
                if ($cbu->unit_id == $unit_terpajan) { 
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
                            <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control " name="kronologi"><?php echo $kronologi_pajanan ?></textarea>
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
                                value="Ada" id="klk" checked> Ada
                                <input type="radio" name="pertolongan" 
                                <?php if (isset($pertolongan) && $pertolongan=="Tidak") ;?>
                                value="Tidak" id="no" > Tidak 
                            <?php } else{ ?>
                                <input type="radio" name="pertolongan"
                                <?php if (isset($pertolongan) && $pertolongan=="Ada");?>
                                value="Ada" id="klk" > Ada
                                <input type="radio" name="pertolongan" 
                                <?php if (isset($pertolongan) && $pertolongan=="Tidak") ;?>
                                value="Tidak" id="no" checked > Tidak 
                            <?php } ?>
                            <br></td>
                        </tr>

                        <tr id="jenis">
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

<tr>
    <td>
        <hr>
    </td>
</tr>

<tr>
    <td>
        <label><b>Tanggal Penerimaan Laporan</b></label>
    </td>
    <td> </td>
    <td>
        <div id="datetimepicker5" class="input-append date">
            <input type="text" id="tgl_terima" name="tgl_terima" value="<?php echo $tgl_terima ?>" required></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>
    </td>
</tr>

<tr>
                    <td>
                        <label><b>Verifikasi</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="radio" id="status" name="status" value="0" <?php if ($status == '0') {
                                                                                    echo 'checked';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?> required > Belum Verif &nbsp &nbsp &nbsp &nbsp
                        <input type="radio" id="status" name="status" value="1" <?php if ($status == '1') {
                                                                                    echo 'checked';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?> required > Diverifikasi &nbsp &nbsp &nbsp &nbsp
                    </td>
                </tr>

<tr>
    <td valign="top">
        <label><b>Rekomendasi</b></label>
    </td>
    <td></td>
    <td>
        <textarea id="rekomendasi" class="form-control" name="rekomendasi" > </textarea>
    </td>
</tr>


</table>
<div style="padding-top:20px">
    <button class="btn btn-primary" id="simpan" type="submit">
    Verifikasi</button>


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
    $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
    $('#datetimepicker3').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
    $('#datetimepicker4').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
    $('#datetimepicker5').datetimepicker({
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
                     $('#jenis').hide();
                     $('#klk').click(function(){
                        $('#jenis').show();

                    });
                     $('#no').click(function(){
                        $('#jenis').hide();
                    });
                 });

                    $(document).ready(function(){
                        var jenis_pertolongan = 
                        $('#jenis_pertolongan').val();
                        console.log(jenis_pertolongan);
                        if (jenis_pertolongan != '') {
         // $('#pernah').show();
                           $('#jenis').show();
                       }   else{
             // $('#pernah').hide();
                           $('#jenis').hide();
                       }
                   });
    
    $('input[name="tindakan_oleh"]').click(function(e) {
      if(e.target.value === 'tim') {
        $('#optional').show();
    } else {
        $('#optional').hide();
    }
    })

    $('#optional').hide();

  //   var get_probabilitas = $('#probabilitas:selected').val();
  //   
    $('document').ready(function() {
        $('#probabilitas').change(function(e){
        var id = e.target.value;
        var id_severity = $('#severity').val()
        var url = "<?= base_url() ?>/index.php/insiden/ajaxGrading/"+id+"/"+id_severity
        if(id_severity !== null){
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    var grading = JSON.parse(data)
                    document.getElementById("resultGrading").value = grading['grading']
                },
                error: function(data) {
                    // Stuff
                }
            });
        }
        });
        $('#severity').change(function(e){
        var id = e.target.value;
        var id_probabilitas = $('#probabilitas').val()
        var url = "<?= base_url() ?>/index.php/insiden/ajaxGrading/"+id_probabilitas+"/"+id
        if(id_probabilitas !== null){
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    var grading = JSON.parse(data)
                    document.getElementById('resultGrading').value = grading['grading']
                },
                error: function(data) {
                    // Stuff
                }
            });
        }
        })
    })
    



</script> 


</div> 