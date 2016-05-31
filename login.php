<?php
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */

require_once '../config.php';
//check if already logged in
if( $user->is_logged_in() ){ header('Location: index'); } 

//process login form if submitted
if(isset($_POST['submit'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if($user->login($username,$password)){ 

        //logged in return to index page
        header('Location: index');
        exit;
    

    } else {
        $message = '<p class="error">Wrong username or password</p>';
    }

}//end if submit

if(isset($message)){ echo $message; }

	  ?>

