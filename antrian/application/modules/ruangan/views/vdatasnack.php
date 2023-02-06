


<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Kebutuhan Snack</h3>

<!--     <?php
    var_dump($this->session->kprs);  ?> -->


    <div class="well">

        <table id="kendaraan" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th></th>
                    <th>Tgl Pemesanan</th>
                    <th>Kode Pemesanan</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Keperluan</th>
                    <th>Bagian</th>
                    <th>Nama Peminjam</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ruangan ?? [] as $key => $r) { ?>
                    <tr>
                        <td></td>
                        <td>
                            <?php echo $r->tgl_input; ?>
                        </td>
                        <td>
                            <?php echo $r->id_peminjaman; ?>
                        </td>
                        <td>
                            <?php echo $r->nama_ruangan; ?>
                        </td>
                        <td>
                            <?php echo date_format(date_create($r->tanggal), 'd-m-Y'); ?>
                        </td>
                        <td>
                            <?php echo date_format(date_create($r->waktu), 'H:i'); ?>
                        </td>
                        <td>
                            <?php echo $r->keperluan; ?>
                        </td>
                        <td>
                            <?php echo $r->unit_nama; ?>
                        </td>
                        <td>
                            <?php echo $r->user_peminta; ?>
                        </td>

                        
                        <td align="center">
                        
                        <?php $p = explode(",", $r->perlengkapan); ?>
                        <?php if ((in_array("Snack", $p))) { ?>
                                    <a href="<?php echo base_url(); ?>ruangan/verifsnack/<?php echo $r->id_peminjaman; ?>">
                                        <input type="button" value="Konfirmasi" class="btn btn-primary"></a>
                                <?php }
                                else { ?>
                                    <input type="button" disabled value="Sudah Diverifikasi" class="btn btn-success">
                                <?php } ?>
                        
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>
</div> 