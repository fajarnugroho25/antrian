<?php
if (!empty($datainsiden)) {
    foreach ($datainsiden as $row) :

        $nama = $row->nama;
        $no_rm = $row->no_rm;
        $ruangan = $row->ruangan;
        $umur = $row->umur;
        $kelompokumur = $row->kelompok;
        $jenis_kelamin = $row->jenis_kelamin;
        $penanggung = $row->nama_penanggung;
        $tgl_masuk = $row->tgl_masuk;
        $pembuat = $row->pembuat;
        $tgl_insiden = $row->tgl_insiden;
        $insiden = $row->insiden;
        $kronologis = $row->kronologis;
        $jenis_insiden = $row->jenis;
        $pelapor_insiden = $row->pelapor;
        $insiden_terjadi = $row->insidenpada;
        $insiden_pasien = $row->jenispasien;
        $tempat_insiden = $row->tempat_insiden;
        $spesialisasi = $row->nama_spesialisasi;
        $unit_utama = $row->unit_utama;
        $unit_dulu  = $row->unit_dulu;
        $akibat_insiden = $row->akibat;
        $tindakankejadian = $row->tindakankejadian;
        $tindakanoleh = $row->tindakan_oleh;
        $langkahunit = $row->langkahunit;
        $tgl_input = $row->tgl_input; //tgl lapor
        $tgl_terima = $row->tgl_terima;
        $status = $row->status;
        $verifikator = $row->verifikator;
        $grading = $row->grading;
        $tipe_insiden = $row->nama_tipe;
        $rekom = $row->rekom;
        $komite = $row->verifikator_komite;


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
                 <center> <img src="<?php echo base_url();?>public/images/logo_big.gif" width="300" height="40"> <br> LAPORAN INSIDEN KESELAMATAN PASIEN
                </center>
            </h2>
            <h4>
                <table border="1" width=100%>
                    <td>
                        <center>RAHASIA TIDAK BOLEH DIFOTOCOPY, DILAPORKAN MAKSIMAL 2X24 JAM</center>
                    </td>
                </table>
            </h4>
            <table border="0" width=100%>
                <tr>
                    <td><b>DATA PASIEN</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-Nama</td>
                    <td>:</td>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <td>-RM</td>
                    <td>:</td>
                    <td><?php echo $no_rm; ?></td>
                </tr>
                <tr>
                    <td>-Ruangan</td>
                    <td>:</td>
                    <td><?php echo $ruangan; ?></td>
                </tr>
                <tr>
                    <td>-Umur</td>
                    <td>:</td>
                    <td><?php echo $umur; ?></td>
                </tr>
                <tr>
                    <td>-Kelompok Umur</td>
                    <td>:</td>
                    <td><?php echo $kelompokumur; ?></td>
                </tr>
                <tr>
                    <td>-Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $jenis_kelamin; ?></td>
                </tr>
                <tr>
                    <td>-Penanggung</td>
                    <td>:</td>
                    <td><?php echo $penanggung; ?></td>
                </tr>
                <tr>
                    <td >-Tanggal Masuk RS</td>
                    <td >:</td>
                    <td ><?php echo $tgl_masuk; ?></td>
                </tr>
                <tr>
                    <td style="padding-bottom:20px;"></td>
                    <td style="padding-bottom:20px;"></td>
                    <td style="padding-bottom:20px;"></td>
                </tr>

                <tr>
                    <td><b>RINCIAN KEJADIAN</b></td>
                    <td></td>
                    <td></td>

                </tr>


                <tr>
                    <td>-Tanggal / Waktu Kejadian</td>
                    <td>:</td>
                    <td><?php echo $tgl_insiden; ?></td>
                </tr>
                <tr>
                    <td>-Insiden</td>
                    <td>:</td>
                    <td><?php echo $insiden; ?></td>
                </tr>
                <tr valign="top">
                    <td>-Kronologi Insiden</td>
                    <td>:</td>
                    <td><?php echo $kronologis; ?></td>
                </tr>
                <tr>
                    <td>-Jenis Insiden</td>
                    <td>:</td>
                    <td><?php echo $jenis_insiden; ?></td>
                </tr>
                <tr>
                    <td>-Orang Pertama Yang Melapor</td>
                    <td>:</td>
                    <td><?php echo $pelapor_insiden; ?></td>
                </tr>
                <tr>
                    <td>-Insiden Terjadi Pada</td>
                    <td>:</td>
                    <td><?php echo $insiden_terjadi; ?></td>
                </tr>
                <tr>
                    <td>-Insiden Menyangkut Pasien</td>
                    <td>:</td>
                    <td><?php echo $insiden_pasien; ?></td>
                </tr>
                <tr>
                    <td>-Lokasi Insiden</td>
                    <td>:</td>
                    <td><?php echo $tempat_insiden; ?></td>
                </tr>
                <tr>
                    <td>-Insiden Terjadi Pada Pasien</td>
                    <td>:</td>
                    <td><?php echo $spesialisasi; ?></td>
                </tr>
                <tr>
                    <td>-Unit Kerja Terkait</td>
                    <td>:</td>
                    <td><?php echo $unit_utama; ?></td>
                </tr>
                <tr>
                    <td>-Akibat Terhadap Pasien</td>
                    <td>:</td>
                    <td><?php echo $akibat_insiden; ?></td>
                </tr>
                <tr valign="top">
                    <td width="250">-Tindakan Segera </td>
                    <td>:</td>
                    <td><?php echo $tindakankejadian; ?></td>
                </tr>
                <tr>
                    <td>-Tindakan Dilakukan Oleh</td>
                    <td>:</td>
                    <td><?php echo $tindakanoleh; ?></td>
                </tr>
                <tr>
                    <td>-Pernah Terjadi di Unit Lain ?</td>
                    <td>:</td>
                    <td><?php echo $unit_dulu; ?></td>
                </tr>
                <tr valign="top">
                    <td>
                        <ul>
                            <li>Keterangan</li>
                        </ul>
                    </td>
                    <td>:</td>
                    <td><?php echo $langkahunit; ?></td>
                </tr>


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
                <?php echo $pembuat; ?>
            </td>
        </tr>
        <tr>
            <td>
                Tanggal
            </td>
            <td>
                <?php echo $tgl_input; ?>
            </td>
        </tr>
        <tr>
            <td>
                Verifikator
            </td>
            <td>
                <?php echo $verifikator; ?>
            </td>
        </tr>
        <tr>
            <td>
                Tanggal Verif
            </td>
            <td>
                <?php echo $tgl_terima; ?>
            </td>
        </tr>
        <tr>
            <td>
                Grading
            </td>
            <td>
                <?php echo $grading; ?>
            </td>
        </tr>
        <tr>
            <td>
                Tipe Insiden
            </td>
            <td>
                <?php echo $tipe_insiden; ?>
            </td>
        </tr>
        <tr>
            <td>
                Rekomendasi
            </td>
            <td>
                <?php echo $rekom; ?>
            </td>
        </tr>
        <tr>
            <td>
                Komite
            </td>
            <td>
                <?php echo $komite; ?>
            </td>
        </tr>
    </table>
</h4>