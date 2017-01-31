<?php
session_start();
require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<!--
	Copyright 2014-2015 Zachary Hebert, Patrick Gillespie
	This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM is a trademark of Methodocracy.org (C)2014-2015, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
-->
<head>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400italic">
	<!-- The above font is under an open license. www.google.com/fonts/specimen/Ubuntu-->
	<link rel="stylesheet" type="text/css" href="mainstyle.css">
</head>
<body>
<div id="blackBar">
	<div id="buttons">         
		<div class="outer1">
			<a href="index.php"><div id="one" class="button"> Home </div></a>
		</div>
		
		<div class="outer2">
			<a href="topics.php"><div id="two" class="button">Topics</div></a>
		</div>

		<div class="outer1">
			<a href="login.php"><div id="three" class="button">Login</div></a>
		</div>
	</div>
</div>
<article>
<?php

if(Input::exists()) {

	if(Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'required' => true,
				'min' => 2,
				'max' => 20,
				'unique' => 'users'),
			'password' => array(
				'required' => true,
				'min' => 6),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'),
			'email' => array(
				'required' => true,
				'min' => 5,
				'max' => 50,
				'unique' => 'users'),
			'email_again' => array(
				'required' => true,
				'matches' => 'email',
				'min' => 5,
				'max' => 50),
			'name' => array(
				'required' => false,
				'min' => 2,
				'max' => 50)
		));

		if($validation->passed()) {
			$email = Input::get('email');
			//inserted email check here instead of in Validate.php class
			if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)){
				echo 'Invalid email.';
			} else {
				$user = new User();

				$salt = Hash::salt(32);
				
				$hash = md5( rand(0,1000) );

				try {
					$user->create(array(
						'username' 	=> Input::get('username'),
						'password' 	=> Hash::make(Input::get('password'), $salt),
						'salt'		=> $salt,
						'name' 		=> Input::get('name'),
						'joined'	=> date('Y-m-d H:i:s'),
						'group'		=> 1,
						'email'		=> Input::get('email'),
						'hash'		=> $hash
					));

					$username = Input::get('username');
					$password = Input::get('password');
					$to = $email;
					$subject = 'Signup Verification';
					$message = '
					 
					Methodocracy.org
					 
					Thanks for signing up!
					Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
					 
					------------------------
					Username: '.$username.'
					Password: '.$password.'
					------------------------
					 
					Please click this link to activate your account:
					http://www.methodocracy.org/verify.php?email='.$email.'&hash='.$hash.'
	 
					';
					
					$headers = 'From: noreply@methodocracy.org' . '\r\n';
					mail($to, $subject, $message, $headers);
					
					Session::flash('home', 'Your account has been created, please verify it by clicking the activation link that has been sent to your email.');
					Redirect::to('accountcreated.php');

				} catch(Exception $e) {
					die($e->getMessage());
				}
			}
		} else {
			foreach($validate->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}
?>

<form action="" method="post">
	
	<p>* = field is required</p>
	
	<div class="field">
		<label for="username">Choose a username*</label>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>">
	</div>

	<div class="field">
		<label for="password">Choose a password*</label>
		<input type="password" name="password" id="password">
	</div>

	<div class="field">
		<label for="password_again">Enter your password again*</label>
		<input type="password" name="password_again" id="password_again">
	</div>

	<div class="field">
		<label for="email">Enter your email address.*</label>
		<input type="text" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>">
	</div>
	
	<div class="field">
		<label for="email_again">Enter your email address again.*</label>
		<input type="text" name="email_again" id="email_again" value="<?php echo escape(Input::get('email')); ?>">
	</div>
	
	<div class="field">
		<label for="name">Your name</label>
		<input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>">
	</div>

	<input type="submit" value="Register">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>
</article>
<!--Fixed (type of footer, not overcoming of a problem) footer. Wrote CSS in-line because writing it in external file did not work-->
<div style="color:white;
		    position:fixed;
		    bottom:0;
		    left:0;
		    width:100%;
		    height:30px;
		    background-color:black;">
	<div style="overflow: hidden;
				height: 100%;">         
		<div class="outer1">
			<a href="about.html"><div id="about" class="button">About</div></a>
		</div>
		<p style="float:left;margin:0px 5px;">
			<small>Copyright 2014-2015 Zachary Hebert, Patrick Gillespie</small>
		</p>
		<!--Social media links-->
		<div style="float: right; height: 30px; width: 30px;">
			<a style="margin: 1px;" href="https://www.youtube.com/channel/UCm-O9bhsUDBhQGQimns0Ymg" target="_blank">
				<img src="includes/social media images/YouTube-Icon.jpg" alt="Facebook" height="28" width="28">
			</a>
		</div>
		<div style="float: right; height: 30px; width: 30px;">
			<a style="margin: 1px;" href="https://twitter.com/Methodocracy_F" target="_blank">
				<img src="includes/social media images/Twitter-Icon.jpg" alt="Facebook" height="28" width="28">
			</a>
		</div>
		<div style="float: right; height: 30px; width: 30px;">
			<a style="margin: 1px;" href="https://www.facebook.com/methodocracy" target="_blank">
				<img src="includes/social media images/Facebook-Icon.jpg" alt="Facebook" height="28" width="28">
			</a>
		</div>
    </div>
</div>
</body>
</html>