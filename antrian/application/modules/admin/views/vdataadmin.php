<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
        
<div class="span10">
            <h3 class="page-title">Data Administrator & User</h3>  <!--<?php echo $this->session->user_name; ?> -->
            
<div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>admin/tambahadmin" role="button">Tambah User</a>
</div>

<div class="well">

		<table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>ID</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Status Admin</th>
					<th>Action</th>
                                        
				</tr>
			</thead> 
			<tbody>
                             <?php foreach ($admin as $adm){ ?> 
				<tr>				
					<td><?php echo $adm->id; ?></td>
					<td><?php echo $adm->user; ?></td>
					<td><?php echo $adm->nama; ?></td>
					<td><?php if ($adm->admin_status == 1){ echo "Admin";} else {echo "Non Admin";} ?></td>
                                        <td align="center">
                                        <a href="<?php echo base_url();?>admin/editakses/<?php echo $adm->id; ?>">
                                        <input type="button" value="Akses" class="btn btn-info"></a>
                                        <a href="<?php echo base_url();?>admin/editadmin/<?php echo $adm->id; ?>">
                                        <input type="button" value="Edit" class="btn btn-info"></a>
                                        <!--
                                        <a href="<?php echo base_url(); ?>home/delete/<?php echo $adm->id; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                                        <input type="button" value="Akses" class="tombol small gray"></a> -->
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


