<?php 
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }

// You should put an if condition here to check that the posted $pid variable is present first thing, I did not do that

$tid = $_GET['tid'];

$query = mysql_query("SELECT * FROM testimonials WHERE id='$tid'");
 if(isset($_POST['editPage'])) {

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$company = $row['company_name'];
$comment = $row['comments'];
$lastmod = $row['lastmodified'];
$lastuser = $row['lastuser'];
$user = $_SESSION["user_name"];


$editQuery = mysql_query("UPDATE testimonials SET first_name='$first_name', last_name='$last_name', comments='$comment', lastmodified=NOW(), lastuser='$user', company_name='$company_name', email='$email', active='$status' WHERE id='$tid'");
 };


while($row = mysql_fetch_array($query)){

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">	
<title>CodeBlue CMS - Edit Page</title>
<link media="all" rel="stylesheet" type="text/css" href="css/all.css" />	
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.7.2.min.js"><\/script>');</script>	
<script type="text/javascript" src="js/jquery.main.js"></script>	
<script type="text/javascript" src="themes/default/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="themes/default/plugins/ckeditor/adaptors/jquery.js"></script>
<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
</head>

<body>
	<div id="wrapper">
		<div id="content">
			<?php BuildTopMenu() ?>
				<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1>Edit Page</h1>
								<p>Here you can edit an existing pages.</p>
							</div>
<?php if($editQuery){ echo '<ul class="states"><li class="succes">Success : Page Edited Successfully.</li></ul>';} elseif (mysql_error()) { echo 'failed!' ;}  ?>
								<table width="100%" border="0" cellpadding="8">
<tr>
    <td>
    
<table width="100%" border="0" cellpadding="5">
    <form id="form" name="form" method="post" action="<?php echo ''.$_SERVER['PHP_SELF'].'?tid='.$tid.''; ?>">
  <tr>
    <td width="12%" align="right" bgcolor="#F5E4A9">Name: </td>
    <td width="88%" bgcolor="#F5E4A9"><input name="first_name" type="text" id="title" size="80" maxlength="64" value="<?php echo $row['first_name']; ?>" /><input name="last_name" type="text" id="title" size="80" maxlength="64" value="<?php echo $row['last_name']; ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#D7EECC">Link Label</td>
    <td bgcolor="#D7EECC"><input name="label" type="text" id="label" maxlength="24"  value="<?php echo $row['email']; ?>" /></td>
  </tr>
  <tr>
    <td width="12%" align="right" bgcolor="#F5E4A9">Company Name</td>
    <td width="88%" bgcolor="#F5E4A9"><input name="description" type="text" id="title" size="80" maxlength="160" value="<?php echo $row['company_name']; ?>" /></td>
  </tr>
  <tr>
    <td width="12%" align="right" bgcolor="#F5E4A9">Email</td>
    <td width="88%" bgcolor="#F5E4A9"><input name="keywords" type="text" id="title" size="80" maxlength="64" value="<?php echo $row['email']; ?>" /></td>
  </tr>
  <tr>
    <td align="right" valign="top" bgcolor="#DAEAFA">Comments</td>
    <td bgcolor="#DAEAFA"><textarea name="body" id="body" class="ckeditor" cols="88" rows="16"><?php echo $row['comments']; ?></textarea></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>
    <input name="pid" type="hidden" value="<?php echo $tid; ?>" />
    <input type="submit" name="editPage" id="button" value="Edit Page" /></td>
  </tr>
  </form>
</table>

    
    </td>
  </tr>
</table>
						</article>
					</div>
				</div>
			</div>
		</div>
		<?php BuildNav() ?>
	</div>
</body>
</html>

<?php }; ?>