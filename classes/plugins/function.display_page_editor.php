<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {display_editor} plugin
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

function smarty_function_display_editor() 
{
global $con;
$pid = $_GET['pid'];

$sql = "SELECT * FROM core_content_pages WHERE id='$pid'";
$results = mysqli_query($con,$sql);

 if(isset($_POST['editPage'])) {
$pagetitle = $_POST['title'];
$linklabel = $_POST['label'];
$pagebody = $_POST['body'];
$metaKeys = $_POST['keywords'];
$metaDesc = $_POST['description'];
$status = isset($_POST['live']);
$user = $_SESSION["user_name"];


$editQuery = mysqli_query($con,"UPDATE core_content_pages SET title='$pagetitle', label='$linklabel', body='$pagebody', lastmodified=NOW(), lastuser='$user', meta_keywords='$metaKeys', meta_description='$metaDesc', active='$status' WHERE id='$pid'");
 
};


while($row = mysqli_fetch_array($results)){
if($row['active'] == "1") { $checked="checked='checked'";} else {$checked="";}
	$pagetitle = $row["title"];
	$linklabel = $row["label"];
	$pagebody = $row["body"];
	$meta_description = $row["meta_description"];
	$meta_Keywords = $row["meta_keywords"];

print '
<script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>
<form id="form" name="form" method="post" action="' .$_SERVER["PHP_SELF"].'" onsubmit="return validate_form ( );">
<div class="modern-form">
  <div>
    <div>Be sure to fill in all fields, they are all required.</div>
  </div>
  <div class="sep"></div>
  <div>
    <div class="label">Page Full Title</div>
    <div><input name="title" type="text" id="title" size="80" maxlength="64" value="'.$pagetitle.'" /></div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Navigation Link Label</div>
    <div><input name="label" type="text" id="label" maxlength="24"  value="'.$linklabel.'" /> 
      (What the link to this page will display as)</div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Page Body</div>
    <div><textarea class="ckeditor" name="body" id="ckeditor" cols="88" rows="16">'.$pagebody.'</textarea>
</div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Meta Description (Limited to 160 Characters to match Googles Maximum)</div>
    <div><input name="description" type="text" id="title" size="80" maxlength="160" value="'.$meta_description.'" /></div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Meta Keywords</div>
    <div><input name="keywords" type="text" id="title" size="80" maxlength="64" value="'.$meta_keywords.'" /></div>
  </div>
  <div class="sep"></div>
  <div>
    <div><input type="submit" name="publish" id="publish" value="Publish" class="button1"/><input type="submit" name="draft" id="draft" value="Save as Draft" class="button1"/></div>
  </div>

</div>
</div>
</form>
';
}
}
