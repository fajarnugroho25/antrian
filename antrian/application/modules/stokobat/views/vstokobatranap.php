<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

<div class="span10">
  <h3 class="page-title">Perhitungan Stock Obat Gudang Medis Ranap (3 Bulan Terakhir)</h3>

  <div class="btn-toolbar">

  </div>

  <div class="well">

    <table class="table table-striped table-bordered data" id="stokobat">
      <thead>
        <tr>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Total 3 Bln</th>
          <th>Rata 3 Bln</th>
          <th>Stok</th>
          <th>Leadtime</th>
          <th>Buffer</th>
          <th>Minimal</th>
          <th>Maximal</th>
          <th>Sign(%)</th>
          <th>Saran</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($obat as $d) { ?>
          <tr>
            <td><?php echo $d->kode_brg; ?></td>
            <td><?php echo $d->nama_brg; ?></td>
            <td><?php echo $d->total3bln; ?></td>
            <td><?php echo $d->rata3bln; ?></td>
            <td><?php echo $d->stok; ?></td>
            <td><?php echo $d->leadtime; ?></td>
            <td>
              <?php
              $buffer = ($d->leadtime * $d->rata3bln) / 2;
              echo $buffer; //buffer 
              ?>
            </td>
            <td>
              <?php
              $minimal = ($d->leadtime * $d->rata3bln) * 1.5;
              echo $minimal; //minimal 
              ?>
            </td>
            <td>
              <?php
              $maximal = ($d->leadtime * $d->rata3bln) * 3.5;
              echo $maximal; //maximal 
              ?>
            </td>

            <?php
            $a = @(($d->stok - $minimal) / $minimal) * 100;
            if (is_nan($a) || is_infinite($a)) {
              $sign = 0;
            } else {
              $sign = round($a, 2);            
            }
            if ($sign <= -5) {
              echo '<td style="background-color:#ff6347; color:white; border-radius: 5px;">' . $sign . '</td>';
            } else {
              echo '<td>' . round($sign, 2) . '</td>'; //sign
            }
            ?>
            <td>
              <?php
              $saran = (($d->leadtime * $d->rata3bln) * 2);
              echo $saran;
              ?>
            </td>
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