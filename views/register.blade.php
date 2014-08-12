<?php 

include '/var/www/MoneyLink/app/inc/dbconn.php';
include '/var/www/MoneyLink/app/inc/functions.php';
include_once('/var/www/MoneyLink/app/inc/mail.php');

$err = array();

if (isset($_POST['doRegister'])){					 
if($_POST['doRegister'] == 'Register') 
{ 
/******************* Filtering/Sanitizing Input *****************************
This code filters harmful script code and escapes data of all POST data
from the user submitted form.
*****************************************************************/
foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}
}

if(empty($data['full_name']) || strlen($data['full_name']) < 2)
{
$err[] = "ERROR - Invalid name. Please enter atleast 2 or more characters for your name";
//header("Location: register.php?msg=$err");
//exit();
}

// Validate User Name
if (!isUserID($data['user_name'])) {
$err[] = "ERROR - Invalid user name. It can contain alphabet, number and underscore.";
//header("Location: register.php?msg=$err");
//exit();
}

// Validate Email
if(!isEmail($data['usr_email'])) {
$err[] = "ERROR - Invalid email address.";
//header("Location: register.php?msg=$err");
//exit();
}
// Check User Passwords
if (!checkPwd($data['pwd'],$data['pwd2'])) {
$err[] = "ERROR - Invalid Password or mismatch. Enter 5 chars or more";
//header("Location: register.php?msg=$err");
//exit();
}
	  
$user_ip = $_SERVER['REMOTE_ADDR'];

// stores sha1 of password
$sha1pass = PwdHash($data['pwd']);

// Automatically collects the hostname or domain  like example.com) 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Generates activation code simple 4 digit number
$activ_code = rand(1000,9999);

$usr_email = $data['usr_email'];
$user_name = $data['user_name'];

/************ USER EMAIL CHECK ************************************
This code does a second check on the server side if the email already exists. It 
queries the database and if it has any existing email it throws user email already exists
*******************************************************************/

$rs_duplicate = mysqli_query($link, "select count(*) as total from users where user_email='$usr_email' OR user_name='$user_name'") or die(mysqli_error($link));
list($total) = mysqli_fetch_row($rs_duplicate);

if ($total > 0)
{
$err[] = "ERROR - The username/email already exists. Please try again with different username and email.";

}
/***************************************************************************/

if(empty($err)) {

$sql_insert = "INSERT into `users`
  			(`full_name`,`user_email`,`pwd`,`date`,`users_ip`,`activation_code`,`user_name`
			)
		    VALUES
		    ('$data[full_name]','$usr_email','$sha1pass',now(),'$user_ip','$activ_code','$user_name'
			)
			";
			
mysqli_query($link, $sql_insert) or die("Insertion Failed:" . mysqli_error($link));
$user_id = mysqli_insert_id($link);  
$md5_id = md5($user_id);
mysqli_query($link, "update users set md5_id='$md5_id' where id='$user_id'");

mysqli_close($link);

$a_link = "http://$host$path/activate.php?user=$md5_id&activ_code=$activ_code";

$message = 
"<p>Thank you for registering with MoneyLink - Your login details are as follows:<br><br>

User ID: $user_name <br>
Password: as specified in the registration form <br>
<br><br>

Please click the link below to activate your account, in some cases you may need to copy and paste the link into your browser.
<br><br>
*****ACTIVATION LINK*****<br><br>
<a href='$a_link'>$a_link</a>

<br><br>
Regards<br><br>

Administrator<br>
MoneyLink<br>
______________________________________________________<br>
THIS IS AN AUTOMATED RESPONSE. <br>
***DO NOT RESPOND TO THIS EMAIL****</p>
";

	$from = "noreply@fundz.net";
	$subject = "Login Details";


	sendmail($from,$usr_email,$subject,$message);

  	header("Location: thankyou.php");  
  	exit();
	 
	 } 
 }					 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoneyLink - The real P2P finance hub - Registration</title>
	<link rel="stylesheet" href="static/style/style.css" />
	<script type="text/Javascript" src="/staticjs/site.js"></script>
    <script type="text/javascript" src="/static/js/jquery-1.10.2.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="static/js/jquery.validate.js"></script>
  	<script>
  $(document).ready(function(){
    $.validator.addMethod("username", function(value, element) {
        return this.optional(element) || /^[a-z0-9\_]+$/i.test(value);
    }, "Username must contain only letters, numbers, or underscore.");

    $("#regForm").validate();
  });
  
  function disableSubmit() {
  document.getElementById("doRegister").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("doRegister").disabled = false;
       }
       else  {
        document.getElementById("doRegister").disabled = true;
      }

  }
  </script>
</head>

