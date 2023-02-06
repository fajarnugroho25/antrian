<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 



<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
<div class="span10">
            <h3 class="page-title">Data Penjualan Barang Inventaris</h3>
            


<div class="well">

    <table id="kirimmut" class="table table-striped table-bordered ">
      <thead>
        <tr> 
          <th>No </th>
            <th>Kode barang</th>
            <th>Tanggal</th>
            <th>Nama Gudang</th>

            <th>Alasan</th>
            <th>Status</th>
            <th>aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1;?>
              <?php foreach ($BarangJual as $BJ){ ?> 
                <?php if ($BJ->status_doc == '1') {
                  $hasil= 'Terkirim Ke Kasi Rumah Tangga';
              }
              elseif($BJ->status_doc == '2'){
                  $hasil= 'Terkirim Ke Manager Umum ';
              }
               elseif($BJ->status_doc == '3'){ 
                  $hasil= 'Terkirim Ke Pembukuan ';
              }
              else{
                $hasil= 'Selesai';
              }

          ?>
        <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $BJ->kodebarang; ?></td> 
          <td><?php echo $BJ->tanggal; ?></td>   

          <?php if ($BJ->ket == '1'): ?>
            <td><?php echo "Dijual" ?></td> 
            <?php elseif ($BJ->ket == '2'): ?>
                   <td><?php echo "Dimusnahkan" ?></td> 
            <?php endif ?>       
          
          <td><?php echo $BJ->nama_gudang; ?></td>
          <td><?php echo $hasil; ?></td> 

              <td align="center">         
                 <a href="<?php echo base_url();?>mutasi/printJualBarang/<?php echo $BJ->kodebarang; ?>">
                 <input type="button" value="Laporan" class="btn btn-success"></a>      
                 
                 
                 
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


  $(document).ready(function() {
    $('#kirimmut').DataTable( {
        "paging":   true,
                "ordering": true,
                "info":     true,
            
    } );
} );
</script>
    
</div>


