 <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap-datepicker.min.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/bootstrap-datepicker.min.js"></script>

<div class="span10">
       <h3 class="page-title"> Filter Laporan</h3>
       
<div class="well">
    <form id="user" method="post" action=<?php echo base_url();?>laporan/laporan_detil target="_blank">


<table>    
      <tr>
        <td>
            <label><b>Tanggal Antri </b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>            
            <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">
                <input type="text" class="form-control"  id="tgl_1" name="tgl_1" readonly="readonly" value="<?php echo date("Y/m/d"); ?>" > sampai    
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </td>
        <td align="left">
            <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">                 
                <input type="text" class="form-control"  id="tgl_2" name="tgl_2" readonly="readonly" value="<?php echo date("Y/m/d"); ?>" >
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>   
        </td>
      </tr>
      <tr>
        <td>
            <label><b>Tanggal Realisasi </b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>            
            <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">                
                <input type="text" class="form-control"  id="tgl_real_1" name="tgl_real_1" readonly="readonly" value="<?php echo date("Y/m/d"); ?>" > sampai   
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </td>
        <td align="left">
            <div class="input-group date" data-provide="datepicker"  data-date-format="yyyy/mm/dd">
                <input type="text" class="form-control"  id="tgl_real_2" name="tgl_real_2" readonly="readonly" value="<?php echo date("Y/m/d"); ?>" >
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>   
        </td>
      </tr>
      <tr>
        <td>
            <label><b>Jenis Operasi</b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>
            <select name='operasi' id='operasi' >
            <option value="ALL" selected>Semua Operasi</option> 

            <?php
             foreach ($combo as $combo) 
             {
              if ($combo->id == $operasi) 
                {echo '<option value="'.$combo->id.'" selected >'.$combo->nama_operasi.'</option>';}
            else 
                {echo '<option value="'.$combo->id.'" >'.$combo->nama_operasi.'</option>';}        
            
             }
            ?>
            </select>  
        </td>
      </tr>
      <tr>
        <td>
            <label><b>Dokter</b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>
            <select name='dokter' id='dokter' >
            <option value="ALL"  selected>Semua Dokter</option> 

            <?php
             foreach ($cbdokter as $cbdokter) 
             {
              if ($cbdokter->id == $dokter) 
                {echo '<option value="'.$cbdokter->id.'" selected >'.$cbdokter->nama_dokter.'</option>';}
            else 
                 {echo '<option value="'.$cbdokter->id.'" >'.$cbdokter->nama_dokter.'</option>';}        
            
             }
            ?>
            </select>
        </td>
      </tr>
      <tr>
        <td>
            <label><b>Hak Kelas</b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>
            <select name='hak_kelas' id='hak_kelas' >
            <option value='ALL'  selected>Semua Kelas</option> 

            <?php
             foreach ($cbkelas as $cbkelas) 
             {
              if ($cbkelas->id_kelas == $hak_kelas) 
                {echo '<option value="'.$cbkelas->id_kelas.'" selected >'.$cbkelas->nama_kelas.'</option>';}
            else 
                 {echo '<option value="'.$cbkelas->id_kelas.'" >'.$cbkelas->nama_kelas.'</option>';}        
            
             }
            ?>
            </select>
        </td>
      </tr>
      <tr>
        <td>
            <label><b>Kelas Diminta</b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>
            <select name='kelas_diminta' id='kelas_diminta' >
            <option value='ALL'  selected>Semua Kelas</option> 

            <?php
             foreach ($cbkelasminta as $cbkelasminta) 
             {
              if ($cbkelasminta->id_kelas == $kelas_diminta) 
                {echo '<option value="'.$cbkelasminta->id_kelas.'" selected >'.$cbkelasminta->nama_kelas.'</option>';}
            else 
                 {echo '<option value="'.$cbkelasminta->id_kelas.'" >'.$cbkelasminta->nama_kelas.'</option>';}        
            
             }
            ?>
            </select>
        </td>
      </tr>
      <tr>
        <td>
            <label><b>penanggung</b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>
            <select name='penanggung' id='penanggung' >
            <option value='ALL'  selected>Semua Penanggung</option> 

            <?php
             foreach ($cbpenanggung as $cbpjm) 
             {
              if ($cbpjm->id_penanggung == $penanggung) 
                {echo '<option value="'.$cbpjm->id_penanggung.'" selected >'.$cbpjm->nama_penanggung.'</option>';}
            else 
                 {echo '<option value="'.$cbpjm->id_penanggung.'" >'.$cbpjm->nama_penanggung.'</option>';}        
            
             }
            ?>
            </select>
        </td>
      </tr>
      <tr>
        <td> 
            <label><b>Prioritas</b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>
            <input type="radio" id="prioritas" name="prioritas" value="ALL" checked > All &nbsp 
            <input type="radio" id="prioritas" name="prioritas" value="0"  > Non Prioritas &nbsp 
            <input type="radio" id="prioritas" name="prioritas" value="1"  > Prioritas </br></br>
        </td>
      </tr>
      <tr>
        <td> 
            <label><b>Status</b></label>
        </td>
        <td> &nbsp  &nbsp</td>
        <td>
            <input type="radio" id="status" name="status" value="ALL" checked> All &nbsp 
            <input type="radio" id="status" name="status" value="1" > Belum Masuk &nbsp 
            <input type="radio" id="status" name="status" value="0" > Sudah Masuk </br></br>
        </td>
      </tr>
</table>
       
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="filter" type="submit"> Tampilkan</button>
            
        </div>
	</form>
      </div>
  </div>


   