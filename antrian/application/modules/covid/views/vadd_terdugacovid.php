        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambahhasil';
        $button   = 'Simpan';
        $no_rm = '';
        $nama_pasien = '';
        $alamat = '';
        $no_pemeriksa = '';
        $ruang = '';       
        $hasil = '';       
        $status = '1';       
        $tgl_lahir = '';             
        $tgl_pemeriksaan  = '';
        $tgl_selesai = '';
        $jam=date("H:i:s");       
        $gd_penerima = '';       
        $tgl_input = date("Y-m-d H:i:s");  
        $poli = '';    
        $kelamin = '';
        ?> 

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script> 
    
<!-- Latest compiled and minified JavaScript -->

    <link href="<?php echo base_url(); ?>public/assets/css/jquery-ui.css" rel="Stylesheet"></link>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery-ui.js" ></script>

    <style type="text/css">
        th {
            text-align: center;
            }
    </style>

</head>

<body>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">LIST SUPPLIER</h5>
        </button>
      </div>
      <div class="modal-body">
        <table id="barang" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="width: 100%">

        <thead >
         <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat </th>
            <th>Kota</th>
            <th>Aksi</th>
             
        </tr>
        </thead>
        <tbody>

        </tbody>
        </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Covid 19</h3>               
<div class="well">

<!-- <form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" > -->

       
        
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control" value="<?php echo  $tgl_input ; ?>"   readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>"   readonly></td>
        <td><input type="hidden" id="id_dpjp" name='id_dpjp' class="form-control" value="<?php echo  $this->session->nama; ?>"   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control" value="<?php echo  $status ; ?>"  readonly></td>
        <input type="hidden"  name="gd_penerima" value="<?php echo $gd_penerima; ?>" readonly> 
        


<table border="0" >
    

    <td>
        <table border="0">
            <table border="0">
            <tr><td colspan="3"><b>A. IDENTITAS PENGIRIMAN SPESIMEN</b></td>
                <td></td>
            </tr>

            <tr>
            <td>
                <label><b>Pengiriman Spesimen</b></label>
            </td>
            <td>
             <input type="radio" id="pengirimans1" name="pengirimans" value="Rumah Sakit" required> Rumah Sakit &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="pengirimans2" name="pengirimans" value="Dinas Kesehatan" required> Dinas Kesehatan </br></br> 
            </td>
            </tr>
         
            <tr>
                <td>
                    <label><b>Dinas Kesehatan</b></label>
                </td>
                <td>
                    <label>Kota</label>
                     <input type="text" id="kotadk" name="kotadk" class="form-control "  required></input>
                </td>
                <td><label>Provinsi</label></td>
                <td> 
                     <input type="text" id="profdk" name="profdk" class="form-control "  required></input></td>   
            </tr> 
            

             <tr>
                <td>
                    <label><b>Rumah Sakit </b></label>
                </td>
                <td>
                    <input type="text" id="namars" class="form-control" name="namars" >
                </td>
                <td><label>Kota</label></td>
                <td>
                     <input type="text" id="kotars" name="kotars" class="form-control "  required></input>
                </td>    
            </tr> 

             <tr>
                <td>
                    <label><b>Nama Dokter Penanggungjawab</b></label>
                </td>
                <td>
                    <input type="text" id="namadok" name="namadok" class="form-control "  required></input>
                </td>
                <td><label>No tlp</label></td> 
                <td>
                    
                    <input type="text" id="notlpspes" name="notlpspes" class="form-control "  required></input>
                </td>    
            </tr> 

            </table>
             <br><br>

            <table border="0">


            <tr><td colspan="3"><b>B. IDENTITAS PASIEN</b></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <label><b>Nama Pasien</b></label>
                </td>
                <td>
                    <input type="text" id="namapasien" class="form-control " name="namapasien" > 
                </td> 
                <td>
                    <label><b>No Rekam Medis</b></label>
                </td> 
                <td>
                    <input type="text" id="norm" class="form-control " name="norm" >
                    <button type="button" id="btnSubmit" class="btn btn-info">Fill</button></td>     
            </tr> 
            <tr>
                <td>
                    <label><b>Tanggal Lahir</b></label>
                </td>
                <td>
                    <input type="text" id="tgl_lahir" name="tgl_lahir"  placeholder="DD/MM/YYYY" readonly >
                </td>    
            </tr> 

             <tr>
                <td>
                    <label><b>Jenis Kelamin</b></label>
                </td>
                <td>
                    <input type="radio" id="kelamin1" name="kelamin" value="L" <?php if ($kelamin=='L') {echo 'checked';} else  {echo '';}  ?> required> Laki -Laki &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="kelamin2" name="kelamin" value="P" <?php if ($kelamin=='P') {echo 'checked';} else  {echo '';}  ?> required> Perempuan </br></br> 
                </td>    
            </tr> 

            <tr>
                <td>
                    <label><b> <?php
                    $str = "Bila wanita, apakah sedang hamil atau pasca melahirkan?";
                    echo wordwrap($str,20,"<br>\n");
                    ?> </b></label>
                </td>
         
                    <td>
                    <input type="radio" id="statush1" name="statush" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="statush2" name="statush" value="Tidak" required> Tidak </br></br> 
                </td >
                </td>    
            </tr>


            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td>
                    <input type="text" id="alamat" name="alamat"  readonly > 
                </td>
                <td><label><b>No tlp</b></label></td> 
                <td>
                    
                    <input type="text" id="notlppasien" name="notlppasien" class="form-control "  required></input>
                </td>     
            </tr> 
           
            <tr>
                <td>
                    <label><b>Nama Kepala Keluarga</b></label>
                </td>
                <td>
                    <input type="text" id="kepalakel" class="form-control" name="kepalakel" value="" > 
                </td>    
            </tr>

