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
        <a class="btn btn-primary" href="<?php echo base_url(); ?>insiden/formbudayakeselamatan" role="button">Input Laporan Budaya Keselamatan</a>
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
            <tbody>

                <?php foreach ($databudaya as $l){ ?> 
                    <tr>            
                        <td></td>
                        <td><?php echo $l->id_laporan; ?></td>
                        <td><?php echo date_format(date_create($l->tgl_kejadian), 'd-m-Y'); ?></td>
                        <td><?php echo $l->unit_nama; ?></td>
                        <td><?php echo $l->nama_kejadian; ?></td>
                      <!--   <td><?php echo $l->kronologi_kejadian; ?></td> -->
                        <td align="center">

                         


                            <?php if ($l->stat==0) { ?>
                                <?php if ($this->session->kprs==1) { ?>
                                    <a href="<?php echo base_url(); ?>insiden/verifbudaya/<?php echo $l->id_laporan; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>

                                        <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_laporan; ?> " target="_blank">
                                            <input type="button" value="Print" class="btn btn-warning"></a>

                            <?php } else if ($this->session->kprs == 3) { ?>
                                    <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_laporan; ?> " target="_blank">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                                        <?php 

                            } else  { ?>
                                    <!--   <a href="<?php echo base_url(); ?>insiden/editlaporan/<?php echo $l->id_insiden; ?>"> -->
                                        <input type="button" disabled value="Sudah Terinput" class="btn btn-info"></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php  
                            } else { ?>
                                <?php if ($this->session->kprs==1) { ?>
                                   <!--  <a href="<?php echo base_url(); ?>insiden/veriflaporan/<?php echo $l->id_insiden; ?>"> -->
                                    <input type="button" disabled value="Sudah Diverifikasi" class="btn btn-success"></a>

                                    <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_laporan; ?> " target="_blank">
                                            <input type="button" value="Print" class="btn btn-warning"></a>

                                     <?php } else if ($this->session->kprs == 3) { ?>
                                            <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_laporan; ?> " target="_blank">
                                                <input type="button" value="Print" class="btn btn-warning"></a>
                                    <?php 
                                } else  { ?>
                                  <!--   <a href="<?php echo base_url(); ?>insiden/editlaporan/<?php echo $l->id_insiden; ?>"> -->
                                    <input type="button" disabled value="Sudah Diverifikasi" class="btn btn-success"></a>
                                <?php } ?>
                            <?php  } ?>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>


    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>

</div> 