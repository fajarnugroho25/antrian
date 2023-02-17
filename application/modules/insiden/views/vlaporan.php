<!-- <?php

$tgl_awal='';
$tgl_akhir = ''; ?> -->

<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/buttons.html5.min.js"></script> 




<div class="span10">
    <h3 class="page-title">Data Laporan Insiden</h3>

    <div class="well">
      
        <table id="insiden" class="table table-striped table-bordered ">
           

            <thead>

                <tr>
                    <th></th>
                   <!--  <th>Tanggal Insiden</th> -->
                    <th>Jenis Insiden</th>
                    <th>Biru</th>
                    <th>Hijau</th>
                    <th>Kuning</th>
                    <th>Merah</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($laporaninsiden as $l){ ?> 
                    <tr>            
                        <td></td>
                        <!-- td><?php echo $l->tgl_insiden; ?></td> -->
                        <td><?php echo $l->jenis; ?></td>
                        <td><?php echo $l->jum_biru; ?></td>
                        <td><?php echo $l->jum_hijau; ?></td>
                        <td><?php echo $l->jum_kuning; ?></td>
                        <td><?php echo $l->jum_merah; ?></td>
                    </tr>   
            <?php  } ?>
        </tbody>
    </table>


</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.data').DataTable();
    });


    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
    $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
</script>

</div> 