</table>
<br><br>

<table>

        <tr><td colspan="3"><b>C. RIWAYAT PERAWATAN PASIEN DALAM PENGAWASAN COVID-19</b></td>
                <td></td>
            </tr>

            <tr>
                <td>
                    <label><b>Kunjungan Pertama</b></label>
                </td>
                <td>
                    <div id="datetimepicker" class="input-append date">
                            <input type="text" id="kunper" name="kunper" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                <td>Rumah Sakit</td>   
                <td><input type="text" id="rspertama" class="form-control" name="rspertama"  ></td>
            </tr>
            <tr>
                <td>
                    <label><b>Kunjungan Kedua</b></label>
                </td>
                <td>
                    <div id="datetimepicker1" class="input-append date">
                            <input type="text" id="kunked" name="kunked" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                <td>Rumah Sakit</td>   
                <td><input type="text" id="rskedua" class="form-control" name="rskedua" ></td>
            </tr>
            <tr>
                <td>
                    <label><b>Kunjungan Ketiga</b></label>
                </td>
                <td>
                    <div id="datetimepicker2" class="input-append date">
                            <input type="text" id="kunket" name="kunket" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                <td>Rumah Sakit</td>   
                <td><input type="text" id="rsketiga" class="form-control" name="rsketiga"  ></td>
            </tr>
            
            


</table>

