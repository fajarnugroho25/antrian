<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Laporan Budaya Keselamatan RS Kasih Ibu</h3>

    <div class="btn-toolbar">
        <a class="btn btn-primary" href="<?php echo base_url(); ?>insiden/formpajananA" role="button">Laporan Pajanan Form A</a>
    </div>

    <div class="well">

        <table id="insiden2" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th></th>
                    <th>ID Laporan</th>
                    <th>Tanggal Kejadian</th>
                    <th>Tempat Kejadian</th>
                    <th>Kejadian</th>
                    <!-- <th>Kronologi Kejadian</th> -->
                    <th>Status</th>
                </tr>
            </thead>
            
        </table>


    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>

</div> 