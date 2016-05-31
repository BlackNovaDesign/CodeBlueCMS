<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {DisplayUsersAdmin} plugin
 * Type:     function<br>
 * Name:     Build Navigation<br>
 * Purpose:  fetch file, web or ftp data for Navigation and display results
 *
 * @author Kyle Holmes <kholmes at blacknovadesigns dot co dot uk>
 *
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 *
 * @throws SmartyException
 * @return string|null if the assign parameter is passed, Smarty assigns the result to a template variable
 */
 
function smarty_function_display_user_editor() {
global $db;

     try {

            $stmt = $db->query('SELECT id, user_name, user_email FROM core_users ORDER BY user_name');
            $row = $stmt->fetch();
	 } catch(PDOException $e) {
            echo $e->getMessage();
        }
			
echo "  <form action='' method='post'>
        <input type='hidden' name='memberID' value='".$row['id']."'>

        <p><label>Username</label><br />
        <input type='text' name='username' value='".$row['user_name']."'></p>

        <p><label>Password (only to change)</label><br />
        <input type='password' name='password' value=''></p>

        <p><label>Confirm Password</label><br />
        <input type='password' name='passwordConfirm' value=''></p>

        <p><label>Email</label><br />
        <input type='text' name='email' value='".$row['user_email']."'></p>

        <p><input type='submit' name='submit' value='Update User'></p>
</form>";
}