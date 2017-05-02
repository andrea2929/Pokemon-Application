<?php

	// Include header file for navigation bar and start of page
	include('header.php');

	// Initializing parameter for forms
	$params = array(
		'id' => $user['user_id']
	);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// Get profile changes
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// If any of the cells are empty, default them to old data
		if (empty($full_name)) { $full_name = $user['ffull_name']; }
		if (empty($email)) { $email = $user['email']; }
		if (empty($password)) { $password = $user['password']; }

		// Run Edit Profile Statement
		$params = array(
			'id' => $user['user_id'],
			'password' => $password,
			'full_name' => $full_name,
			'email' => $email
		);

		$sql = file_get_contents('sql/editprofile.sql');
		$statement = $database->prepare($sql);
		$statement->execute($params);

		// Update user after edits
		$user = array(
			'id' => $user['user_id'],
			'username' => $user['username'],
			'password' => $password,
			'full_name' => $full_name,
			'email' => $email
			);
	}

?>

<div class="jumbotron">
	<div class="container">
		<h1>Profile</h1>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>User Information</h3>
			<strong>Username: </strong> <?php echo $user['username']; ?><br>
			<strong>First Name: </strong> <?php echo $user['full_name']; ?><br>
			<strong>Email: </strong> <?php echo $user['email']; ?><br>
			<strong>Phone: </strong> <?php echo $user['phone']; ?><br>

			<br>
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#editprofile">
			  <i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile
			</a><br>
			<div class="collapse" id="editprofile">
				<br>
			  	<div class="well">
					<form method="post">
						<input type="text" class="form-control" name="full_name" placeholder="Full Name">
						<br>
						<input type="text" class="form-control" name="email" placeholder="Email">
						<br>
						<input type="password" class="form-control" name="password" placeholder="password">
						<br>
						<input type="submit" value="Make Changes" class="btn btn-default dropdown-toggle" />
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<p>Text for other things here</p>
		</div>
	</div>


</div>

<?php include('footer.php') ?>
