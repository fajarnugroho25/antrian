        <?php 


        $id   = '';
       
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $nama_operasi = '';
       
        if (!empty($operasi)) { 
        foreach ($operasi as $row):
        $id = $row->id;    
        $nama_operasi = $row->nama_operasi;
        $kodejadi = $row->id;  
       
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 
<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Operasi</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>operasi/<?php echo $aksi; ?>">         


       <table >
        <tr>
            <td>
                 <label><b>Kode Operasi</b></label>
            </td>
             <td> &nbsp  &nbsp</td>
            <td>
                <input type="text" name='id' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
        </tr>
       <tr>
            <td>
                 <label><b>Nama Operasi</b></label>
            </td>
             <td> &nbsp  &nbsp</td>
            <td>
               <input type="text" id="nama_operasi" name="nama_operasi" value="<?php echo $nama_operasi; ?>" required>
            </td>
</tr>
       </table>   
       
       
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Operasi</button>
            
        </div>
	</form>
      </div>
  </div>


   