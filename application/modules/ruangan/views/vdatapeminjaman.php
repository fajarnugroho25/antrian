


<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Data Peminjaman Ruangan</h3>

    <div class="btn-toolbar">
        <a class="btn btn-primary" href="<?php echo base_url(); ?>ruangan/tambahpermintaan" role="button">Tambah Permintaan</a>
    </div>
   <!--  <td>
        <div id="datetimepicker" class="input-append date">
            <input type="text" id="tgl_awal" name="tgl_awal"  required></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
            </span>
        </div>
    </td> -->

    <div class="well">

        <table id="ruangan" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th></th>
                    <th>Kode Pemesanan</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Durasi</th>
                    <th>Keperluan</th>
                    <th>Bagian</th>
                    <th>Nama Peminjam</th>
                    <th>Tgl Input </th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($ruangan ?? [] as $key => $r) { ?>
                    <tr>
                        <td></td>

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
                            <?php echo $r->durasi; ?>
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
                        <td>
                            <?php echo $r->tgl_input; ?>
                        </td>


                        <td align="center">

                            <?php $p = explode(",", $r->perlengkapan); ?>
                            <?php if ($r->stat == 0) { ?>
                                <?php if ($this->session->admin_ruang == 5) { ?>
                                    <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                        <input type="button" value="Verifikasi" class="btn btn-primary"></a>
                                    <?php } 

                                    else { ?>
                                        <a href="<?php echo base_url(); ?>ruangan/editruangan/<?php echo $r->id_peminjaman; ?>">
                                            <input type="button" value="Edit" class="btn btn-info"></a>
                                        <?php } }

                                        else if ($r->stat == 1) { ?>
                                            <?php if ($this->session->admin_ruang == 5) { ?>
                                                <?php if ((in_array("Snack", $p))) { ?>
                                                    <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                        <input type="button" disabled value="Terkirim ke Gizi" class="btn btn-secondary"></a>
                                                    <?php }
                                                    else { ?>
                                                        <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                            <input type="button" disabled value="Selesai" class="btn btn-success"></a>
                                                            <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                <input type="button" value="Print" class="btn btn-warning"></a>
                                                            <?php } }

                                                            else if($this->session->admin_ruang == 6) { ?>
                                                                <?php if ((in_array("Snack", $p))) { ?>
                                                                    <a href="<?php echo base_url(); ?>ruangan/verifsnack/<?php echo $r->id_peminjaman; ?>">
                                                                        <input type="button" value="Konfirmasi" class="btn btn-primary"></a>
                                                                    <?php }
                                                                    else { ?>
                                                                        <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                                            <input type="button" disabled value="Selesai" class="btn btn-success"></a>
                                                                            <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                                <input type="button" value="Print" class="btn btn-warning"></a>
                                                                            <?php } }

                                                                            else if($this->session->admin_ruang == 7) { ?>
                                                                                <?php if ((in_array("Kursi", $p))) { ?>
                                                                                    <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                                        <input type="button" value="Cek Kebutuhan" class="btn btn-info"></a>
                                                                                    <?php }
                                                                                    else { ?>
                                                                                        <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                                                            <input type="button" disabled value="Selesai" class="btn btn-success"></a>
                                                                                            <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                                                <input type="button" value="Print" class="btn btn-warning"></a>
                                                                                            <?php } } 

                                                                                            else { ?>
                                                                                                <?php if ((in_array("Snack", $p))) { ?>
                                                                                                    <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                                                                        <input type="button" disabled value="Belum Diverifikasi" class="btn btn-secondary"></a>
                                                                                                    <?php }
                                                                                                    else { ?>
                                                                                                        <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                                                                            <input type="button" disabled value="Selesai" class="btn btn-success"></a>
                                                                                                            <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                                                                <input type="button" value="Print" class="btn btn-warning"></a>
                                                                                                            <?php } } }

                                                                                                            else if ($r->stat == 2) { ?>
                                                                                                                <?php if($this->session->admin_ruang == 7) { ?>
                                                                                                                    <?php if ((in_array("Kursi", $p))) { ?>
                                                                                                                        <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                                                                            <input type="button" value="Cek Kebutuhan" class="btn btn-info"></a>
                                                                                                                        <?php }
                                                                                                                        else { ?>
                                                                                                                            <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                                                                                                <input type="button" disabled value="Selesai" class="btn btn-success"></a>
                                                                                                                                <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                                                                                    <input type="button" value="Print" class="btn btn-warning"></a>
                                                                                                                                <?php } }
                                                                                                                                else { ?>
                                                                                                                                    <a href="<?php echo base_url(); ?>ruangan/verifpeminjam/<?php echo $r->id_peminjaman; ?>">
                                                                                                                                        <input type="button" disabled value="Selesai" class="btn btn-success"></a>
                                                                                                                                        <a href="<?php echo base_url(); ?>ruangan/cetakruangan/<?php echo $r->id_peminjaman; ?> ">
                                                                                                                                            <input type="button" value="Print" class="btn btn-warning"></a>
                                                                                                                                        <?php } } 
                                                                                                                                        else { ?>
                                                                                                                                            <input type="button" disabled value="Ditolak" class="btn btn-danger"></a>
                                                                                                                                        <?php } ?>   

                                                                                                                                    </td>
                                                                                                                                </tr>


                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    <?php  } ?>
                                                                                                                </tbody>
                                                                                                            </table>

                                                                                                            <div class="modal fade" id="modalVerif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                                <div class="modal-dialog" role="document">
                                                                                                                    <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h5 class="modal-title" id="exampleModalLabel">Verifikasi Peminjaman Ruangan</h5>
                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                            </button>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            <form role="form" action="<?php echo base_url().'ruangan/verifpeminjaman/'.$r->id_peminjaman; ?>" method="post" enctype="multipart/form-data">
                                                                                                                                <table>
                    <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly>
                        <input type="hidden" name='status' class="form-control" value="<?= $r->$status; ?>" readonly> -->

                        <tr>
                            <td>
                                <label><b>Kode Peminjaman</b></label>
                            </td>
                            <td> &nbsp &nbsp</td>
                            <td>
                                <input type="hidden" name='id_peminjaman' id='id_peminjaman' class="form-control" value="<?= $verif->$id_peminjaman; ?>" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label><b>Ruangan</b></label>
                            </td>
                            <td> </td>
                            <td>
                                <input type="text" name='ruangan' id="ruangan" class="form-control" value="<?= $verif->$ruangan; ?>" readonly>
                            </td>   
                        </tr> 

                        <tr>
                            <td>
                                <label><b>Hari / Tanggal</b></label>
                            </td>
                            <td> </td>
                            <td>
                                <div id="datepicker" class="input-append date">
                                    <input type="text" id="tanggal" name="tanggal" readonly="readonly" required></input>
                                    <span class="add-on">
                                        <i data-date-icon="icon-calendar"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <label><b>Waktu</b></label>
                            </td>
                            <td> </td>
                            <td>
                                <div id="timepicker" class="input-append time">
                                    <input type="text" id="waktu" name="waktu" readonly="readonly" required></input>
                                    <span class="add-on">
                                        <i data-date-icon="icon-time"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label><b>Keperluan</b></label>
                            </td>
                            <td></td>
                            <td>
                                <input type="text" id="keperluan" name="keperluan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><b>Perlengkapan</b></label>
                                <td>

                                    <td>
                                        <div class="taglistmenu">
                                            <input type="checkbox" name="perlengkapan[]" id="laptop"> Laptop &emsp; <br>
                                            <input type="checkbox" name="perlengkapan[]" id="lcd"> LCD / Screen &emsp; <br>
                                            <input type="checkbox" name="perlengkapan[]" id="sound"> Sound System &emsp; <br>

                                            <input type="checkbox" onclick="var input = document.getElementById('kursi'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" /> Kursi, jumlah
                                            <input id="kursi" name="perlengkapan[]" disabled="disabled"/> <br>

                                            <input type="checkbox" name="perlengkapan[]" id="meja"> Meja &emsp; <br>

                                            <input type="checkbox" onclick="var input = document.getElementById('snack'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" /> Snack, jumlah
                                            <input id="snack" name="perlengkapan[]" disabled="disabled"/> <br>

                                            <input type="checkbox" name="perlengkapan[]" id="dokumentasi"> Dokumentasi &emsp; <br>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><b>Bagian</b></label>
                                        </td>
                                        <td> </td>
                                        <td>
                                            <input type="text" name='bagian' id="bagian" class="form-control" readonly>
                                        </td>   
                                    </tr> 



                                    <tr>
                                        <td>
                                            <label><b>Peminjam</b></label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <input type="text" id="user_peminta" name="user_peminta" required readonly>
                                        </td>
                                    </tr>
                                    <tr>

                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.data').DataTable();
                });


            </script>

        </div> 