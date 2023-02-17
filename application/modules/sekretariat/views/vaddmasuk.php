<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/DataTables/media/css/dataTables.bootstrap.css">



<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>public/assets/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/responsive.dataTables.min.css">

<div class="span10">
    <h3 class="page-title">Pengajuan Surat Masuk</h3>

    

    <div class="well">
        <form id="user" method="post" action="<?php echo base_url(); ?>sekretariat/generatemasuk ">

            <table>
                <!-- <input type="hidden" name='tgl_input' class="form-control" value="<?= $tgl_input; ?>" readonly> -->
                <!-- <input type="hidden" name='status' class="form-control" value="<?= $status; ?>" readonly>-->

                
                <tr>
                    <td>
                        <label><b>Tanggal Surat</b></label>
                    </td>
                    <td></td>
                    <td>
                       <input type="date" name="tgl_surat" id="tgl_surat" required>
                   </td>
               </tr>

               <tr>
                <td>
                    <label><b>Nomor Surat</b></label>
                </td>
                <td></td>
                <td>
                   <input type="text" name="no_surat" id="no_surat" required>
               </td>
           </tr>

           <tr>
            <td>
                <label><b>Asal Surat</b></label>
            </td>
            <td></td>
            <td>
             <input type="text" name="asal_surat" id="asal_surat" required>
         </td>
     </tr>

     <tr>
        <td>
            <label><b>Perihal</b></label>
        </td>
        <td></td>
        <td>
         <input type="text" name="perihal" id="perihal" required>
     </td>
 </tr>

 <tr>
    <td>
        <label><b>Tanggal Diterima</b></label>
    </td>
    <td></td>
    <td>
     <input type="date" name="tgl_terima" id="tgl_terima" required>
 </td>
</tr>

<tr>
    <td>
        <label><b>Disposisi</b></label>
    </td>
    <td></td>
    <td>  
        <?php $a = count($sekretariat);
        foreach ($sekretariat as $s) { ?>

            <input type="checkbox" name="disposisi[]" value="<?php echo $s->nama_bagian; ?>">

            <?php echo $s->nama_bagian; ?> <br>
        <?php } ?>
        <input type="checkbox" onclick="var input = document.getElementById('name2'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}" />Lainnya, 
        <input id="name2" name="disposisi[]" disabled="disabled"/>

  </tr>

  <tr>

    <td>
        <label><b>Keterangan</b></label>
    </td>
    <td></td>
    <td>
        <input type="text" name="keterangan" id="ketrangan" reqiured>
    </td>
</tr>

<tr>
    <td>
        <label><b>Status</b></label>
    </td>
    <td></td>
    <td>
        <select name='status' id='status' required>
            <option value='Perlu Tindak Lanjut' >Perlu Tindak Lanjut</option>
            <option value='Selesai' >Selesai</option>
        </select>
    </td>
</tr>

</table>
<div style="padding-top:20px">
    <button class="btn btn-primary" id="simpan" type="submit">
    Submit</button>


</div>
</form>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.data').DataTable();
    });
</script>

</div> 

