<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Permintaan Kendaraan</h3>

    <div class="btn-toolbar">
        <a class="btn btn-primary" href="<?php echo base_url(); ?>kendaraan/tambahtranskendaraan" role="button">Tambah Permintaan</a>
    </div>

    <div class="well">

        <table id="kendaraan" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th></th>
                    <th>Kode Pemesanan</th>
                    <th>Tgl Input</th>
                    <th>User Peminta</th>
                    <th>Unit Pemintan</th>
                    <th>Waktu Diminta</th>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kendaraan as $k) { ?>
                <tr>
                    <?php 
                    $waktu_diminta = date_create($k->waktu_diminta);
                    $tgl_input = date_create($k->tgl_input);
                    ?>
                    <td>
                        <?php echo ""; ?>
                    </td>
                    <td>
                        <?php echo $k->id_permintaan; ?>
                    </td>
                    <td><span class='hide'>
                            <?php echo date_format($tgl_input, 'Y-m-d H:i:s'); ?></span>
                        <?php echo date_format($tgl_input, 'd-m-Y H:i:s'); ?>
                    </td>
                    <td>
                        <?php echo $k->user_peminta; ?>
                    </td>
                    <td>
                        <?php echo $k->unit_nama; ?>
                    </td>
                    <td><span class='hide'>
                            <?php echo date_format($waktu_diminta, 'Y-m-d H:i:s'); ?></span>
                        <?php echo date_format($waktu_diminta, 'd-m-Y H:i:s'); ?>
                    </td>
                    <td>
                        <?php echo $k->tujuan; ?>
                    </td>
                    <td>
                        <?php echo $k->keperluan; ?>
                    </td>



                    <td align="center">
                        <?php if ($k->stat_kend == 0) { ?>

                        <a href="<?php echo base_url(); ?>kendaraan/edittranskendaraan/<?php echo $k->id_permintaan; ?>">
                            <input type="button" value="Edit" class="btn btn-info"></a>
                        <?php 
                      } else if ($k->stat_kend == 2) { ?>

                        <a href="<?php echo base_url(); ?>kendaraan/edittranskendaraan/<?php echo $k->id_permintaan; ?>">
                            <input type="button" disabled value="Diterima" class="btn btn-warning"></a>

                        <?php 
                      } else { ?>
                        <a href="<?php echo base_url(); ?>kendaraan/edittranskendaraan/<?php echo $k->id_permintaan; ?>">
                            <input type="button" disabled value="Selesai" class="btn btn-success"></a>
                        <?php 
                      }  ?>
                    </td>
                </tr>
                <?php 
              } ?>
            </tbody>
        </table>


    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>

</div> 