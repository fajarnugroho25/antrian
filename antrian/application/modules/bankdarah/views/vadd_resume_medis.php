        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $no_rm = '';
        $nama_pasien = '';
        $alamat = '';
        $diag_utama = '';
        $diag_sementara = '';
        $diag_sekunder1 = ''; 
        $diag_sekunder2 = ''; 
        $diag_sekunder3 = '';       
        $diet = '';
        $anjuran_edukasi = '';
        $status = '1';       
        $tgl_lahir = '';
        $tgl_keluar = '';        
        $tgl_masuk = '';       
        $jam=date("H:i:s");
        $penemuan_fisik = '';
        $diag_terpenting = '';
        $sebab_dirawat = '';   
        $tgl_input = date("Y-m-d H:i:s");  
        $tindakan_dilakukan1 = '';
        $tindakan_dilakukan2 = '';
        $tindakan_dilakukan3 = '';
        $terapi = '';
        $ruang = '';
        $kondisi_keluar = '';
        $id_dpjp = $this->session->id_dokter;  
    
        if (!empty($resume)) { 
        foreach ($resume as $row):
        $kodejadi = $row->id_resume;  
        $id_resume = $row->id_resume;    
        $no_rm = $row->no_rm;
        $nama_pasien = $row->nama_pasien;
        $alamat = $row->alamat;
        $diag_utama = $row->diag_utama;
        $diag_sementara = $row->diag_sementara;
        $diag_sekunder1 = $row->diag_sekunder1;
        $diag_sekunder2 = $row->diag_sekunder2;
        $diag_sekunder3 = $row->diag_sekunder3;
        $diet = $row->diet;
        $anjuran_edukasi =  $row->anjuran_edukasi;
        $status =  $row->status;
        $tgl_lahir =  $row->tgl_lahir;
        $tgl_keluar = $row->tgl_keluar;
        $tgl_masuk =  $row->tgl_masuk;
        $id_dpjp =  $row->id_dpjp;
        $penemuan_fisik = $row->penemuan_fisik;
        $sebab_dirawat =  $row->sebab_dirawat;
        $diag_terpenting = $row->diag_terpenting;
        $tgl_input = $row->tgl_input;
        $tindakan_dilakukan1 = $row->tindakan_dilakukan1;
        $tindakan_dilakukan2 = $row->tindakan_dilakukan2;
        $tindakan_dilakukan3 = $row->tindakan_dilakukan3;
        $terapi = $row->terapi;
        $kondisi_keluar = $row->kondisi_keluar;
        $ruang = $row->ruang;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script>  

     <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
</head>

<body>

<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Resume Medis</h3>               
<div class="well">

<form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" >

       
        
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control" value="<?php echo  $tgl_input ; ?>"   readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>"   readonly></td>
        <td><input type="hidden" id="id_dpjp" name='id_dpjp' class="form-control" value="<?php echo  $id_dpjp; ?>"   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control" value="<?php echo  $status ; ?>"  readonly></td>
        


<table>
    <td>
        <table>
            <tr>
            <td>
                <label><b>ID</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='id_resume' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
            </tr>
            <form id="form">
            <tr>
                <td>
                    <label><b>No_RM </b></label>
                </td>
                <td></td>
                <td>      
                             
                    <input type="text"  id="no_rm" name="no_rm" value="<?php echo $no_rm; ?>" placeholder="Input RM, Lalu Klik Fill --->>"   >   
                    <button type="button" id="btnSubmit" class="btn btn-info">Fill</button>
                
                </td>               
            </tr>
            
            
            <tr>
                <td>
                    <label><b>Nama Pasien</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="nama_pasien" name="nama_pasien" value="<?php echo $nama_pasien; ?>"  readonly >
                </td>    
            </tr> 
            </form>   
            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td> </td>
                <td>
                    <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" readonly > 
                </td>    
            </tr> 
           
             <tr>
                <td>
                    <label><b>Tanggal Lahir</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" placeholder="DD/MM/YYYY" onKeyup="chtgl()"  onKeyDown="chtgl()" readonly >
                </td>    
            </tr>  

            <tr>
                <td>
                    <label><b>Ruang</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="ruang" name="ruang" value="<?php echo $ruang; ?>" > 
                </td>    
            </tr>         
          

           <tr>
                <td>
                    <label><b>Terapi</b></label>
                </td>
                <td></td>
                <td>
                     <input type="text" id="terapi" name="terapi" value="<?php echo $terapi; ?>" > 
                </td>    
            </tr>

             <tr>
                <td>
                    <label><b>Sebab Dirawat</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="sebab_dirawat" name="sebab_dirawat" value="<?php echo $sebab_dirawat; ?>"  >
                </td>    
            </tr>
             <tr>
                <td>
                    <label><b>Diet</b></label>
                </td>
                <td></td>
                <td>
                     <input type="text" id="diet" name="diet" value="<?php echo $diet; ?>" > 
                </td>    
            </tr>   
            <tr>
                <td>
                    <label><b>Anjuran & Edukasi</b></label>
                </td>
                <td></td>
                <td>
                     <input type="text" id="anjuran_edukasi" name="anjuran_edukasi" value="<?php echo $anjuran_edukasi; ?>" > 
                </td>    
            </tr>
             <tr>
                <td>
                    <label><b>Penemuan Fisik </b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="penemuan_fisik" name="penemuan_fisik" value="<?php echo $penemuan_fisik; ?>"  >
                </td>    
            </tr>  
            
            <tr>
                <td valign="top">
                    <label><b>Pemeriksaan Penunjang </b></label>
                </td>
                <td></td>
                <td>
                     <input type="hidden"  name="diag_terpenting" value="<?php echo $diag_terpenting; ?>" > 
                      <textarea style="" id="diag_terpenting" name="diag_terpenting" rows="4" ><?php echo $diag_terpenting; ?></textarea> 
                </td>    
            </tr>

           
           
        </table>
    </td>
    <td> &nbsp &nbsp &nbsp &nbsp</td>
    <td valign="top">
        <table>
            <tr>
                <td valign="top">
                    <label><b>Tindakan Yang Telah Dilakukan</b></label>
                </td>
                <td></td>
                <td>
                     <input type="text" class="icd9" name="tindakan_dilakukan1" value="<?php echo $tindakan_dilakukan1; ?>" placeholder="ICD9"> <br>
                     <input type="text" class="icd9" name="tindakan_dilakukan2" value="<?php echo $tindakan_dilakukan2; ?>" placeholder="ICD9"> <br>
                     <input type="text" class="icd9" name="tindakan_dilakukan3" value="<?php echo $tindakan_dilakukan3; ?>" placeholder="ICD9"> <br>
                </td>    

            </tr>

            <tr>
                <td>
                    <label><b>Diag Sementara</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" class="icd10" name="diag_sementara" value="<?php echo $diag_sementara; ?>"  placeholder="ICD10" > 
                </td>    
            </tr>   

            <tr>
                <td>
                    <label><b>Diag Utama</b></label>
                </td>
                <td></td>
                <td>
                     <input type="text" class="icd10" name="diag_utama" value="<?php echo $diag_utama; ?>" placeholder="ICD10" > 
                </td>    
            </tr>

            <tr>
                <td valign="top">
                    <label><b>Diag Sekunder</b></label>
                </td>
                <td></td>
                <td>
                     <input type="text" class="icd10" name="diag_sekunder1" value="<?php echo $diag_sekunder1; ?>" placeholder="ICD10"> <br>
                     <input type="text" class="icd10" name="diag_sekunder2" value="<?php echo $diag_sekunder2; ?>" placeholder="ICD10"> <br>
                     <input type="text" class="icd10" name="diag_sekunder3" value="<?php echo $diag_sekunder3; ?>" placeholder="ICD10"> <br>
                </td>    
            </tr>          
           
            
                        
 
            

             <tr>
                <td>
                    <label><b>Tgl Masuk</b></label>
                </td>
                <td> </td>
                <td>
                    <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                    <input type="text" class="form-control" id="tgl_masuk" name="tgl_masuk" readonly="readonly" value="<?php echo $tgl_masuk ?>" >
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Tgl Keluar</b></label>
                </td>
                <td> </td>
                <td>
                    <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                    <input type="text" class="form-control" id="tgl_keluar" name="tgl_keluar" readonly="readonly" value="<?php echo $tgl_keluar ?>" >
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </td>    
            </tr>
           

            <tr>
                <td>
                    <label><b>Kondisi Waktu Keluar</b></label>
                </td>
                <td> &nbsp &nbsp</td>
                <td>
                    <input type="radio" id="kondisi_keluar" name="kondisi_keluar" value="Sembuh" <?php if ($kondisi_keluar=='Sembuh') {echo 'checked';} else  {echo '';}  ?>  > Sembuh &nbsp 
                    <input type="radio" id="kondisi_keluar" name="kondisi_keluar" value="Pindah RS" <?php if ($kondisi_keluar=='Pindah RS') {echo 'checked';} else  {echo '';}  ?>  > Pindah RS &nbsp  
                    <input type="radio" id="kondisi_keluar" name="kondisi_keluar" value="Meninggal" <?php if ($kondisi_keluar=='Meninggal') {echo 'checked';} else  {echo '';}  ?>  > Meninggal &nbsp <br>
                    <input type="radio" id="kondisi_keluar" name="kondisi_keluar" value="Pulang (Permintaan Sendiri)" <?php if ($kondisi_keluar=='Pulang (Permintaan Sendiri)') {echo 'checked';} else  {echo '';}  ?>  > Pulang (Permintaan Sendiri) &nbsp 
                    <input type="radio" id="kondisi_keluar" name="kondisi_keluar" value="Lain-Lain" <?php if ($kondisi_keluar=='Lain-Lain') {echo 'checked';} else  {echo '';}  ?>  > Lain-Lain 
                </td>    
            </tr>    
            
           
            
        </table>
    </td>
 </table>      
              
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Pasien</button>           
        </div>
	</form>
      </div>
  </div>
  
</body>

<script type="text/javascript">
      $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( ".tags" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );

</script>

 <script type="text/javascript">
        $(document).ready(function(){
            $( ".icd10" ).autocomplete({
              source: "<?php echo site_url('dokter/get_autocomplete_icd10/?');?>"
            });
           
        });

        $(document).ready(function(){
            $( ".icd9" ).autocomplete({
              source: "<?php echo site_url('dokter/get_autocomplete_icd9/?');?>"
            });
           
        });
    </script>


<script type="text/javascript">
  
$(document).ready(function(){
    $('#btnSubmit').click(function(){
        var datas = {
            no_rm: $('#no_rm').val(),
           
        }
   
            url = "<?php echo site_url() . '/dokter/cek_hisys'; ?>";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(data){
                  obj =  JSON.parse(data)
                  console.log(obj.nama_pasien);
                  $('#nama_pasien').val(obj.nama_pasien);
                  $('#alamat').val(obj.alamat);
                  $('#tgl_lahir').val(obj.tgl_lahir);               

        
                },
                error:function(){
                    
                }
            });



  });
            });
</script>