<br><br>
<table>
            <tr><td colspan="3"><b>D.TANDA DAN GEJALA</b></td>
                <td></td>
            </tr>

            <tr>
                <td>
                    <label><b>Tanggal Onset Gejala Panas</b></label>
                </td>
                <td>
                    <div id="datetimepicker9" class="input-append date">
                            <input type="text" id="onset" name="onset" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                
            </tr>

            <tr><td>Gejala Klinis saat spesimen diambil</td></tr>
            
            <tr>
                <td>
                    Panas >=38
                </td>
                <td><input type="radio" id="panas1" name="panas" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="panas2" name="panas" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 
            <tr>
                <td>
                    Batuk
                </td>
                <td><input type="radio" id="Batuk1" name="Batuk" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="Batuk2" name="Batuk" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 
             <tr>
                <td>
                    Sakit tenggorokan
                </td>
                <td><input type="radio" id="Sakitteng1" name="Sakitteng" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="Sakitteng2" name="Sakitteng" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 
             <tr>
                <td>
                    Sesak Nafas
                </td>
                <td><input type="radio" id="sesak1" name="sesak" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="sesak2" name="sesak" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 
             <tr>
                <td>
                    Pilek
                </td>
                <td><input type="radio" id="pilek1" name="pilek" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="pilek2" name="pilek" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 

            <tr>
                <td>
                    Lesu
                </td>
                <td><input type="radio" id="lesu1" name="lesu" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="lesu2" name="lesu" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 
            <tr>
                <td>
                    Sakit Kepala
                </td>
                <td><input type="radio" id="sakitkep1" name="sakitkep" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="sakitkep2" name="sakitkep" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 

            <tr>
                <td>
                    Diare
                </td>
                <td><input type="radio" id="diare" name="diare" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="diare2" name="diare" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 
            <tr>
                <td>
                    Mual Muntah
                </td>
                <td><input type="radio" id="mualmuntah1" name="mualmuntah" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="mualmuntah2" name="mualmuntah" value="Tidak" required> Tidak </br></br> </td>
                  
            </tr> 
</table>
<br><br> 
<table>
     <tr><td colspan="3"><b>E. PEMERIKSAAN PENUJANG</b></td>
                <td></td>
     </tr>

     <tr>
        <td>
             Xray Paru
                </td>
                <td><input type="radio" id="xray1" name="xray" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="xray2" name="xray" value="2" required> Tidak </br></br> </td>
                  
            </tr> 
    <tr>
       <td>Hasil</td>
       <td><textarea id="hasil" value="" class="form-control " name="hasil"></textarea></td>
            </tr> 
             <tr><td>Hitung Sel Darah Putih</td></tr>
            
            <tr>
                <td>
                    Lekousit
                </td>
                <td><input type="text" id="Lekousit" class="form-control" name="Lekousit" value="/ul" ></td>
                  
            </tr> 
            <tr>
                <td>
                    Limposit
                </td>
                <td><input type="text" id="Limposit" class="form-control" name="Limposit" value="%"></td>
                  
            </tr> 
             <tr>
                <td>
                    Trombosit
                </td>
                <td><input type="text" id="Trombosit" class="form-control" name="Trombosit" value="/ul"></td>
                  
            </tr> 
            <tr>
            <td>
             Menggunakan Ventilator?&nbsp &nbsp &nbsp 
                </td>
                <td><input type="radio" id="Ventilator1" name="Ventilator" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="Ventilator2" name="Ventilator" value="2" required> Tidak </br></br> </td>
                  
            </tr> 
            <tr>
            <td>
             <?php
                    $str = "Status Kesehatan Pasien Saat Pengambilan spesimen?";
                    echo wordwrap($str,20,"<br>\n");
                    ?>
                </td>
                <td><input type="radio" id="statuskes1" name="statuskes" value="Pulang" required> Pulang&nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="statuskes2" name="statuskes" value="Dirawat" required> Dirawat &nbsp &nbsp &nbsp 
                    <input type="radio" id="statuskes3" name="statuskes" value="Meninggal" required> Meninggal </br></br> </td>
                  
            </tr> 

</table>

