<?php
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//log user out
$user->logout();
header('Location: index'); 
?>
