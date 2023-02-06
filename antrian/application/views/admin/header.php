<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My RSKI | RS Kasih Ibu Surakarta </title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap.css?ts=<?=time()?>">    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/lib/font-awesome/css/font-awesome.css">
    <script src="<?php echo base_url();?>public/lib/jquery-2.2.3.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/lib/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/js/autocomplete/jquery.autocomplete.js"></script>  
    

    
 </head>

  <body> 
    
    <div class="navbar"  >
        <div class="navbar-inner" >
            <div class="container-fluid" >
                <ul class="nav pull-right" >
                    
                    <li id="fat-menu" class="dropdown">
                    <a href="#" id="drop3" role="button" class="dr8opdown-toggle" data-toggle="dropdown">
                        <?php echo $this->session->nama; echo " On IP: "; echo $_SERVER['REMOTE_ADDR']; ?> 
                            <i class="icon-user"></i>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo base_url();?>login/editpassword/<?php echo $this->session->user_id;  ?>">Ganti Password</a></li>
                             <li><a tabindex="-1" href="<?php echo base_url();?>login/logout">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php echo base_url();?>home"><span class="first">My RSKI | </span> <span class="second">RS Kasih Ibu Surakarta</span></a>
            </div>
        </div>
    </div>
      <script src="<?php echo base_url();?>public/lib/bootstrap/js/bootstrap.js"></script>

