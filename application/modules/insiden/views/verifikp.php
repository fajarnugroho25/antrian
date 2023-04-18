<?php 

$komite = $this->session->nama;
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
      $probabilitas = $row->probabilitas;
      $severity = $row->severity;
      $grading = $row->grading;
      $tgl_input=$row->tgl_input;
      $tgl_terima = $row->tgl_terima;
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
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/inputverifikp">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <!-- <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>-->
                <input type="hidden" name="komite" value="<?php echo $komite; ?>" required readonly>


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
                <label><b>Tanggal & Waktu Insiden</b></label>
            </td>
            <td> </td>
            <td>
                <!-- <div id="datetimepicker4" class="input-append date"> -->
                    <input type="text" id="tgl_insiden" name="tgl_insiden" readonly="readonly" value="<?php echo $tgl_insiden ?>" ></input>
                   <!--  <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> -->
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
                <input type="text" name="insiden" value="<?php echo $insiden ?>" >
            </td>
        </tr>
        <tr>
            <td valign="top">
                <label><b>Kronologis Insiden</b></label>
            </td>
            <td></td>
            <td>
                <textarea id="kronologis" class="form-control" name="kronologis" > <?php echo $kronologis ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Jenis Insiden</b></label>
            </td>
            <td></td>
                    <td>
                        <select name='jenis_insiden' id='jenis_insiden'  >
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
                <select name='pelapor_insiden' id='pelapor_insiden'  >
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
                <select name='insiden_terjadi' id='insiden_terjadi'  >
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
                <select name='insiden_pasien' id='insiden_pasien'  >
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
                <input type="text" name="tempat_insiden" value= "<?php echo $tempat_insiden ?>" placeholder="Sebutkan tempat pasien berada"  >
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Insiden Terjadi pada Pasien</b></label>
            </td>
            <td></td>
            <td>
                <select name='spesialisasi' id='spesialisasi'  >
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
               <select name='unit_utama' id='unit_utama'  >
                <option value='' disabled selected>Pilih Unit</option>

                <?php
                foreach ($cbunit as $cbunit) {
                    if ($cbunit->unit_id == $unit_utama) { 
                        echo '<option value="' . $cbunit->unit_id . '" selected >' . $cbunit->unit_nama . '</option>';
                    } else {
                        echo '<option value="' . $cbunit->unit_id . '" >' . $cbunit->unit_nama . '</option>';
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
            <select name='akibat_insiden' id='akibat_insiden'  >
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
            <textarea id="tindakankejadian" class="form-control " name="tindakankejadian" ><?php echo $tindakankejadian ?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <label><b>Tindakan Dilakukan Oleh</b></label>
        </td>
        <td></td>
        <td>
            <select name='tindakan_oleh' id='tindakan_oleh'  >
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
           <select name='unit_dulu' id='unit_dulu'>
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
        <textarea id="langkahunit" value="" class="form-control " name="langkahunit" > <?php echo $langkahunit ?></textarea>
    </td>
</tr>


<tr>
    <td>
        <hr>
    </td>
    <td>
        <hr>
    </td>
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
        <label><b>Probabilitas Insiden</b></label>
        <!-- \\ini optionnya oke -->
    </td>
    <td></td>
    <td>
        <select name='probabilitas' id='probabilitas' required>
            <option value='' disabled selected>Pilih Probabilitas</option>
            <option <?php if ($probabilitas == 1) { echo 'selected'; }?> value='1' >Sangat Jarang Terjadi (> 5 thn / kali)</option>
            <option <?php if ($probabilitas == 2) { echo 'selected'; }?> value='2' >Jarang Terjadi (> 2 - < 5 thn / kali)</option>
            <option <?php if ($probabilitas == 3) { echo 'selected'; }?> value='3' >Mungkin Terjadi (1 - < 2 thn / kali)</option>
            <option <?php if ($probabilitas == 4) { echo 'selected'; }?> value='4' >Sering Terjadi (bbrp kali / tahun)</option>
            <option <?php if ($probabilitas == 5) { echo 'selected'; }?> value='5' >Sangat Sering Terjadi (Tiap minggu / bulan)</option>
        </select>
    </td>

    <td>
        <label><b>Severity Insiden</b></label> 
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>

    <td>
        <select name='severity' id='severity' required>
            <option value='' disabled selected>Pilih Severity</option>
            <option <?php if ($severity == 1) { echo 'selected'; }?> value='1' >Tak Signifikan</option>
            <option <?php if ($severity == 2) { echo 'selected'; }?> value='2' >Minor</option>
            <option <?php if ($severity == 3) { echo 'selected'; }?> value='3' >Moderat</option>
            <option <?php if ($severity == 4) { echo 'selected'; }?> value='4' >Mayor</option>
            <option <?php if ($severity == 5) { echo 'selected'; }?> value='5' >Katatrospik</option>
        </select>
    </td>

</tr>

<tr>
    <td>
        <label><b>Grading</b></label>
    </td>
    <td></td>
    <td>
        <input type="text" name="grading" id="resultGrading" value="<?php echo $grading ?>" required readonly>
    </td>
</tr>

<tr>
        <td>
            <label><b>Tipe Insiden</b></label>
        </td>
        <td></td>
        <td>
            <select name='tipe_insiden' id='tindakan_oleh'  >
                <option value='' disabled selected>Tipe Insiden</option>
                <?php
                foreach ($cbtipe as $cb) { 
                    echo '<option value="' . $cb->id_tipe . '" >' . $cb->nama_tipe . '</option>';
                }
            ?>
            </select>
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