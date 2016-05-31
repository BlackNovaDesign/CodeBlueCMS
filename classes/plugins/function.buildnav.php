<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {BuildNav} plugin
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
function smarty_function_BuildNav()
{
$url_root = 'http://www.codebluecms.co.uk';
print '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"><aside id="sidebar">
		<strong class="logo"><a href="' . $url_root . '"></a></strong>
			<ul class="buttons">
				<li>
					<a href="index" class="ico1"><span>Dashboard</span><em></em></a>
					<span class="tooltip"><span>Dashboard</span></span>
				</li>
				<li>
					<a href="gallery" class="ico2"><span>Media Manager</span><em></em></a>
					<span class="tooltip"><span>Media Manager</span></span>
				</li>
				<li>
					<a href="pages" class="ico3"><span>Pages</span><em></em></a>
					<span class="tooltip"><span>Pages</span></span>
				</li>
				<li>
					<a href="orders" class="ico4"><i class="fa fa-shopping-cart fa-2x" style="color: #000; margin-left: 25px; margin-top: 10px;"></i><em></em></a>
					<span class="tooltip"><span>Exchange</span></span>
				</li>
				<li>
					<a href="calendar" class="ico5"><span>Calendar</span><em></em></a>
					<span class="tooltip"><span>Calendar</span></span>
				</li>

				<li>
					<a href="blogs" class="ico6">
						<span>Comments</span><em></em>
					</a>
					<span class="tooltip"><span>Blog</span></span>
				</li>
				<span class="num">1</span>
				<li>
				
					<a href="orders" class="ico4"><i class="fa fa-life-ring fa-2x" style="color: #000; margin-left: 25px; margin-top: 10px;"></i><em></em></a>
					<span class="tooltip"><span>Support</span></span>
					
				</li>
				<li>
					<a href="plugins" class="ico7"><span>Plug-ins</span><em></em></a>
					<span class="tooltip"><span>Plug-ins</span></span>
				</li>
				<li>
					<a href="settings" class="ico8"><span>Settings</span><em></em></a>
					<span class="tooltip"><span>Settings</span></span>
				</li>
			</ul>
			<span class="shadow"></span>
  <script> 
    $(function(){
      $("#includedContent").load("ChangeLogs.html"); 
    });
    </script>
<a href="#" class="topopup">Change Logs <br />
v0.32</a>
		</aside>


<div id="toPopup">
	 
	        <div class="close"></div>
	        <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
	        <div id="popup_content"> <!--your content start-->
	             <div id="includedContent"></div>
	            	        </div> <!--your content end-->
	 
	    </div> <!--toPopup end-->
	 
	    <div class="loader"></div>
	    <div id="backgroundPopup"></div>
';
}