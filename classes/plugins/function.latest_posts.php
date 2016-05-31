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
function smarty_function_latest_posts()
{
global $db;

    try {

        $stmt = $db->query('SELECT postID, postTitle, postDate, postDesc, postSlug FROM blog_posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){
           
            echo '<div class="postItem">';
            echo '<div class="postTitle"><a href="pages/blog#'.$row['postSlug'].'">'.$row['postTitle'].'</a></div>';
            echo '<div class="postDate">'.date('jS M Y', strtotime($row['postDate'])).'</div>';
            echo '<div class="postDesc">'.$row['postDesc'].'</div>';
            echo '</div>';

        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

}