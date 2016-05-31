<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {PageList} plugin
 * Type:     function<br>
 * Name:     Build Page List<br>
 * Purpose:  fetch Page list from Core Database display results
 *
 * @author Kyle Holmes <kholmes at blacknovadesigns dot co dot uk>
 *
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 *
 * @throws SmartyException
 * @return string|null if the assign parameter is passed, Smarty assigns the result to a template variable
 */
function smarty_function_PageList()
{
global $db;

	try {

        $stmt = $db->query('SELECT * FROM core_content_pages ORDER BY page_order ASC');
        	
echo '<table width="100%" border="1"><tbody><th class="check"></th><th>Page Title</th><th>Navigation Label</th><th class="order">Order</th><th class="live">Status</th><th>Last Edited</th><th colspan="2">Actions</th><form action="'?>

<?php 
	$_SERVER["PHP_SELF"]; echo'">';
		while($row = $stmt->fetch()){
			$title = $row['title'];
			$label = $row['label'];
			$order = $row['page_order'];
			$lastmod = $row['lastmodified'];
			$lastuser = $row['lastuser'];
			$pid = $row['id'];
			if ($row['active'] == '1') 
			{ $live = 'Live';}
			else 
			{ $live = 'Draft'; }
?>
		<tr><td><input type="checkbox" value="<?php echo $pid; ?>" /></td><td align='center'><?php print $title; ?></td><td align='center'><?php print $label; ?></td><td align='center'><?php print $order; ?></td><td align='center'><?php print $live; ?></td><td align='center'><? print $lastmod;?> by <? print $lastuser; ?></td><td align='center'><a href="edit?action=change&amp;pid=<?php echo $pid ?>" title="Edit" ><span class="edit-ico"></span></a></td><td align='center'><a id="demo" href="edit?action=delete&amp;pid=<?php echo $pid ?>" onclick="return confirm('Are you sure you want to delete this page?')" title="Delete"><span class="del-ico"></span></a></td></tr>
<?php
};
	}catch(PDOException $e) {
        echo $e->getMessage();
    }
	
echo '</form></tbody></table>';
}