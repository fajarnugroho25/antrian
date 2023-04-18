<?php 

$titel   = 'Tambah';
$aksi   = 'tambah';
$button   = 'Simpan';
$id_perbaikan   = '';
$keluhan = '';
$unituser = $this->session->unituser;
$user_nama = $this->session->nama;
$tgl_input =  date("Y-m-d H:i:s");
$status = '0';

if (!empty($perbaikan)) {
    foreach ($perbaikan as $row) :
        $kodejadi = $row->id_perbaikan;
        $id_perbaikan = $row->id_perbaikan;
        $unit = $row->unit_id;
        $user_peminta = $row->user_peminta;
        $tgl_input = $row->tgl_input;
        $keluhan = $row->keluhan;
        $jenis = $row->id_jenis;
        $prioritas = $row->prioritas;
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
        <?php echo $titel; ?> Permintaan Perbaikan Umum / IPSRS</h3>

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>perbaikan/<?php echo $aksi; ?>">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>

                <tr>
                    <td>
                        <label><b>ID Perbaikan</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="text" name='id_perbaikan' class="form-control" value="<?= $kodejadi; ?>" readonly>
                    </td>
                </tr>
                
                <?php  if ($aksi == 'perbarui'): ?>
                <tr>
                    <td>
                        <label><b>Tgl & Jam Komplain</b></label>
                    </td>
                    <td> </td>
                    <td>
                        <div id="datetimepicker" class="input-append date">
                            <input type="text" id="tgl_input" name="tgl_input" readonly="readonly" value="<?php echo $tgl_input ?>" required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </td>
                </tr>
                <?php endif ?>


                <tr>
                    <td>
                        <label><b>Penelpon</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" id="user_peminta" name="user_peminta" value="<?php echo $user_nama; ?>" required readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Keluhan</b></label>
                    </td>
                    <td></td>
                    <td>
                         <textarea style="" id="keluhan" name="keluhan" rows="4"  required placeholder="Tulis Keluhan, Lokasi Titik Perbaikan dan Keterangan Lengkap"><?php echo $keluhan; ?></textarea>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Prioritas</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='prioritas' id='prioritas' required>
                            <option value='' disabled selected>Pilih Prioritas</option>

                            <?php
                            foreach ($cbprioritas as $cbprioritas) {
                                if ($cbprioritas->id == $prioritas) {
                                    echo '<option value="' . $cbprioritas->id . '" selected >' . $cbprioritas->nama_prioritas . '</option>';
                                } else {
                                    echo '<option value="' . $cbprioritas->id . '" >' . $cbprioritas->nama_prioritas . '</option>';
                                }
                            }
                            ?>
                        </select>
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
                                if ($cbunit->unit_id == $unituser) {
                                    echo '<option value="' . $cbunit->unit_id . '" selected >' .$cbunit->unit_nama . '</option>';
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
                        <label><b>Jenis Perbaikan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='id_jenis' id='id_jenis' required>
                            <option value='' disabled selected>Pilih Jenis</option>

                            <?php
                            foreach ($cbjenis as $cbjenis) {
                                if ($cbjenis->id_jenis == $jenis) {
                                    echo '<option value="' . $cbjenis->id_jenis . '" selected >' . $cbjenis->nama_jenis . '</option>';
                                } else {
                                    echo '<option value="' . $cbjenis->id_jenis . '" >' . $cbjenis->nama_jenis . '</option>';
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