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
	if($user->hasPermission('moderator')) {
	?>
		<p>You're a moderator!</p>
	<?php
	}
	?>	
	
	<?php
	if($user->hasPermission('admin')) {
	?>
		<p>You're also an administrator!</p>
	<?php
	}
	?>	
		<a href="newargument.php?id=0">New Argument</a><br><br>
		
		<?php
		$db = DB::getInstance();
		$loop = true;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		} else {
			$page = 1;
		}
		$list = (($page-1)*100)+1;
		$content = array();
		$db->get('arguments', array(
						'argument_id', '=', $list));
		while(improved_var_export($db->results(), true)!='array ()'&&$loop){
			$content = explode("'", improved_var_export($db->results(), true));
			//Exclude Disprovals and Supports
			if($content[3] < 2){
				$list++;
				$db->get('arguments', array(
						'argument_id', '=', $list));
			//Exclude hidden arguments
			} else if($content[23] == 1){
				$list++;
				$db->get('arguments', array(
						'argument_id', '=', $list));
			} else {
			?>
			<a href="viewargument.php?id=<?php echo $content[15]; ?>"><?php echo $content[7]; ?></a><br>
			<?php
			$list++;
			$db->get('arguments', array(
						'argument_id', '=', $list));
			}
			if ($list == (($page*100)+1)){
				$loop = false;
			}
		}
		?>
		<p style="text-align: center;">Page <?php echo $page ?><p>
		
		<div style="float:left;">
			<?php 
			if($page!=1){ echo
				'<a href="index.php?page='; echo $page-1; echo'">Previous Page</a>';
			}
			?>
		</div>
		
		<div style="float:right;">
			<?php
			if($list%101==0){ echo
				'<a href="index.php?page='; echo $page+1; echo '">Next Page</a>';
			}
			?>
		</div>
	</article>
	<?php
} else {
	echo '<article>You need to <a href="login.php">log in</a> or <a href="register.php">register</a>!</article>';
}?>
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
