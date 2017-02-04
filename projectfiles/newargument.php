<?php
session_start();
require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<!--
	Copyright 2014 Zachary Hebert, Patrick Gillespie
	This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM and methodocracy.org TM are trademarks of Methodocracy Foundation (C)2014, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
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
$user = new User;

if(!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

$db = DB::getInstance();

if(Input::exists())	{

	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		'title' => array(
			'required' => true,
			'min' => 2,
			'max' => 140),
		'body' => array(
			'required' => true,
			'min' => 2)
	));

	if($validation->passed()) {
		$db->insert('arguments', array(
			'type' => Input::get('type'),
			'title' => Input::removeCharacters(Input::get('title')),
			'body' => Input::removeCharacters(Input::get('body')),
			'user_id' => $user->currentUser
		));
		
		$redirect = $db->lastInsert('arguments');
		
		//If this argument is disproving, supporting, or has a neutral connection to another argument...
		if (isset($_GET['type'])){
			if($_GET['type'] == 0){
				$db->insert('arguments', array(
					'type' => 0,
					'title' => 'Disproval',
					'body' => 'Disproval',
					'user_id' => $user->currentUser));
			}else if ($_GET['type'] == 1){
				$db->insert('arguments', array(
					'type' => 1,
					'title' => 'Support',
					'body' => 'Support',
					'user_id' => $user->currentUser));
			} else {
				$db->insert('arguments', array(
					'type' => 2,
					'title' => 'Neutral',
					'body' => 'Neutral',
					'user_id' => $user->currentUser));
			}
			
			$lastRowId = $db->lastInsert('arguments');
			
			$db->insert('connections', array(
							'argument_from' => $lastRowId-1,
							'argument_to' => $lastRowId));
			$db->insert('connections', array(
							'argument_from' => $lastRowId,
							'argument_to' => $_GET['id']));
		}
		
		Redirect::to('viewargument.php?id='.$redirect);
		
	} else {
		foreach($validate->errors() as $error) {
			echo $error, '<br>';
		}
	}
}

$content = array();

$db->get('arguments', array(
	'argument_id', '=', $_GET['id']));
$content = explode("'", improved_var_export($db->results(), true));

if(isset($_GET['type'])){
?>
<h1>Attempting to <?php
if($_GET['type'] == 0){ 
	echo 'disprove "';
}else if ($_GET['type'] == 1){ 
	echo 'support "';
} else{
	echo 'connect neutrally to "';
}echo $content[7]; ?>"</h1>
<?php
}
?>

<form action="" method="post">
	<div class="field">
		<label for="title">Title:</label>
		<textarea name="title" id="title" rows="1" cols="90"></textarea>
	</div>

	<div class="field">
		<label for="type">Type of Argument:</label>
		<select name="type" id="type">
			<option value="3">Opinion</option>
			<option value="4">Question</option>
		</select>
	</div>

	<div class="field">
		<label for="body">Body:</label>
		<textarea name="body" id="body" rows="25" cols="90"></textarea>
	</div>

	<input type="submit" value="Submit">
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
			<a style="margin: 1px;" href="https://plus.google.com/111375535355048158412/posts?hl=en" target="_blank">
				<img src="includes/social media images/GooglePlus-Icon.jpg" alt="Facebook" height="28" width="28">
			</a>
		</div>
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