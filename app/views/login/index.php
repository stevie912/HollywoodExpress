<?php require_once 'app/views/templates/header.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
							<br>
                <h1>Login</h1>
							<br>
							<br>
            </div>
        </div>
    </div>

	<div class="row justify-content-center">
			<div class="col-sm-auto">
			<form action="/login/verify" method="post" >
			<fieldset>
				<div class="form-group">
					<label for="username">Username</label>
					<input required type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input required type="password" class="form-control" name="password">
				</div>
				<br>
				<button type="submit" class="btn btn-secondary">Login</button>
			</fieldset>
			</form> 
				<br>
				<br>
				<a href="/create" class="link-secondary"><h5 class="text-center">Create new user</h5></a>
				<br>
		</div>
	</div>


<!-- alert for failed login attempt-->
	<?php if (isset($_SESSION['failed_attempts']) || isset($_SESSION['no_user'])) { 	?> 
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="alert alert-danger" role="alert">
								Incorrect username or password!
								<br>
								You will be temporarily locked out after <?= 3 - $_SESSION['failed_attempts'] 								?> more unsuccessful login attempts
							</div>
						</div>
				</div>
	<?php	unset($_SESSION['no_user']);	}	?>

	<!-- toast for user created -->
	<?php if (isset($_SESSION['user_created'])) { ?>
		 <div class="toast show text-grey bg-light bg-gradient border-1 position-absolute bottom-0 start-0" role="alert" aria-live="assertive" aria-atomic="true">
			 <div class="toast-body ">
				 Success! New user created.
				 <div class="mt-2 pt-2 border-top">
					 <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">Close</button>
				 </div>
			 </div>
		 </div>																				 
	<?php unset($_SESSION['user_created']); } ?>
	


	
<?php require_once 'app/views/templates/footer.php' ?>