<br><br> 
<table>
     <tr><td colspan="3"><b>F. PENGAMBILAN SAMPLE</b></td>
                <td></td>
     </tr>

     <tr>
        <td>
             Serum / serologis &nbsp &nbsp 
                </td>
                <td><input type="radio" id="serum1" name="serum" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="serum2" name="serum" value="Tidak" required> Tidak </br></br> </td>
                <td>
                    <label>&nbsp &nbsp Tanggal Ambil</label>
                </td>
                <td>
                    <div id="datetimepicker4" class="input-append date">
                            <input type="text" id="tglambil1" name="tglambil1" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
                
            </tr>
            <tr>
                <td>
             Usap nasofaring &nbsp &nbsp 
                </td>
                <td><input type="radio" id="usapnaso1" name="usapnaso" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="usapnaso2" name="usapnaso" value="Tidak" required> Tidak </br></br> </td>
                <td>
                    <label>&nbsp &nbsp Tanggal Ambil</label>
                </td>
                <td>
                    <div id="datetimepicker5" class="input-append date">
                            <input type="text" id="tglambil2" name="tglambil2" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
            
            </tr>
            <tr>
                <td>
             Usap orofaring &nbsp &nbsp 
                </td>
                <td><input type="radio" id="usaporo1" name="usaporo" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="usaporo2" name="usaporo" value="Tidak" required> Tidak </br></br> </td>
                <td>
                    <label>&nbsp &nbsp Tanggal Ambil </label>
                </td>
                <td>
                    <div id="datetimepicker6" class="input-append date">
                            <input type="text" id="tglambil3" name="tglambil3" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
        
            </tr>
            <tr>
                <td>
             Sputum &nbsp &nbsp 
                </td>
                <td><input type="radio" id="sputum1" name="sputum" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="sputum2" name="sputum" value="Tidak" required> Tidak </br></br> </td>
                <td>
                    <label>&nbsp &nbsp Tanggal Ambil </label>
                </td>
                <td>
                    <div id="datetimepicker7" class="input-append date">
                            <input type="text" id="tglambil4" name="tglambil4" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
        
            </tr>
            <tr>
                <td>
             <input type="text" id="lainnya" name="lainnya" class="form-control "></input>
                </td>
                <td><input type="radio" id="lainnya1" name="lain" value="Ya" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="lainnya2" name="lain" value="Tidak" required> Tidak </br></br> </td>
                <td>
                    <label>&nbsp &nbsp Tanggal Ambil </label>
                </td>
                <td>
                    <div id="datetimepicker8" class="input-append date">
                            <input type="text" id="tglambil5" name="tglambil5" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td> 
        
            </tr>

</table>
<br><br>
<table>
     <tr><td colspan="3"><b>G. RIWAYAT KONTAK / PAPARAN </b></td>
                <td></td>
     </tr>

     <tr>
        <td>
             Dalam 14 hari sebelum sakit, apakah pasien melakukan perjalanan ke luar negeri?
             <br>Jika Ya, sebutkan
                </td>
                <td><input type="radio" id="perjl1" name="perjl" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="perjl2" name="perjl" value="2" required> Tidak </br></br> </td>
                <td> 
            </tr>

<table>
   
           <tr>
                <td>
                    <label><b>Negara </b></label>
                </td>
                <td>
                    <input type="text" id="negara" name="negara" > 
                </td>    
            </tr> 

            <tr>
                <td>
                    <label><b>Kota</b></label>
                </td>
                <td>
                    <input type="text" id="kota" name="kota" value=""  > 
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Tanggal Kunjungan</b></label>
                </td>
                <td>
                    <div id="datetimepicker10" class="input-append date">
                            <input type="text" id="tglkun" name="tglkun" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td>    
            </tr> 

            
            <td><button class="btn btn-info left" id="tambahdata">Tambahkan</button></td>

           
</table>


   <table id="perjalanan" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="text-align: center; border: 1px solid black; ">

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>

            <th>No</th>
            <th>Negara</th>
            <th>Kota</th>
            <th>Tanggal Kunjungan</th>


        </tr>
        </thead>
        <tbody>

        </tbody>


    </table>
    <br>

<tr>
        <td>
             Dalam 14 hari sebelum sakit apakah pasien kontak dengan orang yang sakit saluran pernapasan seperti (demam, batuk atau pneumonia)
             <br>Jika Ya, sebutkan
                </td>
                <td><input type="radio" id="konor1" name="konor" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="konor2" name="konor" value="2" required> Tidak </br></br> </td>
                <td> 
            </tr>

<br>


