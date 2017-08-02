<!--
	Copyright 2014 Zachary Hebert, Patrick Gillespie
	This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM and methodocracy.org TM are trademarks of Methodocracy Foundation (C)2014, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
-->

<?php
class Redirect {
	public static function to($location = null) {

		if($location) {
			if(is_numeric($location)) {
				switch($location) {
					case 404:
						header('HTTP/1.0 404 Not Found');
						include 'includes/errors/404.php';
						exit();
					break;
				}
			} else {
				if (!headers_sent()) {
					header('Location: ' . $location);
					exit();
				} else {
					echo '<script type="text/javascript">';
					echo 'window.location.href="'.$location.'";';
					echo '</script>';
					echo '<noscript>';
					echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
					echo '</noscript>'; exit();
				}
			}
		}
	}
}