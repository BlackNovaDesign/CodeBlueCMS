<?php
function support_Req() 
{
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
$sql = "select * from support_tickets";
$result =  mysqli_query($con, $sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error());
}
echo '<table width="100%" border="1"><tbody><th class="check">ID</th><th>Subject</th><th>Customer</th><th>Created</th><th>Replies</th><th colspan="2">Status</th>';

while($row = mysqli_fetch_array($result)){
$support_id = $row['id'];
$subject = $row['subject'];
$created_date = $row['created_at'];
$created_user = $row['created_by'];
$status = $row['is_active'];
$lastmod = $row['lastmodified'];
$lastuser = $row['lastuser'];
$user = $_SESSION["user_name"];

echo '<tr>
		<td>'.$support_id. '</td>
		<td><a href="?id='.$support_id.'">'.$subject.'</a></td>
		<td>'.$created_by.'</td>
		<td>'.$created_date.'</td>
		<td>'.$lastmod. ' by '.$lastuser.'</td>
		<td>'.$status.'</td>
		
	</tr></tbody></table>';
};

};
?>

