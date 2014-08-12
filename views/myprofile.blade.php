
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoneyLink - The real P2P finance hub - Registration</title>
	<link rel="stylesheet" href="static/style/style.css" />
    <script type="text/javascript" src="static/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="static/js/jquery.validate.js"></script>
    <script type="text/Javascript" src="static/js/site.js"></script>
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
    	<p style="text-align: right;">Welcome <a href="logout.php">Logout</a></p>
        <p style="text-align: right; font-weight: bold; padding: 15px 100px 0 0">Rank:</p><div style="float: right; margin: -20px 5px 0 0;">
				</div>
      <div id="bottomcontent">
    <div id="navtabs">
            <ul>
              	<li><a href="#" style="text-decoration: none;background-color: #cccccc;	color: #252525;	border-left: #ccc 1px solid;">My Profile</a></li>
            </ul>                        
    	</div>
        <div class="clr"></div>
        <div id="subcontent">
        <p>Here you can make changes to your profile. Please note that you will not be able to proceed until you have updated your complete profile.</p>
        <div id="col1">
        <h3>My Account - Settings</h3>            
      		
	  		
                
      <h3 class="titlehdr">Change Password</h3>
      <p>If you want to change your password, please input your old and new password 
        to make changes.</p>
      <form name="pform" id="pform" method="post" action="">
        <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3" class="forms">
          <tr> 
            <td width="40%" style="font-weight: bold;">Old Password</td>
            <td width="60%"><input name="pwd_old" type="password" class="required password"  id="pwd_old"></td>
          </tr>
          <tr> 
            <td style="font-weight: bold;">New Password</td>
            <td><input name="pwd_new" type="password" id="pwd_new" class="required password"  ></td>
          </tr>
        </table>
        <div style="margin: 0 auto; width:200px;"><input name="doChange" type="submit" id="doChange" value="Change"  class="buttondetail"></div>
        
      </form>
      <?php
	  			/******************** ERROR MESSAGES*************************************************
	 			 This code is to show error messages 
	  			**************************************************************************/
	  			if(!empty($err))  {
	   			echo "<br><br><div class=\"msg\">";
	  			foreach ($err as $e) {
	    		echo "$e <br><br>";
	    		}
	  			echo "</div>";	
	   			}
				if(!empty($msg))  {
	    			echo "<br><br><div class=\"msg\">" . $msg[0] . "<br><br></div>";
	   				}
	  	  	?>
        </div>
        <div id="col2">
         <h3 class="titlehdr">Profile</h3>
        
        </div>
        </div>
        
     </div>
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
