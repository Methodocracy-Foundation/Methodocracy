<!--
	Copyright 2014 Zachary Hebert, Patrick Gillespie
	This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM and methodocracy.org TM are trademarks of Methodocracy Foundation (C)2014, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
-->

<?php
class Input {
	public static function exists($type = 'post') {
		switch($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
			break;
			case 'get':
				return (!empty($_GET)) ? true: false;
			break;
			default:
				return false;
			break;
		}
	}

	public static function get($item) {
		if(isset($_POST[$item])) {
			return $_POST[$item];
		} else if (isset($_GET[$item])) {
			return $_GET[$item];
		}
		
		return '';
	}
	
	public static function removeCharacters($string){
		for ($i = 0; $i < strlen($string); $i++){
			if (substr($string,$i,1) == "'" || substr($string,$i,1) == '"' || substr($string,$i,1) == "<" || substr($string,$i,1) == ">"){
				$string = substr($string,0,$i).substr($string,$i+1,(strlen($string)-$i));
			}
		}
		return $string;
	}
}