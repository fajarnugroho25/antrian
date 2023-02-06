<?php 

$titel   = 'Tambah';
$aksi   = 'tambah';
$button   = 'Simpan';
$id_permintaan   = '';
$waktu_diminta = '';
$nama_dokter = '';
$keperluan = '';
$tujuan = '';
$unit = $this->session->unit_id;
$user_peminta = $this->session->nama;
$tgl_input =  date("Y-m-d H:i:s");
$status = '0';

if (!empty($kendaraan)) {
    foreach ($kendaraan as $row) :
        $id_permintaan = $row->id_permintaan;
        $waktu_diminta = $row->waktu_diminta;
        $tujuan = $row->tujuan;
        $keperluan = $row->keperluan;
        $unit = $row->unit_id;
        $user_peminta = $row->user_peminta;
        $kodejadi = $row->id_permintaan;
        $tgl_input = $row->tgl_input;
        $status = $row->status;
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

                <tr>
                    <td>
                        <label><b>Kode Pemesanan</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="text" name='id_permintaan' class="form-control" value="<?= $kodejadi; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Tgl & Jam Pemakaian</b></label>
                    </td>
                    <td> </td>
                    <td>
                        <div id="datetimepicker" class="input-append date">
                            <input type="text" id="waktu_diminta" name="waktu_diminta" readonly="readonly" value="<?php echo $waktu_diminta ?>" required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Alamat / Tujuan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Keperluan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" id="keperluan" name="keperluan" value="<?php echo $keperluan; ?>" required>
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
                        <select name='unit_id' id='unit_id' required>
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
        language: 'pt-BR',

    });
</script> 