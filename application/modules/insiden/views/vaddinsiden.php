<?php 


$aksi   = 'tambah';
$id_insiden   = '';
$nama_pasien = '';
$no_rm = '';
$ruangan = '';
$umur = '';
$kelompokumur = '';
$jenis_kelamin = '';
$penanggung = '';
$tgl_masuk = '';
$pembuat = '';
$tgl_insiden = '';
$insiden = '';
$kronologis = '';
$jenis_insiden = '';
$pelapor_insiden ='';
$insiden_terjadi ='';
$insiden_pasien ='';
$tempat_insiden = '';
$spesialisasi = '';
$unit_utama = '';
$unit_dulu = '';
$unit_edit = '';
$akibat_insiden ='';
$tindakankejadian ='';
$tindakanoleh ='';
$langkahunit ='';
$tgl_buat='';
$tgl_terima = '';
$user_nama = $this->session->nama;
$tgl_input =  date("Y-m-d H:i:s");
$status = '0';


if (!empty($datainsiden)) {
    foreach ($datainsiden as $row) :     
      $kodejadi   =  $row->id_insiden;
      $nama_pasien = $row->nama_pasien;
      $no_rm = $row->no_rm;
      $ruangan = $row->ruangan;
      $umur = $row->umur;
      $kelompokumur = $row->kelompok_umur;
      $jenis_kelamin = $row->jenis_kelamin;
      $penanggung = $row->penanggung;
      $tgl_masuk = $row->tgl_masuk;
      $pembuat = $row->pembuat;
      $tgl_insiden = $row->tgl_insiden;
      $insiden = $row->insiden;
      $kronologis = $row->kronologis;
      $jenis_insiden = $row->jenis_insiden;
      $pelapor_insiden =$row->pelapor_insiden;
      $insiden_terjadi =$row->insiden_terjadi;
      $insiden_pasien =$row->insiden_pasien;
      $tempat_insiden = $row->tempat_insiden;
      $spesialisasi = $row->spesialisasi;
      $unit_utama = $row->unit_utama;
      $unit_dulu  = $row->unit_dulu;
      $akibat_insiden =$row->akibat_insiden;
      $tindakankejadian =$row->tindakankejadian;
      $tindakanoleh =$row->tindakan_oleh;
      $langkahunit =$row->langkahunit;
      $tgl_buat=$row->tgl_buat;
      $tgl_terima = $row->tgl_terima;
      $status = $row->status;
      $aksi   = 'perbarui';
    
  endforeach;
}
?>


<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>


