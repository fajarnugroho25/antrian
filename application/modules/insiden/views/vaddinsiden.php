<?php 


$aksi   = 'tambah';
$id_insiden   = '';
$nama = '';
$no_rm = '';
$ruangan = '';
$umur = '';
$kelompokumur = '';
$jenis_kelamin = '';
$penanggung = '';
$tgl_masuk = '';
$pembuat = '';
$k_insiden = '';
$tgl_insiden = '';
$insiden = '';
$kronologis = '';
$jenis_insiden = '';
$jenis_insidenk3 = '';
$jenis_insidenbudaya = '';
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
$tgl_terima = '';
$user_nama = $this->session->nama;
$tgl_input =  date("Y-m-d H:i:s");
$status = '0';
$tgl_pajanan = '';
$tgl_pajanan2 = '';
$tempat_kejadian = '';
$unit_terpajan = '';
$nama = '';
$alamat1 = '';
$atasan = '';
$alamat2 = '';
$route = '';
$sumber = '';
$bagian_tubuh = '';
$tempat_pertolongan = '';
$kronologi ='';
$imunisasi = '';
$pertolongan = '';
$jenis_pertolongan = '';
$verifikasi = '';
$tindaklajut = '';
$rm = '';
$perhatian = '';
$kotak = '';
$pemantauan ='';
$tgl_pemberitahuan ='';
$diagnosa = '';
$status = '0';
$pembuat = $this->session->nama;


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
      $tgl_pajanan = $row->tgl_pajanan;
      $tempat_kejadian   =  $row->tempat_kejadian;
      $unit_terpajan = $row->unit_terpajan;
      $atasan = $row->atasan;
      $alamat2 = $row->alamat2;
      $route = $row->route;
      $bagian_tubuh = $row->bagian_tubuh;
      $pertolongan = $row->pertolongan;
      $jenis_pertolongan = $row->jenis_pertolongan;
      $sumber = $row->sumber;
      $kronologi  =  $row->kronologi;
      $imunisasi = $row->imunisasi;
      $tempat_pertolongan = $row->tempat_pertolongan;
      $kotak = $row->kotak;
      $perhatian = $row->perhatian;
      $pemantauan = $row->pemantauan;
      $tgl_pemberitahuan = $row->tgl_pemberitahuan;
      $diagnosa = $row->diagnosa;
      $tgl_terima = $row->tgl_terima;
      $status = $row->status;
      $tgl_pajanan2 = $row->tgl_pajanan2;
      $aksi   = 'perbarui';

  endforeach;
}




?>


<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>


<div class="span10">
    <h3 class="page-title">Laporan Insiden (Internal)</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/tambah">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>
                <input type="hidden" name="pembuat" value="<?= $user_nama; ?>" readonly>

                <h4>A. DATA IDENTITAS</h4>
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
                        <input type="text" name="nama" value="<?php echo $nama; ?>" reqiured>
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
                    <label><b>No RM / NIK</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" name="no_rm" value="<?php echo $no_rm; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label><b>Ruangan</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" name="ruangan" value="<?php echo $ruangan; ?>">
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
                    <select name='kelompok_umur' id='kelompok_umur' >
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
                    <select name='penanggung' id='penanggung'>
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
                    <input type="text" id="tgl_masuk" name="tgl_masuk" value="<?php echo $tgl_masuk ?>"></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
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
                <input type="text" id="pembuat" name="pembuat" value="<?php echo $user_nama; ?>" required readonly>
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
            <select name='k_insiden' id='k_insiden'>
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

