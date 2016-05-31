<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {BuildTopMenu} plugin
 * Type:     function<br>
 * Name:     Build Top Menu Navigation<br>
 * Purpose:  fetch file, web or ftp data for Top Navigation and display results
 *
 * @author Kyle Holmes <kholmes at blacknovadesigns dot co dot uk>
 *
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 *
 * @throws SmartyException
 * @return string|null if the assign parameter is passed, Smarty assigns the result to a template variable
 */

function smarty_function_BuildTopMenu($username)
{
	global $db;
	//Find User Details
print '<div class="c1">
	<div class="controls">
	
	<nav class="links">
	<ul>
	<li><a href="#" class="ico1">Messages <span class="num">3</span></a></li>
	<li><a href="#" class="ico2">Alerts <span class="num">2</span></a></li>
	<li><a href="#" class="ico3">Documents</a></li>
	<li><a href="users" class="ico3">Users</a></li>
	<li><a href="#" class="ico3">Unpaid Invoices <span class="num"></span></a></li>
	</ul>
	</nav>
	<div class="profile-box">
	<span class="profile">
	<a href="#" class="section">
	<img class="image" src="templates/default/img/img1.png" alt="image description" width="26" height="26" />
	<span class="text-box">	Welcome	<strong class="name">';

print $_SESSION['user'];
	
print'</strong></span></a>
	<a href="#" class="opener">opener</a></span><a href="logout" class="btn-on">Logout</a>
	</div></div>';
}