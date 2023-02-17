<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css"> 



<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.dataTables.min.css">
        
<div class="span10">
            <h3 class="page-title">Data Terima Barang Mutasi</h3>
            

<div class="well">

    <table id="perbaikan" class="table table-striped table-bordered ">
      <thead>
        <tr> 
            <th>No </th>
            <th>No Mutasi</th>
            <th>Bagian</th>
            <th>Gudang Penerima</th>
            <th>Status</th>
            <th>Status Aktif</th>
            <th>aksi</th>
          
        </tr>
      </thead>
      <tbody>
        <?php $no=1;?>
              <?php foreach ($BarangMutasi as $BM){ ?> 
            <?php 
           
              if($BM->status_doc == '1'){
                  $hasil= 'Menunggu Surat Perintah ';
              }
              elseif($BM->status_doc == '2'){
                  $hasil= 'Menunggu Konfirmasi ';
              }
               elseif($BM->status_doc == '3'){
                  $hasil= 'Sudah Diterima ';
              }
              else{
                $hasil= 'Selesai';
              }

              


          ?>
        <tr>   
          <td><?php echo $no++;?></td>
          <td><?php echo $BM->mutasi_id; ?></td>          
          <td><?php echo $BM->unit_nama; ?></td> 
          <td><?php echo $BM->nama_gudang; ?></td>
          <td><?php echo $hasil; ?></td> 
            <?php if ($BM->status == 1): ?>
              <td><?php echo "Aktif" ?></td>
              <?php else: ?>
                <td><?php echo "Tidak Aktif" ?></td>
            <?php endif ?>
              <td align="center">
                 <a href="<?php echo base_url();?>mutasi/printLaporanMutasi/<?php echo $BM->mutasi_id; ?>">
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
</script>
    
</div>


