<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
        
<div class="span10">
            <h3 class="page-title">Data Penanggung</h3>
            
<div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>penanggung/tambahpenanggung" role="button">Tambah Penanggung</a>
</div>

<div class="well">

    <table class="table table-striped table-bordered data">
      <thead>
        <tr>      
          <th>ID</th>
          <th>Nama Penanggung</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
              <?php foreach ($penanggung as $d){ ?> 
        <tr>        
          <td><?php echo $d->id_penanggung; ?></td>
          <td><?php echo $d->nama_penanggung; ?></td>
          
                                        <td align="center">
                                        <a href="<?php echo base_url();?>penanggung/editpenanggung/<?php echo $d->id_penanggung; ?>">
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