<table>
   
           <tr>
                <td>
                    <label><b>Nama  </b></label>
                </td>
                <td>
                    <input type="text" id="namakon" name="namakon" > 
                </td>    
            </tr> 

            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td>
                    <input type="text" id="alamatkon" name="alamatkon" value=""  > 
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Hubungan</b></label>
                </td>
                <td>
                    <input type="text" id="hub" name="hub" value=""  > 
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Tanggal kontak pertama</b></label>
                </td>
                <td>
                    <div id="datetimepicker11" class="input-append date">
                            <input type="text" id="tglkper" name="tglkper" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Tanggal kontak terakhir</b></label>
                </td>
                <td>
                    <div id="datetimepicker12" class="input-append date">
                            <input type="text" id="tglkter" name="tglkter" class="form-control "  readonly></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </td>    
            </tr> 

            
            <td><button class="btn btn-info left" id="tambahdata1">Tambahkan</button></td>

           
</table>

<table id="kontak" border="1px"  class="table table-bordered table-hover dt-responsive nowrap" style="text-align: center; border: 1px solid black; ">

        <thead >
                <!-- <button class="btn btn-info left" id="btn_identitas">+</button> -->
         <tr>

            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hubungan</th>
            <th>Tanggal kontak pertama</th>
            <th>Tanggal kontak Terakhir</th>


        </tr>



        </thead>
        <tbody>

        </tbody>


    </table>

<br><br>

<tr>
        <td>
             Apa orang tsb tersangka / terinfeksi COVID-19 (pneumonia berat) ?
                </td>
                <td><input type="radio" id="terinfeksi1" name="terinfeksi" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="terinfeksi2" name="terinfeksi" value="2" required> Tidak </br></br> </td>
                <td> 
            </tr>
            <tr>
        <td>
              Apa ada anggota keluarga suspek yg sakitnya sama ?
                </td>
                <td><input type="radio" id="anggotakel1" name="anggotakel" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="anggotakel1" name="anggotakel" value="2" required> Tidak </br></br> </td>
                <td> 
            </tr>

</table>


   

<table>
     <tr><td colspan="3"><b>H. PENYAKIT KEMORBID</b></td>
                <td></td>
     </tr>

     <tr>
        <td>
             Penyakit Kardiovaskular/ Hypertensi &nbsp &nbsp 
                </td>
                <td><input type="radio" id="kardiov1" name="kardiov" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="kardiov2" name="kardiov" value="2" required> Tidak </br></br> </td>                    
                
            </tr>
            <tr>
                <td>
             Diabetes Mellitus &nbsp &nbsp 
                </td>
                <td><input type="radio" id="diabetesm1" name="diabetesm" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="diabetesm2" name="diabetesm" value="2" required> Tidak </br></br> </td>
                
            
            </tr>
            <tr>
                <td>
             Liver &nbsp &nbsp 
                </td>
                <td><input type="radio" id="liver1" name="liver" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="liver2" name="liver" value="2" required> Tidak </br></br> </td>
               
        
            </tr>
            <tr>
                <td>
             Kronik Nourologi atau Neuromuskular &nbsp &nbsp 
                </td>
                <td><input type="radio" id="neurologi1" name="neurologi" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="neurologi2" name="neurologi" value="2" required> Tidak </br></br> </td>
            </tr>
            <tr>
                <td>
             Immunodelisiensi/HIV &nbsp &nbsp 
                </td>
                <td><input type="radio" id="hiv1" name="hiv" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="hiv2" name="hiv" value="2" required> Tidak </br></br> </td>
               
        
            </tr>
            <tr>
                <td>
             Penyakit Paru Kronik &nbsp &nbsp 
                </td>
                <td><input type="radio" id="paru1" name="paru" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="paru2" name="paru" value="2" required> Tidak </br></br> </td>
            </tr>
            <tr>
                <td>
             Penyakit Ginjal &nbsp &nbsp 
                </td>
                <td><input type="radio" id="ginjal1" name="ginjal" value="1" required> Ya &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="ginjal2" name="ginjal" value="2" required> Tidak </br></br> </td>
            </tr>

            <tr>
                <td>
             Keteangan Lainnya &nbsp &nbsp 
                </td>
                <td><textarea id="keterangan" value="" class="form-control " name="keterangan"></textarea></td>
            </tr>
            
            
</table>

           
        </table>
        <td><button class="btn btn-info left" id="submitdata">Simpan</button></td>


  
    <br><br>

      </div>
  </div>
  
