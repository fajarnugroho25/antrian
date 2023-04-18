<?php 

$verifikator = $this->session->nama;

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

      $tgl_pemberitahuan = $row->tgl_pemberitahuan;
      $kotak = $row->kotak;
      $perhatian = $row->perhatian;
      $ruang = $row->ruang;
      $pemantauan = $row->pemantauan;
      $tgl_pemberitahuan = $row->tgl_pemberitahuan;
      $diagnosa = $row->diagnosa;


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
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/inputverifpajananB">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <!-- <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>-->
                 <input type="hidden" name="verifikator" value="<?php echo $verifikator; ?>" required readonly>


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
                        if ($cbu->unit_id == $ruang) { 
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
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control " name="pemantauan"><?= $pemantauan; ?></textarea>
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
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control " name="diagnosa"><?= $diagnosa; ?></textarea>
                <div id="textarea_feedback"></div>
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
        <div id="datetimepicker2" class="input-append date">
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