<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
<script src="~/Scripts/autoNumeric/autoNumeric.min.js" type="text/javascript"></script>        
<!--  -->

<div class="span10">  
            <h3 class="page-titlee5r">LIST PASIEN BPJS R. INAP DI HISYS</h3>
<div class="well">

    <table class="table table-striped table-bordered data">
      <thead>
        <tr>      
          <th>RM</th>
          <th>Nama Pasien</th>
          <th>LOS</th>
          <th>DPJP</th>
          <th>Tgl Registrasi</th>
          <th>Tagihan</th>
          <th>Bangsal</th>
          <th>Penjamin</th>
          <th>Action</th> 

        </tr>
      </thead>
      <tbody>
              <?php foreach ($bpjs as $d){ ?> 
        <tr>        
          <td><?php echo $d->rm; ?></td>
          <td><?php echo $d->nama_pasien; ?></td>
          <td><?php echo $d->masa_inap; ?></td>
          <td><?php echo $d->dpjp; ?></td>
          <td><?php echo $d->tgl_reg; ?></td>
          
          <td style="text-align: right;"><?php echo number_format($d->tagihan); ?></td>
          <td><?php echo $d->bangsal; ?></td>
          <td><?php echo $d->penjamin; ?></td>
          
          <td align="center">
                                        <a href="<?php echo base_url();?>bpjs/editbpjs/<?php echo $d->no_reg; ?>">
                                        <input type="button" value="Add" class="btn btn-info"></a>
                                        
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


