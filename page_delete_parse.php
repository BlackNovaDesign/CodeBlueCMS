<?php 
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }

$pid = $_GET['pid'];
// Add the updated info into the database table
$delQuery = mysql_query("DELETE FROM core_content_pages WHERE id='$pid'") or die (mysql_error());
?>
<!DOCTYPE html>
<head>	
<meta charset="utf-8">
<META HTTP-EQUIV="refresh" CONTENT="5;URL=pages">	
<title>CodeBlue CMS - Dashboard</title>
<link media="all" rel="stylesheet" type="text/css" href="css/all.css" />	
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.7.2.min.js"><\/script>');</script>	
<script type="text/javascript" src="js/jquery.main.js"></script>	
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
								<h1>Page Deleted</h1>
							</div>
							<ul class="states">
								<?php if($delQuery){ echo '<ul class="states"><li class="succes">Success : Page Deleted Successfully.</li></ul>';} elseif (mysql_error()) { echo 'Page failed to Delete' ;}  ?>
							</ul>
						</article>
					</div>
				</div>
			</div>
		</div>
		<?php BuildNav() ?>
	</div>
</body>
</html>