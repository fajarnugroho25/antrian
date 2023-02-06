 <!-- NEWS -->
<link href="<?=base_url()?>asset/user/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
     <section id="news" data-stellar-background-ratio="2.5">

          <div class="container">
               <div class="row">

                  <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>ALL Informasi Seputar RS Kasih Ibu</h2>
                         </div>
                    </div>
                    <div class="row">    
        <div class="col-xs-10 col-xs-offset-1">
          <form role="search" id="searchform" action="<?=base_url()?>index.php/cuserfront/search" method="get">
              <div class="input-group">
                <div class="input-group-btn search-panel">
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

                    <?php foreach ($berita as $key): ?>
                         
                    
                    <div class="col-md-4 col-sm-6">
                         <br><br>
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              
                                   <?php if ($key['konten_jenis'] =='1'): ?>
                                    <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" style="width: 100%; height: 350px"  class="img-responsive" alt="">
                                   <?php elseif ($key['konten_jenis'] =='2'): ?>
                                    <a href="<?=base_url()?>index.php/cuserfront/detailimage/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" style="width: 100%; height: 350px"  class="img-responsive" alt="">
                                   <?php elseif ($key['konten_jenis'] =='3'): ?>
                                    <a href="<?=base_url()?>index.php/cuserfront/detailBerita/<?=$key['k_id']?>">
                                        <img src="<?=base_url()?>asset/user/images/18383.jpg" style="width: 100%; height: 350px" class="img-responsive" alt="">
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
     </section>


     <script type="text/javascript">
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