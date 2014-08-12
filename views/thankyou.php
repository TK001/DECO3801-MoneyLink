<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoneyLink - The real P2P finance hub</title>
	<link rel="stylesheet" href="/static/style/style.css" />
	<script type="text/Javascript" src="/static/js/site.js"></script>
    <script type="text/javascript" src="/static/js/jquery-1.10.2.min.js"></script>
</head>

<body text="#333" link="#666" vlink="#666" alink="#0099CC">
<div id="main_sub">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <h1><a href="http://www.fundz.net">MoneyLink</a> <small>The real P2P finance hub</small> </h1>
      </div>
      <div id="navtop">
        <?php include '/var/www/phpsite/app/inc/nav.php'; ?>
      </div>
    </div>
    <!-- end header -->
    <div class="clr"></div>
    <div class="content">
    <div class="left_bar">   
	<div id="pagetabs">
           Thank you for registering    
    	</div>
        <div class="clr"></div>
        <div id="subcontent">
        <h4>Your registration is almost complete!</h4>
        <br /><br /> 
      <p>An activation email 
        has been sent to your email address (dont forget to check your spam folder).
        <br /><br /> 
        Please check your email and click on the activation link. You can login 
        here if you have already activated your account.</p>
        <br /><br />
        </div>
    </div>
      <div class="right_bar">
		<div class="bg"></div>        
        <div class="description">
          <div class="bt_1">
			<p><span class="ft_14">Member Login</span> </p>       
          </div>
		<div class="bt_2">
        	<div>
        	<form action="index.php" method="post" name="logForm" id="logForm" >
        	   		<label>Username</label>
            		<input name="usr_email" type="text" class="required" id="txtbox" size="25">
            		<label>Password</label>
            		<input name="pwd" type="password" class="required password" id="txtbox" size="25">                  
                  	<input name="doLogin" type="submit" id="doLogin3" value="Login" class="buttondetail">
                	<p align="center"><a href="register.php">Register</a> | <a href="forgot.php">Forgot Password</a></p>		
      		</form>
            </div>
		</div>

  		<div class="bt_1">
  			<?php
	  			/******************** ERROR MESSAGES*************************************************
	 			 This code is to show error messages 
	  			**************************************************************************/
	  			if(!empty($err))  {
	   			echo "<div class=\"msg\">";
	  			foreach ($err as $e) {
	    		echo "$e <br>";
	    		}
	  			echo "</div>";	
	   			}
	  	  	?>
          </div>
		 
          <div class="clr"></div>
        </div>
        <div class="clr"></div>

      </div>
      <div class="clr"></div>
      
    </div>	
<br />     <!-- end content --> 
  </div>
  <div class="clr"></div>&nbsp;
</div>
<!-- end main -->
<div id="footer">
  <div class="main_resize">
    <div id="navbot">
      <div id="navbot">
      <ul class="menusm">
      	<li><a href="index.php" class="active" title="Home">Home</a> </li>
        <li><a href="aboutus.php" title="About MoneyLink">About MoneyLink</a> </li>
        <li><a href="contact.php" title="Contact Us">Contact Us</a> </li>
        <li><a href="register.php" title="Register">Register</a> </li>
        <li><a href="privacy.html">Privacy Policy</a> </li>
        <li><a href="terms.html">Terms of Use</a> </li>
      </ul>
      <div class="clr"></div>
    </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="footer_script">
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
<!-- end footer -->
<div class="footer_bottom">
  <div class="main_resize">
    <div class="logo">
    </div>
    <div class="footer_banners"> 
    
     </div>
    <div class="clr"></div>
    <div class="footer_text">
      
      <div class="clr"></div>
    </div>
  </div>
</div>
<!-- end footer_bottom -->

</body>
</html>
