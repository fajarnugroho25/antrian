<?php 


foreach ($kendaraan as $row) :
    $status = $row->status;
    $id_permintaan = $row->id_permintaan;
    $waktu_diminta = $row->waktu_diminta;
    $tujuan = $row->tujuan;
    $keperluan = $row->keperluan;
    $unit = $row->unit_id;
    $petugas = $row->petugas;
    $user_peminta = $row->user_peminta;
    $kodejadi = $row->id_permintaan;
    $tgl_input = $row->tgl_input;
    $waktu_verif = $row->waktu_verif;
    $keterangan = $row->keterangan;
    $user_verif = $this->session->nama;
    $waktu_verif =  date("Y-m-d H:i:s");
    $titel   = 'Verif';
    $aksi   = 'verifpermintaan';
    $button   = 'Verif';
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
        <?php echo $titel; ?> Permintaan Kendaraan</h3>

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>kendaraan/<?php echo $aksi; ?>">

            <table>
                <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly>
                <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>
                <input type="hidden" name='user_verif' class="form-control" value="<?= $user_verif; ?>" readonly>

                <tr>
                    <td>
                        <label><b>Kode Permintaan</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="text" name='id_permintaan' class="form-control" value="<?= $kodejadi; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Waktu Permintaan</b></label>
                    </td>
                    <td> </td>
                    <td>
                        <div id="datetimepicker" class="input-append date">
                            <input type="text" id="waktu_diminta" name="waktu_diminta" readonly="readonly" value="<?php echo $waktu_diminta ?>" required></input>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Alamat / Tujuan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>" required readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Keperluan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" id="keperluan" name="keperluan" value="<?php echo $keperluan; ?>" required readonly>
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
                    <td>
                        <label><b>Bagian / Unit</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='unit_id' id='unit_id' required disabled>
                            <option value='' disabled selected>Pilih Unit</option>

                            <?php
                            foreach ($cbunit as $cbunit) {
                                    if ($cbunit->unit_id == $unit) {
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
                        <label><b>Waktu Verif</b></label>
                    </td>
                    <td> </td>
                    <td>
                        <div id="datetimepicker2" class="input-append date">
                            <input type="text" id="waktu_verif" name="waktu_verif" readonly="readonly" value="<?php echo $waktu_verif ?>" required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Petugas</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='petugas' id='petugas'>
                            <option value='' disabled selected>Pilih Petugas</option>

                            <?php
                            foreach ($cbpetugas as $cbpetugas) {
                                    if ($cbpetugas->user == $petugas) {
                                            echo '<option value="' . $cbpetugas->user . '" selected >' . $cbpetugas->nama . '</option>';
                                        } else {
                                            echo '<option value="' . $cbpetugas->user . '" >' . $cbpetugas->nama . '</option>';
                                        }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Keterangan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <textarea id="keterangan" name="keterangan" rows="4"><?php echo $keterangan; ?></textarea>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Verif</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="radio" id="status" name="status" value="0" <?php if ($status == '0') {
                                                                                    echo 'checked';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?> required > Belum Verif &nbsp &nbsp &nbsp &nbsp
                        <input type="radio" id="status" name="status" value="2" <?php if ($status == '2') {
                                                                                    echo 'checked';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?> required > Terima &nbsp &nbsp &nbsp &nbsp
                        <input type="radio" id="status" name="status" value="1" <?php if ($status == '1') {
                                                                                    echo 'checked';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?> required > Sudah Verif &nbsp &nbsp &nbsp &nbsp
                        <input type="radio" id="status" name="status" value="9" <?php if ($status == '9') {
                                                                                    echo 'checked';
                                                                                } else {
                                                                                    echo '';
                                                                                } ?> required > Batal

                    </td>
                </tr>

            </table>
            <div style="padding-top:20px">
                <button class="btn btn-primary" id="simpan" type="submit">
                    <?php echo $button; ?> Permintaan</button>

            </div>
        </form>
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>

<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR'
    });
</script> 