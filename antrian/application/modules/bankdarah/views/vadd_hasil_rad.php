        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambahhasil';
        $button   = 'Simpan';
        $no_rm = '';
        $nama_pasien = '';
        $alamat = '';
        $no_photo = '';
        $penjamin = '';       
        $hasil = '';       
        $status = '1';       
        $tgl_lahir = '';             
        $tgl_pemeriksaan  = '';
        $jam=date("H:i:s");       
        $dpjp_pengirim = '';       
        $tgl_input = date("Y-m-d H:i:s");  
        $poli = '';    
        $kelamin = '';
    
        if (!empty($rad)) { 
        foreach ($rad as $row):
        $kodejadi = $row->id_hasil_rad;  
        $id_hasil_rad = $row->id_hasil_rad;    
        $no_rm = $row->no_rm;
        $nama_pasien = $row->nama_pasien;
        $alamat = $row->alamat;
        $no_photo = $row->no_photo;       
        $penjamin = $row->penjamin;
        $hasil = $row->hasil;       
        $status =  $row->status;
        $tgl_lahir =  $row->tgl_lahir;      
        $tgl_pemeriksaan =  $row->tgl_pemeriksaan;     
        $dpjp_pengirim = $row->dpjp_pengirim;
        $tgl_input = $row->tgl_input;       
        $poli = $row->poli;
        $kelamin = $row->kelamin;
        $titel   = 'Perbarui';
        $aksi   = 'perbaruihasil';
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

     <link href="<?php echo base_url(); ?>public/assets/css/jquery-ui.css" rel="Stylesheet"></link>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery-ui.js" ></script>

    <link href="<?php echo base_url();?>public/assets/summernote/summernote-bs4.css" rel="stylesheet">
    <script src="<?php echo base_url();?>public/assets/summernote/summernote-bs4.js"></script>

</head>

<body>

<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Hasil Radiologi</h3>               
<div class="well">

<form id="form" method="post" action="<?php echo base_url();?>dokter/<?php echo $aksi; ?>" >

       
        
        <td><input type="hidden" id="tgl_input" name='tgl_input' class="form-control" value="<?php echo  $tgl_input ; ?>"   readonly></td>
        <td><input type="hidden" id="user" name='user' class="form-control" value="<?php echo  $this->session->user_name; ?>"   readonly></td>
        <td><input type="hidden" id="id_dpjp" name='id_dpjp' class="form-control" value="<?php echo  $this->session->nama; ?>"   readonly></td>
        <td><input type="hidden" id="status" name='status' class="form-control" value="<?php echo  $status ; ?>"  readonly></td>
        <input type="hidden"  name="dpjp_pengirim" value="<?php echo $dpjp_pengirim; ?>" readonly> 
        


<table border="0">
    <td>
        <table>
            <tr>
            <td>
                <label><b>ID</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name='id_hasil_rad' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
            </tr>
            <form id="form">
            <tr>
                <td>
                    <label><b>No RM </b></label>
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
                    <label><b>Jenis Kelamin</b></label>
                </td>
                <td></td>
                <td>
                    <input type="radio" id="kelamin1" name="kelamin" value="L" <?php if ($kelamin=='L') {echo 'checked';} else  {echo '';}  ?> required> Laki -Laki &nbsp &nbsp &nbsp &nbsp 
                    <input type="radio" id="kelamin2" name="kelamin" value="P" <?php if ($kelamin=='P') {echo 'checked';} else  {echo '';}  ?> required> Perempuan </br></br> 
                </td>    
            </tr> 

           
        </table>
    </td>
    <td> &nbsp &nbsp &nbsp &nbsp</td>
    <td valign="top">
        <table>
            
            <tr>
                <td>
                    <label><b>Poliklinik</b></label>
                </td>
                <td> </td>
                <td valign="bottom">
                    <select name='poli' id='poli'>
                    <option value='' disabled selected>Poliklinik</option> 

                    <?php
                     foreach ($cbpoli as $cbpoli) 
                     {
                      if ($cbpoli->id_poli == $poli) 
                        {echo '<option value="'.$cbpoli->id_poli.'" selected >'.$cbpoli->nama_poli.'</option>';}
                    else 
                         {echo '<option value="'.$cbpoli->id_poli.'" >'.$cbpoli->nama_poli.'</option>';}        
                    
                     }
                    ?>
                    </select>
                </td>    
            </tr> 
           
      

            <tr>
                <td>
                    <label><b>No Photo</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" name="no_photo" value="<?php echo $no_photo; ?>"  > 

                </td>    
            </tr>  
                    

            <tr>
                <td>
                    <label><b>Penjamin</b></label>
                </td>
                <td></td>
                <td>
                     <input type="text" name="penjamin" value="<?php echo $penjamin; ?>" > 
                </td>    
            </tr>
             

            <tr>
                <td>
                    <label><b>Tgl Pemeriksaan</b></label>
                </td>
                <td> </td>
                <td>
                    <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                    <input type="text" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan" readonly="readonly" value="<?php echo $tgl_pemeriksaan ?>" >
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </td>    
            </tr>

            <tr>
                <td>
                    <label><b>Jenis Pemeriksaan</b></label>
                </td>
                <td> </td>
                <td>
                    <select name='JP' id='JP'>
                    <option value='' disabled selected>Jenis Pemeriksaan</option>
                    <option value="USG">USG</option>
                    <option value="Echo">Echo</option>
                    <option value="EKG">EKG</option>
                    <option value="Colonoskopi">Colonoskopi</option>
                    </select>
                </td>
                <td>
            </tr>
             <tr>
                <td>

                </td>
                <td></td>
                <td>
                     <input type="text" placeholder="lain-lain" name="lain"  >
                </td>
            </tr>

            <tr>
                <td>
                    <label><b>Dokter Pemeriksa</b></label>
                </td>
                <td> </td>
                <td>
                    <select name='dpjp_pengirim' id='dpjp_pengirim'>
                    <option value='' disabled selected>Pilih Dokter Pemeriksa</option>
                   <?php
                     foreach ($dpjp as $cdpjp) 
                     {
                      if ($cdpjp->id == $dpjp_pengirim) 
                        {echo '<option value="'.$cdpjp->id.'" selected >'.$cdpjp->nama_dokter.'</option>';}
                    else 
                         {echo '<option value="'.$cdpjp->id.'" >'.$cdpjp->nama_dokter.'</option>';}        
                    
                     }
                    ?>
                    </select>
                </td>
                <td>
            </tr>
          
            
           
            
        </table>
    </td>


 </table>  
<hr>
  <div class="form-group">
          <label><center><b>Isi Hasil</b></center></label>
            <div class="col-sm-10">
               <textarea class="form-control content" placeholder="Isi Hasil" id="ccc" name="hasil"><?php echo $hasil; ?></textarea>

            </div>
 
      

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
     //edtor summernote
    $('#ccc').summernote({
      height: 200,
       focus: true,
      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],      
        ['para', ['ul', 'ol', 'paragraph']],       
       
      ],

          

    });
</script>


<script type="text/javascript">
  
$(document).ready(function(){
    $('#btnSubmit').click(function(){
        var datas = {
            no_rm: $('#no_rm').val(),
           
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
                  console.log(obj.nama_pasien);
                  $('#nama_pasien').val(obj.nama);
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
</script>
