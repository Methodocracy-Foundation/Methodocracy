<?php
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
	<style type="text/css">
		body {
			background:	#eee;
			padding:	10px;
		}

		h1 {
			font-size:	165%;
			font-family: 'Ubuntu' , sans-serif;
		}

		h2 {
			font-family: 'Ubuntu' , sans-serif;
		}

		h3 {
			font-family: 'Ubuntu' , sans-serif;
			font-size:	130%;
		}
		
		h4 {
			font-size:	110%;
			font-weight: 500;
			font-family: 'Ubuntu' , sans-serif;
		}

		nav ul li {
			font-family: 'Ubuntu' , sans-serif;
		}

		article {
			max-width: 	55em;
			background:	white;
			padding:	2em;
			margin:		1em auto;
		}

		.table-of-contents {
			float:		right;
			width:		30%;
			background:	#eee;
			font-size:	0.8em;
			padding: 	1em 2em;
			margin:		0 0 0.5em 0.5em;
		}
		
		.table-of-contents ul {
			padding:	0;
		}
		
		.table-of-contents li {
			margin:	0 0 0.25em 0;
		}
		
		.table-of-contents a {
			text-decoration:	none;
		}
		
		.table-of-contents a:hover,
		.table-of-contents a:active {
			text-decoration:	underline;
		}

		h3:target {
			animation:	highlight 1s ease;
		}

		@keyframes highlight {
			from	{ background: yellow; }
			to		{ background: white; }
		}
    
		.heading {
			margin-top:		0px;
			line-height:	1;
			color:			black;
			font-size:		400%;
			font-family: 'Ubuntu' , sans-serif;
		}
		
		.tagline {
			margin-top:		0px;
			line-height:	1;
			color:			black;
			font-size:		230%;
			font-family:	sans-serif;
		}
/* Menu */
    #blackBar{
      color:white;
      position:fixed;
      top:0;
      left:0;
      width:100%;
      height:30px;
      background-color:black;
    }

    #buttons {
      overflow: hidden;
      height: 100%;
    }

    .button {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: 2px;
      background: #404040;
      color: #eee;
      text-align: center;
      border-radius: 0.1em;
      font-weight: 700;  
    }
    
    .button:hover {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: 2px;
      background: #4f4f4f;
      color: #eee;
      text-align: center;
      border-radius: 0.1em;
      font-weight: 700;  
    }

    .outer1 {
        position: relative;
        float: left;
        width: 20%;
        height: 100%;
    }

    .outer2 {
        position: relative;
        float: left;
        width: 60%;
        height: 100%;
    }
        
	</style>

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
<?php
$user = new User();

if(Session::exists('home')) {
	echo '<p>', Session::flash('home'), '</p>';
}

if($user->isLoggedIn()) {
	?>
	<article>
	<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
	
	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="changepassword.php">Change password</a></li>
		<li><a href="update.php">Update details</a></li>
	</ul>

	<?php

	if($user->hasPermission('admin')) {
	?>
		<p>You're also an administrator!</p>
	<?php
	}
	?>	
		<a onclick:<?php $newArgument->argument_id = 0; ?> href="newargument.php">New Argument</a>
	</article>
	<?php
} else {
	echo '<article>You need to <a href="login.php">log in</a> or <a href="register.php">register</a>!</article>';
}?>
</body>
</html>
