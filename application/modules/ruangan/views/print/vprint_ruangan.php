<?php
if (!empty($ruangan)) {
  foreach ($ruangan as $row) :
    $id_peminjaman = $row->id_peminjaman;
    $ruangan1 = $row->nama_ruangan;
    $lainnya = $row->lainnya;
    $tanggal = $row->tanggal;
    $waktu = $row->waktu;
    $durasi = $row->durasi;
    $keperluan = $row->keperluan;
    $unit = $row->unit_nama;
    $user_peminta = $row->user_peminta;
    $kodejadi = $row->id_peminjaman;
    $tgl_input = $row->tgl_input;       
    $perlengkapan = $row->perlengkapan;
    $verif_ruangan = $row->verif_ruangan;
    $status = $row->status;
    $aksi   = 'editruangan';
    $titel   = 'Edit';
    $button   = 'Edit';
endforeach;
}
?>

<head>
    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>
</head>

<table border="0" width=100%>
    <button id="printPageButton" onClick="window.print();">Print</button>
    <tr>

        <td>
            <h2>
                <center>FORMULIR PEMAKAIAN <br>
                    RUANGAN / ALAT
                </center>
            </h2>
            <table border="0" width=100%>
                <tr>
                    <td>Ruangan</td>
                    <td>:</td>
                    <td><?php echo $ruangan1; ?> , <?php echo $lainnya ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?php echo date_format(date_create($tanggal), 'd-m-Y'); ?></td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>:</td>
                    <td><?php echo date_format(date_create($waktu), 'H:i'); ?></td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td><?php echo $durasi; ?></td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td><?php echo $keperluan; ?></td>
                </tr>
                <tr>
                    <td>Perlengkapan</td>
                    <td>:</td>
                     
                    <td>
                        <?php $perlengkapan = explode(",", $perlengkapan);?>
                                    <div class="taglistmenu">
                                        <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("Laptop", $perlengkapan)) ? 'checked' : ''; ?> id="laptop" value="Laptop" > Laptop &emsp; <br>
                                        <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("LCD / Screen", $perlengkapan)) ? 'checked' : ''; ?> id="lcd" value="LCD / Screen"> LCD / Screen &emsp; <br>
                                        <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("Sound System", $perlengkapan)) ? 'checked' : ''; ?> id="sound" value="Sound System"> Sound System &emsp; <br>
                                        <input type="checkbox" <?php echo (in_array("Kursi", $perlengkapan)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('kursi'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Kursi" name="perlengkapan[]"> Kursi, jumlah
                                        <?php $key = array_search('Kursi', $perlengkapan); ?>
                                        <?php if($key === false) { ?>
                                            <input id="kursi" name="perlengkapan[]" disabled value=""> <br>
                                        <?php } else { ?>
                                            <input id="kursi" name="perlengkapan[]" value="<?= $perlengkapan[$key+1] ?>"> <br>
                                        <?php } ?>
                                        <input type="checkbox" <?php echo (in_array("Meja", $perlengkapan)) ? 'checked' : ''; ?> name="perlengkapan[]" id="meja" value="Meja"> Meja &emsp; <br>

                                        <input type="checkbox" <?php echo (in_array("Snack", $perlengkapan)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('snack'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Snack"  name="perlengkapan[]"> Snack, jumlah
                                        <?php $key = array_search('Snack', $perlengkapan); ?>
                                        <?php if($key === false) { ?>
                                            <input id="snack" name="perlengkapan[]" disabled value=""> <br>
                                        <?php } else { ?>
                                            <input id="snack" name="perlengkapan[]" value="<?php echo (empty($perlengkapan)) ? '' : $perlengkapan[$key+1]; ?>"> <br>
                                        <?php } ?>
                                        <input type="checkbox" name="perlengkapan[]" <?php echo (in_array("Dokumentasi", $perlengkapan)) ? 'checked' : ''; ?> id="dokumentasi" value="Dokumentasi"> Dokumentasi &emsp; <br>

                    </td>
                </tr>
                <tr>
                    <td>Bagian</td>
                    <td>:</td>
                    <td><?php echo $unit; ?></td>
                </tr>
                <!-- <tr>
                    <td>Nama Peminjam</td>
                    <td>:</td>
                    <td><?php echo $user_peminta; ?></td>
                </tr> -->
                <!-- <tr>
                    <td >Tanggal Pesan Tempat</td>
                    <td >:</td>
                    <td ><?php echo $tgl_input; ?></td>
                </tr>
 -->
        </td>

    </tr>



</table>


</table>

<h4>
    <table border="1" width=50%>
        <tr>
            <td>
                Dibuat Oleh
            </td>
            <td>
                <?php echo $user_peminta; ?>
            </td>
        </tr>
        <tr>
            <td>
                Tanggal Pesan Tempat
            </td>
            <td>
                <?php echo $tgl_input; ?>
            </td>
        </tr>
       
    </table>
</h4>

<h4>
    <table border="1" width=50%>
        <tr>
            <td>
                Diverifikasi Oleh
            </td>
            <td>
               <?php echo $verif_ruangan; ?>
            </td>
        </tr>
    </table>
</h4>