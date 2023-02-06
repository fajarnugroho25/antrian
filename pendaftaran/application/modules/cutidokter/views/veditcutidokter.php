<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datetimepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap_datetime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
</link>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

        <?php      

        $nama='';
      
        foreach ($dokter as $row):         
        
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';

        $id = $row->id_dokter;  
     
        $nama_dokter = $row->nama_dokter;
        // $nama_dokter = $row->nama_dokter;
        // $keterangan = $row->keterangan;
        // $status_persetujuan = $row->status_persetujuan;

        endforeach;
      
        ?> 
<div class="span10">
       <h3 class="page-title">Form Konfirmasi Pesanan</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>index.php/cutidokter/<?php echo $aksi; ?>">

        <table >
          <tr>
            <td>
                <label><b>ID Dokter</b></label>
            </td>
            <td> &nbsp  &nbsp</td>
            <td>
              <input type="text" name='id' class="form-control" value="<?= $id; ?>" readonly>
            </td>
          </tr>

          <tr> 
            <td>
                <label><b>Nama Dokter</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="nama_dokter" name="nama_dokter" value="<?= $nama_dokter; ?>" readonly>
                
            </td>
          </tr>
          <tr>
                    <td>
                        <label><b>Tanggal Cuti </b></label>
                    </td>
                    <td> &nbsp &nbsp</td>
                    <td>
                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                            <input type="text" class="form-control" id="cuti_awal" name="cuti_awal" readonly="readonly" value="<?php echo date("Y/m/d"); ?>"> sampai
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </td>
                    <td align="left">
                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                            <input type="text" class="form-control" id="cuti_akhir" name="cuti_akhir" readonly="readonly" value="<?php echo date("Y/m/d"); ?>">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </td>
                </tr>
          
           

          
       </table>

        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit">Simpan</button>
            
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

   