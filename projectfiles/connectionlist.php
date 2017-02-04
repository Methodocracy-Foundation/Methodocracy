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
	
    Methodocracy TM is a trademark of Methodocracy.org (C)2014, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
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
if($_GET['query']==1){
	$db = DB::getInstance();
	$list = 1;
	$list2 = 1;
	$list3 = 1;
	$content = array();
	$content2 = array();
	$content3 = array();
	$content4 = array();
	//Cycle through all arguments
	$db->get('arguments', array(
					'argument_id', '=', $list));
	while(improved_var_export($db->results(), true)!='array ()'){
		$content = explode("'", improved_var_export($db->results(), true));
		//Except disprovals, supports, and neutral connections
		if($content[3] < 3){
			$list++;
			$db->get('arguments', array(
							'argument_id', '=', $list));
		//Exclude hidden arguments
		} else if($content[23] == 1){
			$list++;
			$db->get('arguments', array(
					'argument_id', '=', $list));
		} else {
		//Cycle through all connections
		$db->get('connections', array(
						'connection_id', '=', $list2));
		while(improved_var_export($db->results(), true)!='array ()'){
			$content2 = explode("'", improved_var_export($db->results(), true));
			//If connection points to called argument
			If($content2[7]==$content[15]){
				$db->get('arguments', array(
							'argument_id', '=', $content2[3]));
				$content3 = explode("'", improved_var_export($db->results(), true));
				//If middle argument is a disproval
				if($content3[3]==0){
					//Cycle through connections again to find other half of connection
					$db->get('connections', array(
							'connection_id', '=', $list3));
					while(improved_var_export($db->results(), true)!='array ()'){
						$content4 = explode("'", improved_var_export($db->results(), true));
						//If cycling lands on correct connection and the other side of the connection matches the calling argument's id
						if($content4[7]==$content2[3]&&$content4[3]==$_GET['id']){
						//Print
							?>
							<a href="viewargument.php?id=<?php echo $content[15]; ?>"><?php echo $content[7]; ?></a><br>
							<?php
						}
						
						$list3++;
						$db->get('connections', array(
							'connection_id', '=', $list3));
					}
					$list3 = 1;
				}
			}
			$list2++;
			$db->get('connections', array(
							'connection_id', '=', $list2));
		}
		$list2 = 1;
		
		$list++;
		$db->get('arguments', array(
						'argument_id', '=', $list));
		}
	}
}

if($_GET['query']==2){
	$db = DB::getInstance();
	$list = 1;
	$list2 = 1;
	$list3 = 1;
	$content = array();
	$content2 = array();
	$content3 = array();
	$content4 = array();
	//Cycle through all arguments
	$db->get('arguments', array(
					'argument_id', '=', $list));
	while(improved_var_export($db->results(), true)!='array ()'){
		$content = explode("'", improved_var_export($db->results(), true));
		//Except disprovals, supports, and neutral connections
		if($content[3] < 3){
			$list++;
			$db->get('arguments', array(
							'argument_id', '=', $list));
		//Exclude hidden arguments
		} else if($content[23] == 1){
			$list++;
			$db->get('arguments', array(
					'argument_id', '=', $list));
		} else {
		//Cycle through all connections
		$db->get('connections', array(
						'connection_id', '=', $list2));
		while(improved_var_export($db->results(), true)!='array ()'){
			$content2 = explode("'", improved_var_export($db->results(), true));
			//If connection points to called argument
			If($content2[7]==$content[15]){
				$db->get('arguments', array(
							'argument_id', '=', $content2[3]));
				$content3 = explode("'", improved_var_export($db->results(), true));
				//If middle argument is a support
				if($content3[3]==1){
					//Cycle through connections again to find other half of connection
					$db->get('connections', array(
							'connection_id', '=', $list3));
					while(improved_var_export($db->results(), true)!='array ()'){
						$content4 = explode("'", improved_var_export($db->results(), true));
						//If cycling lands on correct connection and the other side of the connection matches the calling argument's id
						if($content4[7]==$content2[3]&&$content4[3]==$_GET['id']){
						//Print
							?>
							<a href="viewargument.php?id=<?php echo $content[15]; ?>"><?php echo $content[7]; ?></a><br>
							<?php
						}
						
						$list3++;
						$db->get('connections', array(
							'connection_id', '=', $list3));
					}
					$list3 = 1;
				}
			}
			$list2++;
			$db->get('connections', array(
							'connection_id', '=', $list2));
		}
		$list2 = 1;
		
		$list++;
		$db->get('arguments', array(
						'argument_id', '=', $list));
		}
	}
}

