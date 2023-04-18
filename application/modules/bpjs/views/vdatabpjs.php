<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
        
<div class="span10">
            <h3 class="page-title">LIST PASIEN BPJS R. INAP MYRSKI</h3>
            
<div class="btn-toolbar">
<?php if ($this->session->unit_id == 116) { ?>
        <a class="btn btn-primary" href="<?php echo base_url();?>bpjs/updatebpjs" role="button">Update Data</a>

      <?php } else if ($this->session->unit_id == 530) { ?>
              
        <a class="btn btn-primary" href="<?php echo base_url();?>bpjs/updatebpjs" role="button">Update Data</a>

      <?php } else if ($this->session->unit_id == 3) { ?>
              
        <a class="btn btn-primary" href="<?php echo base_url();?>bpjs/updatebpjs" role="button">Update Data</a>
        
      <?php } else { ?>
  <?php } ?>        
</div>

<div class="well">

    <table class="table table-striped table-bordered data">
      <thead>
        <tr>      
        <!-- <th>No Reg</th> -->
          <th>RM</th>
          <th>Nama Pasien</th>
          <th>LOS</th>
          <th>DPJP</th>
          <th>Tagihan</th>
          <th>Grouping</th>
          <th>Iur</th>
          <th>Selisih Tagihan</th>
          <th>Bangsal</th>
          <th>Action</th> 
          </thead>
      <tbody>
              <?php foreach ($bpjs as $d){ ?> 
        <tr>        
          <td><?php echo $d->rm; ?></td>
          <?php
          if ($d->status < 2) {
                    echo  ' <td style=" text-align: left; ">' . $d->nama_pasien . '</td>';   
          } else { 
                    echo ' <td style=" text-align: left; background-color:#1E90FF; color:white; border-radius: 4px; ">' . $d->nama_pasien . '</td>';              
          }
          ?>
          <td ><?php echo $d->masa_inap; ?></td>
          <td ><?php echo $d->dpjp; ?></td>
          <td style="text-align: right;"><?php echo number_format($d->tagihan); ?></td>
          <td style="text-align: right;"><?php echo number_format($d->grouping); ?></td>
          <td style="text-align: right;"><?php echo number_format($d->iur); ?></td>
          <?php
          $cek = @(($d->selisih_tagihan / $tagihan) * 100 );
          if ($cek > 100) {
                    echo  ' <td style=" text-align: right; background-color:#7FFF00; color:black; border-radius: 4px;">' . number_format($d->selisih_tagihan) . '</td>';   
          } else if ($cek < 100) {
                    echo ' <td style=" text-align: right; background-color:#DC143C; color:white; border-radius: 4px;">' . number_format($d->selisih_tagihan) . '</td>';  
          } else { 
                    echo ' <td style=" text-align: right; ">' . number_format($d->selisih_tagihan) . '</td>';              
          }
          ?>
          <td><?php echo $d->bangsal; ?></td>
            
          <td align="center">
                                        <a href="<?php echo base_url();?>bpjs/editdatabpjs/<?php echo $d->no_reg; ?>">
                                        <input type="button" value="Edit" class="btn btn-info"></a>
                                        
          </td>    

        </tr>
                             <?php } ?>
      </tbody>
    </table>


</div>
 <script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
    
</div>


