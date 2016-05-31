<?php 
/*
 * Code Blue CMS
 * www.codebluecms.co.uk
 */
include '../config.php';

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login'); }
include ($app_path. '/testimonials/lib_func.php');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);


// Add the updated info into the database table
$sql = "DELETE FROM testimonials WHERE id='$pid'";
$delQuery = mysqli_query($con, $sql) or die (mysql_error());
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
								<h1>Testimonials</h1>
								<p>Here you can add, edit, delete your Testimonials.</p>
							</div>
							<p><a href="#">Add / Edit / Delete</a></p>
<div class="content-outer">

        <div class="content-inner">

          <div class="title_border">

            <h1>Pending Testimonials</h1>

          </div>
<article>
<?php pend_testimonials(); ?>
</article>
</div>
</div>

<div class="content-outer">

        <div class="content-inner">

          <div class="title_border">

            <h1>Active Testimonials</h1>

          </div>
<article><?php active_testimonials(); ?></article>
</div>


           </div>

				</div>
			</div>
		</div>
		
	</div>

<?php BuildNav() ?>
</body>
</html>