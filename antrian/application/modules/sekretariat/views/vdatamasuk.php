<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">

<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/buttons.html5.min.js"></script>
        

<div class="span10">
            <h3 class="page-title">Data Pengajuan Surat Masuk</h3>  <!--<?php echo $this->session->user_name; ?> -->
            
<div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>sekretariat/suratmasuk" role="button">Tambah Pengajuan</a>
</div>
<?= $this->session->flashdata('message'); ?>
<div class="well">

		<table id= "sekretariat2" class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>Tanggal Surat</th>
					<th>Nomor</th>
					<th>Nomor Surat</th>
					<th>Asal Surat</th>
					<th>Perihal</th>
					<th>Tanggal Diterima</th>
					<th>Masuk Agenda</th>
					<th>Disposisi</th>
					<th>Keterangan</th>
					<th>Action</th>
                                        
				</tr>
			</thead> 
			<tbody>
				
        <?php foreach ($pengajuanmasuk as $p){ ?> 
				<tr>			
				  <?php $tanggal = date_create($p->tgl_surat);	?>
					<td><?php echo date_format($tanggal, 'd-m-Y') ?></td> 
					<td><?php echo $p->nomor; ?></td>
					<td><?php echo $p->no_surat; ?></td>
					<td><?php echo $p->asal_surat; ?></td>
					<td><?php echo $p->perihal; ?></td>
					<td><?php echo date_format(date_create($p->tgl_terima), 'd-m-Y'); ?></td>
					<td><?php echo $p->no_arsip; ?></td>
					<td><?php echo $p->disposisi; ?></td>
					<td><?php echo $p->keterangan; ?></td>
				
                   	<td align="center">
                   			<?php
                   				if($p->status=='Selesai'){ ?>
                   					Selesai
                   				<?php } else { ?>
                   					<a href="<?php echo base_url();?>sekretariat/editmasuk/<?php echo $p->id_surat; ?>">
                        		<input type="button" value="Verifikasi" class="btn btn-info"></a>
                   				<?php } 
                   			?>
                        
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


