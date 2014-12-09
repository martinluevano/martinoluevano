<?php
require_once("csrf.php");
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" />
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
	<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/additional-methods.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="contact.js"></script>
	<title>Contact Me</title>
</head>
<body>
<!--    Fixed navbar -->
<nav class="navbar navbar-inverse   na                                                                                                                                       vbar-fixed-top" role="navigation">

	<ul class="nav nav-pills">
		<li role="presentation" class="active"><a href=".">Home</a></li>
		<li role="presentation" class="active"><a href="Biography.html"> Biography</a></li>
		<li role="presentation" class="active">Interest</li>
		<li role="presentation" class="active"><a href="resume.html">Resume</a></li>
		<li role="presentation" class="active">Code</li>
		<li role="presentation" class="active"><a href="contact.php">Contact</a></li>
	</ul>

	</div>
</nav>

			<article>
				<div class="page-header">
					<h1>Contact</h1>
				</div>
						<p id="outputArea"></p>
				<form id="contactMe" action="emailProcessor.php" method="POST">
					<?php echo generateInputTags();?>
				<form role="form">
					<div class="form-group">
						<label for="name">Name</label><br />
						<input type="text" id="name" name="name" size="32" placeholder="Who are you?"/>
					</div>
					<div class="form-group">
						<label for="email">Email address</label><br />
						<input type="email" id="email" name="email"  size="32" placeholder="How may I contact you?"/>
					</div>
					<div class="form-group">
						<label for="subject">Subject</label><br />
						<input type="text" id="subject" name="subject" size="32" placeholder="How can I help you?"/>
					</div>
					<div class="form-group">
						<label for="message">Message</label><br />
						<textarea id="message" name="message" cols="32" rows="8" placeholder="How can I help you?"/></textarea>
					</div>
					<p>
						<label>Terminator Avoidance System</label>
						<div class="g-recaptcha" data-sitekey="6Lco2v4SAAAAAPbIjmKmSIpA3JAfJCghFWq4X_iZ"></div>
					</p>
					<p>
						<label>Hit me up!</label><br />
						<button class="btn btn-primary" type="submit">Go Ahead Make My Day</button>
						<button class="btn btn-primary" type="reset">Nevermind</button>
					</p>
				</form>

			</article>

</body>