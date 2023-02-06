<!-- NEWS DETAIL -->

<style type="text/css">
     .embed-responsive {
    position: relative;
    display: block;
    height: 0;
    padding: 0;
    overflow: hidden;
}
</style>
     <section id="news-detail" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-8 col-sm-7">
                         <!-- NEWS THUMB -->
                         <div class="news-detail-thumb" >
                              <h3><?=$detail['judul']?></h3>
                              <h5><?=$detail['nama_kategori']?></h5>
                              
                             <?php foreach ($image as $key ): ?>
                                <img src="<?=base_url()?>asset/img/<?=$key['nama_image']?>"   class="img-responsive" alt=""><br>
                             <?php endforeach ?>
                                
                                  
                            
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-5">
                         <div class="news-sidebar">
                      

                              <div class="recent-post">
                                   <h4>Recent Posts</h4>
                                        <?php foreach ($random as $key ): ?>
                                             
                                        
                                        <div class="media">
                                             <div class="media-object pull-left">

                                        
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
                                             <div class="media-body">
                                                  <h4 class="media-heading">
                                                    <?php if ($key['konten_jenis'] =='2'): ?>
                                                      <a href="<?=base_url()?>index.php/cuserfront/detailimage/<?=$key['k_id']?>"><?=$key['judul']?></a>
                                                    <?php else: ?>
                                                      <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>"><?=$key['judul']?></a>
                                                    <?php endif ?>
                                                  </h4>
                                                  <span><?=$key['months']?> <?=$key['days']?>, <?=$key['years']?> </span>
                                             </div>
                                        </div>
                                        <?php endforeach ?>

                                        
                              </div>

                      
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>

