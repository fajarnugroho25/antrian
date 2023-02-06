  <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="<?=base_url()?>index.php/cuserfront" ><img style="width: 150px;" src="<?=base_url()?>asset/user/images/logonama.png"></a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="<?=base_url()?>index.php/cuserfront#about" style="color:black; font-size: 16px" class="smoothScroll">Beranda</a></li>
                         <li><a href="<?=base_url()?>index.php/cuserfront#about" style="color:black; font-size: 16px" class="smoothScroll">Tentang Kami</a></li>
                         <li><a href="<?=base_url()?>index.php/cuserfront#news" style="color:black; font-size: 16px" class="smoothScroll">Update Informasi</a></li>
                        
                         <?php if ($this->session->userdata('login') == TRUE && $this->session->userdata('status_user') =='1'): ?>
                              <li><a href="<?=base_url()?>index.php/cberita" class="smoothScroll">Dashboard</a></li>
                              <li class="appointment-btn"><a href="<?=base_url()?>index.php/clogin/logout">Keluar</a></li>
                          <?php elseif ($this->session->userdata('login') == TRUE): ?>
                          <li class="appointment-btn"><a href="<?=base_url()?>index.php/clogin/logout">Keluar</a></li>
                         
                         <?php endif ?>
                         
                    </ul>
               </div>

          </div>
     </section>