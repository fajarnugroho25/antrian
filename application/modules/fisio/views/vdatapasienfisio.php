<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Pasien Fisio Mengantri</h3>

    <div class="btn-toolbar">

        <a class="btn btn-primary" href="<?php echo base_url(); ?>fisio/tambahpasien" role="button">Tambah Pasien</a>

    </div>

    <div class="well">

        <table id="fisio" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Tgl Daftar</th>
                    <th>Tgl Periksa</th>
                    <th>Penanggung</th>
                    <th>Poliklinik</th>
                    <th>Shift</th>
                    <th>Fungsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasien as $b) {   ?>
                <tr>
                    <?php 
                    $tgl_daftar = date_create($b->tgl_daftar);
                    $tgl_periksa = date_create($b->tgl_periksa);
                    //echo date_format($date, 'Y-m-d H:i:s');

                    ?>
                    <td>
                        <?php echo "" ?>
                    </td>

                    <td>
                        <?php echo $b->id_fisio; ?>
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
                        <?php echo $b->nama_poli; ?>
                    </td>

                    <td>
                        <?php
                        if ($b->shift == "P") {
                            echo "Pagi";
                        } else if ($b->shift == "S") {
                            echo "Siang";
                        }
                        ?>
                    </td>

                    <td align="center">
                        <a href="<?php echo base_url(); ?>fisio/editpasienfisio/<?php echo $b->id_fisio; ?>">
                            <input type="button" value="Edit" class="btn btn-info"></a>

                        <a href="<?php echo base_url(); ?>fisio/delete/<?php echo $b->id_fisio; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                            <input type="button" value="X" class="btn btn-danger"></a>

                    </td>
                </tr>
                <?php 
            } ?>
            </tbody>
        </table>


    </div>


</div> 