<div id="pasien" hidden>
    <table>

       <h4>B. RINCIAN KEJADIAN</h4>

       <tr>
        <td>
            <label><b>Tanggal & Waktu Insiden</b></label>
        </td>
        <td> </td>
        <td>
            <div id="datetimepicker2" class="pasien input-append date">
                <input type="text" id="tgl_insiden" name="tgl_insiden" class="pasien" ></input>
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
            <input type="text" name="insiden" class="pasien" maxlength="200">
        </td>
    </tr>
    <tr>
        <td valign="top">
            <label><b>Kronologis Insiden</b></label>
        </td>
        <td></td>
        <td>
            <textarea id="textarea" rows="8" cols="30" maxlength="500" class="pasien form-control" name="kronologis"> </textarea>
            <div id="textarea_feedback"></div>
        </td>
    </tr>
    <tr valign="top">
        <td>
            <label><b>Jenis Insiden</b></label>
        </td>
        <td></td>
        <td>
            <select class='pasien js-example-basic-single' name='jenis_insiden' >
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
<tr valign="center">
    <td>
        <label><b>Orang Pertama yang </b></label>
        <label><b>Melaporkan Insiden </b></label>
    </td>
    <td></td>
    <td>
        <select name='pelapor_insiden' class="pasien" >
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
        <select name='insiden_terjadi' class="pasien">
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
        <select name='insiden_pasien' class="pasien">
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
        <input type="text" name="tempat_insiden" class="pasien" value= "<?php echo $tempat_insiden ?>" >
    </td>
</tr>
<tr>
    <td>
        <label><b>Insiden Terjadi pada Pasien</b></label>
    </td>
    <td></td>
    <td>
        <select name='spesialisasi' class="pasien">
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
<tr valign="center">
    <td>
        <label><b>Unit / Departemen terkait Insiden</b></label>
    </td>
    <td></td>
    <td>
       <select class='pasien js-example-basic-single' name='unit_utama'>
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
<tr valign="center">
    <td>
        <label><b>Akibat Insiden</b></label>
    </td>
    <td></td>
    <td>
        <select class='pasien' name='akibat_insiden'>
            <option value='' disabled selected>Pilih Akibat Insiden</option>
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

<br>
<tr>
    <td valign="top">
        <label><b>Tindakan Setelah Kejadian dan Hasilnya</b></label>
    </td>
    <td></td>
    <td>
        <textarea id="textarea" rows="8" cols="30" maxlength="200" class="pasien form-control" name="tindakankejadian"> <?php echo $tindakankejadian ?></textarea>
        <div id="textarea_feedback"></div>
    </td>
</tr>
<tr>
    <td>
        <label><b>Tindakan Dilakukan Oleh</b></label>
    </td>
    <td></td>
    <td>
        <select name='tindakan_oleh' class="pasien">
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
            <input type="radio" class="pasien" name="pernahterjadi"
            <?php if (isset($pernahterjadi) && $pernahterjadi=="Ya");?>
            value="Ya" id="klik" checked> Ya
            <input type="radio" class="pasien" name="pernahterjadi" 
            <?php if (isset($pernahterjadi) && $pernahterjadi=="Tidak") ;?>
            value="Tidak" id="tidak" > Tidak 
        <?php } else{ ?>
            <input type="radio" class="pasien" name="pernahterjadi"
            <?php if (isset($pernahterjadi) && $pernahterjadi=="Ya");?>
            value="Ya" id="klik" > Ya
            <input type="radio" class="pasien" name="pernahterjadi" 
            <?php if (isset($pernahterjadi) && $pernahterjadi=="Tidak") ;?>
            value="Tidak" id="tidak" checked > Tidak 
        <?php } ?>
    </td>
</tr>
<tr id="pernah">
    <input type="hidden"  id="unit_edit" name="unit_edit" class="pasien" value="<?php echo $unit_dulu ?>">
    <td>
        <label><b>Unit / Departemen terkait Insiden</b></label>
    </td>
    <td></td>
    <td>
       <select name='unit_dulu' id='unit_dulu' class="pasien">
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
        <textarea id="textarea" rows="8" cols="30" maxlength="200" class="form-control " name="langkahunit" class="pasien"><?php echo $langkahunit ?></textarea>
    </td>
</tr>

