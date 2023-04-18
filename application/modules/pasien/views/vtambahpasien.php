<?php 
$id   = '';
$titel   = 'Tambah';
$aksi   = 'tambah';
$button   = 'Simpan';
$no_rm = '';
$nama = '';
$alamat = '';
$kelamin = '';
$telp = '';
$operasi = '';
$dokter = '';
$hak_kelas = '';
$kelas_diminta = '';
$status = '1';
$prioritas = '0';
$tgl_lahir = '';
$tgl_antri = date("Y-m-d H:i:s");
$diagnosa = '';
$tgl_permintaan = '';
$jam = date("H:i:s");
$keluarga_dekat = '';
$telp2 = '';
$ket_panggilan = '-';
$ket_prioritas = '-';
$tgl_realisasi = date("Y-m-d H:i:s");
$penanggung = '';
if (!empty($pasien)) {
    foreach ($pasien as $row) :
        $kodejadi = $row->id;
        $id = $row->id;
        $no_rm = $row->no_rm;
        $nama = $row->nama;
        $alamat = $row->alamat;
        $kelamin = $row->kelamin;
        $telp = $row->telp;
        $operasi = $row->operasi;
        $dokter =  $row->dokter;
        $hak_kelas = $row->hak_kelas;
        $kelas_diminta =  $row->kelas_diminta;
        $status =  $row->status;
        $prioritas =  $row->prioritas;
        $tgl_lahir =  $row->tgl_lahir;
        $tgl_antri = $row->tgl_antri;
        $tgl_permintaan =  $row->tgl_permintaan;
        $diagnosa = $row->diagnosa;
        $keluarga_dekat = $row->keluarga_dekat;
        $ket_panggilan =  $row->ket_panggilan;
        $ket_prioritas =  $row->ket_prioritas;
        $telp2 = $row->telp2;
        $tgl_realisasi = date("Y-m-d H:i:s");
        $penanggung = $row->penanggung;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
    endforeach;
}
?>

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
    <script>


        function buka_keterangan_prioritas() {
       document.getElementById("ket_prioritas").style = "";
        document.getElementById("label_prioritas").style = "";
    }

    function tutup_keterangan_prioritas() {
       document.getElementById("ket_prioritas").style = "display:none";
       document.getElementById("label_prioritas").style = "display:none";
    }

    function tutup_edit_tgl_antri() {
       document.getElementById("label_tgl_antri").style = "display:none";
    }
     function buka_validasi() {
       document.getElementById("validasi").style = "";
    }
   
     function non_input_tgl_realisasi() {
      document.getElementById("tgl_realisasi").value = "display:none";
    }

     function input_tgl_realisasi() {
      document.getElementById("tgl_realisasi").value = "<?php echo  $tgl_realisasi; ?>";
    }
   
  function cek_no_rm(){
        $("#pesan_rm").hide();
        buka_validasi();
        var no_rm = $("#no_rm").val();
        var dokter = $("#dokter").val();
 
        if(no_rm != ""  ){

            $.ajax({
                url: "<?php echo site_url() . '/pasien/cek_status_rm'; ?>", //arahkan pada proses_tambah di controller 
                data: { "no_rm": no_rm, "dokter": dokter },
                
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan_rm").css("color","#fc5d32");
                        $("#no_rm").css("border-color","#fc5d32");
                        $("#pesan_rm").html("RM MASIH DALAM ANTRIAN");                          
                        error = 1;
                          $("#simpan").attr("disabled", "disabled");
                    }else{
                        $("#pesan_rm").css("color","#59c113");
                        $("#no_rm").css("border-color","#59c113");
                        $("#pesan_rm").html("INPUT VALID");
                        error = 0;
                          $("#simpan").removeAttr("disabled");
                    }
 
                    $("#pesan_rm").fadeIn(10);
                }
            });
        }          
    }

    function chText()
    {
        var str=document.getElementById("no_rm");
        var regex=/[^0-9]{1,6}$/gi;

        str.value=str.value.replace(regex ,"");
    }
    function chtelp()
    {
        var str=document.getElementById("telp");
        var regex=/[^0-9]/gi;

        str.value=str.value.replace(regex ,"");
    }
    function chtelp2()
    {
        var str=document.getElementById("telp2");
        var regex=/[^0-9]/gi;

        str.value=str.value.replace(regex ,"");
    }
     function chtgl()
    {
        var str=document.getElementById("tgl_lahir");
        var regex=/[^0-9\.\-\/]{1,2}$/;

        str.value=str.value.replace(regex ,"");
    }
</script>
</head>

