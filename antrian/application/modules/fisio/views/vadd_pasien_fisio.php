<?php 
$id   = '';
$titel   = 'Tambah';
$aksi   = 'tambah';
$button   = 'Simpan';
$no_rm = '';
$nama_pasien = '';
$dokter = '';
$tgl_daftar = date("Y-m-d H:i:s");
$tgl_periksa  = '';
$penanggung = '';
$poliklinik = '';
$shift = '';
$status = '1';


if (!empty($fisio)) {
    foreach ($fisio as $row) :
        $kodejadi = $row->id_fisio;
        $id_hasil_rad = $row->id_fisio;
        $no_rm = $row->no_rm;
        $nama_pasien = $row->nama_pasien;
        $tgl_daftar = $row->tgl_daftar;
        $tgl_periksa  = $row->tgl_periksa;
        $penanggung = $row->penanggung;
        $poliklinik = $row->poliklinik;
        $dokter = $row->dokter;
        $shift = $row->shift;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
    endforeach;
}
?>

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script>

    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    </link>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>



</head>

<body>

    <div class="span10">
        <h3 class="page-title">
            <?php echo $titel; ?> Antrian Pasien Fisioterapi</h3>
        <div class="well">
            <form id="user" method="post" action="<?php echo base_url(); ?>fisio/<?php echo $aksi; ?>">

                <table>
                    <input type="hidden" name='tgl_daftar' class="form-control" value="<?= $tgl_daftar; ?>" readonly>
                    <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>
                    <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>" readonly></td>

                    <tr>
                        <td>
                            <label><b>ID</b></label>
                        </td>
                        <td> &nbsp &nbsp</td>
                        <td>
                            <input type="text" name='id_fisio' class="form-control" value="<?= $kodejadi; ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>No RM </b></label>
                        </td>
                        <td></td>
                        <td>

                            <input type="text" id="no_rm" name="no_rm" value="<?php echo $no_rm; ?>" placeholder="Input RM, Lalu Klik Fill --->>">
                            <button type="button" id="btnSubmit" class="btn btn-info">Fill</button>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Nama Pasien</b></label>
                        </td>
                        <td></td>
                        <td>
                            <input type="text" id="nama_pasien" name="nama_pasien" value="<?php echo $nama_pasien; ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Poliklinik</b></label>
                        </td>
                        <td> </td>
                        <td valign="bottom">
                            <select name='poliklinik' id='poliklinik' required>
                                <option value='' disabled selected>Poliklinik</option>

                                <?php
                                foreach ($cbpoli as $cbpoli) {
                                        if ($cbpoli->id_poli == $poliklinik) {
                                                echo '<option value="' . $cbpoli->id_poli . '" selected >' . $cbpoli->nama_poli . '</option>';
                                            } else {
                                                echo '<option value="' . $cbpoli->id_poli . '" >' . $cbpoli->nama_poli . '</option>';
                                            }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Tgl Periksa</b></label>
                        </td>
                        <td> </td>
                        <td>
                            <div id="datetimepicker" class="input-append date">
                                <input type="text" id="tgl_periksa" name="tgl_periksa" readonly="readonly" value="<?php echo $tgl_periksa ?>" required></input>
                                <span class="add-on">
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Dokter</b></label>
                        </td>
                        <td> </td>
                        <td valign="bottom">
                            <select name='dokter' id='dokter' required>
                                <option value='' disabled selected>Dokter</option>

                                <?php
                                foreach ($cbdokter as $cbdokter) {
                                        if ($cbdokter->id == $dokter) {
                                                echo '<option value="' . $cbdokter->id . '" selected >' . $cbdokter->nama_dokter . '</option>';
                                            } else {
                                                echo '<option value="' . $cbdokter->id . '" >' . $cbdokter->nama_dokter . '</option>';
                                            }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><b>Penanggung</b></label>
                        </td>
                        <td></td>
                        <td>
                            <select name='penanggung' id='penanggung' required>
                                <option value='' disabled selected>Pilih Penanggung</option>

                                <?php
                                foreach ($cbpenanggung as $cbpenanggung) {
                                        if ($cbpenanggung->id_penanggung == $penanggung) {
                                                echo '<option value="' . $cbpenanggung->id_penanggung . '" selected >' . $cbpenanggung->nama_penanggung . '</option>';
                                            } else {
                                                echo '<option value="' . $cbpenanggung->id_penanggung . '" >' . $cbpenanggung->nama_penanggung . '</option>';
                                            }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Shift</b></label>
                        </td>
                        <td> &nbsp &nbsp</td>
                        <td>
                            <input type="radio" id="shift" name="shift" value="P" <?php if ($shift == 'P') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    } ?> required > Pagi &nbsp &nbsp &nbsp &nbsp
                            <input type="radio" id="shift" name="shift" value="S" <?php if ($shift == 'S') {
                                                                                        echo 'checked';
                                                                                    } else {
                                                                                        echo '';
                                                                                    } ?> required > Siang &nbsp &nbsp &nbsp &nbsp


                        </td>
                    </tr>


                </table>
                <div style="padding-top:20px">
                    <button class="btn btn-primary" id="simpan" type="submit">
                        <?php echo $button; ?> Antrian Pasien</button>

                </div>
        </div>
    </div>

   





</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnSubmit').click(function() {
            var datas = {
                no_rm: $('#no_rm').val(),

            }

            url = "<?php echo site_url() . '/fisio/cek_hisys'; ?>";
            // do_upload
            $.ajax({
                url: url,
                data: datas,
                dataType: "TEXT",
                type: "POST",
                success: function(data) {
                    obj = JSON.parse(data)
                    console.log(obj.nama_pasien);
                    $('#nama_pasien').val(obj.nama_pasien);

                },
                error: function() {

                }
            });



        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>

<script type="text/javascript">
    var date = new Date();
    date.setDate(date.getDate());
    $('#datetimepicker').datetimepicker({

        format: 'yyyy-MM-dd',
        language: 'pt-BR',
        startDate: date,


    });
</script> 