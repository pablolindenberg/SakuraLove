<?php

// require the autoloader
require 'vendor/autoload.php';

if (isset($_POST['dsubmit'])) {
$senderid = $_POST["dsender"];
$receiverid = $_POST["dreceiver"];
$subject = $_POST["dsubject"];
$message = $_POST["dmessage"];

//Set SendGrid Credentials

$sg_username = "Enter Your SendGrid User Name";
$sg_password = "Enter Your SendGrid Password";

// Initialize the SendGrid object with your SendGrid credentials

$sendgrid = new SendGrid($sg_username, $sg_password);

//Create a new SendGrid Email object

$mail = new SendGrid\Email();

// You Can Use Multiple Recipients Here. For This Tutorial We Have Used One.

$emails = array(
$receiverid
);
foreach ($emails as $recipient) {
$mail->addTo($recipient);
}

//Optional Fields.
$categories = array(
"SendGrid Category"
);
foreach ($categories as $category) {
$mail->addCategory($category);
}
$unique_args = array(
"Name" => "Enter Name Of Your Wish"
);
foreach ($unique_args as $key => $value) {
$mail->addUniqueArgument($key, $value);
}
try {

// Add your message details using SendGrid Email object. Here The Values Are Taken By HTML Form Filled By The User.
$mail->
setFrom($senderid)->
setSubject($subject)->
setText($message);

//Send Mail.
if ($sendgrid->send($mail)) {
echo "<script type='text/javascript'>alert('Sent mail successfully.')</script>";
}
} catch (Exception $e) {
echo "Unable to send mail: ", $e->getMessage();
}
}
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function validate()
{

if (document.myForm.dreceiver.value == "")
{
alert("Please enter your Email!");
document.myForm.dreceiver.focus();
return false;
}
else
{

/*validating email with strong regular expression(regex)*/
var str1 = document.myForm.dreceiver.value;
var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([com net org]{3}(?:\.[a-z]{6})?)$/i
if (!filter.test(str1))
{

alert("Please enter a valid email address!")
document.myForm.dreceiver.focus();
return false;
}
if (document.myForm.dsubject.value == "")
{
alert("Please enter a subject!");
document.myForm.dsubject.focus();
return false;
}
if (document.myForm.dmessage.value == "")
{
alert("Please enter message!");
document.myForm.dmessage.focus();
return false;
}
if (document.myForm.dsender.value == "")
{
alert("Please enter your Email!");
document.myForm.dsender.focus();
return false;
}
return(true);
}
}
</script>
</head>
<body>
<div class="container">
<div class="row">

</div>
<div class="row">
<div class="col-md-12">
<div id="main">
<h1><b>-Send Email Via SendGrid API Using PHP</b></h1>
</div>
</div>
<div class="col-md-12">
<div id="content">
<div id="login">
<h2>Message Box</h2><hr/>

<form name="myForm" action="" method="post" onsubmit="return validate();" >

<label><h3>From:</h3></label><br/>
<input type="email" placeholder="From: Email Id.." name="dsender" id="dsender" width="180"><br />

<label><h3>To:</h3></label>
<input type="email" placeholder="To: Email Id.." name="dreceiver" id="dreceiver" ><br/>

<label><h3>Subject:</h3></label>
<input type="text" placeholder="Enter Your Subject.." name="dsubject" id="dsubject" ><br/>

<label><h3>Message:</h3></label>
<textarea rows="4" cols="50" placeholder="Enter Your Message..." name="dmessage" id="textarea"></textarea><br/><br/>

<input type="submit" value="Send " name="dsubmit"/><br />

<span></span>
</form>
</div>
<p id="note"> <b>Note : </b> In demo, we have disabled the functionality of sending Emails.</p>
</div>
</div>
</div>
</div>
</body>
</html>
