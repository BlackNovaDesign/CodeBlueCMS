<html>
<head>
<title>CodeBlue Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="{$js_dir}/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="{$js_dir}/jquery.validate.js"></script>
<link media="all" rel="stylesheet" type="text/css" href="{$style_dir}/all.css" />	
  <script>
  $(document).ready(function(){
    $("#logForm").validate();
  });
  </script>
  </head/>
<body style="background-image: url('{$imgpath}/bg-login.png');">

<div class="LoginBox">
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">

  <tr> 
    <td width="160" valign="top"><p>&nbsp;</p>
      <p>{$message}</p>
      <p></p>
      <p><span class="logo"></span></p></td>
    <td width="730" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Admin Panel Login</h3>  
	  <p>
	</p>
      <form action="" method="post" name="logForm" id="logForm" >
        <table width="55%" border="0" cellpadding="4" cellspacing="4" class="loginform">
          <tr> 
            <td width="28%">Username</td>
		  </tr>
		  <tr>
            <td width="72%"><input name="username" type="text" class="required username" id="txtbox" size="25"></td>
          </tr>
          <tr> 
            <td>Password</td>
		  </tr>
		  <tr>
            <td><input name="password" type="password" class="required password" id="txtbox" size="25"></td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center">
                <input name="remember" type="checkbox" id="remember" value="1">
                Remember me</div></td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="submit" type="submit" id="doLogin3" value="Login">
                </p>
                <p><a href="forgot.php">Forgot Password</a> <font color="#FF6600"> 
                  </font></p>
              </div></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center">&nbsp; </p>
      </form>
      <p>&nbsp;</p>
	   
      </td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</div>