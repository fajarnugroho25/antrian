<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">
<style>
    .btn-primary.custom-btn {
        background-color: #fd7e14;
        border-color: #fd7e14;
        color: black;
    }
    .btn-primary.kuning-btn {
        background-color: #fdfe02;
        border-color: #fdfe02;
        color:black;
    }

</style>

<div class="span10">
    <h2 class="page-title">Data Laporan Insiden</h2>

    <!-- <div class="btn-toolbar">
        <a class="btn btn-primary" href="<?php echo base_url(); ?>insiden/forminsiden" role="button">Input Laporan Insiden</a>
    </div> -->

    <div class="well">

        <table id="datainsiden" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Laporan <br>
                        Tgl Laporan</th>
                    <th>No RM / NIK</th>
                    <th>Klasifikasi Insiden</th>
                    <th>Unit Pelapor</th>
                    <th>Lokasi</th>
                    <th>Grading</th>
                    <th>Waktu Kejadian</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($datainsiden as $l) : ?>
                    <tr>
                        <td></td>
                        <td><?php echo $l->id_insiden; ?><br>
                        <?php echo date_format(date_create($l->tgl_input), 'd-m-Y H:i'); ?></td>
                        <td><?php echo $l->no_rm; ?></td>
                        <td><?php echo $l->nama_insiden; ?></td>
                        <td><?php echo $l->unit_nama; ?></td>
                        <td><?php if ($l->k_insiden == 4 || $l->k_insiden == 5) {
                            echo $l->tempat_kejadian;
                        } 
                                else {
                            echo $l->tempat_insiden;
                        }?></td>
                        <td><?php if ($l->grading == "Rendah (Biru)") { ?>
                                <input type="text" disabled value="Rendah (Biru)" class="btn btn-primary"></a>
                        <?php }
                            elseif ($l->grading == "Moderat (Hijau)") { ?>
                                <input type="text" disabled value="Moderat (Hijau)" class="btn btn-success"></a>
                         <?php }
                            elseif ($l->grading == "Tinggi (Kuning)") { ?>
                                <input type="text" disabled value="Tinggi (Kuning)" class="btn btn-primary kuning-btn"></a>
                         <?php }
                            elseif ($l->grading == "Ekstrim (Merah)") { ?>
                                <input type="text" disabled value="Ekstrim (Merah)" class="btn btn-danger"></a>
                        <?php }
                            elseif ($l->grading == "Biru") { ?>
                                <input type="text" disabled value="Biru" class="btn btn-primary"></a>
                        <?php }
                            elseif ($l->grading == "Hijau") { ?>
                                <input type="text" disabled value="Hijau" class="btn btn-success"></a>
                        <?php }
                            elseif ($l->grading == "Kuning") { ?>
                                <input type="text" disabled value="Kuning" class="btn btn-primary kuning-btn"></a>
                        <?php }
                            elseif ($l->grading == "Oranye") { ?>
                                <input type="text" disabled value="Oranye" class="btn btn-primary custom-btn"></a>
                        <?php }
                            elseif ($l->grading == "Merah") { ?>
                                <input type="text" disabled value="Merah" class="btn btn-danger"></a>
                        <?php } ?>
                        </td>  

                        <td><?php if ($l->k_insiden == 4) {
                            echo $l->tgl_pajanan;
                        }
                                elseif ($l->k_insiden == 5) {
                            echo $l->tgl_pemberitahuan;
                                 } 
                                else {
                            echo $l->tgl_insiden;
                        }?></td>
                        
                        <td align="center">

                            <?php if ($l->stat == 0) { ?>
                                <?php if ($this->session->kprs == 1) { ?>
                                    <?php if ($l->k_insiden == 1) { ?>
                                    <a href="<?php echo base_url(); ?>insiden/veriflaporan/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <!-- <?php } else if ($l->k_insiden == 4 || $l->k_insiden == 5 ) { ?>
                                        <a href="<?php echo base_url(); ?>insiden/verifpajananA/<?php echo $l->id_insiden; ?>"onclick="return confirm('Anda yakin Ingin Verif Data ?')">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } else if ($l->k_insiden == 2) { ?>  
                                        <a href="<?php echo base_url(); ?>insiden/verifkejadian/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } ?> -->
                                <?php } else if ($this->session->kprs == 2) { ?>
                                     <?php if ($l->k_insiden == 1) { ?>
                                    <a href="<?php echo base_url(); ?>insiden/veriflaporan/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } else if ($l->k_insiden == 4 ) { ?>
                                        <a href="<?php echo base_url(); ?>insiden/verifpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } elseif ($l->k_insiden == 5) { ?>  
                                        <a href="<?php echo base_url(); ?>insiden/verifpajananB/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } elseif ($l->k_insiden == 2) { ?>  
                                        <a href="<?php echo base_url(); ?>insiden/verifkejadian/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                <?php }}
                                        else if ($this->session->kprs == 3) { ?>
                                    <?php if ($l->k_insiden == 1 || $l->k_insiden == 2 || $l->k_insiden == 4 || $l->k_insiden == 5) { ?>
                                        <input type="button" disabled value="Belum Diverifikasi" class="btn btn-secondary"></a>
                                    <?php } elseif ($l->k_insiden == 3) { ?>
                                        <a href="<?php echo base_url(); ?>insiden/verifbudaya/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                <?php }}
                                        else if ($this->session->kprs == 4) { ?>
                                   <?php if ($l->k_insiden == 1 || $l->k_insiden == 2 || $l->k_insiden == 4 || $l->k_insiden == 5) { ?>
                                        <input type="button" disabled value="Belum Diverifikasi" class="btn btn-secondary"></a>
                                    <?php } elseif ($l->k_insiden == 3) { ?>
                                        <a href="<?php echo base_url(); ?>insiden/verifbudaya/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                <?php }}
                                else if ($this->session->kprs == 5) { ?>
                                   <?php if ($l->k_insiden == 1 || $l->k_insiden == 2 || $l->k_insiden == 4 || $l->k_insiden == 5) { ?>
                                        <input type="button" disabled value="Belum Diverifikasi" class="btn btn-secondary"></a>
                                <?php }} 
                                else if ($this->session->kprs == 6) { ?>
                                   <?php if ($l->k_insiden == 1 || $l->k_insiden == 2 || $l->k_insiden == 4 || $l->k_insiden == 5) { ?>
                                        <input type="button" disabled value="Belum Diverifikasi" class="btn btn-secondary"></a>
                                <?php }}
                                else if ($this->session->kprs == 7) { ?>
                                   <?php if ($l->k_insiden == 1) { ?>
                                        <a href="<?php echo base_url(); ?>insiden/veriflaporan/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } else if ($l->k_insiden == 4 ) { ?>
                                        <a href="<?php echo base_url(); ?>insiden/verifpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } elseif ($l->k_insiden == 5) { ?>  
                                        <a href="<?php echo base_url(); ?>insiden/verifpajananB/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                    <?php } elseif ($l->k_insiden == 2) { ?>  
                                        <a href="<?php echo base_url(); ?>insiden/verifkejadian/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                                <?php }}
                                else { ?>
                                    <?php if ($l->k_insiden == 1 || $l->k_insiden == 2 || $l->k_insiden == 4 || $l->k_insiden == 5) { ?>
                                        <input type="button" disabled value="Belum Diverifikasi" class="btn btn-secondary"></a>
                                <?php }} ?>

                    
                <?php } elseif ($l->stat == 1) { ?>


                    <?php if ($this->session->kprs == 1) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                            <input type="button" disabled value="Terkirim ke Komite" class="btn btn-success"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <input type="button" disabled value="Terkirim ke Komite" class="btn btn-success"></a>
                        <?php } elseif ($l->k_insiden == 4 || $l->k_insiden == 5 ) { ?>
                            <input type="button" disabled value="Sudah Diverifikasi" class="btn btn-success"></a>
                        <?php } ?>


                    <!-- Kepala Ruang -->
                    <?php } else if ($this->session->kprs == 2) { ?>
                        <?php if ($l->k_insiden == 1 || $l->k_insiden == 2 ) { ?>
                            <input type="button" disabled value="Terkirim ke Komite" class="btn btn-warning"></a>
                        <?php } ?>
                    <!-- Komite Mutu -->
                    <?php } else if ($this->session->kprs == 3) { ?> 
                        <?php if ($l->k_insiden == 1) { ?>
                            <a href="<?php echo base_url(); ?>insiden/verifikp/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                        <?php } elseif ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <a href="<?php echo base_url(); ?>insiden/verifkomitek3/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                        <?php } elseif ($l->k_insiden == 3) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } ?>
                    <!-- Direktur -->
                    <?php } else if ($this->session->kprs == 4) { ?>
                        <?php if ($l->k_insiden == 1 || $l->k_insiden == 2) { ?>
                            <input type="button" disabled value="Terkirim ke Komite" class="btn btn-success"></a>
                        <?php } elseif ($l->k_insiden == 3) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } ?>
                    <!-- Komite IKP -->
                    <?php } else if ($this->session->kprs == 5) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                            <a href="<?php echo base_url(); ?>insiden/verifikp/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                        <?php } ?>
                    <!-- Komite P2K3 & Pajanan -->
                    <?php } else if ($this->session->kprs == 6) { ?>
                        <?php if ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <a href="<?php echo base_url(); ?>insiden/verifkomitek3/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                        <?php } ?>
                    
                    <?php } else if ($this->session->kprs == 7) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                            <a href="<?php echo base_url(); ?>insiden/verifikp/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                        <?php } elseif ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <a href="<?php echo base_url(); ?>insiden/verifkomitek3/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Verifikasi" class="btn btn-info"></a>
                        <?php } ?>

                <?php } 
                        else { ?>
                        <?php if ($l->k_insiden == 1 || $l->k_insiden == 2) { ?>
                                        <input type="button" disabled value="Belum Diverifikasi Komite" class="btn btn-secondary"></a>
                        <?php } elseif ($l->k_insiden == 4 || $l->k_insiden == 5) { ?>
                                        <input type="button" disabled value="Sudah Diverifikasi" class="btn btn-success"></a>
                <?php }} ?>        
                <?php } elseif ($l->stat == 2) { ?>
                    <!-- Komite IKP -->
                    <?php if ($this->session->kprs == 5) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                             <a href="<?php echo base_url(); ?>insiden/cetakinsiden/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                    <!-- Komite P2K3 & Pajanan -->
                    <?php }} else if ($this->session->kprs == 6) { ?>
                        <?php if ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakk3/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } ?>


                    <?php } if ($this->session->kprs == 1) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                            <input type="button" disabled value="Sudah Diverifikasi Komite" class="btn btn-success"></a>
                        <?php }  ?>

                    <!-- Kepala Ruang -->
                    <?php } else if ($this->session->kprs == 2) { ?>
                        <?php if ($l->k_insiden == 1 || $l->k_insiden == 2 || $l->k_insiden == 4 || $l->k_insiden == 5 ) { ?>
                            <input type="button" disabled value="Sudah Diverifikasi Komite" class="btn btn-success"></a>
                    <?php } ?>
                    <!-- Komite Mutu -->
                    <?php } else if ($this->session->kprs == 3) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                             <a href="<?php echo base_url(); ?>insiden/cetakinsiden/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakk3/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 3) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                    <?php } ?>
                    

                    <?php } else if ($this->session->kprs == 7) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                             <a href="<?php echo base_url(); ?>insiden/cetakinsiden/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakk3/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                    <?php } ?>
                    
                     <!-- Direktur -->
                    <?php } else if ($this->session->kprs == 4) { ?>
                        <?php if ($l->k_insiden == 1) { ?>
                             <a href="<?php echo base_url(); ?>insiden/cetakinsiden/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 2) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakk3/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 3) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakbudaya/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 4) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananA/<?php echo $l->id_insiden; ?>">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                        <?php } elseif ($l->k_insiden == 5) { ?>
                            <a href="<?php echo base_url(); ?>insiden/cetakpajananB/<?php echo $l->id_insiden; ?> ">
                                        <input type="button" value="Print" class="btn btn-warning"></a>
                    <?php }}
                    else { ?>
                        <?php if ($l->k_insiden == 1 || $l->k_insiden == 2) { ?>
                                        <input type="button" disabled value="Sudah Diverifikasi" class="btn btn-success"></a>
                    <?php }}?>
                <?php  } ?>
                </td>
                </tr>
          <?php endforeach; ?>
            </tbody>
        </table>


    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>

</div>