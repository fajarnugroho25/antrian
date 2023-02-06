<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 



<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
            <h3 class="page-title">Data Surat Keterangan Dokter</h3>
            
<div class="btn-toolbar">
	
   <a class="btn btn-primary" href="<?php echo base_url();?>rujukan/tambahsuket" role="button" >Tambah Surat</a>
 
</div>

<div class="well">

		<table id="example" class="table table-striped table-bordered dt-responsive " >
			<thead>
				<tr>						
					<th></th>
					
					<th>No Surat</th>
					<th>No RM</th>
					<th>Nama Pasien</th>
					<th>Alamat</th>
					<th>Dokter</th>					
					<th>Diag Primer</th>
					<th>Diag Sekunder</th>
					<th>Tgl Penggunaan</th>
					<th>Fungsi</th>
				</tr>
			</thead>
			<tbody>
			         <?php foreach ($pasien as $b){   ?> 
				<tr>		
				
					
									
					<td><?php echo "" ?></td>
					
					<td><?php echo $b->no_surat; ?></td>
					<td><?php echo $b->no_rm; ?></td>
					<td><?php echo $b->nama; ?></td>
					<td><?php echo $b->alamat; ?></td>				
					<td><?php echo $b->nama_dokter; ?></td>                                     
                    <td><?php echo $b->diag_primer; ?></td> 
                    <td><?php echo $b->diag_sekunder; ?></td> 
                    <td><?php echo $b->tgl_penggunaan; ?></td> 
                    					<td align="center">
                                        <a href="<?php echo base_url();?>rujukan/editsuket/<?php echo $b->no_surat; ?>">
                                        <input type="button" value="Edit" class="tombol small gray"></a>
                                        <a href="<?php echo base_url();?>rujukan/print_suket/<?php echo $b->no_surat; ?>" target="_blank">
                                        <input type="button"  value="Print" class="tombol small gray"></a>
                                        <!--
                                        <a href="<?php echo base_url(); ?>index.php/cpasien/delete/<?php echo $b->id_pasien; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                                        <input type="hidden" value="Hapus" disabled class="tombol small gray"></a>
                                    	-->
                                        </td>                
				</tr>
                             <?php } ?>
			</tbody>
		</table>


</div>

		
</div>



