<?php     
if (!empty($bpjs)) { 
   
    foreach ($bpjs as $row):
    $no_reg = $row->no_reg;    
    $rm = $row->rm;
    $nama_pasien = $row->nama_pasien;
    $tgl_lahir = $row->tgl_lahir;
    $alamat = $row->alamat;
    $dpjp = $row->dpjp;
    $tgl_reg = $row->tgl_reg;
    $masa_inap = $row->masa_inap;
    $sep = $row->sep;  
    $bangsal = $row->bangsal;
    $kelas = $row->kelas;
    $hak_kelas = $row->hak_kelas;
    $tagihan = $row->tagihan;  
    $grouping = $row->grouping;
    $iur = $row->iur;
    $selisih_tagihan = $row->selisih_tagihan;
    $icdx = $row->icdx;
    $icdx2 = $row->icdx_2;
    $icdx3 = $row->icdx_3;
    $icdx4 = $row->icdx_4;
    $icdx5 = $row->icdx_5;
    $icdix = $row->icdix;
    $icdix2 = $row->icdix_2;
    $icdix3 = $row->icdix_3;
    $icdix4 = $row->icdix_4;
    $icdix5 = $row->icdix_5;
    $catatan = $row->catatan;
    
    $titel   = 'EDIT PASIEN';
    $aksi   = 'Edit';
    $button   = 'Edit';
    endforeach;
}
?> 

<head>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/easy-number-separator.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script>  

<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

</head>

<body>
<div class="span10">
<h3 class="page-title"><?php echo $titel; ?> BPJS</h3>
<div class="well">

<form id="user" method="post" action="<?php echo base_url();?>bpjs/<?php echo $aksi; ?>">

<table>
    <td>
        <table>
            <tr>
                <td>
                    <label><b>No Reg</b></label>
                </td>
                    <td></td>
                <td>
                <input type="text" name='no_reg' id='no_reg' class="form-control" value="<?= $no_reg; ?>" readonly>
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>RM</b></label>
                </td>
                    <td></td>
                <td>
                    <input type="text" id="rm" name="rm" value="<?php echo $rm; ?>" readonly>
                </td>
            </tr>
                <tr> 
                    <td>
                        <label><b>Nama Pasien</b></label>
                    </td>
                        <td></td>
                    <td>
                        <input type="text" id="nama_pasien" name="nama_pasien" value="<?php echo $nama_pasien; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><b>Tgl Lahir</b></label>
                    </td>
                    <td> </td>
                    <td>
                        <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir ?>" readonly>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </td>    
                </tr>
                <tr> 
                    <td>
                    <label><b>Alamat</b></label>
                    </td>
                    <td></td>
                    <td>
                    <textarea id="alamat" name="alamat" rows="4" readonly><?php echo $alamat; ?></textarea>       
                    </td>
                </tr>
           
            <tr> 
                <td>
                    <label><b>DPJP</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="dpjp" name="dpjp" value="<?php echo $dpjp; ?>" readonly>
                </td>
            </tr>
            <tr>
                    <td>
                        <label><b>Tgl Registrasi</b></label>
                    </td>
                    <td> </td>
                    <td>
                        <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
                        <input type="text" class="form-control" id="tgl_reg" name="tgl_reg" value="<?php echo $tgl_reg ?>" readonly>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </td>    
            </tr>
            <tr> 
                <td>
                    <label><b>Lama Menginap</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="masa_inap" name="masa_inap" value="<?php echo $masa_inap; ?>" readonly>
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>SEP</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="sep" name="sep" value="<?php echo $sep; ?>" readonly>
                </td>
            </tr>
             <tr> 
                <td>
                    <label><b>Bangsal</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="bangsal" name="bangsal" value="<?php echo $bangsal; ?>" readonly>
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>Kelas</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="kelas" name="kelas" value="<?php echo $kelas; ?>" readonly>
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>Hak Kelas</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="hak_kelas" name="hak_kelas" value="<?php echo $hak_kelas; ?>" readonly>
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>Tagihan</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text"  id="tagihan" class="number-separator" name="tagihan" value="<?php echo $tagihan; ?>" readonly>
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>Grouping</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text"  id="grouping" onchange="price()" class="number-separator1"  name="grouping" value="<?php echo $grouping; ?>" required> 
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>Iur</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text"  id="iur" onchange="price()" class="number-separator2"  name="iur" value="<?php echo $iur; ?>" required> 
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>Selisih Tagihan</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text"  id="selisih_tagihan" name="selisih_tagihan" value="<?php echo $selisih_tagihan; ?>" readonly> 
                </td>
            </tr>

        </table>
    </td>

    <td> &nbsp &nbsp &nbsp &nbsp</td>
    <td valign="top">
     <table>
            <tr> 
                <td valign="top">
                    <label><b>ICD X Utama</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" style="width:300px" class="icd10" name="icdx" value="<?php echo $icdx; ?>" placeholder="ICD10" >  
                  
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD X Sekunder 1</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text"  style="width:300px" class="icd10" name="icdx2" value="<?php echo $icdx2; ?>" placeholder="ICD10" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD X Sekunder 2</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text"  style="width:300px" class="icd10" name="icdx3" value="<?php echo $icdx3; ?>" placeholder="ICD10" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD X Sekunder 3</b></label>
                </td>
                <td></td>
                <td>
                <input type="text"  style="width:300px" class="icd10" name="icdx4" value="<?php echo $icdx4; ?>" placeholder="ICD10" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD X Sekunder 4</b></label>
                </td>
                <td></td>
                <td>
                <input type="text"  style="width:300px" class="icd10" name="icdx5" value="<?php echo $icdx5; ?>" placeholder="ICD10" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD IX Utama</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" style="width:300px" class="icd9" name="icdix" value="<?php echo $icdix; ?>" placeholder="ICD9" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD IX Sekunder 1</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" style="width:300px" class="icd9" name="icdix2" value="<?php echo $icdix2; ?>" placeholder="ICD9" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD IX Sekunder 2</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" style="width:300px" class="icd9" name="icdix3" value="<?php echo $icdix3; ?>" placeholder="ICD9" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD IX Sekunder 3</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" style="width:300px" class="icd9" name="icdix4" value="<?php echo $icdix4; ?>" placeholder="ICD9" >
                </td>
            </tr>
            <tr> 
                <td>
                    <label><b>ICD IX Sekunder 4</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" style="width:300px" class="icd9" name="icdix5" value="<?php echo $icdix5; ?>" placeholder="ICD9" >
                </td>
            </tr>
            <tr>
                <td>
                        <label><b>Catatan</b></label>
                </td>
                        <td></td>
                        <td><textarea id="catatan" name="catatan" rows="4"  ><?php echo $catatan; ?></textarea></td>                
            </tr> 
            
    </table>
    </td>
