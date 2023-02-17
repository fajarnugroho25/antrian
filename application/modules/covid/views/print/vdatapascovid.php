<head>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css?ts=<?=time()?>" media="all"> -->
  <!-- <script src="<?=base_url('assets/js/jquery.min.js')?>"></script> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
  <script>var base_url = '<?php echo base_url() ?>'</script>
  <style type="text/css" media="print">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    @media print {
  #printPageButton {
    display: none;
  }

  @media print {
  #submitNomor {
    display: none;
  }
</style>

<style type="text/css">

table, td, th {  
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

.table {   
  border: 1px solid black

}


th, td {
  padding: 3px;
}
th {
    text-align: center;
}

input {
    background-color: transparent;
    border: 0px solid;
    height: 20px;
    width: 160px;
}

input[type="radio"] {
    -ms-transform: scale(1); /* Untu IE  */
    -webkit-transform: scale(1); /* untuk Chrome, Mozilla,Safari, Opera */
    transform: scale(1);
    width: 15px
}
</style>
 </head>

  


<body>


<button id="printPageButton" onClick="window.print();">Print</button><br>
<table border="0">
    <tr>
        <td>




<table border="1"><tr>
        <td><img src="<?php echo base_url();?>public/images/kemenkes_image.png" style="margin-left: 10px" width="250" height="100"></td>
        <td><h3 style="text-align: center;  text-transform: uppercase;">formulir pasien dalam pengawasan covid-19 orang dalam pantauan covid-19 </h3>
          <h4 style="text-align: center;  text-transform: uppercase;">Puslitbang biomedis dan teknologi dasar kesehatan badan litbang kesehatan </h4>
        </td>
      </tr>
</table>

        <table  border="0" class="table">
          <tr>
            <td  colspan="4">A.IDENTITAS PENGIRIM SPESIMEN</td>
          </tr>
          <tr>
            <td style="width: 25%">Pengirim Spesimen: </td>
            <td colspan="3" style="width: 20%"><?php if ( $pasien->pengirimspesimin == 'Rumah Sakit'): ?>
                      <input type="radio" name="pengirimspesimin" checked>Rumah Sakit
                      <input type="radio" name="pengirimspesimin" >Dinas Kesehatan
                      <?php else: ?>
                         <input type="radio" name="pengirimspesimin" >Rumah Sakit
                      <input type="radio" name="pengirimspesimin" checked>Dinas Kesehatan
              <?php endif ?><?php echo $pasien->pengirimspesimin; ?></td>
          </tr>
          <tr>
              <td>Dinas Kesehatan:</td>
              <td>Kab/Kota: <?php echo $pasien->dinaskeskota; ?></td>
               <td style="width: 20%" >Provinsi: </td>
               <td><?php echo $pasien->dinaskesprop; ?></td>
           </tr>
           <tr>
              <td>Rumah Sakit:</td>
              <td><?php echo $pasien->namars  ?></td>
               <td>Kota: </td>
               <td><?php echo $pasien->rskota; ?></td>
           </tr>
           <tr>
              <td>Nama Dokter Penanggung Jawab:</td>
              <td><?php echo $pasien->namadokter  ?></td>
               <td>No Tlp/Hp: </td>
               <td><?php echo $pasien->notlp; ?></td>
           </tr>
        </table>
        <table class="table">
          <tr>
            <td colspan="4">B.IDENTITAS PASIEN </td>
          </tr>
         
          <tr>
              <td style="width: 25%">Nama Pasien :</td>
              <td style="width: 30%"><?php echo $pasien->namapasien; ?></td>
               <td style="width: 20%">No Rekam Medis: </td>
               <td><?php echo $pasien->rmpasien; ?></td>
           </tr>
           <tr>
              <td>tanggal lahir/usia:</td>
              <td colspan="3"><?php echo $pasien->ttl  ?></td>
              
           </tr>
           <tr>
              <td>Jenis Kelamin :</td>
              <td colspan="3"><?php echo $pasien->jeniskelamin  ?></td>
               
           </tr>
           <tr>
              <td colspan="2">Bila wanita, apakah sedang hamil atau pasca melahirkan? </td>
              <td colspan="2"><?php echo $pasien->statushamil?></td>
           </tr>
           <tr>
              <td>Alamat:</td>
              <td><?php echo $pasien->alamat?></td>
              <td>No Telepon: </td>
              <td><?php echo $pasien->telpon?></td>
           </tr>
        </table>
          <table  class="table">
          <tr>
            <td colspan="4">C.RIWAYAT PASIEN DALAM PENGAWASAN COVID-19</td>
          </tr>
         
          <tr>
              <td style="width: 25%">Kunjungan Pertama:</td>
              <td style="width: 20%"><?php echo $pasien->tglpertama; ?></td>
               <td style="width: 20%">Rumah Sakit:</td>
               <td><?php echo $pasien->rspertama; ?></td>
           </tr>
           <tr>
              <td style="width: 25%">Kunjungan Pertama:</td>
              <td style="width: 20%"><?php echo $pasien->tglkedua; ?></td>
               <td style="width: 20%">Rumah Sakit:</td>
               <td><?php echo $pasien->rskedua; ?></td>
           </tr>
           <tr>
              <td style="width: 25%">Kunjungan Pertama:</td>
              <td style="width: 20%"><?php echo $pasien->tglketiga; ?></td>
               <td style="width: 20%">Rumah Sakit:</td>
               <td><?php echo $pasien->rsketiga; ?></td>
           </tr>
           
        </table>

            <table  class="table">
          <tr>
            <td colspan="2">D.TANDA DAN GEJALA</td>
            <td colspan="2" >E.PEMERIKSAAN PENUNJANG</td>
          </tr>
         
          <tr>
              <td style="width: 30%">Tanggal onset gejala (panas):</td>

              <td style="width: 20%"><?php echo date('d M Y', strtotime($pasien->tglonset)); ?></td>
              <td style="width: 20%">X Ray Paru:</td>
              <td><?php if ( $pasien->xrayparu == 1): ?>
                      <input type="radio" name="xrayparu" checked>Ya
                      <input type="radio" name="xrayparu" >tidak
                      <?php else: ?>
                         <input type="radio" name="xrayparu" >Ya
                      <input type="radio" name="xrayparu" checked>tidak
              <?php endif ?></td>
               
           </tr>
           <tr><td colspan="2">Gejala klinis saat spesimen diambil:</td>
                <td>Hasil:</td>
                <td><?php echo $pasien->hasil ?></td>
           </tr>
               
           <tr>
              <td >Panas >=38:</td>
              <td><?php if ( $pasien->panas == 'Ya'): ?>
                      <input type="radio" name="panas" checked>Ya
                      <input type="radio" name="panas" >tidak
                      <?php else: ?>
                         <input type="radio" name="panas" >Ya
                      <input type="radio" name="panas" checked>tidak
              <?php endif ?></td>
              <td colspan="2">Hasil Sel Darah Putih: </td>
           </tr>
            <tr>
              <td >Batuk:</td>
              <td><?php if ( $pasien->batuk == 'Ya'): ?>
                      <input type="radio" name="batuk" checked>Ya
                      <input type="radio" name="batuk" >tidak
                      <?php else: ?>
                         <input type="radio" name="batuk" >Ya
                      <input type="radio" name="batuk" checked>tidak
              <?php endif ?></td>
              <td>Lekousit:</td>
              <td ><?php echo $pasien->lekosit ?></td>
           </tr>
            <tr>
              <td >Sakit tenggorokan:</td>
              <td><?php if ( $pasien->sakittenggorokan == 'Ya'): ?>
                      <input type="radio" name="sakittenggorokan" checked>Ya
                      <input type="radio" name="sakittenggorokan" >tidak
                      <?php else: ?>
                         <input type="radio" name="sakittenggorokan" >Ya
                      <input type="radio" name="sakittenggorokan" checked>tidak
              <?php endif ?></td>
              <td>Limposit:</td>
              <td ><?php echo $pasien->limposit ?></td>
           </tr>
            <tr>
              <td >Sesak Nafas:</td>
              <td><?php if ( $pasien->sesak == 'Ya'): ?>
                      <input type="radio" name="sesak" checked>Ya
                      <input type="radio" name="sesak" >tidak
                      <?php else: ?>
                         <input type="radio" name="sesak" >Ya
                      <input type="radio" name="sesak" checked>tidak
              <?php endif ?></td>
              <td>Trombosit:</td>
              <td ><?php echo $pasien->trombosit ?></td>
           </tr>
            <tr>
              <td >Pilek: </td>
                <td><?php if ( $pasien->pilek == 'Ya'): ?>
                      <input type="radio" name="pilek" checked>Ya
                      <input type="radio" name="pilek" >tidak
                      <?php else: ?>
                         <input type="radio" name="pilek" >Ya
                      <input type="radio" name="pilek" checked>tidak
              <?php endif ?></td>
              <td>Menggunakan Ventilator:</td>
              <td><?php if ( $pasien->ventilator == 'Ya'): ?>
                      <input type="radio" name="ventilator" checked>Ya
                      <input type="radio" name="ventilator" >tidak
                      <?php else: ?>
                         <input type="radio" name="ventilator" >Ya
                      <input type="radio" name="ventilator" checked>tidak
              <?php endif ?></td>
           </tr>
            <tr>
              <td >Lesu:</td>
              <td><?php if ( $pasien->lesu == 'Ya'): ?>
                      <input type="radio" name="lesu" checked>Ya
                      <input type="radio" name="lesu" >tidak
                      <?php else: ?>
                         <input type="radio" name="lesu" >Ya
                      <input type="radio" name="lesu" checked>tidak
              <?php endif ?></td>
              <td colspan="2">Status kesehatan Pasien Saat Pengambilan Spesimen</td>
              
           </tr>
            <tr>
              <td>Sakit Kepala:</td>
              <td><?php if ( $pasien->sakitkepala == 'Ya'): ?>
                      <input type="radio" name="sakitkepala" checked>Ya
                      <input type="radio" name="sakitkepala" >tidak
                      <?php else: ?>
                         <input type="radio" name="sakitkepala" >Ya
                      <input type="radio" name="sakitkepala" checked>tidak
              <?php endif ?></td>

              <td colspan="2"><?php if ( $pasien->stausksehatan == 'Pulang'): ?>
                      <input type="radio" name="stausksehatan" checked>Pulang
                      <input type="radio" name="stausksehatan" >Dirawat
                      <input type="radio" name="stausksehatan" >Meninggal
                      <?php elseif ($pasien->stausksehatan == 'Dirawat'): ?>
                        <input type="radio" name="stausksehatan" >Pulang
                      <input type="radio" name="stausksehatan" checked>Dirawat
                      <input type="radio" name="stausksehatan" >Meninggal
                      <?php else: ?>
                         <input type="radio" name="stausksehatan" >Pulang
                      <input type="radio" name="stausksehatan" >Dirawat
                      <input type="radio" name="stausksehatan" checked >Meninggal
              <?php endif ?></td>
           </tr>
            <tr>
              <td >Diare:</td>
              <td colspan="3"><?php if ( $pasien->diare == 'Ya'): ?>
                      <input type="radio" name="diare" checked>Ya
                      <input type="radio" name="diare" >tidak
                      <?php else: ?>
                         <input type="radio" name="diare" >Ya
                      <input type="radio" name="diare" checked>tidak
              <?php endif ?></td>
           </tr>
            <tr>
              <td>Mual Muntah:</td>
              <td colspan="3"><?php if ( $pasien->mual == 'Ya'): ?>
                      <input type="radio" name="mual" checked>Ya
                      <input type="radio" name="mual" >tidak
                      <?php else: ?>
                         <input type="radio" name="mual" >Ya
                      <input type="radio" name="mual" checked>tidak
              <?php endif ?></td>
           </tr>
        </table>

          <table  class="table">
            <br><br>
          <tr>
            <td colspan="4">F.PENGAMBILAN SAMPLE</td>
          </tr>
         
          <tr>
              <td style="width: 25%">Usap nasofaring:</td>
              <td style="width: 20%"><?php if ( $pasien->usapnesofar == 'Ya'): ?>
                      <input type="radio" name="usapnesofar" checked>Ya
                      <input type="radio" name="usapnesofar" >tidak
                      <?php else: ?>
                         <input type="radio" name="usapnesofar" >Ya
                      <input type="radio" name="usapnesofar" checked>tidak
              <?php endif ?></td>
               <td style="width: 20%">Tanggal Pengambilan:</td>
               <td><?php echo $pasien->tglnesofar; ?></td>
           </tr>
           <tr>
              <td style="width: 25%">Usap orofaring:</td>
              <td style="width: 20%"><?php if ( $pasien->usaporofaring == 'Ya'): ?>
                      <input type="radio" name="usaporofaring" checked>Ya
                      <input type="radio" name="usaporofaring" >tidak
                      <?php else: ?>
                         <input type="radio" name="usaporofaring" >Ya
                      <input type="radio" name="usaporofaring" checked>tidak
              <?php endif ?></td>
               <td style="width: 20%">Tanggal Pengambilan:</td>
               <td><?php echo $pasien->tglorofar; ?></td>
           </tr>
           <tr>
              <td style="width: 25%">Sutum:</td>
              <td style="width: 20%"><?php if ( $pasien->sputum == 'Ya'): ?>
                      <input type="radio" name="sputum" checked>Ya
                      <input type="radio" name="sputum" >tidak
                      <?php else: ?>
                         <input type="radio" name="sputum" >Ya
                      <input type="radio" name="sputum" checked>tidak
              <?php endif ?></td>
               <td style="width: 20%">Tanggal Pengambilan:</td>
               <td><?php echo $pasien->tglsputum; ?></td>
           </tr>

           <tr>
              <td style="width: 25%">Serum/ Serologi Sputum:</td>
              <td style="width: 20%"><?php if ( $pasien->serum == 'Ya'): ?>
                      <input type="radio" name="serum" checked>Ya
                      <input type="radio" name="serum" >tidak
                      <?php else: ?>
                         <input type="radio" name="serum" >Ya
                      <input type="radio" name="serum" checked>tidak
              <?php endif ?></td>
               <td style="width: 20%">Tanggal Pengambilan:</td>
               <td><?php echo $pasien->tglserum; ?></td>
           </tr>

           <?php if ( $pasien->lainnyasample != ''): ?>
            <tr>
              <td style="width: 25%"><?php echo $pasien->lainnyasample ?>:</td>
              <td style="width: 20%"><?php if ( $pasien->lainnya == 'Ya'): ?>
                      <input type="radio" name="lainnya" checked>Ya
                      <input type="radio" name="lainnya" >tidak
                      <?php else: ?>
                         <input type="radio" name="lainnya" >Ya
                      <input type="radio" name="lainnya" checked>tidak
              <?php endif ?></td>
               <td style="width: 20%">Tanggal Pengambilan:</td>
               <td><?php echo $pasien->tgllainnya; ?></td>
           </tr>
           <?php else: ?>
             
           <?php endif ?>
           
        </table>

        <table class="table">
          <tr>
            <td colspan="4">G.RIWAYAT KONTAK / PAPARAN</td>
            
          </tr>
          <tr >
              <td style="width: 70%">Dalam 14 hari sebelum sakit, apakah pasien melakukan perjalanan ke luar negeri?:</td>
              <td colspan="3">
              <?php if ( $pasien->perjalanan == 1): ?>
                      <input type="radio" name="perjalanan" checked>Ya
                      <input type="radio" name="perjalanan" >tidak
                      <?php else: ?>
                         <input type="radio" name="perjalanan" >Ya
                      <input type="radio" name="perjalanan" checked>tidak
              <?php endif ?></td>
              
           </tr>


        </table>
        <?php if ($pasien->perjalanan == 1): ?>
          <table border="1">
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
              <?php $no=1;?>
        <?php  foreach ($perjalanan as $p){?>

          <td><?php echo $no++;?></td>
          <td><?php echo $p['negara']; ?></td> 
          <td><?php echo $p['kota']; ?></td>
          <td><?php echo $p['tglkunjungan']; ?></td>

        <?php }?>

        </tbody>
        </table>
        <?php else: ?>
          
        <?php endif ?>
        <br>

        <table class="table">
         
          <tr >
              <td style="width: 70%">Dalam 14 hari sebelum sakit apakah pasien kontak dengan orang yang sakit saluran pernapasan seperti (demam, batuk atau pneumonia):</td>
              <td colspan="3">
              <?php if ( $pasien->kontakorang == 1): ?>
                      <input type="radio" name="kontakorang" checked>Ya
                      <input type="radio" name="kontakorang" >tidak
                      <?php else: ?>
                         <input type="radio" name="kontakorang" >Ya
                      <input type="radio" name="kontakorang" checked>tidak
              <?php endif ?></td>
              
           </tr>


        </table>
        <?php if ($pasien->kontakorang == 1): ?>
        <table border="1">
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
          <?php $no=1;?>
        <?php  foreach ($kontak as $k){?>

          <td><?php echo $no++;?></td>
          <td><?php echo $k['namakon']; ?></td> 
          <td><?php echo $k['alamatkon']; ?></td>
          <td><?php echo $k['hubungan']; ?></td>
          <td><?php echo $k['tglper']; ?></td>
          <td><?php echo $k['tglter']; ?></td>

        <?php }?>

        </tbody>
        </table>

        <?php else: ?>
          
        <?php endif ?>
        <br>

        <table class="table">
         
          <tr >
              <td style="width: 70%">Apa orang tsb tersangka / terinfeksi COVID-19 (pneumonia berat) ?</td>
              <td colspan="3">
              <?php if ( $pasien->terinfeksi == 1): ?>
                      <input type="radio" name="terinfeksi" checked>Ya
                      <input type="radio" name="terinfeksi" >tidak
                      <?php else: ?>
                         <input type="radio" name="terinfeksi" >Ya
                      <input type="radio" name="terinfeksi" checked>tidak
              <?php endif ?></td>
              
           </tr>
           <tr >
              <td style="width: 70%"> Apa ada anggota keluarga suspek yg sakitnya sama ?</td>
              <td colspan="3">
              <?php if ( $pasien->anggotakel == 1): ?>
                      <input type="radio" name="anggotakel" checked>Ya
                      <input type="radio" name="anggotakel" >tidak
                      <?php else: ?>
                         <input type="radio" name="anggotakel" >Ya
                      <input type="radio" name="anggotakel" checked>tidak
              <?php endif ?></td>
              
           </tr>


        </table>



            <table  class="table">
          <tr>
            <td colspan="4">H.PENYAKIT KOMORBID</td>
            
          </tr>
           <tr>
              <td style="width: 40%">Penyakit Kardiovaskular/Hypertensi:</td>
              <td colspan="3">
              <?php if ( $pasien->hypertensi == 1): ?>
                      <input type="radio" name="hypertensi" checked>Ya
                      <input type="radio" name="hypertensi" >tidak
                      <?php else: ?>
                         <input type="radio" name="hypertensi" >Ya
                      <input type="radio" name="hypertensi" checked>tidak
              <?php endif ?></td>
              
           </tr>
            <tr>
              <td >Diabetes Mellitus:</td>
              <td colspan="3"><?php if ( $pasien->diabetesm == 1): ?>
                      <input type="radio" name="diabetesm" checked>Ya
                      <input type="radio" name="diabetesm" >tidak
                      <?php else: ?>
                         <input type="radio" name="diabetesm" >Ya
                      <input type="radio" name="diabetesm" checked>tidak
              <?php endif ?></td>
          
           </tr>
            <tr>
              <td >Liver:</td>
              <td colspan="3"><?php if ( $pasien->liver == 1): ?>
                      <input type="radio" name="liver" checked>Ya
                      <input type="radio" name="liver" >tidak
                      <?php else: ?>
                         <input type="radio" name="liver" >Ya
                      <input type="radio" name="liver" checked>tidak
              <?php endif ?></td>
          
           
           </tr>
           
            <tr>
              <td>Kronik Neurologi atau Neuromuskular: </td>
              
              <td colspan="3"><?php if ( $pasien->neuromuskular == 1): ?>
                      <input type="radio" name="neuromuskular" checked>Ya
                      <input type="radio" name="neuromuskular" >tidak
                      <?php else: ?>
                         <input type="radio" name="neuromuskular" >Ya
                      <input type="radio" name="neuromuskular" checked>tidak
              <?php endif ?></td>
           </tr>
            <tr>
              <td >Immunodefisiensi / HIV:</td>

              <td colspan="3"><?php if ( $pasien->hiv == 1): ?>
                      <input type="radio" name="hiv" checked>Ya
                      <input type="radio" name="hiv" >tidak
                      <?php else: ?>
                         <input type="radio" name="hiv" >Ya
                      <input type="radio" name="hiv" checked>tidak
              <?php endif ?></td>
              
           </tr>
            <tr>
              <td>Penyakit Paru Kronik:</td>
              <td colspan="3"><?php if ( $pasien->paru == 1): ?>
                      <input type="radio" name="paru" checked>Ya
                      <input type="radio" name="paru" >tidak
                      <?php else: ?>
                         <input type="radio" name="paru" >Ya
                      <input type="radio" name="paru" checked>tidak
              <?php endif ?></td>
              
           </tr>
           <tr>
              <td>Penyakit Ginjal:</td>
              <td colspan="3"><?php if ( $pasien->ginjal == 1): ?>
                      <input type="radio" name="ginjal" checked>Ya
                      <input type="radio" name="ginjal" >tidak
                      <?php else: ?>
                         <input type="radio" name="ginjal" >Ya
                      <input type="radio" name="ginjal" checked>tidak
              <?php endif ?></td>

           </tr>
            <tr>
              <td>Keterangan Lainnya:</td>
              <td colspan="3"> <?php echo $pasien->swabke; ?></td>

           </tr>

        </table>

        </table>

        

        </td>
        </tr>
   

  </table>
   
  
</body>


<script type="text/javascript">

    $(document).on("click", "#submitkonfirmasi", function(){
        var data ={
         getnomor :$('input[name=getnomor]').val(),
         status :$('input[name=getstatus]').val()
       }


        url = "<?php echo base_url();?>mutasi/editlaporan";
            // do_upload
            $.ajax({
                url:url,
                data:data,
                dataType:"TEXT",
                type:"POST",
                success:function(Data){
                   // console.log(Data);
                alert('Data Telah Dikonfirmasi');
                document.location = "<?php echo base_url();?>mutasi/dataTerimaMutasi";
           
                },
                error:function(){

                }
            });
    });




    
</script>





