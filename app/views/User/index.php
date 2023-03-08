<?php $this->view('shared/header','Log into your account'); ?>

<h2>LOGIN</h2>
<form method="post" action="" class="form">
	<div class="form__field">
	<label>Username:</label><input type="text" name="username" placeholder="username"><br>
	</div>
	<div class="form__field">
	<label>Password:</label><input type="password" name="password"><br>
	</div>
	<div class="form__field">
	<input type="submit" name="action" value='Login'>
	</div>
	<p>Don't already have an account? <a href="/User/register">Register.</a></p>	
</form>

<?php $this->view('shared/footer'); ?>