<tr>
    <td>
       <!--  <label><b>Tanggal Penerimaan Laporan</b></label> -->
   </td>
   <td> </td>
   <td>
    <!-- div id="datetimepicker3" class="input-append date"> -->
    <input type="hidden" id="tgl_terima" name="tgl_terima" readonly="readonly" value="<?php echo $tgl_terima ?>"></input>
            <!-- <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> -->
            </span>
        </div>
    </td>
</tr>
</table>
</div>

<div id="k3" hidden>
    <table>

       <h4>B. RINCIAN KEJADIAN</h4>

       <tr>
        <td>
            <label><b>Tanggal & Waktu Insiden</b></label>
        </td>
        <td> </td>
        <td>
            <div id="datetimepicker6" class="k3 input-append date">
                <input type="text" class="k3" name="tgl_insiden" value="<?php echo $tgl_insiden ?>"></input>
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
            <input type="text" name="insiden" class="k3" value="<?php echo $insiden ?>" maxlength="200">
        </td>
    </tr>
    <tr>
        <td valign="top">
            <label><b>Kronologis Insiden</b></label>
        </td>
        <td></td>
        <td>
            <textarea id="textarea" rows="8" cols="30" maxlength="500" class="k3 form-control" name="kronologis" > <?php echo $kronologis ?></textarea>
            <div id="textarea_feedback"></div>
        </td>
    </tr>
    <tr valign="top">
        <td>
            <label><b>Jenis Insiden</b></label>
        </td>
        <td></td>
        <td>
            <select name='jenis_insidenk3' class="k3" >
                <option value='' disabled selected>Pilih Jenis Insiden</option>
                <?php
                foreach ($cbkejadian as $cbk) {
                       
                            echo '<option value="' . $cbk->id_k3 . '" >' . $cbk->nama_insidenk3 . '</option>';
                    }
            ?>
        </select>
    </td>
</tr>
<tr valign="center">
    <td>
        <label><b>Orang Pertama yang </b></label>
        <label><b>Melaporkan Insiden </b></label>
    </td>
    <td></td>
    <td>
        <select name='pelapor_insiden' class="k3" >
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
        <select name='insiden_terjadi' class="k3">
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
        <label><b>Tempat Insiden / Lokasi Kejadian</b></label>
    </td>
    <td></td>
    <td>
        <input type="text" name="tempat_insiden" class="k3" value= "<?php echo $tempat_insiden ?>" >
    </td>
</tr>

<tr valign="center">
    <td>
        <label><b>Unit / Departemen terkait Insiden</b></label>
    </td>
    <td></td>
    <td>
       <select class='k3 js-example-basic-single' name='unit_utama' id='unit_utama'>
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
<tr valign="center">
    <td>
        <label><b>Akibat Insiden</b></label>
    </td>
    <td></td>
    <td>
        <select name='akibat_insiden' id='akibat_insiden' class="k3">
            <option value='' disabled selected>Pilih Akibat Insiden</option>
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

<br>
<tr>
    <td valign="top">
        <label><b>Tindakan Setelah Kejadian dan Hasilnya</b></label>
    </td>
    <td></td>
    <td>
        <textarea id="textarea" rows="8" cols="30" maxlength="200" class="k3 form-control" name="tindakankejadian"> <?php echo $tindakankejadian ?></textarea>
        <div id="textarea_feedback"></div>
    </td>
</tr>
<tr>
    <td>
        <label><b>Tindakan Dilakukan Oleh</b></label>
    </td>
    <td></td>
    <td>
        <select name='tindakan_oleh' id='tindakan_oleh' class="k3">
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
       <!--  <label><b>Tanggal Penerimaan Laporan</b></label> -->
   </td>
   <td> </td>
   <td>
    <!-- div id="datetimepicker3" class="input-append date"> -->
    <input type="hidden" id="tgl_terima" name="tgl_terima" readonly="readonly" value="<?php echo $tgl_terima ?>"></input>
            <!-- <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> -->
            </span>
        </div>
    </td>
</tr>
</table>
</div>

