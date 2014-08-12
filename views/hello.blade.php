<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoneyLink - The real P2P finance hub</title>
	<link rel="stylesheet" href="/static/style/style.css" />
 	<!-- 	<script type="text/Javascript" src="/static/js/site.js"></script> -->
    <script type="text/javascript" src="/static/js/jquery-1.10.2.min.js"></script>
   
</head>

<body text="#333" link="#666" vlink="#666" alink="#0099CC">
<div id="main_sub">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <h1><a href="http://index.php">MoneyLink</a> <small>The real P2P finance hub</small> </h1>
      </div>
      <div id="navtop">
        <?php include '/var/www/htdocs/MoneyLink/app/inc/nav.php'; ?>
      </div>
    </div>
    <!-- end header -->
    <div class="clr"></div>
    <div class="content">
    <div class="left_bar">   
	<div class='big_detail'>
  		<img src="static/images/fundz_slider1.jpg" width="600" height="300" />
  	</div>	
    </div>
      <div class="right_bar">
		<div class="bg"></div>
        <div style="text-align: center;"><a href="/register"><img src="static/images/regnow.gif" width="200" height="37" /></a></div>
<div class="description">
          <div class="bt_1">
			<p><span class="ft_14">Member Login</span> </p>       
          </div>
         
		<div class="bt_2">
        	<div>
       
         {{ Form::open(array('action'=>'HomeController@doLogin','name'=>'logForm','id'=>'logForm')) }}
         {{ Form::label('Username','Username') }}
         {{ Form::text('Username',null,array('class'=>'required','id'=>'txtbox','size'=>'25')) }}
         {{ Form::label('Password','Password') }}
         {{ Form::password('Password',null,array('class'=>'required password','id'=>'txtbox','size'=>'25')) }}
         {{ Form::submit('Login',null,array('id'=>'doLogin3','class'=>'buttondetail')) }}
         {{ Form::close() }}
    

        	<!-- <form action="index.php" method="post" name="logForm" id="logForm" >
        	   		<label>Username</label>
            		<input name="usr_email" type="text" class="required" id="txtbox" size="25">
            		<label>Password</label>
            		<input name="pwd" type="password" class="required password" id="txtbox" size="25">                  
                  	<input name="doLogin" type="submit" id="doLogin3" value="Login" class="buttondetail">
                	<p align="center"><a href="register.php">Register</a> | <a href="forgot.php">Forgot Password</a></p>		
      		</form> -->
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
      <div id="bottomcontent">
      <div id="pagetabs">
            Welcome to MoneyLink                       
    	</div>
        <div class="clr"></div>
        <div id="subcontent">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ultrices purus. Nam ante lacus, porta quis blandit non, sollicitudin non tortor. Integer laoreet leo eu nisi 		pellentesque, et aliquet lorem tincidunt. Phasellus leo leo, aliquam ut elementum nec, dictum a sem. Maecenas quis congue massa. Curabitur eleifend placerat sem sed convallis. Fusce lacinia tincidunt tortor, congue luctus ligula posuere a. Proin at commodo purus, a consectetur metus.</p>
        <br /><br />

<p>Nulla quis purus sit amet velit tempus viverra non vitae nisi. Vivamus mattis neque in sodales vulputate. Donec pretium at justo vitae pretium. Nam dignissim, turpis eget pharetra euismod, diam diam ultrices velit, non tristique tortor lacus nec ante. Nunc eu fringilla orci. Pellentesque eu aliquet magna. Maecenas tincidunt quam quis quam facilisis, in ultricies elit venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus molestie augue in fringilla molestie. Nullam tristique, nulla ac porta adipiscing, erat leo cursus tortor, sed malesuada arcu diam in lacus. </p>
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
        <li><a href="about.php" title="About MoneyLink">About MoneyLink</a> </li>
        <li><a href="contact.php" title="Contact Us">Contact Us</a> </li>
        <li><a href="register.php" title="Register">Register</a> </li>
        <li><a href="#">Privacy Policy</a> </li>
        <li><a href="#">Terms of Use</a> </li>
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
