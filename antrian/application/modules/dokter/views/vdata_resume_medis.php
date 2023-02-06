<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 



<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
<div class="span10">
            <h3 class="page-title">Data Resume Medis</h3>
            
<div class="btn-toolbar">
    <a class="btn btn-primary" href="<?php echo base_url();?>dokter/tambah_resume_medis" role="button">Tambah Resume</a>
</div>

<div class="well">

    <table id="kendaraan" class="table table-striped table-bordered ">
      <thead>
        <tr> 
          <th></th>     
          <th>ID</th>
          <th>No RM</th>
          <th>Nama Pasien</th>
          <th>Nama Dokter</th>
          <th>Diagnosa Utama</th>                            
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
              <?php foreach ($resume as $k){ ?> 
        <tr>        
          <?php 
             $tgl_input = date_create($k->tgl_input);
          ?>
          <td><?php echo ""; ?></td>
          <td><?php echo $k->id_resume; ?></td>
          
          <td><?php echo $k->no_rm; ?></td> 
          <td><?php echo $k->nama_pasien; ?></td>
          <td><?php echo $k->nama_dokter; ?></td> 
          <td><?php echo $k->diag_utama; ?></td>
                  
                                 
          
                  
                                        <td align="center">
                                    
                                        <a href="<?php echo base_url();?>dokter/edit_resume/<?php echo $k->id_resume; ?>">
                                        <input type="button" value="Edit" class="btn btn-success"></a>
                                       
                                        <a href="<?php echo base_url();?>dokter/print_resume_medis/<?php echo $k->id_resume; ?>" target="_blank">
                                        <input type="button"  value="Print" class="btn btn-primary"></a>


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


