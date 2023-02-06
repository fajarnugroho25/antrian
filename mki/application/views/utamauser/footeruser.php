     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Hubungi Kami</h4>
                             

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 0271-7114422</p>
                                   
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Acak Informasi</h4>
                              <?php foreach ($random as $key): ?>
                                   
                              
                              <div class="latest-stories">
                                   <div class="stories-image">
                                   <?php if ($key['konten_jenis'] =='1'): ?>
                                        <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" class="img-responsive" alt=""></a>

                                   <?php elseif ($key['konten_jenis'] =='2'): ?>
                                        <a href="<?=base_url()?>index.php/cuserfront/detailimage/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" class="img-responsive" alt=""></a>
                                       
                                   <?php elseif ($key['konten_jenis'] =='3'): ?>
                                        <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" class="img-responsive" alt="">
                                        <?php endif ?>
                                   </a>
                                   </div>
                                   <div class="stories-info">
                                        <?php $judul = substr($key['judul'], 0, 30); ?>
                                        <?php if ($key['konten_jenis'] =='2'): ?>
                                             <a href="<?=base_url()?>index.php/cuserfront/detailimage/<?=$key['k_id']?>"><h5> <?=$judul?>...</h5></a>
                                        <?php else: ?>
                                             <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>"><h5> <?=$judul?>...</h5></a>
                                        <?php endif ?>
                                                    
                                        <span><?=$key['months']?> <?=$key['days']?>, <?=$key['years']?> </span>
                                   </div>
                              </div>
                              <?php endforeach ?>

                              
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Alamat RS Kasih Ibu Surakarta</h4>
                                   <p>Jl. Slamet Riyadi 404 Surakarta</p>
                                  
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com/rskasihibusolo/" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="https://www.instagram.com/rskasihibu_solo/" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                             
                         </div>
                      
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     

<script src="<?=base_url()?>asset/user/js/bootstrap.min.js"></script>
           <script src="<?=base_url()?>asset/user/js/jquery.sticky.js"></script>
     <script src="<?=base_url()?>asset/user/js/jquery.stellar.min.js"></script>
     <script src="<?=base_url()?>asset/user/js/wow.min.js"></script>
     <script src="<?=base_url()?>asset/user/js/smoothscroll.js"></script>
     
    
</body>
</html>