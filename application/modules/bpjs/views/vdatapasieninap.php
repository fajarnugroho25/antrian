<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
        
<div class="span10">
            <h3 class="page-titlee">Perjanjian Kerja Sama</h3>
            

<div class="well">

    <table class="table table-striped table-bordered data">
      <thead>
        <tr>      
          <th>ID</th>
          <th>Perusahaan</th>
			<th>Mulaii</th>
			<th>Akhir</th>
			<th>Jenis</th>
			<th>Keterangan</th> 
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
              <?php foreach ($pks as $d){ ?> 
        <tr>        
          <td><?php echo $d->id_pks; ?></td>
          <td><?php echo $d->perusahaan; ?></td>
		   <td><?php echo $d->mulai; ?></td>
		    <td><?php echo $d->akhir; ?></td>
			 <td><?php echo $d->jenis; ?></td>
			  <td><?php echo $d->ket; ?></td>
          
                                        <td align="center">
                                        <a href="<?php echo base_url();?>pks/editpks/<?php echo $d->id_pks; ?>">
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


