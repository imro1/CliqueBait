<?php $this->view('shared/header','Log into your account'); ?>

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h2 class="text-center">Login</h2>
				</div>
				<div class="card-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="username">Username:</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
						</div>
						<button type="submit" class="btn btn-primary btn-block" name="action">Login</button>
					</form>
				</div>
				<div class="card-footer">
					<p class="text-center">Don't already have an account? <a href="/User/register">Register.</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->view('shared/footer'); ?>