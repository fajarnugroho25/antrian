<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Perbaikan</h3>

    <div class="btn-toolbar">

        <a class="btn btn-primary" href="<?php echo base_url(); ?>perbaikan/tambahperbaikan" role="button">Tambah Perbaikan</a>

    </div>

    <div class="well">

        <table id="perbaikan" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Waktu Komplain</th>
                    <th>Unit</th>
                    <th>Keluhan</th>
                    <th>Job Desc</th>
                    <th>Prioritas</th>
                    <th>Status</th>
                    <th>Fungsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($perbaikan as $b) {   ?>
                <tr>
                    <?php 

                    $stat_perb = $b->stat_perb;
                    if ($stat_perb == '0') {
                        $a = 'Blm Respon';
                    } else if ($stat_perb == '1') {
                        $a = 'Direspon';
                    } else {
                        $a = 'Selesai';
                    }
                    //echo date_format($date, 'Y-m-d H:i:s');

                    ?>
                    <td>
                        <?php echo "" ?>
                    </td>
                    <td>
                        <?php echo $b->id_perbaikan; ?>
                    </td>

                    <td>
                        <?php echo $b->tgl_input; ?>
                    </td>
                    <td>
                        <?php echo $b->unit_nama; ?>
                    </td>
                    <td>
                        <?php echo $b->keluhan; ?>
                    </td>
                    <td>
                        <?php echo $b->nama_jenis; ?>
                    </td>
                    <td>
                        <?php echo $b->nama_prioritas; ?>
                    </td>
                    <td>
                        <?php echo $a ?>
                    </td>



                    <td align="center">

                        <?php if ($b->stat_perb == '2') { ?>

                        <a href="<?php echo base_url(); ?>perbaikan/editperbaikan/<?php echo $b->id_perbaikan; ?>">
                            <input type="button" disabled value="Edit" class="btn btn-info"></a>

                        <a href="<?php echo base_url(); ?>perbaikan/delete/<?php echo $b->id_perbaikan; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                            <input type="button" disabled value="X" class="btn btn-danger"></a>

                        <?php 
                    } else { ?>
                        <a href="<?php echo base_url(); ?>perbaikan/editperbaikan/<?php echo $b->id_perbaikan; ?>">
                            <input type="button" value="Edit" class="btn btn-info"></a>

                        <a href="<?php echo base_url(); ?>perbaikan/delete/<?php echo $b->id_perbaikan; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                            <input type="button" value="X" class="btn btn-danger"></a>
                        <?php 
                    }  ?>
                    </td>

                </tr>
                <?php 
            } ?>
            </tbody>
        </table>


    </div>


</div> 