<div id="budaya" hidden>
    <table>

       <h4>B. RINCIAN KEJADIAN</h4>

       <tr>
        <td>
            <label><b>Tanggal & Waktu Insiden</b></label>
        </td>
        <td> </td>
        <td>
            <div id="datetimepicker7" class="budaya input-append date">
                <input type="text" id="tgl_insiden" name="tgl_insiden" class="budaya" value="<?php echo $tgl_insiden ?>"></input>
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
            <input type="text" name="insiden" class="budaya" value="<?php echo $insiden ?>" maxlength="200">
        </td>
    </tr>
    <tr>
        <td valign="top">
            <label><b>Kronologis Insiden</b></label>
        </td>
        <td></td>
        <td>
            <textarea id="textarea" rows="8" cols="30" maxlength="500" class="budaya form-control" name="kronologis" > <?php echo $kronologis ?></textarea>
            <div id="textarea_feedback"></div>
        </td>
    </tr>

    <tr valign="top">
        <td>
            <label><b>Jenis Insiden</b></label>
        </td>
        <td></td>
        <td>
            <select  name='jenis_insidenbudaya' id='jenis_insidenbudaya' class="budaya">
                <option value='' disabled selected>Pilih Jenis Insiden</option>
                <?php
                foreach ($cbbudaya as $cb) {
                    echo '<option value="' . $cb->id_kejadian . '" >' . $cb->nama_kejadian . '</option>';
                }
            ?>
        </select>
    </td>
</tr>
<tr valign="center">
    <td>
        <label><b>Orang Pertama yang </b></label>
        <label><b>Melaporkan Insiden </b></label>
    </td>
    <td></td>
    <td>
        <select name='pelapor_insiden' id='pelapor_insiden' class="budaya">
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
        <select name='insiden_terjadi' id='insiden_terjadi' class="budaya">
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
        <label><b>Tempat Insiden / Lokasi Kejadian</b></label>
    </td>
    <td></td>
    <td>
        <input type="text" name="tempat_insiden" class="budaya" value= "<?php echo $tempat_insiden ?>" >
    </td>
</tr>

<tr valign="center">
    <td>
        <label><b>Unit / Departemen terkait Insiden</b></label>
    </td>
    <td></td>
    <td>
       <select class='budaya js-example-basic-single' name='unit_utama' id='unit_utama'>
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
</table>
</div>

