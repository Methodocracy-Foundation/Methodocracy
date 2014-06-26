/*
Copyright 2014 Zachary Hebert
This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM is a trademark of Methodocracy.org (C)2014, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
*/

<?php
require 'core/init.php';

if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
		$user = new User();

		$remember = (Input::get('remember') === 'on') ? true : false;
		$login = $user->login(Input::get('username'), Input::get('password'), $remember);

		if($login) {
			Redirect::to('index.php');
		} else {
			echo '<p>Sorry, that username and password wasn\'t recognised.</p>';
		}
	}
}

?>

<form action="" method="post">
	<div class="field">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username">
	</div>

	<div class="field">
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
	</div>

	<div class="field">
		<label for="remember">
			<input type="checkbox" name="remember" id="remember"> Remember me
		</label>
	</div>

	<input type="submit" value="Log in">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>