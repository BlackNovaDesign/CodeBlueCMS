<?php 
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }

//show message from add / edit page
if(isset($_GET['deluser'])){ 

    //if user id is 1 ignore
    if($_GET['deluser'] !='1'){

        $stmt = $db->prepare('DELETE FROM core_users WHERE id = :memberID') ;
        $stmt->execute(array(':memberID' => $_GET['deluser']));

        header('Location: users?action=deleted');
        exit;

    }
} 

?>





