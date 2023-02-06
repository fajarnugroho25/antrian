 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        </div>
      
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/cberita/tambahposting" ><i class="fa fa-pencil-square-o"></i> Input Berita</a></li>
                <li><a href="<?php echo base_url();?>index.php/cberita/tambahgambar"><i class="fa fa-pencil-square-o"></i> Input Image berita</a></li>
                <li><a href="<?php echo base_url();?>index.php/cberita/tambahfile"><i class="fa fa-pencil-square-o"></i> Input File Berita</a></li>
                <li><a href="<?php echo base_url();?>index.php/cberita/list_berita"><i class="fa fa-list"></i> List Berita</a></li>
          </ul>
        </li> 
        
        <?php if ($this->session->userdata('admin_status') == 1): ?>
         <li class="treeview">
          <a href="<?php echo base_url();?>index.php/ckategori/list_kategori">
            <i class="fa fa-file-text"></i> <span>Kategori</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        
          <li class="treeview">
          <a href="<?php echo base_url();?>index.php/cuser">
            <i class="fa fa-file-text"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
          
        <?php endif ?>
        
        <li class="treeview">
          <a href="<?php echo base_url();?>index.php/cslider">
            <i class="fa fa-file-text"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>index.php/clogin/logout">
            <i class="fa fa-power-off"></i> <span>Keluar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>