<body>

    <div class="span10">
        <h3 class="page-title">
            <?php echo $titel; ?> Pasien-</h3>
        <div class="well">

            <form id="form" method="post" action="<?php echo base_url(); ?>pasien/<?php echo $aksi; ?>">



                <td><input type="hidden" id="tgl_realisasi" name='tgl_realisasi' class="form-control" value="<?php echo  $tgl_realisasi; ?>" readonly></td>
                <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>" readonly></td>



                <table>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <label><b>ID</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" name='id' class="form-control" value="<?= $kodejadi; ?>" readonly>
                                </td>
                            </tr>
                            <form id="form">
                                <tr>
                                    <td>
                                        <label><b>No_RM </b></label>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input type="text" id="no_rm" name="no_rm" value="<?php echo $no_rm; ?>" placeholder="Input RM, Lalu Klik Fill --->>" required>
                                        <button type="button" id="btnSubmit" class="btn btn-info">Fill</button>

                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label><b>Nama Pasien</b></label>
                                    </td>
                                    <td></td>
                                    <td>
                                        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" readonly required>
                                    </td>
                                </tr>
                            </form>
                            <tr>
                                <td>
                                    <label><b>Alamat</b></label>
                                </td>
                                <td> </td>
                                <td>
                                    <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" readonly required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Jenis Kelamin</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <input type="radio" id="kelamin1" name="kelamin" value="L" <?php if ($kelamin == 'L') {
                                                                                                    echo 'checked';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?> required> Laki -Laki &nbsp &nbsp &nbsp &nbsp
                                    <input type="radio" id="kelamin2" name="kelamin" value="P" <?php if ($kelamin == 'P') {
                                                                                                    echo 'checked';
                                                                                                } else {
                                                                                                    echo '';
                                                                                                } ?> required> Perempuan </br></br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Tanggal Lahir</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" placeholder="DD/MM/YYYY" onKeyup="chtgl()" onKeyDown="chtgl()" readonly required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label><b>Keluarga Terdekat</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" id="keluarga_dekat" name="keluarga_dekat" value="<?php echo $keluarga_dekat; ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Telephone 1 </b></label>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" id="telp" name="telp" value="<?php echo $telp; ?>" onKeyDown="chtelp()" onKeyUp="chtelp()" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Telephone 2 </b></label>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" id="telp2" name="telp2" value="<?php echo $telp2; ?>" onKeyDown="chtelp2()" onKeyUp="chtelp2()" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Penanggung</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <select name='penanggung' id='penanggung' required>
                                        <option value='' disabled selected>Pilih Penanggung</option>

                                        <?php
                                        foreach ($cbpenanggung as $cbpenanggung) {
                                                if ($cbpenanggung->id_penanggung == $penanggung) {
                                                        echo '<option value="' . $cbpenanggung->id_penanggung . '" selected >' . $cbpenanggung->nama_penanggung . '</option>';
                                                    } else {
                                                        echo '<option value="' . $cbpenanggung->id_penanggung . '" >' . $cbpenanggung->nama_penanggung . '</option>';
                                                    }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Hak Kelas</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <select name='hak_kelas' id='hak_kelas' required>
                                        <option value='' disabled selected>Pilih Kelas</option>

                                        <?php
                                        foreach ($cbkelas as $cbkelas) {
                                                if ($cbkelas->id_kelas == $hak_kelas) {
                                                        echo '<option value="' . $cbkelas->id_kelas . '" selected >' . $cbkelas->nama_kelas . '</option>';
                                                    } else {
                                                        echo '<option value="' . $cbkelas->id_kelas . '" >' . $cbkelas->nama_kelas . '</option>';
                                                    }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Kelas Diminta</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <select name='kelas_diminta' id='kelas_diminta' required>
                                        <option value='' disabled selected>Pilih Kelas</option>

                                        <?php
                                        foreach ($cbkelasminta as $cbkelasminta) {
                                                if ($cbkelasminta->id_kelas == $kelas_diminta) {
                                                        echo '<option value="' . $cbkelasminta->id_kelas . '" selected >' . $cbkelasminta->nama_kelas . '</option>';
                                                    } else {
                                                        echo '<option value="' . $cbkelasminta->id_kelas . '" >' . $cbkelasminta->nama_kelas . '</option>';
                                                    }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label><b>Dokter</b></label>
                                </td>
                                <td> </td>
                                <td valign="bottom">
                                    <select name='dokter' id='dokter' onchange='cek_no_rm()' required>
                                        <option value='' disabled selected>Pilih Dokter</option>

                                        <?php
                                        foreach ($cbdokter as $cbdokter) {
                                                if ($cbdokter->id == $dokter) {
                                                        echo '<option value="' . $cbdokter->id . '" selected >' . $cbdokter->nama_dokter . '</option>';
                                                    } else {
                                                        echo '<option value="' . $cbdokter->id . '" >' . $cbdokter->nama_dokter . '</option>';
                                                    }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr id="validasi" style="display:none">
                                <td></td>
                                <td> &nbsp &nbsp </td>
                                <td align="center" style="font-size:13px;" height="10"><b><span id='pesan_rm'></span></b></td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Jenis Operasi</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <select name='operasi' id='operasi' required>
                                        <option value='' disabled selected>Pilih Operasi</option>

                                        <?php
                                        foreach ($combo as $combo) {
                                                if ($combo->id == $operasi) {
                                                        echo '<option value="' . $combo->id . '" selected >' . $combo->nama_operasi . '</option>';
                                                    } else {
                                                        echo '<option value="' . $combo->id . '" >' . $combo->nama_operasi . '</option>';
                                                    }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Diagnosa Lain-Lain</b></label>
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" id="diagnosa" name="diagnosa" value="<?php echo $diagnosa; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Tgl Permintaan Opname</b></label>
                                </td>
                                <td> </td>
                                <td>
                                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                                        <input type="text" class="form-control" id="tgl_permintaan" name="tgl_permintaan" readonly="readonly" value="<?php echo $tgl_permintaan ?>" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php if ($aksi == 'perbarui') { } else {
                                echo '
            <tr>
                <td>
                    <label><b>Tgl Antri</b>  <font color="red" size="1">Otomatis</font>  </label>
                </td>
                <td></td>
                <td>                        
                    <input type="text" name="tgl_antri" class="form-control" value="' . $tgl_antri . '"  readonly required>              
                
                </td>    
            </tr> ';
                            }
                            ?>
                        </table>
                    </td>
                    <td> &nbsp &nbsp &nbsp &nbsp</td>
                    <td valign="top">
                        <table>
                            <tr>
                                <td>
                                    <label><b>Prioritas</b></label>
                                </td>
                                <td> &nbsp &nbsp</td>
                                <td>
                                    <input type="radio" id="prioritas" name="prioritas" value="0" <?php if ($prioritas == '0') {
                                                                                                        echo 'checked';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?> onchange ="tutup_keterangan_prioritas()" required> Non Prioritas &nbsp &nbsp &nbsp &nbsp
                                    <input type="radio" id="prioritas" name="prioritas" value="1" <?php if ($prioritas == '1') {
                                                                                                        echo 'checked';
                                                                                                    } else {
                                                                                                        echo '';
                                                                                                    } ?> onchange ="buka_keterangan_prioritas()" required> Prioritas </br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label  id="label_prioritas"><b>Keterangan Prioritas</b></label>
                                </td>
                                <td> &nbsp &nbsp</td>
                                <td>
                                    <textarea style="" id="ket_prioritas" name="ket_prioritas" rows="4"><?php echo $ket_prioritas; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Keterangan Panggilan</b></label>
                                </td>
                                <td> &nbsp &nbsp</td>
                                <td>
                                    <textarea id="ket_panggilan" name="ket_panggilan" rows="4"><?php echo $ket_panggilan; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><b>Status</b></label>
                                </td>
                                <td> &nbsp &nbsp</td>
                                <td>
                                    <input type="radio" id="status" name="status" value="1" <?php if ($status == '1') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?> required > Belum Masuk &nbsp &nbsp &nbsp &nbsp
                                    <input type="radio" id="status" name="status" value="2" <?php if ($status == '2') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?> required > Sudah Dipanggil &nbsp &nbsp &nbsp &nbsp
                                    <input type="radio" id="status" name="status" value="0" <?php if ($status == '0') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?> required > Sudah Masuk &nbsp &nbsp &nbsp &nbsp
                                    <input type="radio" id="status" name="status" value="9" <?php if ($status == '9') {
                                                                                                echo 'checked';
                                                                                            } else {
                                                                                                echo '';
                                                                                            } ?> required > Batal
                                </td>
                            </tr>
                        </table>
                    </td>
                </table>

                <div style="padding-top:20px">
                    <button class="btn btn-primary" id="simpan" type="submit">
                        <?php echo $button; ?> Pasien</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if ($prioritas == 0) {
        echo
            '<script>
        window.onload = function() {       
        document.getElementById("ket_prioritas").style = "display:none"
        document.getElementById("label_prioritas").style = "display:none"}
        </script>';
    } else {
        echo
            '<script>
        window.onload = function() {       
        document.getElementById("ket_prioritas").style = ""
        document.getElementById("label_prioritas").style = ""}
        </script>';
    }
    ?>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#btnSubmit').click(function() {
            var datas = {
                no_rm: $('#no_rm').val(),

            }
            // console.log(datas);

            // if (datas.judul == "" || datas.konten == "" ) {
            //     swal('Tidak boleh kosong');
            // }else{
            url = "<?php echo site_url() . '/pasien/cek_hisys'; ?>";
            // do_upload
            $.ajax({
                url: url,
                data: datas,
                dataType: "TEXT",
                type: "POST",
                success: function(data) {
                    obj = JSON.parse(data)
                    console.log(obj.nama);
                    $('#nama').val(obj.nama);
                    $('#alamat').val(obj.alamat);
                    $('#tgl_lahir').val(obj.tgl_lahir);

                    if (obj.jenis_kelamin == 'L') {
                        document.getElementById("kelamin1").checked = true;
                    } else {
                        document.getElementById("kelamin2").checked = true;
                    }

                    $('#telp').val(obj.telp);



                },
                error: function() {

                }
            });


            // }

        });
    });
</script> 