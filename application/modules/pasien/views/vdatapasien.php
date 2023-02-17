<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Pasien Mengantri</h3>

    <div class="btn-toolbar">

        <a class="btn btn-primary" href="<?php echo base_url(); ?>pasien/tambahpasien" role="button">Tambah Pasien</a>

    </div>

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
                    <th>Tgl Permintaan</th>

                    <th>Fungsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasien as $b) {   ?>
                <tr>
                    <?php 
                    $tgl_antri = date_create($b->tgl_antri);
                    $tgl_dokter = date_create($b->tgl_permintaan);
                    //echo date_format($date, 'Y-m-d H:i:s');

                    ?>
                    <td>
                        <?php echo "" ?>
                    </td>
                    <!-- <td><span class='hide'><?php echo $b->id_pasien; ?></span><?php echo $b->no_rm; ?></td> -->
                    <td></span>
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
                    <td><span class='hide'>
                            <?php echo date_format($tgl_antri, 'Y-m-d H:m:i'); ?></span>
                        <?php echo date_format($tgl_antri, 'd-m-Y H:m:i'); ?>
                    </td>

                    <td><span class='hide'>
                            <?php echo date_format($tgl_dokter, 'Y-m-d'); ?></span>
                        <?php 



                        if ($b->tgl_permintaan == '0000-00-00 00:00:00' || $b->tgl_permintaan == '0') {
                            echo '---';
                          } else {
                            echo date_format($tgl_dokter, 'd-m-Y');
                          }

                        ?>
                    </td>

                    <td align="center">
                        <a href="<?php echo base_url(); ?>pasien/editpasien/<?php echo $b->id_pasien; ?>">
                            <input type="button" value="..." class="btn btn-info"></a>
                        <!--
                                        <a href="<?php echo base_url(); ?>cpasien/delete/<?php echo $b->id_pasien; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                                        <input type="hidden" value="Hapus" disabled class="tombol small gray"></a>
                                    	-->
                    </td>
                </tr>
                <?php 
              } ?>
            </tbody>
        </table>


    </div>


</div> 