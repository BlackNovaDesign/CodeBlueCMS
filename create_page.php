<?php 
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }

$pagetitle = $_POST['title'];
$linklabel = $_POST['label'];
$pagebody = $_POST['body'];
$metaKeys = $_POST['keywords'];
$metaDesc = $_POST['description'];
$user = $_SESSION['user_name'];

// Add the info into the database table

if(isset($_POST['publish'])) {
$query = mysqli_query($con, "INSERT INTO content_pages (title, label, body, lastmodified, active, meta_keywords, meta_description, lastuser) 
        VALUES('$pagetitle','$linklabel','$pagebody',now(), '1', '$metaKeys', '$metaDesc', '$user')") or die (mysql_error());
}
elseif(isset($_POST['draft']))
{ $query = mysqli_query($con, "INSERT INTO content_pages (title, label, body, lastmodified, active, meta_keywords, meta_description, lastuser) 
        VALUES('$pagetitle','$linklabel','$pagebody',now(), '0', '$metaKeys', '$metaDesc', '$user' )") or die (mysql_error()); 
		};
?>
<!DOCTYPE html>
<head>	
<meta charset="utf-8">	
<title>CodeBlue CMS - Create a Page</title>
<link media="all" rel="stylesheet" type="text/css" href="css/all.css" />	
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.7.2.min.js"><\/script>');</script>	
<script type="text/javascript" src="js/jquery.main.js"></script>	
<script type="text/javascript" src="themes/default/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="themes/default/plugins/ckeditor/ckfinder/ckfinder.js"></script>



	
<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
<script type="text/javascript">

function validate_form ( ) { 
    valid = true;
    if ( document.form.pagetitle.value == "" ) { 
	alert ( "Please enter the page title." ); 
	valid = false;
	} else if ( document.form.linklabel.value == "" ) { 
	alert ( "Please enter info for the link label." ); 
	valid = false;
	} else if ( document.form.pagebody.value == "" ) { 
	alert ( "Please enter some info into the page body." ); 
	valid = false;
	}
	return valid;
}
</script>
</head>
<body>	
	<div id="wrapper">
		<div id="content">
			<?php BuildTopMenu() ?>
				<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
								<h1>Creating a New Page</h1>
								<p>Create a new page, either save it for later or set it live.</p>
							</div>
<?php if($query){ echo '<ul class="states"><li class="succes">Success : Page Created Successfully.</li></ul>';} elseif (mysql_error()) { echo 'failed!' ;}  ?>


		<?php BuildNav() ?>
	</div>
</body>
</html>