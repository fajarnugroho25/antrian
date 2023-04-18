<?php
if (!empty($datapajananA)) {
    foreach ($datapajananA as $row) :     
      $kodejadi   =  $row->id_insiden;
      $tgl_laporan = $row->tgl_input;
      $tgl_pajanan = $row->tgl_pajanan;
      $tempat_kejadian   =  $row->tempat_kejadian;
      $unit_terpajan = $row->unit_nama;
      $nama = $row->nama;
      $alamat1 = $row->alamat1;
      $atasan = $row->atasan;
      $alamat2 = $row->alamat2;
      $route = $row->route;
      $bagian_tubuh = $row->bagian_tubuh;
      $pertolongan = $row->pertolongan;
      $jenis_pertolongan = $row->jenis_pertolongan;
      $sumber = $row->sumber;
      $kronologi_pajanan = $row->kronologi_pajanan;
      $imunisasi = $row->imunisasi;
      $pelindung = $row->pelindung;
      $tempat_pertolongan = $row->tempat_pertolongan;
      $pembuat = $row->pembuat;
      $verifikator = $row->verifikator;
      $tgl_terima = $row->tgl_terima;
      $rekom = $row->rekom;

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
                        <center>LAPORAN PAJANAN FORM A</center>
                    </td>
                </table>
            </h4>
            <table border="0" width=100%>
                <tr>
                    <td><b>FORMULIR A</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tanggal dan Waktu Laporan</td>
                    <td>:</td>
                    <td><?php echo date_format(date_create($tgl_laporan), 'd-m-Y H:i:s'); ?></td>
                </tr>
                <tr>
                    <td>Tanggal dan Waktu Pajanan</td>
                    <td>:</td>
                    <td><?php echo date_format(date_create($tgl_pajanan), 'd-m-Y H:i:s'); ?></td>
                </tr>
                <tr>
                    <td>Tempat Kejadian</td>
                    <td>:</td>
                    <td><?php echo $tempat_kejadian; ?></td>
                </tr>
                <tr>
                    <td>Unit Kerja Terpajan</td>
                    <td>:</td>
                    <td><?php echo $unit_terpajan; ?></td>
                </tr>
                
                <tr>
                    <td style="padding-bottom:10px;"></td>
                   
                </tr>

                <tr>
                    <td><b>Identitas</b></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $alamat1; ?></td>
                </tr>
                <tr>
                    <td>Atasan Langsung</td>
                    <td>:</td>
                    <td><?php echo $atasan; ?></td>
                </tr>
                <tr>
                    <td>Alamat Atasan</td>
                    <td>:</td>
                    <td><?php echo $alamat1; ?></td>
                </tr>
                 <tr>
                    <td style="padding-bottom:20px;"></td>
                   
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr valign="top">
                    <td>Route Pajanan</td>
                    <td>:</td>
                    <td>
                        <?php $route = explode(",", $route);?>
                        <div class="taglistmenu">
                            <input type="checkbox" name="route[]" <?php echo (in_array("Tusukan Jarum Suntik", $route)) ? 'checked' : ''; ?> value="Tusukan Jarum Suntik" > Tusukan Jarum Suntik &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Luka Pada Kulit", $route)) ? 'checked' : ''; ?> value="Luka Pada Kulit"> Luka Pada Kulit &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Gigitan", $route)) ? 'checked' : ''; ?> value="Gigitan"> Gigitan &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Mata", $route)) ? 'checked' : ''; ?> value="Mata"> Mata &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Mulut", $route)) ? 'checked' : ''; ?> value="Mulut"> Mulut &emsp; <br>
                            <input type="checkbox" name="route[]" <?php echo (in_array("Lain-lain", $route)) ? 'checked' : ''; ?> value="Lain-lain"> Lain-lain &emsp; <br></td>
                </tr>

                <tr>
                    <td>Sumber Pajanan</td>
                    <td>:</td>
                    <td>
                        <?php $sumber = explode(",", $sumber);?>
                        <div class="taglistmenu">
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Darah", $sumber)) ? 'checked' : ''; ?> value="Darah" > Darah &emsp; 
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Sputum", $sumber)) ? 'checked' : ''; ?> value="Sputum"> Sputum &emsp;
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Air Liur", $sumber)) ? 'checked' : ''; ?> value="Air Liur"> Air Liur &emsp;
                            <input type="checkbox" name="sumber[]" <?php echo (in_array("Faeses", $sumber)) ? 'checked' : ''; ?> value="Faeses"> Faeses &emsp; 
                           <input type="checkbox" <?php echo (in_array("Lain-lain", $sumber)) ? 'checked' : ''; ?> onclick="var input = document.getElementById('lainnya'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" value="Lain-lain" name="sumber[]"> Lain-lain, sebutkan
                                        <?php $key = array_search('Lain-lain', $sumber); ?>
                                        <?php if($key === false) { ?>
                                            <input id="lainnya" name="sumber[]" disabled value=""> <br>
                                        <?php } else { ?>
                                            <input id="lainnya" name="sumber[]" value="<?= $sumber[$key+1] ?>"> <br>
                                        <?php } ?></td>
                </tr>
                <tr>
                    <td>Bagian Tubuh yang Terpajan</td>
                    <td>:</td>
                    <td><?php echo $bagian_tubuh; ?></td>
                </tr>
                <tr>
                    <td>Kronologis</td>
                    <td>:</td>
                    <td><?php echo $kronologi_pajanan; ?></td>
                </tr>
                <tr>
                    <td>Imunisasi Hepatitis B</td>
                    <td>:</td>
                    <td><?php echo $imunisasi; ?></td>
                </tr>
                <tr>
                    <td>Alat Pelindung</td>
                    <td>:</td>
                    <td><?php echo $pelindung; ?></td>
                </tr>
                <tr>
                    <td>Pertolongan Pertama</td>
                    <td>:</td>
                    <td><?php echo $pertolongan; ?></td>
                </tr>
                <?php if ($pertolongan == 'Ada') { ?>
                <tr>
                    <td>Jenis Pertolongan</td>
                    <td>:</td>
                    <td><?php echo $jenis_pertolongan; ?></td>
                </tr>
                <?php } ?>
                <!-- <tr>
                    <td>Jenis Pertolongan</td>
                    <td>:</td>
                    <td><?php echo $jenis_pertolongan; ?></td>
                </tr> -->
                <tr>
                    <td>Tempat Pertolongan</td>
                    <td>:</td>
                    <td><?php echo $tempat_pertolongan; ?></td>
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
                <?php echo $tgl_laporan; ?>
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