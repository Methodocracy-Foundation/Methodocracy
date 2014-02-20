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