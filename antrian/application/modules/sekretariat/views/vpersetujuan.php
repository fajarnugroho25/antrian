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
            <h3 class="page-title">Data Pengajuan Surat Keluar</h3>  <!--<?php echo $this->session->user_name; ?> -->
            
<div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>sekretariat/surat" role="button">Tambah Pengajuan</a>
</div>
<?= $this->session->flashdata('message'); ?>
<div class="well">

		<table id = "sekretariat" class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>Tanggal</th>
					<th>Nomor Surat</th>
					<th>Nama Bagian</th>
					<th>Kode Surat</th>
					<th>Perihal</th>
					<th>Tujuan</th>
					<th>Data Date</th>
					<th>Action</th>
                                        
				</tr>
			</thead> 
			<tbody>
        <?php foreach ($pengajuan as $p){ ?> 
				<tr>			
				  <?php $tanggal = date_create($p->tanggal);	?>
					<td><?php echo date_format($tanggal, 'd-m-Y') ?></td> 
					<td><?php echo $p->no_surat; ?></td>
					<td><?php echo $p->nama_bagian; ?></td>
					<td><?php echo $p->kode_surat; ?></td>
					<td><?php echo $p->perihal; ?></td>
					<td><?php echo $p->tujuan; ?></td>
					<td><?php echo $p->data_date; ?></td>
					
                   	<td align="center">
                   			<?php
                   				if($p->status=='Sudah Disetujui'){ ?>
                   					Sudah Disetujui
                   				<?php } else { ?>
                   					<a href="<?php echo base_url();?>sekretariat/editpengajuan/<?php echo $p->id_surat; ?>">
                        		<input type="button" value="Verifikasi" class="btn btn-info"></a>
                   				<?php } 
                   			?>
                        
                      </td>
                </tr>
                  <?php } ?>
			</tbody>
		</table>


</div>



		
</div>


