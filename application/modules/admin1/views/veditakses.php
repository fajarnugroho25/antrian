        <?php 
        $atribut_popup = array(
            'width' => '600',
            'height' => '400',
            'scrollbars' => 'yes',
            'status' => 'no',
            'resizable' => 'no',
            'screenx' => '100',
            'screeny' => '30'
        );
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $user = '';
        //$pass = '';
        $akses = '';
        $akses_item = '';
        $status =  '1';
        $admin_status =  '0';
        if (!empty($admin)) { 
        foreach ($admin as $row):
        $id = $row->id;    
        $user = $row->user;
        $akses = $row->akses;    
        $akses_item = $row->akses_item;
        //$pass = $row->pass;
        $titel   = 'Perbaruiakses';
        $aksi   = 'perbaruiakses';
        $button   = 'Perbaruiakses';
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

    $(function() {
      $('#btnLaunch').click(function() {
        $('#myModal').modal('show');
      });

      $('#btnSave').click(function() {
        var value = $('input').val();
        $('h1').html(value);
        $('#myModal').modal('hide');
      });
    });

function updateSubMenu() {     
   var allVals = [];
   $('.taglistsub :checked').each(function(i) {
          
       allVals.push(("\'")+ $(this).val() +("\'"));
   });
   $('#akses_item').val(allVals).attr('rows',allVals.length) ;
    
   }
   $(function() {
      $('.taglistsub input').click(updateSubMenu);
      updateSubMenu();
});

function updateMenu() {     
   var allVals = [];
   $('.taglistmenu :checked').each(function(i) {
          
       allVals.push(("\'")+ $(this).val() +("\'"));
   });
   $('#akses').val(allVals).attr('rows',allVals.length) ;
    
   }
   $(function() {
      $('.taglistmenu input').click(updateMenu);
      updateMenu();
});

</script>        
<div class="span10">
       <h3 class="page-title"><?php echo $titel; ?> Admin /  User</h3>
       <h1></h1>
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>admin/<?php echo $aksi; ?>">
       
        
        <label><b>Nama User</b></label>
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        <input type="text" id="nama" name="user" value="<?php echo $user; ?>" required readonly>
             
        
        <label><b>Grup</b></label>        
        <input type="hidden" id="akses" name="akses" value="<?php echo $akses; ?>"> 
        
        <div class="taglistmenu">
        <?php  foreach ($data_menu as $a){
                
            $checked='';
            $menu_data = explode(',', $akses);
            $arrlength = count($menu_data);

            for($n = 0; $n < $arrlength; $n++) {
                $mm = substr($menu_data[$n],1,1);
                //echo $mm ;

                if($mm == $a->menu_id){
                    $checked = "checked";
                }
                       
            }

            $y = "$a->menu_id";
         echo " <input type='checkbox' value='$y' name='data_menu' id='data_menu'  ".$checked." > $a->menu_id - $a->menu <br>";
       
        }
        ?>
        </div>
        <br>    

        <label><b>Menu</b></label>       
        <input type="hidden" id="akses_item" name="akses_item" value="<?php echo $akses_item; ?>"> 

          <?php foreach ($data_menu as $b){ 

                   $checked='';
                      $menu_data = explode(',', $akses);
                      $arrlength = count($menu_data);

                        for($x = 0; $x < $arrlength; $x++) {
                        $mm = substr($menu_data[$x],1,1);
                        //echo $mm ;

                        if($mm == $b->menu_id){
                            $checked = "checked";
                            //continue;
                        }          
                   
                        }
                          $y = "$b->menu_id";
                          if($b->menu_id == $b->menu_id){
                           
                            echo " $b->menu_id - $b->menu <br>";
                           

                          }
            
                   foreach ($data_submenu as $a){                     
                   
                      $checked='';
                      $submenu_data = explode(',', $akses_item);
                      $arrlength = count($submenu_data);

                        for($x = 0; $x < $arrlength; $x++) {
                        $sm = substr($submenu_data[$x],1,4);
                        //echo $sm ;

                        if($sm == $a->submenu_id){
                            $checked = "checked";
                            //continue;
                        }          
                   
                        }
                          $y = "$a->submenu_id";
                          if($a->menu_id == $b->menu_id){
                            echo "<div class='taglistsub'>";
                             echo "<ul class='nav nav-list collapse in'>"; 
                            echo " <input type='checkbox' value='$y' name='data_submenu' id='data_submenu'  ".$checked." > $a->submenu_id - $a->submenu <br>";
                            echo "</div>";

                          }
                      } ?> 
                    </ul> 
           <?php } ?>   

        <br>
       


        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan"  type="submit"><?php echo $button; ?> User / Admin</button>
           
        </div>
	</form>
      </div>
  </div>
       

   