<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Pasien Sudah Masuk</h3>
    <div class="well">

        <table id="example" class="table table-striped table-bordered dt-responsive ">
            <thead>
                <tr>
                    <th></th>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Telephone</th>
                    <th>Kelas Diminta</th>
                    <th>Prioritas</th>
                    <th>Operasi</th>
                    <th>Dokter</th>
                    <th>Tgl Antri</th>
                    <th>Tgl Realisasi</th>
                    <!-- <th>Fungsi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasien as $b) { ?>
                <tr>
                    <?php 
                    $tgl_antri = date_create($b->tgl_antri);
                    $tgl_realisasi = date_create($b->tgl_realisasi);

                    ?>
                    <td></td>
                    <td>
                        <?php echo $b->no_rm; ?>
                    </td>
                    <td>
                        <?php echo $b->nama; ?>
                    </td>
                    <td>
                        <?php echo $b->alamat; ?>
                    </td>
                    <td>
                        <?php echo $b->telp; ?>
                    </td>
                    <td>
                        <?php echo $b->nama_kelas; ?>
                    </td>
                    <?php if ($b->prioritas == "1") {
                        echo '<td style="background-color:#7FFFD4; color:red; border-radius: 5px;">*Prioritas*</td>';
                    } else {
                        echo '<td>Non Prioritas</td>';
                    } ?>
                    <td>
                        <?php echo $b->nama_operasi; ?>
                    </td>
                    <td>
                        <?php echo $b->nama_dokter; ?>
                    </td>
                    <td align="center"><span class='hide'>
                            <?php echo date_format($tgl_antri, 'Y-m-d H:m:i'); ?> </span>
                        <?php echo date_format($tgl_antri, 'd-m-Y H:i:s'); ?>
                    </td>
                    <td align="center"><span class='hide'>
                            <?php echo date_format($tgl_realisasi, 'Y-m-d H:m:i'); ?> </span>
                        <?php echo date_format($tgl_realisasi, 'd-m-Y H:i:s'); ?>
                    </td>
                    <!-- 
                    					<td align="center">
                                        <a href="<?php echo base_url(); ?>chome/editpasien_x/<?php echo $b->id_pasien; ?>">
                                        <input type="hidden" value="..." class="tombol small gray"></a>
                                        <a href="<?php echo base_url(); ?>cpasien/delete/<?php echo $b->id_pasien; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                                        <input type="hidden" value="Hapus" disabled class="tombol small gray"></a>
                                        </td> 
                    -->
                </tr>
                <?php 
            } ?>
            </tbody>
        </table>


    </div>


</div> 