<div id="pajananA" hidden>
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
                            value="Dipakai" id="dipakai" reqiured >  Dipakai
                            <input type="radio" name="pelindung"
                            <?php if (isset($pelindung) && $pelindung=="Tidak") echo "checked";?>
                            value="Tidak" id="tidakdipakai" reqiured checked>  Tidak
                        </td>
                    </tr>

                    <tr id="jenis_pelindung">
                            <td valign="center">
                                <label><b>Jenis Pelindung</b></label>
                            </td>
                            <td> </td>
                            <td>
                                <input type="text" name="jenis_pelindung"></input>
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <label><b>Pertolongan Pertama</b></label>
                        </td>
                        <td></td>
                        <td>

                            
                                <input type="radio" name="pertolongan" value="Ada" id="klk" checked> Ada
                                <input type="radio" name="pertolongan" value="Tidak" id="no" > Tidak 
                            <!--  -->
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
                        </div>
    
    <div id="pajananB" hidden>
    <table>
     <h4>B. RINCIAN KEJADIAN</h4>

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
                           <input type="checkbox" <?php echo (in_array("Lain-lain", $perhatian)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('lain'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Lain-lain" name="perhatian[]"> Lain-lain, sebutkan
                                        <?php $key = array_search('Lain-lain', $perhatian); ?>
                                        <?php if($key === false) { ?>
                                            <input id="lain" name="perhatian[]" disabled value=""> <br>
                                        <?php } else { ?>
                                            <input id="lain" name="perhatian[]" value="<?= $perhatian[$key+1] ?>"> <br>
                                        <?php } ?>

                        </td>
        </tr>

        <td>
            <h5>Pasien Sumber Darah/Bahan Infeksius</h5>
        </td>
        
        
    
        <tr>
            <td>
                <label><b>Ruang Rawat</b></label>
            </td>
            <td></td>
            <td>
                <select name='ruang' id='ruang'>
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
                <div id="datetimepicker5" class="input-append date">
                    <input type="text" name="tgl_pemberitahuan" value="<?= $tgl_pemberitahuan; ?>" ></input>
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
</div>




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
                    $('#datetimepicker5').datetimepicker({
                        format: 'yyyy-MM-dd hh:mm:ss',
                        language: 'pt-BR',

                    });
                     $('#datetimepicker6').datetimepicker({
                        format: 'yyyy-MM-dd hh:mm:ss',
                        language: 'pt-BR',

                    });
                      $('#datetimepicker7').datetimepicker({
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
                       $('#k_insiden').change(function(e){
                        var id = e.target.value
                        if(id == 1){
                            $('#pasien').attr('hidden', false)
                            $('.pasien').prop('disabled', false)
                            $('#k3').attr('hidden', true)
                            $('.k3').prop('disabled', true)
                            $('#budaya').attr('hidden', true)
                            $('.budaya').prop('disabled', true)
                            $('#pajananA').attr('hidden', true)
                            $('#pajananB').attr('hidden', true)
                            
                        } else if(id == 2) {
                            $('#pasien').attr('hidden', true)
                            $('.pasien').prop('disabled', true)
                            $('#k3').attr('hidden', false)
                            $('.k3').prop('disabled', false)
                            $('#budaya').attr('hidden', true)
                            $('.budaya').prop('disabled', true)
                            $('#pajananA').attr('hidden', true)
                            $('#pajananB').attr('hidden', true)
                        } else if(id == 3) {
                            $('#pasien').attr('hidden', true)
                            $('.pasien').prop('disabled', true)
                            $('#k3').attr('hidden', true)
                            $('.k3').prop('disabled', true)
                            $('#budaya').attr('hidden', false)
                            $('.budaya').prop('disabled', false)
                            $('#pajananA').attr('hidden', true)
                            $('#pajananB').attr('hidden', true)
                        } else if(id == 4) {
                            $('#pasien').attr('hidden', true)
                            $('.pasien').prop('disabled', true)
                            $('#k3').attr('hidden', true)
                            $('.k3').prop('disabled', true)
                            $('#budaya').attr('hidden', true)
                            $('.budaya').prop('disabled', true)
                            $('#pajananA').attr('hidden', false)
                            $('#pajananB').attr('hidden', true)
                        } else if(id == 5) {
                            $('#pasien').attr('hidden', true)
                            $('.pasien').prop('disabled', true)
                            $('#k3').attr('hidden', true)
                            $('.k3').prop('disabled', true)
                            $('#budaya').attr('hidden', true)
                            $('.budaya').prop('disabled', true)
                            $('#pajananA').attr('hidden', true)
                            $('#pajananB').attr('hidden', false)
                        }
                    });
                    //    $('#jenis_pertolongan').change(function(e){
                    //     var id = e.target.value
                    //     if(id == 1){
                    //         $('#pasien').attr('hidden', false)
                    //     } else if(id == 2) {
                    //         $('#k3').attr('hidden', false)
                    //     } else if(id == 4) {
                    //         $('#pasien').attr('hidden', true)
                    //         $('#pajananA').attr('hidden', false)
                    //     } else if(id == 5) {
                    //         $('#pajananB').attr('hidden', false)
                    //     }
                    // })
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

                $(document).ready(function(){
                     $('#jenis_pelindung').hide();
                     $('#dipakai').click(function(){
                        $('#jenis_pelindung').show();

                    });
                     $('#tidakdipakai').click(function(){
                        $('#jenis_pelindung').hide();
                    });
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

                    $(document).ready(function() {
                        $(".js-example-basic-single").select2();
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