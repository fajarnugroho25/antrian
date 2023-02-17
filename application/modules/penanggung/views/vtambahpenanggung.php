        <?php 


        $id   = '';
       
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $nama_penanggung = '';
       
        if (!empty($penanggung)) { 
        foreach ($penanggung as $row):
        $id_penanggung = $row->id_penanggung;    
        $nama_penanggung = $row->nama_penanggung;
        $kodejadi = $row->id_penanggung;  
       
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 
<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Penanggung</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>penanggung/<?php echo $aksi; ?>">

        <table >
          <tr>
            <td>
                <label><b>Kode Penanggung</b></label>
            </td>
            <td> &nbsp  &nbsp</td>
            <td>
              <input type="text" name='id_penanggung' id='id_penanggung' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
          </tr>
          <tr> 
            <td>
                <label><b>Nama Penanggung</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="nama_penanggung" name="nama_penanggung" value="<?php echo $nama_penanggung; ?>" required>
            </td>
          </tr>
       </table>

      
       
                

       
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Penanggung</button>
            
        </div>
	</form>
      </div>
  </div>


   