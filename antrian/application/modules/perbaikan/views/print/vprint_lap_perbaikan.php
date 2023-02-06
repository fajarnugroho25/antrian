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
    foreach ($perbaikan as $b) {
        if ($b->id_jenis == "01") {
            $jenis = "Hardware";
        } elseif ($b->id_jenis == "02") {
            $jenis = "Software";
        }
        ?>

    <center>
        <h2>Laporan Perbaikan <?php echo $jenis; ?> <br>

        </h2>
    </center>
    <?php if (++$n == 1) break;
} ?>


    <center>
        <table cellpadding="5">

            <tr>
                <th>No</th>

                <th>ID</th>
                <th>Unit</th>
                <th>Keluhan</th>
                <th>Tgl_Input</th>
                <th>Tgl_Respon</th>
                <th>Tgl_Selesai</th>
                <th>Respon Time</th>
                <th>Lama Pengerjaan</th>
                <th>Rating</th>
                <th>Prioritas</th>



            </tr>
            <?php $no = 1;
            foreach ($perbaikan as $b) {
                ?>
            <?php

            if ($b->rating == 1) {
                $rating = 'Puas';
            } else {
                $rating = 'Tidak Puas';
            }

            $tgl_input =  date_create($b->tgl_input);
            $tgl_respon =  date_create($b->tgl_respon);
            $tgl_selesai =  date_create($b->tgl_selesai);
            $respontime  = $tgl_respon->diff($tgl_input);
            $lamapengerjaan = $tgl_selesai->diff($tgl_respon);

            $nilairating[] = $b->rating;
            $nilairespontime[] = $respontime->i;
            $nilailamaperbaikan[] = $lamapengerjaan->i;

            if ((($respontime->h)*60)+($respontime->i) <= 15) {
                $k = 1;
            } else {
                $k = 0;
            }
            $cekrespon[] = $k;

            if ($b->id_jenis == "01") {
                if ((($lamapengerjaan->h)*60)+($lamapengerjaan->i) <= 60) {
                    $j = 1;
                } else {
                    $j = 0;
                }
                $ceklamapengerjaan[] = $j;
            } else if ($b->id_jenis == "02") {
                if ((($lamapengerjaan->h)*60)+($lamapengerjaan->i) <= 15) {
                    $j = 1;
                } else {
                    $j = 0;
                }
                $ceklamapengerjaan[] = $j;
            }



            $kepuasan = (array_sum($nilairating) / count($nilairating)) * 100;
            $ratarespontime = (array_sum($nilairespontime) / count($nilairespontime));
            $ratalamaperbaikan = (array_sum($nilailamaperbaikan) / count($nilailamaperbaikan));
            $persenrespon = (array_sum($cekrespon) / count($cekrespon));
            $persenlamapengerjaan = (array_sum($ceklamapengerjaan) / count($ceklamapengerjaan));




            ?>
            <tr>

                <td>
                    <?php echo $no; ?>
                </td>
                <td>
                    <?php echo $b->id_perbaikan; ?>
                </td>
                <td>
                    <?php echo $b->unit_nama; ?>
                </td>
                <td>
                    <?php echo $b->keluhan; ?>
                </td>
                <td>
                    <?php echo $b->tgl_input; ?>
                </td>
                <td>
                    <?php echo $b->tgl_respon; ?>
                </td>
                <td>
                    <?php echo $b->tgl_selesai; ?>
                </td>
                <td>
                    <?php echo (($respontime->h)*60)+($respontime->i); ?> Menit
                </td>
                <td>
                    <?php echo (($lamapengerjaan->h)*60)+($lamapengerjaan->i); ?> Menit
                </td>
                <td>
                    <?php echo $rating; ?>
                </td>
                <td>
                    <?php echo $b->nama_prioritas; ?>
                </td>


            </tr>
            <?php $no++;
        } ?>

        </table>
        <?php
        $persenpuas = round($kepuasan, 2);
        $roundpersenrespon = round($persenrespon * 100, 2);
        $roundpersenlamapengerjaan = round($persenlamapengerjaan * 100, 2);
        $avgrestime = round($ratarespontime, 2);
        $avglamaperb = round($ratalamaperbaikan, 2);



        // echo "<b>Tingkat Kepuasan : </b> $persenpuas % <br>";
        // echo "<b>Rata-Rata Respon Time :  </b> $avgrestime Menit <br>";
        // echo "<b>Rata-Rata Lama Perbaikan :  </b> $avglamaperb Menit <br>";
        // echo "<b>Prosentase Respon <15 Menit :  </b> $roundpersenrespon % <br>";
        // echo "<b>Prosentase Lama Pengerjaan Menit :  </b> $roundpersenlamapengerjaan % <br>";

        ?>

    </center>
    <table>

        <tr>
            <th>Indikator</th>
            <th>Standard</th>
            <th>Pencapaian</th>
        </tr>
        <tr>
            <td>Tingkat Kepuasan</td>
            <td>90%</td>
            <td> <?php echo $persenpuas ?> %</td>
        </tr>
        <tr>
            <td>Respon Time <= 15 Menit</td> <td>90%</td>
            <td> <?php echo $roundpersenrespon ?> %</td>
        </tr>
        <tr>
            <td>Lama Pengerjaan <?php if ($jenis == 'Hardware') {
                                    echo "<=60 Menit";
                                } else if ($jenis == 'Software') {
                                    echo "<=15 Menit";
                                } ?></td>
            <td>90%</td>
            <td> <?php echo $roundpersenlamapengerjaan ?> %</td>

        </tr>
    </table>



</body> 