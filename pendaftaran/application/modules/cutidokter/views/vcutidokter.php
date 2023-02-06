<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/moment.css?ts=<?=time()?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css?ts=<?=time()?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css?ts=<?=time()?>">    



<div class="span10">
            <h3 class="page-title">Data Riwayat Pesanan</h3>
            
<div class="well">

    <table class="table table-striped table-bordered data" id="example">
      <thead>
        <tr>      
          <th></th>
          
          <th>Nama Dokter</th>
          <th>Cuti Awal</th>
          <th>Cuti Akhir</th>
          <th>Edit Cuti</th>
        </tr>
      </thead>
      <tbody>
              <?php foreach ($dokter as $b){   ?> 
        <tr>    
          <td></span><?php echo "" ?></td>     
           
          <td></span><?php echo $b->nama_dokter; ?></td>  
          <td></span><?php echo $b->cuti_awal; ?></td> 
          <td></span><?php echo $b->cuti_akhir; ?></td>  
          <td align="center">
                                        <a href="<?php echo base_url();?>index.php/cutidokter/editcuti/<?php echo $b->id_dokter; ?>">
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




        