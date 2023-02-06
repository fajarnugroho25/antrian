<!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
  <!DOCTYPE html>
<html lang="en">
<head>

     <title>E-employee</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?=base_url()?>asset/user/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?=base_url()?>asset/user/css/style.css">
     <script src="<?=base_url()?>asset/user/js/jquery.js"></script>

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?=base_url()?>asset/user/css/tooplate-style.css">

</head>

<style>

</style>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>




          <div class="loginmodal-container" >
               <div class="row">

                    <div class="">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form"  role="form" method="post" action="<?php echo base_url();?>index.php/clogin/masuk">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" style="text-align: center;">
                                   <h2>Login Admin</h2>
                              </div>

                                   
                                   <div class="">
                                        
                                        <label for="telephone">Username</label>
                                        <input type="text" id="user" name="username" placeholder="Username">
                                        <label for="Message">Password</label>
                                        <input type="password" id="pass" name="password" placeholder="Password">
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Masuk</button>
                                   </div>
                             
                        </form>
                    </div>

               </div>
          </div>
     </section>

     <script src="<?=base_url()?>asset/user/js/custom.js"></script>
 
     
    
</body>
</html>