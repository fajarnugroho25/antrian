<?php
if (!empty($datapajananB)) {
    foreach ($datapajananB as $row) :     
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
      $ruang = $row->unit_nama;
      $pemantauan = $row->pemantauan;
      $tgl_pemberitahuan = $row->tgl_pemberitahuan;
      $diagnosa = $row->diagnosa;
      $tgl_pajanan = $row->tgl_pajanan;
      $tempat_kejadian   =  $row->tempat_kejadian;
      $unit_terpajan = $row->unit_terpajan;
      $atasan = $row->atasan;
      $alamat2 = $row->alamat2;
      $verifikator = $row->verifikator;
      $rekom = $row->rekom;
      $status = $row->status;

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
                <center>KOMITE <br>
                    PENCEGAHAN DAN PENGENDALIAN INFEKSI <br>
                    RUMAH SAKIT KASIH IBU SURAKARTA
                </center>
            </h2>
            <h4>
                <table border="1" width=100%>
                    <td>
                        <center>LAPORAN PAJANAN FORM B</center>
                    </td>
                </table>
            </h4>
            <table border="0" width=100%>
                <tr>
                    <td><b>FORMULIR B</b></td>
                    <td></td>
                    <td></td>
                </tr>
                 <tr valign="top">
                    <td>Setiap Kotak Dapat diisi <br></td>
                    <td>:</td>
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
                    <td valign="top">
                        <label>Untuk Perhatian</label>
                        <td valign="top">:</td>
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
                <tr>
                    <td style="padding-bottom:10px;"></td>
                   
                </tr>
                <tr>
                    <td>Pasien Sumber Darah/Bahan Infeksius</td>
                </tr>
                <tr>
                    <td style="padding-bottom:10px;"></td>
                   
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <td>No RM</td>
                    <td>:</td>
                    <td><?php echo $no_rm; ?></td>
                </tr>
                <tr>
                    <td>Ruang Rawat</td>
                    <td>:</td>
                    <td><?php echo $ruang; ?></td>
                </tr>
               
                 <tr>
                    <td style="padding-bottom:20px;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                
                <tr>
                    <td>Pemantauan Pajanan</td>
                    <td>:</td>
                    <td><?php echo $pemantauan; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pemberitahuan Atasan</td>
                    <td>:</td>
                    <td><?php echo date_format(date_create($tgl_pemberitahuan), 'd-m-Y H:i:s'); ?></td>
                </tr>
                <tr>
                    <td>Diagnosa Pasien</td>
                    <td>:</td>
                    <td><?php echo $diagnosa; ?></td>
                </tr>
                


        </td>

    </tr>



</table>


</table>

<h4>
    <table border="1" width=50% align="right">
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
        
    </table>
</h4>