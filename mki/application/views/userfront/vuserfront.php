<link href="<?=base_url()?>asset/user/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?=base_url()?>asset/user/css/responsive.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="<?=base_url()?>asset/user/css/lightbox.min.css">
<script src="<?=base_url()?>asset/user/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>asset/user/bootstrap.min.js" type="text/javascript"></script>
       
<script src="<?=base_url()?>asset/user/instafeed.min.js" type="text/javascript"></script>


 <div class="modal fade" id="detailusers">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <?php foreach ($popup as $key): ?>
                  
                
                <img style="width:100%; height: 100%"src="<?=base_url()?>asset/popup/<?=$key['name_file']?>">
                <?php endforeach ?>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row ">
                <!-- url(http://rskasihibu.com/wp-content/uploads/2018/02/PhotoGrid_1519633157048.jpg) -->
              <div id="myCarousel1" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->

                <ol class="carousel-indicators">
                    <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel1" data-slide-to="1"></li>
                    <li data-target="#myCarousel1" data-slide-to="2"></li>
                    <li data-target="#myCarousel1" data-slide-to="3"></li>
                    <li data-target="#myCarousel1" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="item active"> <img src="<?=base_url()?>asset/user/images/1.jpg" style="width:100%; height: 800px" alt="First slide">
                        
                    </div>
                    <div class="item"> <img src="<?=base_url()?>asset/user/images/2.jpg" style="width:100%; height: 800px" alt="Second slide">
                       
                    </div>
                    <div class="item"> <img src="<?=base_url()?>asset/user/images/3.jpg" style="width:100%; height: 800px" alt=" Third slide">
                       
                    </div>
                    <div class="item"> <img src="<?=base_url()?>asset/user/images/4.jpg" style="width:100%; height: 800px" alt=" Third slide">
                       
                    </div>
                    <div class="item"> <img src="<?=base_url()?>asset/user/images/IMG_0133.jpg" style="width:100%; height: 800px" alt=" Third slide">
                       
                    </div>
                    

                </div>
                <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> <img src="<?=base_url()?>asset/user/images/icons/left-arrow.png" onmouseover="this.src = '<?=base_url()?>asset/user/images/icons/left-arrow-hover.png'" onmouseout="this.src = '<?=base_url()?>asset/user/images/icons/left-arrow.png'" alt="left"></a>
                <a class="right carousel-control" href="#myCarousel1" data-slide="next"><img src="<?=base_url()?>asset/user/images/icons/right-arrow.png" onmouseover="this.src = '<?=base_url()?>asset/user/images/icons/right-arrow-hover.png'" onmouseout="this.src = '<?=base_url()?>asset/user/images/icons/right-arrow.png'" alt="left"></a>

            </div>

               </div>
          </div>
     </section>



     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info"  >
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s" align="center" style="padding-top: 60px;">Selamat Datang <br>di E-employee </h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s" align="center" >
                                   <p style="color: black"><mark>Sarana untuk mendapatkan informasi yang dapat diakses oleh seluruh karyawan rumah sakit kasih ibu.</mark></p>
                                   
                              </div>
                              
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>



  


     <!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Update Informasi Seputar RS Kasih Ibu</h2>
                         </div>
                    </div>
       <div class="col-xs-10 col-xs-offset-1">
          <form role="search" id="searchform" action="<?=base_url()?>index.php/cuserfront/search" method="get">
              <div class="input-group">
                <div class="input-group-btn search-panel">
                    <!-- <select class="btn btn-default dropdown-toggle">
                         <option></option>
                    </select> -->

                    <select class="btn btn-default dropdown-toggle" id="Kategori_name" name="Kategori_name" style="height: 34px" >
                         <option>--Kategori--</option>

                    </select>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="search" placeholder="Cari judul...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
            </form>
        </div>
         </div>
         <br>
     
                    <?php foreach ($berita as $key): ?>
                         
                    
                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              
                                   <?php if ($key['konten_jenis'] =='1'): ?>
                                    <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" style="width: 100%; height: 350px"  class="img-responsive" alt="">
                                   <?php elseif ($key['konten_jenis'] =='2'): ?>
                                    <a href="<?=base_url()?>index.php/cuserfront/detailimage/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" style="width: 100%; height: 350px" class="img-responsive" alt="">
                                   <?php elseif ($key['konten_jenis'] =='3'): ?>
                                    <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" style="width: 100%; height: 350px"  class="img-responsive" alt="">
                                   <?php endif ?>
                                   <!-- <img src="images/news-image1.jpg" class="img-responsive" alt=""> -->
                              </a>
                              <div class="news-info" style="height: 300px">
                                  
                                   
                                   
                                   <h3>

                                    <?php if ($key['konten_jenis'] =='2'): ?>
                                      <a href="<?=base_url()?>index.php/cuserfront/detailimage/<?=$key['k_id']?>"><?=$key['judul']?></a>
                                      <?php else: ?>
                                        <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>"><?=$key['judul']?></a>
                                    <?php endif ?>
                                    </h3>
                                   <span><?=$key['months']?> <?=$key['days']?>, <?=$key['years']?> </span>
                                  
                                        <p></p>
                                   <div class="author">
                                        <img src="<?=base_url()?>asset/img/user.png" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5><?=$key['usr']?></h5>
                                             <p><?=$key['nama_kategori']?></p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                  <?php endforeach ?>

               </div>
          </div>


          <div><br><br><a href="<?=base_url()?>index.php/cuserfront/AllBerita" class="section-btn btn btn-default smoothScroll">Semua Berita</a></div>
     </section>


     <script type="text/javascript">

      $('#detailusers').modal('show');

          loadKategori();
          function loadKategori() {
        jQuery(document).ready(function () {
            var kategori_id = {"kategori_id": $('#Kategori_name').val()};
            var idKategori;
            $.ajax({
                type: "POST",
                dataType: "json",
                data: kategori_id,
                url: "<?= base_url()?>index.php/ckategori/getKategori",
                success: function (data) {
                    $('#Kategori_name').html('<option value="">Kategori</option>');
                    $.each(data, function (i, data) {
                        // console.log(data);
                        $('#Kategori_name').append("<option value='" + data.id_kategori + "'>" + data.nama_kategori + "</option>");
                        return idKategori = data.id;
                    });
                }
            });


            $('#Kategori_name').change(function () {
                kategori_id = {"kategori_id": $('#Kategori_name').val()};
            })

        })
    };

    function searchkategori(){
     var datas = {
            kategori : $('select[name=Kategori_name]').val(),
           
        }

            $.ajax({
                data: datas,
                type: "GET",
                url: "<?php echo base_url();?>index.php/cuserfront/searchfilter",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {                                 
                }
            });
    }



     </script>