if($_GET['query']==3){
	$db = DB::getInstance();
	$list = 1;
	$list2 = 1;
	$list3 = 1;
	$content = array();
	$content2 = array();
	$content3 = array();
	$content4 = array();
	//Cycle through all arguments
	$db->get('arguments', array(
					'argument_id', '=', $list));
	while(improved_var_export($db->results(), true)!='array ()'){
		$content = explode("'", improved_var_export($db->results(), true));
		//Except disprovals, supports, and neutral connections
		if($content[3] < 3){
			$list++;
			$db->get('arguments', array(
							'argument_id', '=', $list));
		//Exclude hidden arguments
		} else if($content[23] == 1){
			$list++;
			$db->get('arguments', array(
					'argument_id', '=', $list));
		} else {
		//Cycle through all connections
		$db->get('connections', array(
						'connection_id', '=', $list2));
		while(improved_var_export($db->results(), true)!='array ()'){
			$content2 = explode("'", improved_var_export($db->results(), true));
			//If connection is from called argument
			If($content2[3]==$content[15]){
				$db->get('arguments', array(
							'argument_id', '=', $content2[7]));
				$content3 = explode("'", improved_var_export($db->results(), true));
				//If middle argument is a disproval
				if($content3[3]==0){
					//Cycle through connections again to find other half of connection
					$db->get('connections', array(
							'connection_id', '=', $list3));
					while(improved_var_export($db->results(), true)!='array ()'){
						$content4 = explode("'", improved_var_export($db->results(), true));
						//If cycling lands on correct connection and the other side of the connection matches the calling argument's id
						if($content4[3]==$content2[7]&&$content4[7]==$_GET['id']){
						//Print
							?>
							<a href="viewargument.php?id=<?php echo $content[15]; ?>"><?php echo $content[7]; ?></a><br>
							<?php
						}
						
						$list3++;
						$db->get('connections', array(
							'connection_id', '=', $list3));
					}
					$list3 = 1;
				}
			}
			$list2++;
			$db->get('connections', array(
							'connection_id', '=', $list2));
		}
		$list2 = 1;
		
		$list++;
		$db->get('arguments', array(
						'argument_id', '=', $list));
		}
	}
}

if($_GET['query']==4){
	$db = DB::getInstance();
	$list = 1;
	$list2 = 1;
	$list3 = 1;
	$content = array();
	$content2 = array();
	$content3 = array();
	$content4 = array();
	//Cycle through all arguments
	$db->get('arguments', array(
					'argument_id', '=', $list));
	while(improved_var_export($db->results(), true)!='array ()'){
		$content = explode("'", improved_var_export($db->results(), true));
		//Except disprovals, supports, and neutral connections
		if($content[3] < 3){
			$list++;
			$db->get('arguments', array(
							'argument_id', '=', $list));
		//Exclude hidden arguments
		} else if($content[23] == 1){
			$list++;
			$db->get('arguments', array(
					'argument_id', '=', $list));
		} else {	
		//Cycle through all connections
		$db->get('connections', array(
						'connection_id', '=', $list2));
		while(improved_var_export($db->results(), true)!='array ()'){
			$content2 = explode("'", improved_var_export($db->results(), true));
			//If connection is from called argument
			If($content2[3]==$content[15]){
				$db->get('arguments', array(
							'argument_id', '=', $content2[7]));
				$content3 = explode("'", improved_var_export($db->results(), true));
				//If middle argument is a support
				if($content3[3]==1){
					//Cycle through connections again to find other half of connection
					$db->get('connections', array(
							'connection_id', '=', $list3));
					while(improved_var_export($db->results(), true)!='array ()'){
						$content4 = explode("'", improved_var_export($db->results(), true));
						//If cycling lands on correct connection and the other side of the connection matches the calling argument's id
						if($content4[3]==$content2[7]&&$content4[7]==$_GET['id']){
						//Print
							?>
							<a href="viewargument.php?id=<?php echo $content[15]; ?>"><?php echo $content[7]; ?></a><br>
							<?php
						}
						
						$list3++;
						$db->get('connections', array(
							'connection_id', '=', $list3));
					}
					$list3 = 1;
				}
			}
			$list2++;
			$db->get('connections', array(
							'connection_id', '=', $list2));
		}
		$list2 = 1;
		
		$list++;
		$db->get('arguments', array(
						'argument_id', '=', $list));
		}
	}
}

