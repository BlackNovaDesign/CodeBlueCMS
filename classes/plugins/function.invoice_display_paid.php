<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {invoice_display_paid} plugin
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
function smarty_function_invoice_display_paid() 
{

global $con;


if(isset($_GET['func']) == TRUE) {

if($_GET['func'] != "conf") {

header("Location: " . $config_basedir);

}

$validid = pf_validate_number($_GET['id'],"redirect", $config_basedir);

$funcsql = "UPDATE exchange_orders SET status = 10 WHERE id = " . $_GET['id'];

mysql_query($funcsql);

header("Location: " . $config_basedir . "orders");

}

else {


$orderssql = "SELECT * FROM exchange_orders WHERE status = 1";

$ordersres = mysqli_query($con, $orderssql);

$numrows = mysqli_num_rows($ordersres);



if($numrows == 0)

{

echo "<strong>No orders</strong>";

}

else

{

echo "<table cellspacing=10><th>Preview</th><th>ID</th><th>Date and Time</th><th>Customer Name</th><th>Amount</th><th>Payment Method</th><th>Actions</th>";

while($row = mysqli_fetch_assoc($ordersres))

{
$id = $row['customer_id'];

$custssql = "SELECT * FROM exchange_customers WHERE id = '$id'";

$custsres = mysqli_query($con, $custssql);

$custrows = mysqli_num_rows($custsres);

echo "<tr>";

echo "<td>[<a href='orderdetails.php?id=" . $row['id']. "'>View</a>]</td>";

echo "<td>". $row['id'] . "</td>";

echo "<td>". date("D jS F Y g.iA", strtotime($row['date'])). "</td>";



echo "<td>";

if($row['registered'] == 1)

{
while($row = mysqli_fetch_assoc($custsres))
{

echo "".$row['forname']." " .$row['surname'];
}

}


else

{

echo "Non-Registered Customer";

}

echo "</td>";

echo "<td>&pound;" . sprintf('%.2f',

$row['total']) . "</td>";

echo "<td>";

if($row['payment_type'] == 1)

{

echo "PayPal";

}

else

{

echo "Cheque";

}

echo "</td>";

if( $row['status']== 2){
echo "<td><a href='orders.php?func=conf&id=" . $row['id']. "'>Confirm Payment</a></td>";
}
else
{
echo "<td>Paid</a></td>";
}



echo "</tr>";

}

echo "</table>";

}
}
}