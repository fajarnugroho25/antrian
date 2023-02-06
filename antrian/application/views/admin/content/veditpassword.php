        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $user = '';
        $pass = '';
        $status =  '1';
        $admin_status =  '0';
        if (!empty($admin)) { 
        foreach ($admin as $row):
        $id = $row->id;    
        $user = $row->user;
        //$pass = $row->pass;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        $status =  $row->status;
        $admin_status =  $row->admin_status;
        endforeach;
        }
        ?> 
<script type="text/javascript">

    window.onload = function () {
     if(document.getElementById("pass").value==="") { 
            document.getElementById('simpan').disabled = true; 
        } else { 
            document.getElementById('simpan').disabled = false;
        }
    }

   function cek() {
     if(document.getElementById("pass").value==="") { 
            document.getElementById('simpan').disabled = true; 
        } else { 
            document.getElementById('simpan').disabled = false;
        }
    }

    function showpass() {
    var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } 

</script>        
<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> password</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>admin/editpass">
       
        
        <label>Nama User</label>
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        <input type="text" id="nama" name="user" value="<?= $user?>" required readonly>
        

        <label>Password</label>          
        <input type="password" onkeyup="cek()" id="pass" name="pass" value="" required>		
        <input type="checkbox" onclick="showpass()"> Show Password 
      

        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan"  type="submit"><?php echo $button; ?> User / Admin</button>
           
        </div>
	</form>
      </div>
  </div>


   