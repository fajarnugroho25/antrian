
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Login</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/theme.css">

   
 </head>

  <body> 
  <div class="container">
    <div class="login-container">
            <div id="output"></div>
            <div>Login E-Employee</div>
            <br>
            <div class="form-box">
                <form method="post" action="<?php echo base_url();?>index.php/clogin/masuk" id="loginform">
                    <input type="text" id="user" name="username" class="required span12" placeholder="username" required>
                    <input type="password" id="pass" name="password" class="span12" placeholder="password" required>
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
        </div>
        
</div>

  </body>
</html>