if($_GET['query']==5){
	$db = DB::getInstance();
	$list = 1;
	$list2 = 1;
	$list3 = 1;
	$content = array();
	$content2 = array();
	$content3 = array();
	$content4 = array();
	//Cycle through all arguments
	$db->get('arguments', array(
					'argument_id', '=', $list));
	while(improved_var_export($db->results(), true)!='array ()'){
		$content = explode("'", improved_var_export($db->results(), true));
		//Except disprovals, supports, and neutral connections
		if($content[3] < 3){
			$list++;
			$db->get('arguments', array(
							'argument_id', '=', $list));
		//Exclude hidden arguments
		} else if($content[23] == 1){
			$list++;
			$db->get('arguments', array(
					'argument_id', '=', $list));
		} else {
		//Cycle through all connections
		$db->get('connections', array(
						'connection_id', '=', $list2));
		while(improved_var_export($db->results(), true)!='array ()'){
			$content2 = explode("'", improved_var_export($db->results(), true));
			//If connection points to called argument
			If($content2[7]==$content[15]){
				$db->get('arguments', array(
							'argument_id', '=', $content2[3]));
				$content3 = explode("'", improved_var_export($db->results(), true));
				//If middle argument is a neutral connection
				if($content3[3]==2){
					//Cycle through connections again to find other half of connection
					$db->get('connections', array(
							'connection_id', '=', $list3));
					while(improved_var_export($db->results(), true)!='array ()'){
						$content4 = explode("'", improved_var_export($db->results(), true));
						//If cycling lands on correct connection and the other side of the connection matches the calling argument's id
						if($content4[7]==$content2[3]&&$content4[3]==$_GET['id']){
						//Print
							?>
							<a href="viewargument.php?id=<?php echo $content[15]; ?>"><?php echo $content[7]; ?></a><br>
							<?php
						}
						
						$list3++;
						$db->get('connections', array(
							'connection_id', '=', $list3));
					}
					$list3 = 1;
				}
			}
			$list2++;
			$db->get('connections', array(
							'connection_id', '=', $list2));
		}
		$list2 = 1;
		
		$list++;
		$db->get('arguments', array(
						'argument_id', '=', $list));
		}
	}
}

if($_GET['query']==6){
	$db = DB::getInstance();
	$list = 1;
	$list2 = 1;
	$list3 = 1;
	$content = array();
	$content2 = array();
	$content3 = array();
	$content4 = array();
	//Cycle through all arguments
	$db->get('arguments', array(
					'argument_id', '=', $list));
	while(improved_var_export($db->results(), true)!='array ()'){
		$content = explode("'", improved_var_export($db->results(), true));
		//Except disprovals, supports, and neutral connections
		if($content[3] < 3){
			$list++;
			$db->get('arguments', array(
							'argument_id', '=', $list));
		//Exclude hidden arguments
		} else if($content[23] == 1){
			$list++;
			$db->get('arguments', array(
					'argument_id', '=', $list));
		} else {
		//Cycle through all connections
		$db->get('connections', array(
						'connection_id', '=', $list2));
		while(improved_var_export($db->results(), true)!='array ()'){
			$content2 = explode("'", improved_var_export($db->results(), true));
			//If connection is from called argument
			If($content2[3]==$content[15]){
				$db->get('arguments', array(
							'argument_id', '=', $content2[7]));
				$content3 = explode("'", improved_var_export($db->results(), true));
				//If middle argument is a neutral connection
				if($content3[3]==2){
					//Cycle through connections again to find other half of connection
					$db->get('connections', array(
							'connection_id', '=', $list3));
					while(improved_var_export($db->results(), true)!='array ()'){
						$content4 = explode("'", improved_var_export($db->results(), true));
						//If cycling lands on correct connection and the other side of the connection matches the calling argument's id
						if($content4[3]==$content2[7]&&$content4[7]==$_GET['id']){
						//Print
							?>
							<a href="viewargument.php?id=<?php echo $content[15]; ?>"><?php echo $content[7]; ?></a><br>
							<?php
						}
						
						$list3++;
						$db->get('connections', array(
							'connection_id', '=', $list3));
					}
					$list3 = 1;
				}
			}
			$list2++;
			$db->get('connections', array(
							'connection_id', '=', $list2));
		}
		$list2 = 1;
		
		$list++;
		$db->get('arguments', array(
						'argument_id', '=', $list));
		}
	}
}
?>
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