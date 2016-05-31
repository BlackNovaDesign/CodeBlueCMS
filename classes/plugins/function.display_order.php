<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {display_order} plugin
 * Type:     function<br>
 * Name:     Build Order Output to the screen<br>
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

function smarty_function_display_order() 
{
	global $con;

$validid = $_GET['id'];

echo "<p>&nbsp;</p>";

echo "<a href='orders.php'><— go back to the main orders screen</a>";

$ordsql = "SELECT * from exchange_orders WHERE id = " . $validid;

$ordres = mysqli_query($con, $ordsql);

$ordrow = mysqli_fetch_assoc($ordres);

echo "<table cellpadding=10>";

echo "<tr><td><strong>Order Number</strong></td><td>" . $ordrow['id'] . "</td>";

echo "<tr><td><strong>Date of order</strong></td><td>" . date('D jS F Y g.iA',strtotime($ordrow['date'])) . "</td>";

echo "<tr><td><strong>Payment Type</strong></td><td>";

if($ordrow['payment_type'] == 1)

{

echo "PayPal";

}

else

{

echo "Cheque";

}

echo "</td>";

echo "</table>";

if($ordrow['delivery_add_id'] == 0)

{

$addsql = "SELECT * FROM exchange_customers WHERE id = " . $ordrow['customer_id'];

$addres = mysqli_query($con,$addsql);

}

else

{

$addsql = "SELECT * FROM exchange_delivery_addresses WHERE id = " . $ordrow['delivery_add_id'];

$addres = mysqli_query($con,$addsql);


}

$addrow = mysqli_fetch_assoc($addres);

echo "<table cellpadding=10>";

echo "<tr>";

echo "<td><strong>Address</strong></td>";

echo "<td>" . $addrow['forname'] . " " . $addrow['surname'] . "<br>";

echo $addrow['add1'] . "<br>";

echo $addrow['add2'] . "<br>";

echo $addrow['add3'] . "<br>";

echo $addrow['postcode'] . "<br>";

echo "<br>";

if($ordrow['delivery_add_id'] == 0)

{

echo "<i>Address from member account</i>";

}

else

{

echo "<i>Different delivery address</i>";

}

echo "</td></tr>";

echo "<tr><td><strong>Phone</strong></td><td>". $addrow['phone'] . "</td></tr>";

echo "<tr><td><strong>Email</strong></td><td><a href='mailto:" . $addrow['email'] . "'>". $addrow['email'] . "</a></td></tr>";

echo "</table>";

$itemssql = "SELECT exchange_products.*, exchange_orderitems.*,exchange_orderitems.id AS itemid FROM exchange_products, exchange_orderitems WHERE exchange_orderitems.product_id = exchange_products.id AND order_id = " . $validid;

$itemsres = mysqli_query($con,$itemssql);

$itemnumrows = mysqli_num_rows($itemsres);

echo "<p>&nbsp;</p>";

echo "<h1>Products Purchased</h1>";

echo "<table cellpadding=10>";

echo "<th></th>";

echo "<th>Product</th>";

echo "<th>Quantity</th>";

echo "<th>Price</th>";

echo "<th>Total</th>";

while($itemsrow = mysqli_fetch_assoc($itemsres))

{

$quantitytotal = $itemsrow['price']* $itemsrow['quantity'];

echo "<tr>";

if(empty($itemsrow['image'])) {

echo "<td><img src='../product_images/no-image.gif' width='50' alt='". $itemsrow['name'] . "'></td>";

}

else {

echo "<td><img src='../product_images/". $itemsrow['image'] . "' width='50' alt='". $itemsrow['name'] . "'></td>";

}

echo "<td>" . $itemsrow['name'] . "</td>";

echo "<td>" . $itemsrow['quantity'] . " x </td>";

echo "<td><strong>&pound;" . sprintf('%.2f',$itemsrow['price']) . "</strong></td>";

echo "<td><strong>&pound;" . sprintf('%.2f',$quantitytotal) . "</strong></td>";

echo "</tr>";

@$total = $total + $quantitytotal;

}

echo "<tr>";

echo "<td style='background: #FFF; border: none;'></td>";

echo "<td style='background: #FFF; border: none;'></td>";

echo "<td style='background: #FFF; border: none;'></td>";

echo "<td>TOTAL</td>";

echo "<td><strong>&pound;" . sprintf('%.2f', $total). "</strong></td>";

echo "</tr>";

echo "</table>";
}
