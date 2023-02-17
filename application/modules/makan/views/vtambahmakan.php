<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<meta http-equiv="refresh" content="60" >
<?php

date_default_timezone_set('Asia/Jakarta');
$id   = '';
$waktu = date("Y-m-d H:i:s");
$titel   = 'Tambah';
$aksi   = 'tambah';
$button   = 'Simpan';
$nik = '';
$keterangan = 'Reguler';

if (!empty($penanggung)) {
  foreach ($penanggung as $row) :
    $id_trans = $row->id_trans;
    $nik = $row->nik;

    $kodejadi = $row->id_penanggung;

    $titel   = 'Perbarui';

    $button   = 'Perbarui';
  endforeach;
}
?>
<div class="span10">
  <h3 class="page-title"><?php echo $titel; ?> Absensi Makan</h3>

  <div class="well">
    <form id="user" method="post" action="<?php echo base_url(); ?>makan/addmakan">

      <table>
        <tr>
          <td>
            <label><b>Kode </b></label>
          </td>
          <td> &nbsp &nbsp</td>
          <td>
            <input type="text" name='id_trans' id='id_trans' class="form-control" value="<?= $kodejadi; ?>" readonly>
          </td>
        </tr>
        <tr>
          <td>
            <label><b>NIK </b></label>
          </td>
          <td> &nbsp &nbsp</td>
          <td>
            <input type="text" id="nik" name="nik" value="<?php echo $nik; ?>" autofocus="autofocus" required>
          </td>
        </tr>
        

        <input type="hidden" name='waktu' class="form-control" value="<?= $waktu; ?>" readonly>
        <input type="hidden" name='keterangan' class="form-control" value="<?= $keterangan; ?>" readonly>
      </table>


      <div style="padding-top:20px">
        <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> </button>

      </div>
    </form>

  </div>
  <div class="well">

    <table id="absensi" class="table table-striped table-bordered ">
      <thead>
        <tr>
          <th>No</th>
          <th>ID</th>
          <th>Nik</th>
          <th>Nama</th>
          <th>Waktu</th>
          <th>Keterangan</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($makan as $d) { ?>
          <tr>
            <th></th>
            <td><?php echo $d->id_trans; ?></td>
            <td><?php echo $d->absnik; ?></td>
            <td><?php echo $d->nama; ?></td>
            <td><?php echo $d->waktu; ?></td>
            <td><?php echo $d->keterangan; ?></td>

          </tr>
        <?php } ?>
      </tbody>
    </table>


  </div>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.data').DataTable();
  });


</script>