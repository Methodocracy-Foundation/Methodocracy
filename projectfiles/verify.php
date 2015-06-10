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
	<link rel="stylesheet" type="text/css" href="mainStyle.css">
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
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
	//Warning: the next 2 lines are subject to MySQL injection
	$email = $_GET['email'];
	$hash = $_GET['hash'];
	
	$db = DB::getInstance();
	$db->query("SELECT email, hash, verified FROM users WHERE email='".$email."' AND hash='".$hash."' AND verified='0'");
	$match = $db->count();
	
	if ( $match > 0 ) {
		$db->query("UPDATE users SET verified='1' WHERE email='".$email."' AND hash='".$hash."' AND verified='0'");
		echo 'Your account has been activated, you can now login.';
	} else {
		echo 'The url is either invalid or you already have activated your account.';
	}
}else{
    // Invalid approach
	echo 'Invalid approach, please use the link that has been send to your email.';
}
?>
</body>
</html>