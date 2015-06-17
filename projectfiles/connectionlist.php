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
		//Except disprovals and supports
		if($content[3] < 2){
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
		//Except disprovals and supports
		if($content[3] < 2){
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
		//Except disprovals and supports
		if($content[3] < 2){
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
		//Except disprovals and supports
		if($content[3] < 2){
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
?>
</article>
</body>
</html>