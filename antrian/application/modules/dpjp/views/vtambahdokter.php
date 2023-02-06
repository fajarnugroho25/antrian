        <?php 


        $id   = '';
       
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $nama_dokter = '';
       
        if (!empty($dokter)) { 
        foreach ($dokter as $row):
        $id = $row->id;    
        $nama_dokter = $row->nama_dokter;
        $kodejadi = $row->id;  
       
        $titel   = 'Perbarui';
        $aksi   = 'perbaruidokter';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 
<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Dokter</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>dpjp/<?php echo $aksi; ?>">

        <table >
          <tr>
            <td>
                <label><b>Kode Dokter</b></label>
            </td>
            <td> &nbsp  &nbsp</td>
            <td>
              <input type="text" name='id' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
          </tr>
          <tr> 
            <td>
                <label><b>Nama Dokter</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="nama_Dokter" name="nama_dokter" value="<?php echo $nama_dokter; ?>" required>
            </td>
          </tr>
       </table>

      
       
                

       
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Dokter</button>
            
        </div>
	</form>
      </div>
  </div>


   