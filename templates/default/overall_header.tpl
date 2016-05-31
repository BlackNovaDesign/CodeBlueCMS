<!-/********************************************************
CodeBlue CMS
Designed by Kyle Holmes from Black Nova Designs		
http://www.codebluecms.co.uk
*************************************************************/->

<head>	
<meta charset="utf-8">	
<title>CodeBlue CMS - Dashboard</title>
<link media="all" rel="stylesheet" type="text/css" href="{$style_dir}/all.css" />	
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="{$js_dir}/jquery-1.7.2.min.js"><\/script>');</script>	
<script type="text/javascript" src="{$js_dir}/jquery.main.js"></script>
<script type="text/javascript" src="{$js_dir}/jquery.jcarousel.pack.js"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery.easing['easeOutCirc'] = function(x, t, b, c, d, s) {
if (t==0) return b;
if (t==d) return b+c;
if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
};
jQuery(document).ready(function() {
jQuery('#slider_horizontal').jcarousel({
scroll: 1,
easing: 'easeOutCirc',
animation: 500
});
});
//--><!]]>
</script> 	
<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
</head>