<div class="span10">
    <h3 class="page-title">Laporan Insiden (Internal)</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/<?php echo $aksi; ?>">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                 <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>

                <h4>A. DATA PASIEN</h4>
                <tr>
                    <td>
                        <label><b>ID Laporan</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="text" name='id_insiden' class="form-control" value="<?= $kodejadi; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Nama</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="nama_pasien" value="<?php echo $nama_pasien; ?>" reqiured>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>No RM</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="no_rm" value="<?php echo $no_rm; ?>" reqiured>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Ruangan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="ruangan" value="<?php echo $ruangan; ?>"reqiured>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Umur</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="umur" placeholder="Dalam Tahun / Bulan" value="<?php echo $umur; ?>"reqiured>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Kelompok Umur</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='kelompok_umur' id='kelompok_umur' required>
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
                        value="Laki-laki" reqiured checked>  Laki-laki
                        <input type="radio" name="jenis_kelamin"
                        <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Perempuan") echo "checked";?>
                        value="Perempuan" reqiured>  Perempuan
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Penanggung Biaya</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='penanggung' id='penanggung' required>
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
                    <div id="datetimepicker" class="input-append date">
                        <input type="text" id="tgl_masuk" name="tgl_masuk" value="<?php echo $tgl_masuk ?>" required></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                    </div>
                </td>
            </tr>


        </table>

        <table>
           <h4>B. RINCIAN KEJADIAN</h4>
           <tr>
            <td>
                <label><b>Pembuat Laporan</b></label>
            </td>
            <td></td>
            <td>
                <input type="text" id="pembuat" name="pembuat" value="<?php echo $user_nama; ?>" required readonly>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Tanggal & Waktu Insiden</b></label>
            </td>
            <td> </td>
            <td>
                <div id="datetimepicker4" class="input-append date">
                    <input type="text" id="tgl_insiden" name="tgl_insiden" value="<?php echo $tgl_insiden ?>" required></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Insiden</b></label>
            </td>
            <td></td>
            <td>
                <input type="text" name="insiden" value="<?php echo $insiden ?>" maxlength="200" reqiured>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label><b>Kronologis Insiden</b></label>
            </td>
            <td></td>
            <td>
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control" name="kronologis" > <?php echo $kronologis ?></textarea>
                <div id="textarea_feedback"></div>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Jenis Insiden</b></label>
            </td>
            <td></td>
                    <td>
                        <select name='jenis_insiden' id='jenis_insiden' required>
                            <option value='' disabled selected>Pilih Jenis Insiden</option>
                            <?php
                            foreach ($cbjenis as $cb) {
                             if ($cb->id_jenis == $jenis_insiden) {
                                echo '<option value="' . $cb->id_jenis . '" selected >' . $cb->jenis . '</option>';
                            } else {
                                echo '<option value="' . $cb->id_jenis . '" >' . $cb->jenis . '</option>';
                            }
                        }
                         ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Orang Pertama yang </b></label>
                <label><b>Melaporkan Insiden </b></label>
            </td>
            <td></td>
            <td>
                <select name='pelapor_insiden' id='pelapor_insiden' required>
                            <option value='' disabled selected>Pilih Pelapor</option>
                            <?php
                            foreach ($cbpelapor as $cb) {
                             if ($cb->id_pelapor == $pelapor_insiden) {
                                echo '<option value="' . $cb->id_pelapor . '" selected >' . $cb->pelapor . '</option>';
                            } else {
                                echo '<option value="' . $cb->id_pelapor . '" >' . $cb->pelapor . '</option>';
                            }
                        }
                         ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Insiden Terjadi Pada</b></label>
            </td>
            <td></td>
            <td>
                <select name='insiden_terjadi' id='insiden_terjadi' required>
                    <option value='' disabled selected>Insiden Pada</option>
                    <?php
                    foreach ($cbterjadi as $cb) {
                       if ($cb->id == $insiden_terjadi) {
                        echo '<option value="' . $cb->id . '" selected >' . $cb->insidenpada . '</option>';
                    } else {
                        echo '<option value="' . $cb->id . '" >' . $cb->insidenpada . '</option>';
                    }
                }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Insiden Menyangkut Pasien</b></label>
            </td>
            <td></td>
            <td>
                <select name='insiden_pasien' id='insiden_pasien' required>
                            <option value='' disabled selected>Pilih Jenis Pasien</option>
                            <?php
                            foreach ($cbpasien as $cb) {
                             if ($cb->id_pasien == $insiden_pasien) {
                                echo '<option value="' . $cb->id_pasien . '" selected >' . $cb->jenispasien . '</option>';
                            } else {
                                echo '<option value="' . $cb->id_pasien . '" >' . $cb->jenispasien . '</option>';
                            }
                        }
                         ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Tempat Insiden / Lokasi Kejadian</b></label>
            </td>
            <td></td>
            <td>
                <input type="text" name="tempat_insiden" value= "<?php echo $tempat_insiden ?>" placeholder="Sebutkan tempat pasien berada" reqiured>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Insiden Terjadi pada Pasien</b></label>
            </td>
            <td></td>
            <td>
                <select name='spesialisasi' id='spesialisasi' required>
                            <option value='' disabled selected>Sesuai Kasus Penyakit / Spesialisasi</option>
                            <?php
                            foreach ($cbspesial as $cb) {
                             if ($cb->id_spesialisasi == $spesialisasi) {
                                echo '<option value="' . $cb->id_spesialisasi . '" selected >' . $cb->nama_spesialisasi . '</option>';
                            } else {
                                echo '<option value="' . $cb->id_spesialisasi . '" >' . $cb->nama_spesialisasi . '</option>';
                            }
                        }
                         ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Unit / Departemen terkait Insiden</b></label>
            </td>
            <td></td>
            <td>
               <select name='unit_utama' id='unit_utama' required>
                <option value='' disabled selected>Pilih Unit</option>

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
        <td>
            <label><b>Akibat Insiden Terhadap Pasien</b></label>
        </td>
        <td></td>
        <td>
            <select name='akibat_insiden' id='akibat_insiden' required>
                <option value='' disabled selected>Sesuai Kasus Penyakit / Spesialisasi</option>
                <?php
                foreach ($cbakibat as $cb) {
                   if ($cb->id_akibat == $akibat_insiden) {
                    echo '<option value="' . $cb->id_akibat . '" selected >' . $cb->akibat . '</option>';
                } else {
                    echo '<option value="' . $cb->id_akibat . '" >' . $cb->akibat . '</option>';
                }
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <label><b>Tindakan Setelah Kejadian dan Hasilnya</b></label>
        </td>
        <td></td>
        <td>
            <textarea id="textarea" rows="8" cols="30" maxlength="200" class="form-control" name="tindakankejadian" > <?php echo $tindakankejadian ?></textarea>
                <div id="textarea_feedback"></div>
        </td>
    </tr>
    <tr>
        <td>
            <label><b>Tindakan Dilakukan Oleh</b></label>
        </td>
        <td></td>
        <td>
            <select name='tindakan_oleh' id='tindakan_oleh' required>
                <option value='' disabled selected>Tindakan Oleh</option>
                <?php
                foreach ($cbtindakan as $cb) {
                   if ($cb->id_tindakan == $tindakanoleh) {
                    echo '<option value="' . $cb->id_tindakan . '" selected >' . $cb->tindakan_oleh . '</option>';
                } else {
                    echo '<option value="' . $cb->id_tindakan . '" >' . $cb->tindakan_oleh . '</option>';
                }
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <label><b>Pernah Terjadi di Unit Kerja lain?</b></label>
        </td>
        <td></td>
        <td>
            <?php if ($unit_dulu!= '') { ?>
                <input type="radio" name="pernahterjadi"
                <?php if (isset($pernahterjadi) && $pernahterjadi=="Ya");?>
                value="Ya" id="klik" checked> Ya
                <input type="radio" name="pernahterjadi" 
                <?php if (isset($pernahterjadi) && $pernahterjadi=="Tidak") ;?>
                value="Tidak" id="tidak" > Tidak 
            <?php } else{ ?>
                <input type="radio" name="pernahterjadi"
                <?php if (isset($pernahterjadi) && $pernahterjadi=="Ya");?>
                value="Ya" id="klik" > Ya
                <input type="radio" name="pernahterjadi" 
                <?php if (isset($pernahterjadi) && $pernahterjadi=="Tidak") ;?>
                value="Tidak" id="tidak" checked > Tidak 
            <?php } ?>
        </td>
    </tr>
    <tr id="pernah">
        <input type="hidden" id="unit_edit" name="unit_edit" value="<?php echo $unit_dulu ?>">
        <td>
            <label><b>Unit / Departemen terkait Insiden</b></label>
        </td>
        <td></td>
        <td>
           <select name='unit_dulu' id='unit_dulu' >
            <option value='' disabled selected>Pilih Unit</option>

            <?php
            foreach ($cbunit2 as $cb) {
                if ($cb->unit_id == $unit_dulu) {
                    echo '<option value="' . $cb->unit_id . '" selected >' . $cb->unit_nama . '</option>';
                } else {
                    echo '<option value="' . $cb->unit_id . '" >' . $cb->unit_nama . '</option>';
                }
            }
            ?>
        </select>
    </td>
</tr>
<tr id="sudah">
    <td>
        <label><b>Kapan Terjadinya?</b></label>
        <label><b>Langkah / Tindakan Unit untuk mencegah Terulang?</b></label>
    </td>
    <td></td>
    <td>
        <textarea id="textarea" rows="8" cols="30" maxlength="200" class="form-control " name="langkahunit"><?php echo $langkahunit ?></textarea>
    </td>
</tr>
<tr>
    <td>
        <label><b>Tanggal Pembuatan Laporan</b></label>
    </td>
    <td> </td>
    <td>
        <div id="datetimepicker2" class="input-append date">
            <input type="text" id="tgl_buat" name="tgl_buat" value="<?php echo $tgl_buat ?>" required></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>
    </td>
</tr>
<tr>
    <td>
       <!--  <label><b>Tanggal Penerimaan Laporan</b></label> -->
    </td>
    <td> </td>
    <td>
        <!-- div id="datetimepicker3" class="input-append date"> -->
            <input type="hidden" id="tgl_terima" name="tgl_terima" readonly="readonly" value="<?php echo $tgl_terima ?>" required></input>
            <!-- <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> -->
            </span>
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
    var text_max = 200;
    $('#textarea_feedback');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback');
    });
    });

    
    // $('input[name="tindakan_oleh"]').click(function(e) {
    //   if(e.target.value === 'tim') {
    //     $('#optional').show();
    // } else {
    //     $('#optional').hide();
    // }
    // })

    // $('#optional').hide();




</script> 


</div> 