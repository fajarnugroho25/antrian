<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 



<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
<div class="span10">
            <h3 class="page-title">Data Hasil Radiologi</h3>
            
<div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>dokter/tambah_hasil_rad" role="button">Tambah Hasil</a>
</div>

<div class="well">

    <table id="perbaikan" class="table table-striped table-bordered ">
      <thead>
        <tr> 
          <th></th>     
          <th>ID</th>
          <th>No RM</th>
          <th>Nama Pasien</th>
          <th>No-Photo</th>
          <th>Poli Klinik</th>                            
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
              <?php foreach ($rad as $k){ ?> 
        <tr>        
          <?php 
             $tgl_input = date_create($k->tgl_input);
          ?>
          <td><?php echo ""; ?></td>
          <td><?php echo $k->id_hasil_rad; ?></td>          
          <td><?php echo $k->no_rm; ?></td> 
          <td><?php echo $k->nama_pasien; ?></td>
          <td><?php echo $k->no_photo; ?></td> 
          <td><?php echo $k->nama_poli; ?></td>
                  
                                 
          
                  
                                        <td align="center">
                                    
                                        <a href="<?php echo base_url();?>dokter/edit_hasil_rad/<?php echo $k->id_hasil_rad; ?>">
                                        <input type="button" value="Edit" class="btn btn-success"></a>
                                       
                                        <a href="<?php echo base_url();?>dokter/print_hasil_rad/<?php echo $k->id_hasil_rad; ?>" target="_blank">
                                        <input type="button"  value="Print" class="btn btn-primary"></a>

                                        <a href="<?php echo base_url(); ?>dokter/delete/<?php echo $k->id_hasil_rad; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                                        <input type="button" value="Delete" class="btn btn-danger"></a>


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


