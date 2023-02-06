<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/moment.css?ts=<?=time()?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css?ts=<?=time()?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css?ts=<?=time()?>">    



<div class="span10">
            <h3 class="page-title">Data Pesanan</h3>
            
<div class="well">

    <table class="table table-striped table-bordered data" id="example">
      <thead>
        <tr>      
          <th></th>
          <th>Tgl Create</th>
          <th>No RM</th>
          <th>Status</th>
          <th>Dokter</th>
          <th>Poli</th>          
          <th>Kategori</th>
          <th>Fungsi</th>
        </tr>
      </thead>
      <tbody>
              <?php foreach ($pasien as $b){   ?> 
        <tr>    
          <td></span><?php echo "" ?></td>       
          <td></span><?php echo $b->create_at; ?></td> 
          <td></span><?php echo $b->no_rm; ?></td>  
          <td></span><?php echo $b->status_persetujuan; ?></td> 
          <td></span><?php echo $b->nama_dokter; ?></td>  
          <td></span><?php echo $b->nama_poli; ?></td>          
          <td></span><?php echo $b->kategori; ?></td>   
            <td align="center">
                                        <a href="<?php echo base_url();?>index.php/pesanan/konfirm/<?php echo $b->id_registrasi_periksa; ?>">
                                          <button type="button" class="btn btn-info">
                                              <span class="icon-edit"></span> 
                                            </button>
                                        </a>
                                      
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




        