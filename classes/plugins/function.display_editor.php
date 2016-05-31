<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {display_page_editor} plugin
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
if (isset ($_GET['pid'])) {

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

elseif (isset ($_GET['post_id']) && $_GET['action'] == 'change') {
global $db;
	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation
		if($postID ==''){
			$error[] = 'This post is missing a valid id!.';
		}

		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}
    //Lower case everything
    $seoUrl = strtolower($postTitle);
    //Make alphanumeric (removes all other characters)
    $seoUrl = preg_replace("/[^a-z0-9_\s-]/", "", $seoUrl);
    //Clean up multiple dashes or whitespaces
    $seoUrl = preg_replace("/[\s-]+/", " ", $seoUrl);
    //Convert whitespaces and underscore to dash
    $seoUrl = preg_replace("/[\s_]/", "-", $seoUrl);

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont, postSlug = :postSlug WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postID' => $postID,
					':postSlug' => $seoUrl
				));

				//redirect to index page
				header('Location: edit?post_id='.$postID.'&action=change');
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

			$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont, postSlug FROM blog_posts WHERE postID = :postID' ) ;
			$stmt->execute(array(':postID' => $_GET['post_id']));
			$row = $stmt->fetch(); 

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

echo "<script src='//cdn.ckeditor.com/4.5.5/full/ckeditor.js'></script>	
		<div class='modern-form'>
		<form action='' method='post'>
		<input type='hidden' name='postID' value='". $row['postID']."'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='".$row['postTitle']."'></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='5'>". $row['postDesc']."</textarea></p>

		<p><label>Content</label><br />
		<textarea class='ckeditor' name='postCont' cols='60' rows='10'>".$row['postCont']."</textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form></div></div>" ;

}
elseif ($_GET['type'] == 'post' AND $_GET['action'] == 'add') {
global $db;

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation

		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}
		
    //Lower case everything
    $seoUrl = strtolower($postTitle);
    //Make alphanumeric (removes all other characters)
    $seoUrl = preg_replace("/[^a-z0-9_\s-]/", "", $seoUrl);
    //Clean up multiple dashes or whitespaces
    $seoUrl = preg_replace("/[\s-]+/", " ", $seoUrl);
    //Convert whitespaces and underscore to dash
    $seoUrl = preg_replace("/[\s_]/", "-", $seoUrl);

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('INSERT blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont, postSlug = :postSlug') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postSlug' => $seoUrl
				));

				//redirect to update page
				header('Location: edit?post_id=postID&amp;action=add');
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

echo "<script src='//cdn.ckeditor.com/4.5.5/full/ckeditor.js'></script>	
		<div class='modern-form'>
		<form action='' method='post'>
		<input type='hidden' name='postID' value='". $row['postID']."'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='".$row['postTitle']."'></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='5'>". $row['postDesc']."</textarea></p>

		<p><label>Content</label><br />
		<textarea class='ckeditor' name='postCont' cols='60' rows='10'>".$row['postCont']."</textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form></div></div>" ;

}
elseif ($_GET['type'] == 'page' AND $_GET['action'] == 'add') {
global $db;

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

		//very basic validation

		if($title ==''){
			$error[] = 'Please enter the page title.';
		}
		
		if($label ==''){
			$error[] = 'Please enter the navigation label.';
		}
		
		if($body ==''){
			$error[] = 'Please enter the body content.';
		}

		if($keywords ==''){
			$error[] = 'Please enter some keywords.';
		}

		if($description ==''){
			$error[] = 'Please enter the description.';
		}

		if(!isset($error)){

			try {

				//insert into database
				$stmt = $db->prepare('INSERT core_content_pages SET title = :title, label = :label, body = :body, meta_keywords = :metaKeys, meta_description = :metaDesc, lastmodified=NOW(), status = :live, lastuser = :user') ;
					$stmt->execute(array(
					':title' => $title,
					':label' => $label,
					':body' => $body,
					':metaKeys' => $keywords,
					':metaDesc' => $description,
					':status' => isset($_POST['live']),
					':user' => $_SESSION["user_name"],
				));

				//redirect to index page
				header('Location: edit?action=add&amp;type=page');
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

echo '<script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>
<form id="form" name="form" method="post" action="">
<div class="modern-form">
  <div>
    <div>Be sure to fill in all fields, they are all required.</div>
  </div>
  <div class="sep"></div>
  <div>
    <div class="label">Page Full Title</div>
    <div><input name="title" type="text" id="title" size="80" maxlength="64" value="" /></div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Navigation Link Label</div>
    <div><input name="label" type="text" id="label" maxlength="24"  value="" /> 
      (What the link to this page will display as)</div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Page Body</div>
    <div><textarea class="ckeditor" name="body" id="ckeditor" cols="88" rows="16"></textarea>
</div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Meta Description (Limited to 160 Characters to match Googles Maximum)</div>
    <div><input name="description" type="text" id="Description" size="80" maxlength="160" value="" /></div>
  </div>
  <div class="sep"></div>
  <div>
    <div>Meta Keywords</div>
    <div><input name="keywords" type="text" id="Keywords" size="80" maxlength="64" value="" /></div>
  </div>
  <div class="sep"></div>
    <div>
    <div>Meta Keywords</div>
    <div><input name="live" type="checkbox" id="live" size="80" maxlength="64" value="" /></div>
  </div>
  <div class="sep"></div>
  <div>
    <div><input type="submit" name="publish" id="publish" value="Create" class="button1"/><input type="submit" name="draft" id="draft" value="Save as Draft" class="button1"/></div>
  </div>

</div>
</div>
</form>' ;

}
}