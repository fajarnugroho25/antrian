<?php 
$id_laporan = '';
$tgl_kejadian = '';
$tempat_kejadian = '';
$kejadian = '';
$kronologi_kejadian ='';
$verifikasi = '';
$tindaklajut = '';
$status = '0';
$tgl_input =  date("Y-m-d H:i:s");
$pembuat = $this->session->nama;

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

<script language="javascript" type="text/javascript"> 
    var maxAmount = 100;
    function textCounter(textField, showCountField) {
        if (textField.value.length > maxAmount) {
            textField.value = textField.value.substring(0, maxAmount);
        } else { 
            showCountField.value = maxAmount - textField.value.length;
        }
    }
</script>

<div class="span10">
    <h3 class="page-title">Form Laporan Insiden K3 RS Kasih Ibu</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/tambahk3 ">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>
                <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly>
                <input type="hidden" name="pembuat" value="<?php echo $pembuat; ?>" required readonly>
        <tr>
            <td>
            <label><b>ID Laporan</b></label>
                </td>
                <td> &nbsp &nbsp</td>
                <td>
                    <input type="text" name='id_laporan' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
        </tr>

        <!-- <tr>
            <td>
                <label><b>Pembuat Laporan</b></label>
            </td>
            <td></td>
            <td>
                <input type="text" id="pembuat" name="pembuat" value="<?php echo $user_nama; ?>" required readonly>
            </td>
        </tr> -->
        <tr>
            <td>
                <label><b>Tanggal & Waktu Kejadian</b></label>
            </td>
            <td> </td>
            <td>
                <div id="datetimepicker" class="input-append date">
                    <input type="text" id="tgl_kejadian" name="tgl_kejadian" required></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
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
                <select name='tempat_kejadian' id='tempat_kejadian' required>
                    <option value=''disabled selected>Pilih Bagian</option>

                    <?php
                    foreach ($cbunit as $cbu) {
                        if ($cbu->unit_id == $unit_utama) { 
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
                <textarea id="textarea" rows="8" cols="30" maxlength="500" class="form-control " name="kronologi_kejadian"></textarea>
                <div id="textarea_feedback"></div>
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