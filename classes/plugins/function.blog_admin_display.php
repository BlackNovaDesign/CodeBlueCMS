<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {blog_admin_display} plugin
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
function smarty_function_blog_admin_display()
{
global $db;
if(isset($_GET['delpost'])){ 

    $stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
    $stmt->execute(array(':postID' => $_GET['delpost']));

    header('Location: blogs?action=deleted');
    exit;
} 
print '<table>
<tr>
	<th>ID</th>
    <th>Title</th>
    <th>Date</th>
    <th colspan="2">Actions</th>
</tr>
';
    try {

        $stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){
           
            echo '<tr>';
			echo '<td>'.$row['postID'].'</td>';
            echo '<td>'.$row['postTitle'].'</td>';
            echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
            ?>

            <td>
                <a href="edit?post_id=<?php echo $row['postID'];?>&amp;action=change"><span class="edit-ico"></span></a>
			</td>
            <td>
			<a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')"><span class="del-ico"></span></a>
			</td>
            <?php 
            echo '</tr>';

        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

print '</table>';
}