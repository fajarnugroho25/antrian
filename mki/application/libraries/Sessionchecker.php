<?php  
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Sessionchecker 
{ 

  // cek jika user masih login
  function checkloggedin(){ 
      $CI =& get_instance(); 
      $session = $CI->session->userdata(); 
      $loggedin = isset($session['login']); 
        if ($loggedin==false) { 
          redirect('clogin'); 
      } 
 } 

  // cek jika user memiliki akses terbatas
  function CheckHakAkses(){ 
	   $CI =& get_instance();
	   $status = $CI->session->userdata('admin_status');
		    if( $status == 2 ){
    	   redirect('clogin/notAccess');
  }
 } 


  
} 

?>