</body>



 


<link href="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>
<script>var base_url = '<?php echo base_url() ?>'</script>

<script type="text/javascript">


$(document).ready( function () {
   dataTableHasil= $('#perjalanan').DataTable({
        "ajax": {
                "url": base_url+"index.php/covid/ajaxperjalanan",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   false,
                "ordering": false,
                "info":     false
            
    });
} );

$(document).ready( function () {
   dataTable= $('#kontak').DataTable({
        "ajax": {
                "url": base_url+"index.php/covid/ajaxkontak",
                "type": "POST"
              },
              "emptyTable": "Tidak Ada Data Pesan",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
                "paging":   false,
                "ordering": false,
                "info":     false
            
    });
} );

    $(document).ready(function(){
    $('#btnSubmit').click(function(){
        var datas = {
            no_rm: $('#norm').val(),
           
        }
   
            url = "<?php echo site_url() . '/pasien/cek_hisys'; ?>";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(data){
                  
                  obj =  JSON.parse(data)

                  $('#namapasien').val(obj.nama);
                  $('#alamat').val(obj.alamat);
                  $('#tgl_lahir').val(obj.tgl_lahir); 

                  if (obj.jenis_kelamin == 'L') {
                   document.getElementById("kelamin1").checked = true;
                    }
                else{
                    document.getElementById("kelamin2").checked = true;
                    }              

        
                },
                error:function(){
                    
                }
            });



  });
            });

    $('#datetimepicker').datetimepicker({
        format: 'dd-MM-yyyy',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker1').datetimepicker({
        format: 'dd-MM-yyyy',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker2').datetimepicker({
        format: 'dd-MM-yyyy',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker3').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker4').datetimepicker({
        format: 'yyyy-MM-dd'+'/'+' hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker5').datetimepicker({
        format: 'yyyy-MM-dd'+'/'+' hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker6').datetimepicker({
        format: 'yyyy-MM-dd'+'/'+' hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker7').datetimepicker({
        format: 'yyyy-MM-dd'+'/'+' hh:mm',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker8').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker9').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });
    $('#datetimepicker10').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });

    $('#datetimepicker11').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });

