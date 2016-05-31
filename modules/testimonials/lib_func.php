<?php
function pend_testimonials() 
{
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
$sql = "SELECT * FROM testimonials WHERE active='0' ORDER BY id DESC ";
$result =  mysqli_query($con, $sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error());
}
$tid = $row['id'];
if(isset($_POST['publish'])) {
$editQuery = mysqli_query($con, "UPDATE testimonials SET lastmodified=NOW(), lastuser='$user', active='1' WHERE id='$tid'");
}

echo '<table width="100%" border="1"><tbody><th class="check"></th><th class="check">ID</th><th>Name</th><th>Company Name</th><th>Email</th><th>Comments</th><th>Last Edited</th><th colspan="2">Tools</th><form action="'?>
<?php $_SERVER["PHP_SELF"] ?>
<?php echo'">';
while($row = mysqli_fetch_array($result)){
$tid = $row['id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$company = $row['company_name'];
$comment = $row['comments'];
$lastmod = $row['lastmodified'];
$lastuser = $row['lastuser'];
$user = $_SESSION["user_name"];
?>
<tr><td><input type="checkbox" /></td><td><?php print $tid; ?></td><td align='center'><?php print $first_name; print $last_name; ?></td><td align='center'><?php print $company; ?></td><td align='center'><?php print $email; ?></td><td align='center'><?php print $comment; ?></td><td align='center'><? print $lastmod;?> by <? print $lastuser; ?></td><td align='center'><form id="form" name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>"><input name="tid" type="hidden" value="<?php echo $tid; ?>" /><input type="submit" name="publish" id="publish" value="Approve" /></td><td align='center'><a id="demo" href="del_parse.php?tid=<?php echo $tid ?>" onclick="return confirm('Are you sure you want to delete this page?')">Delete</a></td></form></tr>
<?php
};
echo '</form></tbody></table>';
};

function active_testimonials() 
{
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
$sql = "SELECT * FROM testimonials WHERE active='1' ORDER BY id DESC ";
$result =  mysqli_query($con, $sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error());
}
echo '<table width="100%" border="1"><tbody><th class="check"></th><th>Name</th><th>Company Name</th><th>Email</th><th>Comments</th><th>Last Edited</th><th colspan="2">Tools</th><form action="'?>
<?php $_SERVER["PHP_SELF"] ?>
<?php echo'">';
while($row = mysqli_fetch_array($result)){
$tid = $row['id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$company = $row['company_name'];
$comment = $row['comments'];
$lastmod = $row['lastmodified'];
$lastuser = $row['lastuser'];
?>
<tr><td><input type="checkbox" /></td><td align='center'><?php print $first_name; print $last_name; ?></td><td align='center'><?php print $company; ?></td><td align='center'><?php print $email; ?></td><td align='center'><?php print $comment; ?></td><td align='center'><? print $lastmod;?> by <? print $lastuser; ?></td><td align='center'><a href="edit_testimonial.php?tid=<?php echo $tid ?>">Edit</a></td><td align='center'><a id="demo" href="del_parse?pid=<?php echo $tid ?>" onclick="return confirm('Are you sure you want to delete this page?')">Delete</a></td></tr>
<?php
};
echo '</form></tbody></table>';
};

?>