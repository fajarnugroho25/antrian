<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Pendaftaran Android</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap.css?ts=<?=time()?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/lib/font-awesome/css/font-awesome.css">
    <script src="<?php echo base_url();?>public/lib/jquery-1.8.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/lib/jquery.validate.min.js"></script>
    <link rel="manifest" href="<?php echo base_url();?>public/assets/manifest.json">


 </head>

  <body>

    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">

                    <li id="fat-menu" class="dropdown">
                    <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $this->session->user_name; ?>
                            <i class="icon-user"></i>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo base_url();?>index.php/login/logout">Logout</a></li>
                        </ul>
                    </li>

                </ul>
                <a class="brand" href="#"><span class="first">Admin Pendaftaran Android </span> <span class="second"></span></a>
            </div>
        </div>
    </div>
      <script src="<?php echo base_url();?>public/lib/bootstrap/js/bootstrap.js"></script>


<script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.5.2/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.5/firebase-messaging.js"></script>

<script src="https://www.gstatic.com/firebasejs/5.5.5/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDeN_b46aR6gbq-taZdT9rLlY6ei8tpNnU",
    authDomain: "rskisolo.firebaseapp.com",
    databaseURL: "https://rskisolo.firebaseio.com",
    projectId: "rskisolo",
    storageBucket: "rskisolo.appspot.com",
    messagingSenderId: "24979868269"
  };
  firebase.initializeApp(config);




  const messaging = firebase.messaging();
  messaging.requestPermission()
  .then(function(){
    console.log("have permission ");
    return messaging.getToken();
  })

  .then(function(token){
    console.log(token);
  })

  .catch(function(err){
    console.log('error');
  })


messaging.onMessage(function(payload){
    console.log("onMessage:", payload);
})

// function pushNotif() {
//         // console.log(abcde);


//         $.ajax({

//         url: base_url + 'index.php/chat/sendpushnotification',

//         type: "POST",

//         // data: datas,

//         dataType: "text",

//         success: function(data)

//         {
//             console.log(data);


//         },

//         error: function(err)

//         {

//         }

//       });

//     }

//  pushNotif();


</script>