$('#datetimepicker12').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',
         locale: 'ru'

    });



    function pilih(id){
      var kelas ='.detail-'+id;
        var data = $(kelas).data('id');
        $('#belidr').val(data.supnama);
        $('#alamatsup').val(data.supalamat);
  }



   $(document).on("click", "#tambahdata", function(){
        var data ={
         negara :$('input[name=negara]').val(),
         kota : $('input[name=kota]').val(),
         tglkun : $('input[name=tglkun]').val(),
        
         
        
       }
       // console.log(data);
        url = "<?php echo base_url();?>covid/addperjalananpas";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    // console.log(Data);
                    negara =$('input[name=negara]').val('');
                    kota = $('input[name=kota]').val('');
                    tglkun = $('input[name=tglkun]').val('');

                  reload();
           
                },
                error:function(){

                }
            });
    });


   $(document).on("click", "#tambahdata1", function(){
        var data ={
         namakon :$('input[name=namakon]').val(),
         alamatkon : $('input[name=alamatkon]').val(),
         Hubungan : $('input[name=hub]').val(),
         tglkper : $('input[name=tglkper]').val(),
         tglkter : $('input[name=tglkter]').val(),
        
         
        
       }
       // console.log(data);
        url = "<?php echo base_url();?>covid/addkontakor";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                    // console.log(Data);
                    namakon=$('input[name=namakon]').val('');
                    alamatkon= $('input[name=alamatkon]').val('');
                    Hubungan= $('input[name=hub]').val('');
                    tglkper= $('input[name=tglkper]').val('');
                    tglkter =$('input[name=tglkter]').val('');

                  reload2();
           
                },
                error:function(){

                }
            });
    });



  $(document).on("click", "#submitdata", function(){

        var data ={
        pengirims :$('input[name="pengirimans"]:checked').val(),
         kotadk :$('input[name=kotadk]').val(),
         profdk: $('input[name=profdk]').val(),
         namars : $('input[name=namars]').val(),
         kotars :$('input[name=kotars]').val(),
         namadok :$('input[name=namadok]').val(),
         notlpspes :$('input[name=notlpspes]').val(),
         
         namapasien : $('input[name=namapasien]').val(),
         norm :$('input[name=norm]').val(),
         tgl_lahir :$('input[name=tgl_lahir]').val(),
         kelamin: $('input[name=kelamin]:checked').val(),
         statush: $('input[name=statush]').val(),
         alamat : $('input[name=alamat]').val(),
         kepalakel : $('input[name=kepalakel]').val(),
         notlppasien: $('input[name=notlppasien]').val(),

         kunper :$('input[name=kunper]').val(),
         rspertama:$('input[name=rspertama]').val(),
         kunked :$('input[name=kunked]').val(),
         rskedua: $('input[name=rskedua]').val(),
         kunket : $('input[name=kunket]').val(),
         rsketiga : $('input[name=rsketiga]').val(),

         onset :$('input[name=onset]').val(),
         panas :$('input[name="panas"]:checked').val(),
         Batuk :$('input[name="Batuk"]:checked').val(),
         Sakitteng :$('input[name="Sakitteng"]:checked').val(),
         sesak :$('input[name="sesak"]:checked').val(),
         pilek :$('input[name="pilek"]:checked').val(),
         lesu :$('input[name="lesu"]:checked').val(),
         sakitkep :$('input[name="sakitkep"]:checked').val(),
         diare :$('input[name="diare"]:checked').val(),
         mualmuntah :$('input[name="mualmuntah"]:checked').val(),

         
         xray :$('input[name="xray"]:checked').val(),
         hasil :$('textarea[name=hasil]').val(),
         lekousit :$('input[name=Lekousit]').val(),
         limposit :$('input[name=Limposit]').val(),
         trombosit :$('input[name=Trombosit]').val(),

         Ventilator :$('input[name="Ventilator"]:checked').val(),
         statuskes :$('input[name="statuskes"]:checked').val(),
         

         serum :$('input[name="serum"]:checked').val(),
         tglambil1 :$('input[name=tglambil1]').val(),
         usapnaso :$('input[name="usapnaso"]:checked').val(),
         tglambil2 :$('input[name=tglambil2]').val(),
         usaporo :$('input[name="usaporo"]:checked').val(),
         tglambil3 :$('input[name=tglambil3]').val(),
         sputum :$('input[name="sputum"]:checked').val(),
         tglambil4 :$('input[name=tglambil4]').val(),
         lainnya :$('input[name=lainnya]').val(),
         lain :$('input[name="lain"]:checked').val(),
         tglambil5 :$('input[name=tglambil5]').val(),


         perjl :$('input[name="perjl"]:checked').val(),
         konor :$('input[name="konor"]:checked').val(),
         terinfeksi :$('input[name="terinfeksi"]:checked').val(),
         anggotakel :$('input[name="anggotakel"]:checked').val(),


         kardiov :$('input[name="kardiov"]:checked').val(),
         diabetesm :$('input[name="diabetesm"]:checked').val(),
         liver :$('input[name="liver"]:checked').val(),
         neurologi :$('input[name="neurologi"]:checked').val(),
         hiv :$('input[name="hiv"]:checked').val(),
         paru :$('input[name="paru"]:checked').val(),
         ginjal :$('input[name="ginjal"]:checked').val(),
         keterangan :$('textarea[name=keterangan]').val(),
       }
       // console.log(data);
        url = "<?php echo base_url();?>covid/AddDatacovid";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){

                    // console.log(Data);
                    alert('Data Permintaan Berhasil Disimpan!'); 
                    document.location = "<?php echo base_url();?>covid/daftarpasien";
                },
            function(isConfirm){
                  
            

                }
            });


        });

 function reload() {
    dataTableHasil.ajax.reload(null,false);
}
 function reload2() {
    dataTable.ajax.reload(null,false);
}


   
</script>