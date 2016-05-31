<?php 
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }

    //if form has been submitted process it
    if(isset($_POST['submit'])){

        //collect form data
        extract($_POST);

        //very basic validation
        if($username ==''){
            $error[] = 'Please enter the username.';
        }

        if( strlen($password) > 0){

            if($password ==''){
                $error[] = 'Please enter the password.';
            }

            if($passwordConfirm ==''){
                $error[] = 'Please confirm the password.';
            }

            if($password != $passwordConfirm){
                $error[] = 'Passwords do not match.';
            }

        }
        

        if($email ==''){
            $error[] = 'Please enter the email address.';
        }

        if(!isset($error)){

            try {

                if(isset($password)){

                    $hashedpassword = $user->create_hash($password);

                    //update into database
                    $stmt = $db->prepare('UPDATE core_users SET user_name = :username, pwd = :password, user_email = :email WHERE id = :memberID') ;
                    $stmt->execute(array(
                        ':username' => $username,
                        ':password' => $hashedpassword,
                        ':email' => $email,
                        ':memberID' => $memberID
                    ));


                } else {

                    //update database
                    $stmt = $db->prepare('UPDATE core_users SET user_name = :username, user_email = :email WHERE id = :memberID') ;
                    $stmt->execute(array(
                        ':username' => $username,
                        ':email' => $email,
                        ':memberID' => $memberID
                    ));

                }
                

                //redirect to index page
                header('Location: users?action=updated');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo $error.'<br />';
        }
    }

        try {

            $stmt = $db->prepare('SELECT id, user_name, user_email FROM core_users WHERE id = :memberID') ;
            $stmt->execute(array(':memberID' => $_GET['id']));
            $row = $stmt->fetch(); 

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    ?>