<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/fr/buttons.print.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/fr/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/fr/buttons.dataTables.min.css">
<script>var base_url = '<?php echo base_url() ?>'</script> 

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
          <?php
          if ($d->status < 2) {
                    echo  ' <td style=" text-align: left; ">' . $d->nama_pasien . '</td>';   
          } else { 
                    echo ' <td style=" text-align: left; background-color:#1E90FF; color:white; border-radius: 4px; ">' . $d->nama_pasien . '</td>';              
          }
          ?>
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
    $(document).ready(function() {
      $('.data').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']});
    });
  </script>

</div>



