<?php 

$id_laporan = '';
$tgl_kejadian = '';
$tempat_kejadian = '';
$kejadian = '';
$kronologi_kejadian ='';
$verifikasi = '';
$tindaklajut = '';
$verifikator = $this->session->nama;

if (!empty($datak3)) {
    foreach ($datak3 as $row) :     
      $kodejadi   =  $row->id_laporan;
      $tgl_kejadian   =  $row->tgl_kejadian;
      $tempat_kejadian   =  $row->tempat_kejadian;
      $kejadian   =  $row->kejadian;
      $kronologi_kejadian   =  $row->kronologi_kejadian;

endforeach;
}

?>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>


<div class="span10">
    <h3 class="page-title">Form Laporan Insiden K3 RS Kasih Ibu</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/verifk3 ">

            <table>
                <input type="hidden" name="verifikator" value="<?php echo $verifikator; ?>" required readonly>

        <tr>
            <td>
            <label><b>ID Laporan</b></label>
                </td>
                <td> &nbsp &nbsp</td>
                <td>
                    <input type="text" name='id_laporan' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Tanggal & Waktu Kejadian</b></label>
            </td>
            <td> </td>
            <td>
                <div id="datetimepicker" class="input-append date">
                    <input type="text" id="tgl_kejadian" name="tgl_kejadian" readonly="readonly" value="<?php echo $tgl_kejadian ?>" required></input>
                    <!-- <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> -->
                    </span>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label><b>Tempat Kejadian</b></label>
            </td>
            <td></td>
            <td>
                <select name='tempat_kejadian' id='tempat_kejadian' >
                    <option value='' >Pilih Bagian</option>

                    <?php
                    foreach ($cbunit as $cbu) {
                        if ($cbu->unit_id == $tempat_kejadian) { 
                            echo '<option value="' . $cbu->unit_id . '" selected >' . $cbu->unit_nama . '</option>';
                        } else {
                            echo '<option value="' . $cbu->unit_id . '" >' . $cbu->unit_nama . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
     

        <tr>
            <td>
                <label><b>Kejadian</b></label>
            </td>
            <td></td>
            <td>
                <select name='kejadian' id='kejadian' required>
                    <option value=''disabled selected>Pilih Kejadian</option>

                    <?php
                    foreach ($cbkejadian as $cbk) {
                        if ($cbk->id_kejadian == $kejadian) { 
                            echo '<option value="' . $cbk->id_kejadian . '" selected >' . $cbk->nama_kejadian . '</option>';
                        } else {
                            echo '<option value="' . $cbk->id_kejadian . '" >' . $cbk->nama_kejadian . '</option>';
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
         
         <tr>
            <td valign="top">
                <label><b>Kronologi Kejadian</b></label>
            </td>
            <td></td>
            <td>
                <textarea id="kronologi_kejadian" class="form-control " name="kronologi_kejadian"> <?php echo $kronologi_kejadian ?> </textarea>
            </td>
        </tr>

        <tr>
            <td>
                <label><b>Tanggal & Waktu Verifikasi</b></label>
            </td>
            <td> </td>
            <td>
                <div id="datetimepicker2" class="input-append date">
                    <input type="text" id="verifikasi" name="verifikasi" required></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </td>
        </tr>

         
        <tr>
            <td valign="top">
                <label><b>Tindak Lanjut</b></label>
            </td>
            <td></td>
            <td>
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control" name="tindaklanjut" > </textarea>
            </td>
        </tr>

       
</table>
<div style="padding-top:20px">
    <button class="btn btn-primary" id="simpan" type="submit">
    Submit</button>


</div>
</form>

</div>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>



<script type="text/javascript">


    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });

     $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-BR',

    });
    
    $(document).ready(function(){
       $('#pernah').hide();
       $('#klik').click(function(){
        $('#pernah').show();

    });
       $('#tidak').click(function(){
        $('#pernah').hide();
    });
   });

    $(document).ready(function(){
       $('#sudah').hide();
       $('#klik').click(function(){
        $('#sudah').show();

    });
       $('#tidak').click(function(){
        $('#sudah').hide();
    });
   });

     $(document).ready(function(){
        var unit_edit = 
        $('#unit_edit').val();
        console.log(unit_edit);
        if (unit_edit != '') {
         $('#pernah').show();
         $('#sudah').show();
     }   else{
             $('#pernah').hide();
             $('#sudah').hide();
        }
    });

     $(document).ready(function() {
        var text_max = 500;
        $('#textarea_feedback');

        $('#textarea').keyup(function() {
            var text_length = $('#textarea').val().length;
            var text_remaining = text_max - text_length;

            $('#textarea_feedback');
        });
    });



</script> 


</div> 