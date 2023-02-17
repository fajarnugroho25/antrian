        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $user = '';
        $pass = '';
        $nama = '';
        $nik = '';
        $status =  '1';
        $unit = '';
        $gudang = '';
        $admin_status =  '0';
        if (!empty($admin)) { 
        foreach ($admin as $row):
        $id = $row->id;    
        $user = $row->user;
        $nama = $row->nama;
        // $pass = $row->pass;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        $status =  $row->status;
        $unit = $row->unit_id;
        $gudang = $row->gudang_id;
        $unituser = $row->unituser;
        $admin_status =  $row->admin_status;
        endforeach;
        }
        ?> 
<script type="text/javascript">


  

</script>    


 <link href="<?php echo base_url(); ?>public/assets/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>public/assets/js/select2.min.js"></script>

<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Admin /  User</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>admin/<?php echo $aksi; ?>">
       
        
        <label>User Name</label>
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        <?php
        if ($aksi == 'perbarui'){echo ' <input type="text" id="user" name="user" value="'.$user.'" required readonly>';}
        else {echo '<input type="text"  id="user" name="user" value="'.$user.'" required>';}
        ?>

        

        <label>Nama Lengkap</label>          
        <input type="text" onkeyup="cek()" id="nama" name="nama" value="<?php echo $nama; ?>" required>  

        <label>Password</label>          
        <input type="password" onkeyup="cek()" id="pass" name="pass" value="">   




        <label>Nik</label>          
        <input type="text" onkeyup="cek()" id="nik" name="nik" value="<?php echo $nik; ?>" required>  

        <tr>
            <td>
                    <label><b>Unit Karyawan </b></label>
                </td>
                <td> </td>
                <td>
                    <select class="selectpicker" name='unitkary' id='unitkary' data-live-search="true">
                        <option value='' disabled selected>Unit Karyawan</option>
                        <?php
                     foreach ($cbunit as $uk) 
                     {
                      if ($uk->unit_id == $unituser) 
                        {echo '<option value="'.$uk->unit_id.'" selected >'.$uk->unit_id.' - '.$uk->unit_nama.'</option>';}
                    else 
                         {
                            echo '<option value="'.$uk->unit_id.'" >'.$uk->unit_id.' - '.$uk->unit_nama.'</option>';
                        }        
                    
                     }
                    ?>
                    </select>

                </td>
                <td>


            </tr>   


        <!-- <label><b>Bagian / Unit</b></label>

        <select name="unit_id[]" id="unit_id" multiple >

        <?php
         foreach ($cbunit as $cbunit) 
         {
          if ($cbunit->unit_id == $unit) 

            {echo '<option value="'.$cbunit->unit_id.'" selected >'.$cbunit->unit_nama.'</option>';}
        else 
             {echo '<option value="\''.$cbunit->unit_id.'\'" >'.$cbunit->unit_nama.'</option>';}        
        
         }
        ?>
        </select>
 -->
 
        <!-- <select name='unit_id' id='unit_id' required>
        <option value='' disabled selected>Pilih Unit</option> 

        <?php
         foreach ($cbunit as $cbunit) 
         {
          if ($cbunit->unit_id == $unit) 
            {echo '<option value="'.$cbunit->unit_id.'" selected >'.$cbunit->unit_nama.'</option>';}
        else 
             {echo '<option value="'.$cbunit->unit_id.'" >'.$cbunit->unit_nama.'</option>';}        
        
         }
        ?>
        </select> -->

        <br>
        <label><b>Gudang</b></label>

        <select name="gudang_id[]" id="gudang_id" multiple >

        <?php
         foreach ($cbgudang as $cbgudang) 
         {
          if ($cbgudang->gudang_id == $gudang) 
            {echo '<option value="'.$cbgudang->gudang_id.'" selected >'.$cbgudang->nama_gudang.'</option>';}
        else 
             {echo '<option value="'.$cbgudang->gudang_id.'" >'.$cbgudang->nama_gudang.'</option>';}        
        
         }
        ?>
        </select>





        
              
        <label><b>Admin</b></label>
        <input type="radio" id="admin_status" name="admin_status" value="1" <?php if ($admin_status=='1') {echo 'checked';} else  {echo '';}  ?> required> Admin &nbsp &nbsp &nbsp &nbsp 
        <input type="radio" id="admin_status" name="admin_status" value="0" <?php if ($admin_status=='0') {echo 'checked';} else  {echo '';}  ?> required> Non Admin </br></br>


        <label><b>Status</b></label>
        <input type="radio" id="status" name="status" value="1" <?php if ($status=='1') {echo 'checked';} else  {echo '';}  ?> required> Aktif &nbsp &nbsp &nbsp &nbsp 
        <input type="radio" id="status" name="status" value="0" <?php if ($status=='0') {echo 'checked';} else  {echo '';}  ?> required> Non Aktif </br></br>


        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan"  type="submit"><?php echo $button; ?> User / Admin</button>
           
        </div>
  </form>
      </div>
  </div>


  <script type="text/javascript">
 
$(document).ready(function() {
            $('#unit_id').select2({
                placeholder: "Pilih Unit",
                allowClear: true,
                language: "id"
            });
        });

$(document).ready(function() {
            $('#gudang_id').select2({
                placeholder: "Pilih Gudang",
                allowClear: true,
                language: "id"
            });
        });


  </script>


   