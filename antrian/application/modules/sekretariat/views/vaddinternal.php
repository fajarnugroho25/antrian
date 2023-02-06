<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Pengajuan Surat Internal</h3>

    

    <div class="well">
    <form id="user" method="post" action="<?php echo base_url(); ?>sekretariat/generateinternal ">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <!-- <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>-->
            
                
                <tr>
                    <td>
                        <label><b>Nama Bagian</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='bagian' id='bagian' required>
                            <option value=''disabled selected>Pilih Bagian</option>

                            <?php
                            foreach ($sekretariat as $sekre) {
                                   echo '<option value="' . $sekre->kode_bagian . '">' . $sekre->nama_bagian. '</option>';

                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Jenis Surat</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='jenis_surat' id='jenis_surat' required>
                            <option value='' disabled selected>Pilih Jenis Surat</option>
                            <option value='PB' >Pemberitahuan</option>
                            <option value='PM' >Permohonan</option>
                            <option value='Suket' >Surat Keterangan</option>
                            <option value='Suku' >Surat Kuasa</option>
                            <option value='Super' >Surat Pernyataan</option>
                            <option value='BA' >Berita Acara</option>
                            <option value='KS' >Kerjasama</option>
                            <option value='ST' >Surat Tugas</option>
                            <option value='LP' >Laporan</option>
                            <option value='LL' >Lain-lain</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Perihal</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="perihal" id="perihal" reqiured>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label><b>Tujuan</b></label>
                    </td>
                    <td></td>
                    <td>
                        <input type="text" name="tujuan" id="tujuan" reqiured>
                    </td>
                <tr>
                    <td>
                        <label><b>Tanggal Surat</b></label>
                    </td>
                    <td></td>
                    <td>
                       <input type="date" name="tanggal" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Status</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='status' id='status' required>
                            <option value='Sudah Disetujui' >Sudah Disetujui</option>
                            <option value='Belum Disetujui' >Belum Disetujui</option>
                        </select>
                    </td>
                </tr>

            </table>
            <div style="padding-top:20px">
                <button class="btn btn-primary" id="simpan" type="submit">
                    Submit</button>


            </div>
        </form>
        
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>

</div> 