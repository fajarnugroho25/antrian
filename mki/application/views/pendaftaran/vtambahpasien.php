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
        $tgl_antri = '';
        $diagnosa = '';
        $tgl_permintaan = '';
        $jam=date("H:i:s");
        $keluarga_dekat = '';
        $telp2 = '';
        $ket_panggilan = '-';
        $ket_prioritas='-';
        $tgl_realisasi = date("Y-m-d H:i:s");
        $penanggung='';
        if (!empty($pasien)) { 
        foreach ($pasien as $row):
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
        $penanggung= $row->penanggung; 
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
      document.getElementById("tgl_realisasi").value = "<?php echo  $tgl_realisasi ; ?>";
    }
   
   

  function cek_no_rm(){
        $("#pesan_rm").hide();
        buka_validasi();
        var no_rm = $("#no_rm").val();
        var dokter = $("#dokter").val();
 
        if(no_rm != ""  ){

            $.ajax({
                url: "<?php echo site_url() . '/cpasien/cek_status_rm'; ?>", //arahkan pada proses_tambah di controller member
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

<body >

<div class="span10" leftmargin="10" align="center" >
       <h3 class="page-title"><?php echo $titel; ?> Pasien</h3>               
<div class="well">

<form id="user" method="post" action="<?php echo base_url();?>index.php/cpasien/<?php echo $aksi; ?>" >

<table >
        
        <td><input type="hidden" id="tgl_realisasi" name='tgl_realisasi' class="form-control" value="<?php echo  $tgl_realisasi ; ?>"   readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>"   readonly></td>
        <td><input type="hidden" id="jam" name='jam' class="form-control" value="<?php echo  $jam ; ?>"   readonly></td>
            <tr>
                <td>
                <label><b>No_RM</b></label>
                </td>
                <td></td>
                <td>
                 <input type="text" name='no_rm' id="no_rm" class="form-control form-control-sm" value="<?= $kodejadi; ?>" readonly>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label><b>Nama Pasien</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="nama" name="nama" class="form-control form-control-sm" value="<?php echo $nama; ?>" required>
                </td>    
            </tr>    
            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="alamat" name="alamat" class="form-control form-control-sm" value="<?php echo $alamat; ?>" required> 
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Jenis Kelamin</b></label>
                </td>
                <td></td>
                <td>
                    <input type="radio" id="kelamin" name="kelamin" value="L"  <?php if ($kelamin=='L') {echo 'checked';} else  {echo '';}  ?> required> Laki -Laki &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="kelamin" name="kelamin" value="P" <?php if ($kelamin=='P') {echo 'checked';} else  {echo '';}  ?> required> Perempuan </br></br> 
                </td>    
            </tr>
             <tr>
                <td>
                    <label><b>Tanggal Lahir</b></label>
                </td>
                <td></td>
                <td>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-sm" value="<?php echo $tgl_lahir; ?>"  required>
                </td>    
            </tr>  
           
            <tr>
                <td>
                    <label><b>Keluarga Terdekat</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="keluarga_dekat" name="keluarga_dekat" class="form-control form-control-sm" value="<?php echo $keluarga_dekat; ?>" required> 
                </td>    
            </tr>  
            <tr>
                <td>
                    <label><b>Telephone 1 </b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="telp" name="telp" value="<?php echo $telp; ?>" class="form-control form-control-sm"  onKeyDown="chtelp()" onKeyUp="chtelp()" required>
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Telephone 2 </b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="telp2" name="telp2" value="<?php echo $telp2; ?>" class="form-control form-control-sm" onKeyDown="chtelp2()" onKeyUp="chtelp2()" required>
                </td>    
            </tr>
           
           
            
           
            
 </table>      
              
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Pasien</button>           
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
        </script>';} 
        else {
        echo
        '<script>
        window.onload = function() {       
        document.getElementById("ket_prioritas").style = ""
        document.getElementById("label_prioritas").style = ""}
        </script>';} 
    ?>
    
</body>
<script type="text/javascript">
    
</script>
