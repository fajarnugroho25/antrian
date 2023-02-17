<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery321.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>


<div class="span10">
    <h3 class="page-title"> Filter Laporan</h3>

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>insiden/load_laporan ">


            <table>

                <tr>
                    <td>
                        <label><b>Tanggal Insiden </b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                    <div id="datetimepicker" class="input-append date">
                        <input type="text" id="tgl_1" name="tgl_1" readonly="readonly"  required></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                    </div>
                    </td>
                    <td align="left">
                    <div id="datetimepicker1" class="input-append date">
                        <input type="text" id="tgl_2" name="tgl_2" readonly="readonly"  required></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                    </div>
                    </td>
                  
                </tr>

                <tr>
                    <td>
                        <label><b></b></label>
                    </td>
                    <td> </td>
                    <td valign="bottom">
                        <!-- <select name='jenis' id='jenis' required >
                            <option value='ALL' selected>Semua</option>

                            <?php
                            foreach ($cbjenis as $cbjenis) {
                                if ($cbjenis->id_jenis == $jenis) {
                                    echo '<option value="' . $cbjenis->id_jenis . '" selected >' . $cbjenis->jenis . '</option>';
                                } else {
                                    echo '<option value="' . $cbjenis->id_jenis . '" >' . $cbjenis->jenis . '</option>';
                                }
                            }
                            ?>
                        </select> -->
                        <input type="hidden" name='jenis' class="form-control" value="ALL" readonly>
                    </td>
                </tr>


            </table>

            <div style="padding-top:20px">
                <button class="btn btn-primary" id="filter" type="submit"> Tampilkan</button>

            </div>
        </form>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetimepicker.min.js"></script>



<script type="text/javascript">
  $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',

    });
    $('#datetimepicker1').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR',

    });
   
</script> 