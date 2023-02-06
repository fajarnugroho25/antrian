        <?php      

        $nama='';
      
        foreach ($dokter as $row):         
        
        $titel   = 'Perbarui';
        $aksi   = 'persetujuan';
        $button   = 'Perbarui';

        $id = $row->id_registrasi_periksa;  
        $no_rm = $row->no_rm;
        $nama_poli = $row->nama_poli;
        $nama_dokter = $row->nama_dokter;
        $keterangan = $row->keterangan;
        $status_persetujuan = $row->status_persetujuan;

        endforeach;
      
        ?> 
<div class="span10">
       <h3 class="page-title">Form Konfirmasi Pesanan</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>index.php/pesanan/<?php echo $aksi; ?>">

        <table >
          <tr>
            <td>
                <label><b>Kode Pemesanan</b></label>
            </td>
            <td> &nbsp  &nbsp</td>
            <td>
              <input type="text" name='id' class="form-control" value="<?= $id; ?>" readonly>
            </td>
          </tr>

          <tr> 
            <td>
                <label><b>No RM</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="no_rm" name="no_rm" value="<?= $no_rm; ?>" readonly>
                
            </td>
          </tr>
          <tr>
                <td>
                    <label><b>Nama Pasien</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="nama" name="nama"   readonly required>
                </td>    
            </tr> 
            <tr>
                <td>
                    <label><b>Alamat</b></label>
                </td>
                <td></td>
                <td>
                    <input type="text" id="alamat" name="alamat"  readonly required>
                </td>    
            </tr> 
          <tr> 
            <td>
                <label><b>Poli</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="nama_poli" name="nama_poli" value="<?= $nama_poli; ?>" readonly>
            </td>
          </tr>
          <tr> 
            <td>
                <label><b>Dokter</b></label>
            </td>
            <td> &nbsp &nbsp</td>
            <td>
                <input type="text" id="nama_dokter" name="nama_dokter" value="<?= $nama_dokter; ?>" readonly>
            </td>
          </tr>
          <tr>
                <td>
                    <hr>
                </td>
                <td><hr></td>
                <td>
                   <hr>
                </td>  
          </tr>    
          <tr>
                <td>
                    <label><b>Keterangan</b></label>
                </td>
                <td></td>
                <td>
                    <textarea id="keterangan" name="keterangan"  rows="4" ><?php echo $keterangan; ?></textarea> 
                   
                </td>    
            </tr>
            <tr>
                <td>
                    <label><b>Persetujuan</b></label>
                </td>
                <td> &nbsp &nbsp</td>
                <td>
                    <input type="radio" id="status_persetujuan" name="status_persetujuan" value="Ditolak" <?php if ($status_persetujuan=='Ditolak') {echo 'checked';} else  {echo '';}  ?> required > Tolak &nbsp &nbsp &nbsp &nbsp 
                     <input type="radio" id="status_persetujuan" name="status_persetujuan" value="Disetujui" <?php if ($status_persetujuan=='Disetujui') {echo 'checked';} else  {echo '';}  ?> required > Terima 
                   

                </td>    
            </tr>

          
       </table>

        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit">Simpan</button>
            
        </div>
	</form>
      </div>
  </div>

<script type="text/javascript">
 


$(document).ready(function(){
    $('#id').ready(function(){
        var datas = {
            no_rm: $('#no_rm').val(),
           
        }
    
            url = "<?php echo site_url() . '/pesanan/cek_hisys'; ?>";
            // do_upload
            $.ajax({
                url:url,
                data:datas,
                dataType:"TEXT",
                type:"POST",
                success:function(data){
                  obj =  JSON.parse(data)
                  console.log(obj.nama);
                  $('#nama').val(obj.nama);
                  $('#alamat').val(obj.alamat);
                  $('#tgl_lahir').val(obj.tgl_lahir);

                  if (obj.jenis_kelamin == 'L') {
                   document.getElementById("kelamin1").checked = true;
                    }
                else{
                    document.getElementById("kelamin2").checked = true;
                    }
                  
                  $('#telp').val(obj.telp);
                  

        
                },
                error:function(){
                    
                }
            });

            
        // }

  });
            });
</script>

   