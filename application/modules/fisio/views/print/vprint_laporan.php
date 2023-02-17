<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css?ts=<?= time() ?>" media="all">
    <style type="text/css" media="print">
        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }
    </style>
</head>


<body>
    <button id="printPageButton" onClick="window.print();">Print</button>
    <?php 
    $n = 0;
    foreach ($pasien as $b) {
      if ($b->shift == "S") {
        $shift = "Siang";
      } elseif ($b->shift == "P") {
        $shift = "Pagi";
      }
      ?>

    <center>
        <h2>Laporan Antrian <br>
            <?php echo $b->nama_poli; ?> - Shift
            <?php echo $shift; ?>
        </h2>
    </center>
    <?php if (++$n == 1) break;
  } ?>

    <center>
        <table cellpadding="5">

            <tr>
                <th>No</th>

                <th>No RM</th>
                <th>Nama Pasien</th>
                <th>Tanggal Daftar</th>
                <th>Tanggal Periksa</th>
                <th>Penanggung</th>
                <th>Nama Dokter Pemeriksa</th>
                <th>Paraf Rehab Medik</th>
                <th>Paraf Pendaftaran</th>



            </tr>
            <?php $no = 1;
            foreach ($pasien as $b) {
              ?>

            <tr>

                <td>
                    <?php echo $no; ?>
                </td>
                <td>
                    <?php echo $b->no_rm; ?>
                </td>
                <td>
                    <?php echo $b->nama_pasien; ?>
                </td>
                <td>
                    <?php echo $b->tgl_daftar; ?>
                </td>
                <td>
                    <?php echo $b->tgl_periksa; ?>
                </td>
                <td>
                    <?php echo $b->nama_penanggung; ?>
                </td>
                <td>
                    <?php echo $b->nama_dokter; ?>
                </td>
                <td></td>
                <td></td>


            </tr>
            <?php $no++;
          } ?>

        </table>

    </center>



</body> 