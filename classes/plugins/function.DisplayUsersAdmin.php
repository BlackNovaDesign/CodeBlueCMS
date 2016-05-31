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
 
function smarty_function_DisplayUsersAdmin() {
global $db;
echo "<table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>";
	
     try {

            $stmt = $db->query('SELECT id, user_name, user_email FROM core_users ORDER BY user_name');
            while($row = $stmt->fetch()){
                
                echo '<tr>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['user_email'].'</td>';

echo '<td>          <a href="edit-user?id='.$row["id"].'">Edit</a>';
                    if($row['id'] != 1){
                        echo "| <a href=\"javascript:deluser('".$row['id']."','".$row['user_name']."')\">Delete</a>";
					};
					
echo '</td> <tr>';
	 }
	  } catch(PDOException $e) {
            echo $e->getMessage();
        }
echo "</table>";
	
}