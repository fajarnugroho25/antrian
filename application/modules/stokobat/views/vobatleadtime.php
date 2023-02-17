<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">

<div class="span10">
  <h3 class="page-title">Lead Time Obat</h3>

  <div class="btn-toolbar">
  <a class="btn btn-primary" href="<?php echo base_url(); ?>stokobat/hitungulang" role="button">Sync Obat</a>
  </div>

  <div class="well">

    <table class="table table-striped table-bordered data">
      <thead>
        <tr>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Leadtime</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($obat as $d) { ?>
          <tr>
            <td><?php echo $d->kode_brg; ?></td>
            <td><?php echo $d->nama_brg; ?></td>
            <td><?php echo $d->leadtime; ?></td>
            <td align="center">
              <a href="<?php echo base_url(); ?>stokobat/editleadtime/<?php echo $d->kode_brg; ?>">
                <input type="button" value="Edit" class="btn btn-info">
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>


  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.data').DataTable();
    });
  </script>

</div>