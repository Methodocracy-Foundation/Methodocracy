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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="mainstyle.css">
</head>
<body>
<div id="blackBar">

<div id="buttons">         
    <div class="outer1">
        <a href="index.php"><div id="one" class="button"> Home </div></a>
    </div>
    
    <div class="outer2">
        <a href="about.html"><div id="two" class="button">About</div></a>
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
		$user = new User();

		$remember = (Input::get('remember') === 'on') ? true : false;
		$db = DB::getInstance();
		$db->get('users', array
					('username', '=', Input::get('username')));
		$content = array();
		$content = explode("'", improved_var_export($db->results(), true));
		if ($content[35]==1){
		$login = $user->login(Input::get('username'), Input::get('password'), $remember);
		} else {
			echo "Your account hasn't been verfied yet, please check your email for your verification link.";
		}
		if($login) {
			Redirect::to('index.php');
		} else {
			echo '<p>Sorry, that username and password wasn\'t recognised.</p>';
		}
	}
}

?>

<form action="" method="post">
	<div class="field">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username">
	</div>

	<div class="field">
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
	</div>

	<div class="field">
		<label for="remember">
			<input type="checkbox" name="remember" id="remember"> Remember me
		</label>
	</div>

	<input type="submit" value="Log in">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>
</article>
</body>
</html>