</table>

<div style="padding-top:20px">
   <button class="btn btn-primary" id="edit" type="submit"><?php echo $button; ?> bpjs</button>
    
</div>
</form>
</div>
</div>

</body>


<script type="text/javascript"  >
src="easy-number-separator.js"
  easyNumberSeparator({
    selector: '.number-separator',
    separator: '.',
    // decimalSeparator: ',',
     resultInput: '#tagihan',
  });

  src="easy-number-separator.js"
  easyNumberSeparator({
    selector: '.number-separator1',
    separator: '.',
    // decimalSeparator: ',',
     resultInput: '#grouping',
    
  });

  src="easy-number-separator.js"
  easyNumberSeparator({
    selector: '.number-separator2',
    separator: '.',
    // decimalSeparator: ',',
     resultInput: '#iur',
    
  });

//   src="easy-number-separator.js"
//   easyNumberSeparator({
//     selector: '.number-separator3',
//     separator: '.',
//     // decimalSeparator: ',',
//      resultInput: '#selisih_tagihan',
    
//   });

  

// var grouping = document.getElementById("grouping");
// grouping.addEventListener("keyup", function(e) {
//   // tambahkan 'Rp.' pada saat form di ketik
//   // gunakan fungsi formatgrouping() untuk mengubah angka yang di ketik menjadi format angka
//   grouping.value = formatgrouping(this.value, "Rp. ");
// });

// /* Fungsi formatgrouping */
// function formatgrouping(angka, prefix) {
//   var number_string = angka.replace(/[^,\d]/g, "").toString(),
//     split = number_string.split(","),
//     sisa = split[0].length % 3,
//     grouping = split[0].substr(0, sisa),
//     ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//   // tambahkan titik jika yang di input sudah menjadi angka ribuan
//   if (ribuan) {
//     separator = sisa ? "." : "";
//     grouping += separator + ribuan.join(".");
//   }

//   grouping = split[1] != undefined ? grouping + "," + split[1] : grouping;
//   return prefix == undefined ? grouping : grouping ? grouping : "";
// }
</script>

<script type="text/javascript">
function price() {

	var tgh = document.getElementById("tagihan").value.replace(/[^0-9]/, '') ;
    var grp = document.getElementById("grouping").value.replace(/[^0-9]/, '') ;
    var iu = document.getElementById("iur").value.replace(/[^0-9]/, '') ;
        document.getElementById("selisih_tagihan").value = parseInt(grp.replace(/[^0-9]/,'')) + parseInt(iu.replace(/[^0-9]/,'')) - parseInt(tgh.replace(/[^0-9]/,'')) ;
    }
</script>

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
              source: "<?php echo site_url('bpjs/get_autocomplete_icd10/?');?>"
            });
           
        });

        $(document).ready(function(){
            $( ".icd9" ).autocomplete({
              source: "<?php echo site_url('bpjs/get_autocomplete_icd9/?');?>"
            });
           
        });
</script>


