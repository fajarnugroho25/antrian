<?php
if (!empty($datak3)) {
    foreach ($datak3 as $row) :

      $kodejadi   =  $row->id_insiden;
      $nama = $row->nama;
      $alamat1 = $row->alamat1;
      $no_rm = $row->no_rm;
      $ruangan = $row->ruangan;
      $umur = $row->umur;
      $kelompokumur = $row->kelompok;
      $jenis_kelamin = $row->jenis_kelamin;
      $penanggung = $row->nama_penanggung;
      $tgl_masuk = $row->tgl_masuk;
      $pembuat = $row->pembuat;
      $k_insiden = $row->nama_insiden;
      $tgl_insiden = $row->tgl_insiden;
      $insiden = $row->insiden;
      $kronologis = $row->kronologis;
      $jenis_insiden = $row->nama_insidenk3;
      $pelapor_insiden =$row->pelapor;
      $insiden_terjadi =$row->insidenpada;
      $insiden_pasien =$row->insiden_pasien;
      $tempat_insiden = $row->tempat_insiden;
      $spesialisasi = $row->spesialisasi;
      $unit_utama = $row->unit_utama;
      $unit_dulu  = $row->unit_dulu;
      $akibat_insiden =$row->akibat;
      $tindakankejadian =$row->tindakankejadian;
      $tindakanoleh =$row->tindakan_oleh;
      $langkahunit =$row->langkahunit;
      $verifikator = $row->verifikator;
      $grading = $row->grading;
      $rekom = $row->rekom;
      $tgl_input=$row->tgl_input;
      $tgl_terima = $row->tgl_terima;
      $titel   = 'Perbarui';
      $aksi   = 'perbarui';
      $button   = 'Perbarui';

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
                <center> <img src="<?php echo base_url();?>public/images/logo_big.gif" width="300" height="40"> <br> LAPORAN INSIDEN K3
                </center>
            </h2>
            <h4>
                <table border="1" width=100%>
                    <td>
                        <center> RAHASIA TIDAK BOLEH DIFOTOCOPY, DILAPORKAN MAKSIMAL 2X24 JAM</center>
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
                    <td>-Alamat</td>
                    <td>:</td>
                    <td><?php echo $alamat1; ?></td>
                </tr>
                <tr>
                    <td>-RM/NIK</td>
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
                    <td >-Klasifikasi Insiden</td>
                    <td >:</td>
                    <td ><?php echo $k_insiden; ?></td>
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
                    <td>-Lokasi Insiden</td>
                    <td>:</td>
                    <td><?php echo $tempat_insiden; ?></td>
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
                Rekomendasi
            </td>
            <td>
                <?php echo $rekom; ?>
            </td>
        </tr>
    </table>
</h4>