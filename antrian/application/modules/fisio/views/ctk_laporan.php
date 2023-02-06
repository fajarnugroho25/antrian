<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script>

<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
</link>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>


<div class="span10">
    <h3 class="page-title"> Filter Laporan</h3>

    <div class="well">
        <form id="user" method="post" action=<?php echo base_url(); ?>fisio/print_laporan target="_blank">


            <table>

                <tr>
                    <td>
                        <label><b>Tgl Periksa</b></label>
                    </td>
                    <td> </td>
                    <td>
                        <div id="datetimepicker" class="input-append date">
                            <input type="text" id="tgl_periksa" name="tgl_periksa" readonly="readonly" required></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Poliklinik</b></label>
                    </td>
                    <td> </td>
                    <td valign="bottom">
                        <select name='poliklinik' id='poliklinik' required>
                            <option value='' disabled selected>Poliklinik</option>

                            <?php
                            foreach ($cbpoli as $cbpoli) {
                                    if ($cbpoli->id_poli == $poliklinik) {
                                            echo '<option value="' . $cbpoli->id_poli . '" selected >' . $cbpoli->nama_poli . '</option>';
                                        } else {
                                            echo '<option value="' . $cbpoli->id_poli . '" >' . $cbpoli->nama_poli . '</option>';
                                        }
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Penanggung</b></label>
                    </td>
                    <td></td>
                    <td>
                        <select name='penanggung' id='penanggung' required>

                            <option value='ALL' selected>Semua Penanggung</option>

                            <?php
                            foreach ($cbpenanggung as $cbpenanggung) {


                                    echo '<option value="' . $cbpenanggung->id_penanggung . '" >' . $cbpenanggung->nama_penanggung . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label><b>Shift</b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <input type="radio" id="shift" name="shift" value="P" required> Pagi &nbsp &nbsp &nbsp &nbsp
                        <input type="radio" id="shift" name="shift" value="S" required> Siang &nbsp &nbsp &nbsp &nbsp


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
</script> 