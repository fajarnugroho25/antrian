<?php
if (!empty($databudaya)) {
    foreach ($databudaya as $row) :

        $tgl_kejadian = $row->tgl_kejadian;
        $tempat_kejadian = $row->unit_nama;
        $kejadian = $row->nama_kejadian;
        $kronologi_kejadian = $row->kronologi_kejadian;
        $pembuat = $row->pembuat;
        $tgl_input = $row->tgl_input;
        $tindaklanjut = $row->tindaklanjut;
        $verifikator = $row->verifikator;
        $tgl_verif = $row->verifikasi;
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
                <center>LAPORAN BUDAYA KESELAMATAN<br>
                    RS KASIH IBU SURAKARTA
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
                    <td width="250">-Tanggal dan Jam Kejadian</td>
                    <td>:</td>
                    <td><?php echo $tgl_kejadian; ?></td>
                </tr>
                <tr>
                    <td>-Tempat Kejadian</td>
                    <td>:</td>
                    <td><?php echo $tempat_kejadian; ?></td>
                </tr>
                <tr>
                    <td>-Kejadian</td>
                    <td>:</td>
                    <td><?php echo $kejadian; ?></td>
                </tr>
                <tr valign="top">
                    <td>-Kronologi</td>
                    <td>:</td>
                    <td><?php echo $kronologi_kejadian; ?></td>
                </tr>
                <tr>
                    <td>-Tindak Lanjut</td>
                    <td>:</td>
                    <td><?php echo $tindaklanjut; ?></td>
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
                Tanggal Buat
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
                Tanggal Verifikasi
            </td>
            <td>
                <?php echo $tgl_verif; ?>
            </td>
        </tr>
    </table>
</h4>