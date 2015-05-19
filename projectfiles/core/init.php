<!--
	Copyright 2014-2015 Zachary Hebert, Patrick Gillespie
	This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM is a trademark of Methodocracy.org (C)2014-2015, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
-->

<?php
$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'methodocracyDB.db.11904691.hostedresource.com',
		'username' => 'methodocracyDB',
		'password' => 'Dfh#2dh@jdja4382DHf',
		'db' => 'methodocracyDB'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => '604800'
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

 spl_autoload_register(function($class){
	require_once 'classes/' . $class . '.php';
 });
 
 require_once 'functions/sanitize.php';