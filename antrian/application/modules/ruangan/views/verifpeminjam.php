<?php 

$verif_ruangan = $this->session->nama;
    foreach ($ruangan as $row) :
        $status = $row->status;
        $id_peminjaman = $row->id_peminjaman;
        $ruangan = $row->ruangan;
        $lainnya = $row->lainnya;
        $tanggal = $row->tanggal;
        $waktu = $row->waktu;
        $durasi = $row->durasi;
        $keperluan = $row->keperluan;
        $unit = $row->unit;
        $user_peminta = $row->user_peminta;
        $kodejadi = $row->id_peminjaman;
        $tgl_input = $row->tgl_input;       
        $perlengkapan = $row->perlengkapan; 
        $aksi   = 'verif';
        $titel   = 'Verifikasi';
        $button   = 'Verifikasi';
    endforeach;

?>

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>

</head>
<div class="span10">
    <h3 class="page-title">
        Verifikasi Peminjaman Ruangan</h3>

        <div class="well">
            <form id="user" method="post" action="<?php echo base_url(); ?>ruangan/verif">

                <table>
                    <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>
                    <input type="hidden" name='verif_ruangan' class="form-control" value="<?= $verif_ruangan; ?>" readonly>

                    <tr>
                        <td>
                            <label><b>Kode Peminjaman</b></label>
                        </td>
                        <td> &nbsp &nbsp</td>
                        <td>
                            <input type="text" name='id_peminjaman' class="form-control" value="<?= $kodejadi; ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Ruangan </b></label>
                        </td>
                        <td></td>
                        <td>
                            <select name='ruangan' id='ruangan' required >
                                <option value='' disabled selected >Pilih Ruangan</option>

                                <?php
                                foreach ($cbruang as $cbruang) {
                                    if ($cbruang->id_ruang == $ruangan) {
                                        echo '<option value="' . $cbruang->id_ruang . '" selected >' . $cbruang->nama_ruangan . '</option>';
                                    } else {
                                        echo '<option value="' . $cbruang->id_ruang . '" >' . $cbruang->nama_ruangan . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="text" id="textInput" name="lainnya" value="<?php echo $lainnya; ?>" readonly required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Hari / Tanggal</b></label>
                        </td>
                        <td> </td>
                        <td>
                            <div id="datepicker" class="input-append date">
                                <input type="text" id="tanggal" name="tanggal" readonly="readonly" value="<?php echo $tanggal ?>" required></input>
                                <span class="add-on">
                                    <i data-date-icon="icon-calendar"></i>
                                </span>
                            </div>
                        </td>
                    </tr>



                    <tr>
                        <td>
                            <label><b>Waktu</b></label>
                        </td>
                        <td> </td>
                        <td>
                            <div id="timepicker" class="input-append time">
                                <input type="text" id="timepicker" name="waktu" readonly="readonly" value="<?php echo $waktu ?>" required></input>
                                <span class="add-on">
                                    <i data-date-icon="icon-time"></i>
                                </span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Durasi</b></label>
                        </td>
                        <td></td>
                        <td>
                            <input type="text" id="durasi" name="durasi" value="<?php echo $durasi; ?>" readonly required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Keperluan</b></label>
                        </td>
                        <td></td>
                        <td>
                            <input type="text" id="keperluan" name="keperluan" value="<?php echo $keperluan; ?> " readonly required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Perlengkapan</b></label>
                        <td>
                        
                        <td>
                            <?php $perlengkapan = explode(",", $perlengkapan);  ?>
                            <div class="taglistmenu">
                            <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("Laptop", $perlengkapan)) ? 'checked' : ''; ?> id="laptop" value="Laptop" > Laptop &emsp; <br>
                            <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("LCD / Screen", $perlengkapan)) ? 'checked' : ''; ?> id="lcd" value="LCD / Screen"> LCD / Screen &emsp; <br>
                            <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("Sound System", $perlengkapan)) ? 'checked' : ''; ?> id="sound" value="Sound System"> Sound System &emsp; <br>
                            <input type="checkbox" <?php echo (in_array("Kursi", $perlengkapan)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('kursi'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Kursi"> Kursi, jumlah
                            <?php $key = array_search('Kursi', $perlengkapan); ?>
                            <?php if($key === false) { ?>
                            <input id="kursi" name="perlengkapan[]" disabled value=""> <br>
                            <?php } else { ?>
                            <input id="kursi" name="perlengkapan[]" value="<?= $perlengkapan[$key+1] ?>"> <br>
                            <?php } ?>
                            <input type="checkbox" <?php echo (in_array("Meja", $perlengkapan)) ? 'checked' : ''; ?> name="perlengkapan[]" id="meja" value="Meja"> Meja &emsp; <br>

                            <input type="checkbox" <?php echo (in_array("Snack", $perlengkapan)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('snack'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Snack"> Snack, jumlah
                            <?php $key = array_search('Snack', $perlengkapan); ?>
                            <?php if($key === false) { ?>
                            <input id="snack" name="perlengkapan[]" disabled value=""> <br>
                            <?php } else { ?>
                            <input id="snack" name="perlengkapan[]" value="<?= $perlengkapan[$key+1] ?>"> <br>
                            <?php } ?>
                            <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("Dokumentasi", $perlengkapan)) ? 'checked' : ''; ?> id="dokumentasi" value="Dokumentasi"> Dokumentasi &emsp; <br>


                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Bagian</b></label>
                        </td>
                        <td></td>
                        <td>
                           <select name='unit' id='unit' required readonly>
                            <option value='' disabled selected>Pilih Bagian</option>

                            <?php
                            foreach ($cbunit as $cbu) {
                                if ($cbu->unit_id == $unit) { 
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
                        <label><b>Pemesan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" id="user_peminta" name="user_peminta" value="<?php echo $user_peminta; ?>" required readonly>
                    </td>
                </tr>
                <tr>

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
                        <input type="radio" id="status" name="status" value="3" <?php if ($status == '3') {
                                                                                    echo 'checked';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?> required > Ditolak &nbsp &nbsp &nbsp &nbsp
                    </td>
                </tr>

            </table>
            <div style="padding-top:20px">
                <button class="btn btn-primary" id="simpan" type="submit">
                 <?php echo $button; ?></button>

                </div>
            </form>
        </div>
    </div>



<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>

<script type="text/javascript">
    $('#datepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',

    });
    //  $('#timepicker').datetimepicker({
    //     format: 'hh:mm',
    //     language:  'en',
    // });
    $("#timepicker").datetimepicker({
        pickDate: false,
        minuteStep: 15,
        pickerPosition: 'bottom-right',
        format: 'hh:mm',
        autoclose: true,
        showMeridian: true,
        startView: 1,
        maxView: 1,
    });
    $(".datetimepicker").find('thead th').remove();
    $(".datetimepicker").find('thead').append($('<th class="switch">').text('Pick Time'));
    $('.switch').css('width','190px');

    function updateMenu() {     
   var allVals = [];
   $('.taglistmenu :checked').each(function(i) {
          
       allVals.push(("\'")+ $(this).val() +("\'"));
   });
   $('#akses').val(allVals).attr('rows',allVals.length) ;
    
   }
   $(function() {
      $('.taglistmenu input').click(updateMenu);
      updateMenu();
});

</script> 