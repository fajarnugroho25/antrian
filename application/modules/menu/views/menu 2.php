    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span2" >
                <div class="sidebar-nav"  >

               
                           <?php foreach ($menu_list as $b){ ?> 
                            <div class="nav-header collapsed"  data-toggle="collapse" data-target="#dashboard-menu<?php echo $b->menu; ?>"><?php echo $b->menu; ?></div>
                                <ul  id="dashboard-menu<?php echo $b->menu; ?>" class="nav nav-list  collapse">                   
                                   <?php foreach ($submenu_list as $a){ 
                                      if($a->menu_id == $b->menu_id){ ?>
                                      <li><a href="<?php echo base_url();?><?php echo $a->submenu_link; ?>"><?php echo $a->submenu; ?></a></li>

                                   <?php ;}} ?> 
                                </ul> 
                           <?php } ?>                         
                  
            </div>
        </div>


