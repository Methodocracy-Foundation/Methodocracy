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
$db = DB::getInstance();
$db->get('arguments', array(
						'argument_id', '=', $_GET['id']));
$content = array();
$content = explode("'", improved_var_export($db->results(), true));
//Only process the code on this page if argument is not hidden
if ($content[23] == 0){
$argTypeNames = array('','','Opinion','Question');
?>

<!--Display title-->
<h1><?php echo $content[7]; ?></h1>
<p><?php
//Display author
$contentUser = array();
$db->get('users', array(
			'id', '=', $content[19]));
$contentUser = explode("'", improved_var_export($db->results(), true));
echo 'Submitted by: ';
echo $contentUser[3];
?></p>
<!--Display argument type-->
<h4><?php echo 'Type: '; echo $argTypeNames[$content[3]]; ?></h4>
<!--Display body-->
<p><?php echo $content[11]; ?></p>

<div style="float:left">
	<a href="newargument.php?id=<?php echo $content[15]; ?>&type=0">Disprove this argument</a><br><br>
	
	<a href="connectionlist.php?id=<?php echo $content[15]; ?>&query=1">Arguments disproven by this one (<?php
		$total = 0;
		$list = 1;
		$db = DB::getInstance();
		$db->get('connections', array(
						'connection_id', '=', $list));
		$content2 = array();
		$content3 = array();
		while(improved_var_export($db->results(), true)!='array ()'){
		$content2 = explode("'", improved_var_export($db->results(), true));
		$db->get('arguments', array(
						'argument_id', '=', $content2[7]));
		$content3 = explode("'", improved_var_export($db->results(), true));
		if ($content3[23] == 1){
		} else if ($content2[3]==$content[15]&&$content3[3]==0){
			$total += 1;
		}
		$list++;
		$db->get('connections', array(
						'connection_id', '=', $list));
		}
		echo $total;
	?>)</a><br>
	
	<a href="connectionlist.php?id=<?php echo $content[15]; ?>&query=3">Arguments that have disproved this one (<?php
		$total = 0;
		$list = 1;
		$db = DB::getInstance();
		$db->get('connections', array(
						'connection_id', '=', $list));
		$content2 = array();
		$content3 = array();
		while(improved_var_export($db->results(), true)!='array ()'){
		$content2 = explode("'", improved_var_export($db->results(), true));
		$db->get('arguments', array(
						'argument_id', '=', $content2[3]));
		$content3 = explode("'", improved_var_export($db->results(), true));
		if ($content3[23] == 1){
		} else if ($content2[7]==$content[15]&&$content3[3]==0){
			$total += 1;
		}
		$list++;
		$db->get('connections', array(
						'connection_id', '=', $list));
		}
		echo $total;
	?>)</a>
	
</div>
<div style="float:right">
	<a href="newargument.php?id=<?php echo $content[15]; ?>&type=1">Support this argument</a><br><br>
	
	<a href="connectionlist.php?id=<?php echo $content[15]; ?>&query=2">Arguments supported by this one (<?php
		$total = 0;
		$list = 1;
		$db = DB::getInstance();
		$db->get('connections', array(
						'connection_id', '=', $list));
		$content2 = array();
		$content3 = array();
		while(improved_var_export($db->results(), true)!='array ()'){
		$content2 = explode("'", improved_var_export($db->results(), true));
		$db->get('arguments', array(
						'argument_id', '=', $content2[7]));
		$content3 = explode("'", improved_var_export($db->results(), true));
		if ($content3[23] == 1){
		} else if ($content2[3]==$content[15]&&$content3[3]==1){
			$total += 1;
		}
		$list++;
		$db->get('connections', array(
						'connection_id', '=', $list));
		}
		echo $total;
	?>)</a><br>
	
	<a href="connectionlist.php?id=<?php echo $content[15]; ?>&query=4">Arguments that have supported this one (<?php
		$total = 0;
		$list = 1;
		$db = DB::getInstance();
		$db->get('connections', array(
						'connection_id', '=', $list));
		$content2 = array();
		$content3 = array();
		while(improved_var_export($db->results(), true)!='array ()'){
		$content2 = explode("'", improved_var_export($db->results(), true));
		$db->get('arguments', array(
						'argument_id', '=', $content2[3]));
		$content3 = explode("'", improved_var_export($db->results(), true));
		if ($content3[23] == 1){
		} else if ($content2[7]==$content[15]&&$content3[3]==1){
			$total += 1;
		}
		$list++;
		$db->get('connections', array(
						'connection_id', '=', $list));
		}
		echo $total;
	?>)</a>
</div>
<div style="float:right">
	<?php
	$user = new User;
	$db = DB::getInstance();
	$list = 1;
	$contentReport = array();
	$loop = true;
	$reported = false;
	$db->get('reports', array(
					'report_id', '=', $list));
	$contentReport = explode("'", improved_var_export($db->results(), true));
	while(improved_var_export($db->results(), true)!='array ()' && $loop){
		if($contentReport[7] == $_GET['id'] && $contentReport[11] == $user->_currentUser){
			$loop = false;
			$reported = true;
		}
		$list++;
		$db->get('reports', array(
					'report_id', '=', $list));
	}
	if(!$reported){
	?>
	<p>Report this argument:</p>
	<ul>
		<li>Is the argument spam?</li>
		<li>Does the argument contain hate?</li>
		<li>Does the argument advertise unnecessarily?</li>
		<li>Does the argument contain unnecessarily obscene content?</li>
	</ul>
	<a href="report.php?id=<?php echo $content[15]; ?>">Report</a>
	<p>Warning: You will be temporarily banned from the report feature if you spam reports without reason.</p>
	<?php
	} else {
		echo "You've already submitted a report for this argument.";
	}
	}
	?>
</div>
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