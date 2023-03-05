<?php     
if (!empty($bpjs)) { 
   
    foreach ($bpjs as $row):
    $no_reg = $row->no_reg;    
    $rm = $row->rm;
    $nama_pasien = $row->nama_pasien;
    $tgl_lahir = $row->tgl_lahir;
    $alamat = $row->alamat;
    $dpjp = $row->dpjp;
    $sep = $row->sep;  
    $tagihan = $row->tagihan;  
    $grouping = '';
    $icdix = '';
    $icdx = '';
    $catatan = '';
    
    $titel   = 'Simpan';
    $aksi   = 'Simpan';
    $button   = 'Simpan';
    endforeach;
}
?> 

<head>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>

</head>

<body>
<div class="span10">
<h3 class="page-title"><?php echo $titel; ?> BPJS</h3>

<div class="well">
<form id="user" method="post" action="<?php echo base_url();?>bpjs/<?php echo $aksi; ?>">

<table >
  <tr>
    <td>
        <label><b>No Reg</b></label>
    </td>
        <td> &nbsp  &nbsp</td>
    <td>
      <input type="text" name='no_reg' id='no_reg' class="form-control" value="<?= $no_reg; ?>" readonly>
    </td>
  </tr>
  <tr> 
    <td>
        <label><b>RM</b></label>
    </td>
        <td> &nbsp &nbsp</td>
    <td>
        <input type="text" id="rm" name="rm" value="<?php echo $rm; ?>" required>
    </td>
  </tr>
  <tr> 
    <td>
            <label><b>RM</b></label>
        </td>
            <td> &nbsp &nbsp</td>
        <td>
            <input type="text" id="nama_pasien" name="nama_pasien" value="<?php echo $nama_pasien; ?>" required>
        </td>
  </tr>
  <tr>
        <td>
            <label><b>Tgl Lahir</b></label>
        </td>
        <td> </td>
        <td>
            <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">            
            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir ?>" required>
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
        <td> &nbsp &nbsp</td>
        <td>
            <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
        </td>
  </tr>
  <tr> 
  <tr> 
  <td>
        <label><b>DPJP</b></label>
    </td>
    <td> &nbsp &nbsp</td>
    <td>
        <input type="text" id="dpjp" name="dpjp" value="<?php echo $dpjp; ?>" required>
    </td>
  </tr>
  <tr> 
  <td>
        <label><b>SEP</b></label>
    </td>
    <td> &nbsp &nbsp</td>
    <td>
        <input type="text" id="sep" name="sep" value="<?php echo $sep; ?>" required>
    </td>
  </tr>
  <tr> 
  <td>
        <label><b>Tagihan</b></label>
    </td>
    <td> &nbsp &nbsp</td>
    <td>
        <input type="text" id="tagihan" class="form-control asset"  name="tagihan" value="<?php echo $tagihan; ?>" required>
    </td>
  </tr>
  <tr> 
  <td>
        <label><b>Grouping</b></label>
    </td>
    <td> &nbsp &nbsp</td>
    <td>
        <input type="text" id="grouping" name="grouping" value="" required>
    </td>
  </tr>
  <tr> 
  <td>
        <label><b>ICD IX</b></label>
    </td>
    <td> &nbsp &nbsp</td>
    <td>
        <input type="text" id="icdix" name="icdix" value="">
    </td>
  </tr>
  <tr> 
  <td>
        <label><b>ICD X</b></label>
    </td>
    <td> &nbsp &nbsp</td>
    <td>
        <input type="text" id="icdx" name="icdx" value="" >
    </td>
  </tr>
  <tr>
        <td>
            <label><b>Catatan</b></label>
        </td>
            <td> &nbsp &nbsp</td>
            <td><textarea id="catatan" value="" class="form-control " name="catatan"></textarea></td>
    </tr> 
</table>

<div style="padding-top:20px">
   <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> bpjs</button>
    
</div>
</form>
</div>
</div>

</body>
<script type="text/javascript">

</script>