<body text="#333" link="#666" vlink="#666" alink="#0099CC" onload="disableSubmit()">
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
    <div class="description">
          <div class="bt_1">
			<p><span class="ft_14">User Registration</span> </p>       
          </div>
		<div class="bt_2">
    <?php 
	 		if (isset($_GET['done'])) { ?>
	  		<h2>Thank you</h2> Your registration is now complete and you can <a href="login.php">login here</a>";
	 		<?php exit();
	  		}
			?></p>
      		<p align="center">Registration is quick and free! Please note that fields marked <span class="required">*</span> 
        	are required.</p>
	 		<?php	
	 		if(!empty($err))  {
	   		echo "<br><br><div class=\"msg\">";
	  		foreach ($err as $e) {
	    		echo "* $e <br>";
	    		}
	  		echo "</div>";	
	   		}
	 		?> 
<!-- 
          {{ Form::open(array('action'=>'HomeController@doLogin','name'=>'logForm','id'=>'logForm')) }}
         {{ Form::label('Username','Username') }}
         {{ Form::text('Username',null,array('class'=>'required','id'=>'txtbox','size'=>'25')) }}
         {{ Form::label('Password','Password') }}
         {{ Form::password('Password',null,array('class'=>'required password','id'=>'txtbox','size'=>'25')) }}
         {{ Form::submit('Login',null,array('id'=>'doLogin3','class'=>'buttondetail')) }}
         {{ Form::close() }} -->
    
          {{ Form::open(array('action'=>'HomeController@doRegister','name'=>'regForm','id'=>'regForm')) }}

      	<!-- 	<form action="register.php" method="post" name="regForm" id="regForm" > -->
       			<table width="400" border="0" cellpadding="1" cellspacing="1" class="forms" align="center">
          			<tr> 
            			<td height="50" colspan="2"><h2>User Registration</h2></td>
          			</tr>
          			<tr> 
            			<td style="font-weight: bold;">Username<span class="required">*</span>(min 5 characters)<br>
                        <span style="color:red; font: bold 12px verdana; " id="checkid" ></span>
                    {{ Form::text('username',null,array('id'=>'user_name','class'=>'required username','minlength'=>'3')) }}
            				<!-- <input name="user_name" type="text" id="user_name" class="required username" minlength="5" >  -->
              				<!-- <input name="btnAvailable" type="button" id="btnAvailable" class="buttondetail"
			  				onclick='$("#checkid").html("Please wait..."); $.get("checkuser.php",{ cmd: "check", user: $("#user_name").val() } ,function(data){  $("#checkid").html(data); });'
			  				value="Check Availability"> -->
			    			 
            			</td>
          			</tr>
          			<tr> 
            			<td style="font-weight: bold;">Password<span class="required">*</span>
            				<br>
                  
                    {{ Form::password('pwd',null,array('id'=>'pwd','class'=>'required password','minlength'=>'5')) }}
            				<!-- <input name="pwd" type="password" class="required password" minlength="5" id="pwd">  -->
                    
           				</td><td><?php $errors->get('pwd')?></td>
          			</tr>
          			<tr> 
            			<td style="font-weight: bold;">Retype Password</span> 
            				<br>
                    {{ Form::password('pwd2',null,array('id'=>'pwd2','class'=>'required password','minlength'=>'5' )) }}
            				<!-- <input name="pwd2"  id="pwd2" class="required password" type="password" minlength="5" equalto="#pwd"> -->
                        </td><td><?php 
                          foreach($errors->get('pwd2') as $msg) {
                          echo $msg.' ' ;}?></td>
          			</tr>
          			<tr> 
            			<td style="font-weight: bold;">Nickname<span class="required">*</span><br> 
                  {{ Form::text('full_name',null,array('id'=>'full_name','size'=>'40','class'=>'required')) }}
              			<!-- 	<input name="full_name" type="text" id="full_name" size="40" class="required"> -->
                         </td>
          			</tr>
          			
          			<tr> 
            			<td style="font-weight: bold;">Email<span class="required">*</span> 
            				<br>
                    {{ Form::text('user_email',null,array('id'=>'usr_email3','size'=>'40','class'=>'required email')) }}
            		<!-- 		<input name="usr_email" type="text" id="usr_email3" size="40" class="required email">  -->
          				</td><td><?php 
                          foreach($errors->get('user_email') as $msg) {
                          echo $msg.' ' ;} ?></td>
          			</tr>
          			<tr>
          				<td colspan="2">
                          {{ Form::checkbox('terms') }} 
                        <!-- 	<input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> -->
                        I have read and accept the <a href="terms.html">terms and conditions of use</a> and <a href="privacy.html">privacy policy</a>.<br>
                            <br>
                          {{ Form::submit('doRegister',null,array('id'=>'doRegister','value'=>'Register','type'=>'submit')) }}
                        <!-- 	<input name="doRegister" type="submit" id="doRegister" value="Register"> -->
            			</td>
          			</tr>
        		</table>
      			<!-- </form> -->
            {{ Form::close() }}
     </div
     ></div>
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
