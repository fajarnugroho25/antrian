<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
        
<div class="span10">
            <h3 class="page-title">List Pasien BPJS</h3>
            
<div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>bpjs/updatebpjs" role="button">Update Data</a>
</div>

<div class="well">

    <table class="table table-striped table-bordered data">
      <thead>
        <tr>      
        <th>No Reg</th>
          <th>RM</th>
          <th>Nama Pasien</th>     
          <th>DPJP</th>
          <th>Tagihan</th> 
          <th>InacBG</th> 
          <th>ICD IX</th> 
          <th>ICD X</th> 
          <th>Catatan</th> 
          <th>Action</th> 
          </thead>
      <tbody>
              <?php foreach ($bpjs as $d){ ?> 
        <tr>        
          <td><?php echo $d->no_reg; ?></td>
          <td><?php echo $d->rm; ?></td>
          <td><?php echo $d->nama_pasien; ?></td>
          <td ><?php echo $d->dpjp; ?></td>
          <td style="text-align: right;"><?php echo number_format($d->tagihan); ?></td>
          <td style="text-align: right;"><?php echo number_format($d->grouping); ?></td>
          <td><?php echo $d->icdix; ?></td>
          <td><?php echo $d->icdx; ?></td>
          <td><?php echo $d->catatan; ?></td>
          
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


