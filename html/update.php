<?php
require 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50)
		));

		if($validation->passed()) {

			try {
				$user->update(array(
					'name' => Input::get('name')
				));
			} catch(Exception $e) {
				die($e->getMessage());
			}

			Session::flash('home', 'Your details have been updated.');
			Redirect::to('index.php');
		} else {
			foreach($validate->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}

?>

<form action="" method="post">
	<label for="name">Name:</label>
	<input type="text" name="name" id="name" value="<?php echo escape($user->data()->name); ?>">
	<br>
	<input type="submit" value="Update">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>