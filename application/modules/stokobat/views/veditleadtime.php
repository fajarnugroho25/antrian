        <?php 


        $kode_brg   = '';
       
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $nama_dokter = '';
       
        if (!empty($obat)) { 
        foreach ($obat as $row):
        $kode_brg = $row->kode_brg;    
        $nama_brg = $row->nama_brg;
        $leadtime = $row->leadtime;
        $kodejadi = $row->kode_brg;  
       
        $titel   = 'Perbarui';
        $aksi   = 'perbaruileadtime';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 
<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Leadtime</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>stokobat/<?php echo $aksi; ?>">

        <table >
          <tr>
            <td>
                <label><b>Kode Barang</b></label>
            </td>
            <td> &nbsp  &nbsp</td>
            <td>
              <input type="text" name='kode_brg' class="form-control" value="<?= $kodejadi; ?>" readonly>
            </td>
          </tr>
          <tr> 
            <td>
                <label><b>Nama Barang</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="nama_brg" name="nama_brg" value="<?php echo $nama_brg; ?>" required  readonly>
            </td>
          </tr>
          <tr> 
            <td>
                <label><b>Lead Time</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="leadtime" name="leadtime" value="<?php echo $leadtime; ?>" required>
            </td>
          </tr>
       </table>

      
       
                

       
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Leadtime</button>
            
        </div>
	</form>
      </div>
  </div>


   