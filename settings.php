<?php 
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }
?>
<!DOCTYPE html>
<head>	
<meta charset="utf-8">	
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
								<h1>Dashboard</h1>
								<p>This is a quick overview of some features</p>
							</div>
							<ul class="states">
								<li class="error">Error : This is an error placed text message.</li>
								<li class="warning">Warning: This is a warning placed text message.</li>
								<li class="succes">Success : This is a succes placed text message.</li>
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