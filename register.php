<?php

	include('header.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
		$email = $_POST['email'];

		$sql = file_get_contents('sql/userid.sql');
		$statement = $database->prepare($sql);
		$statement->execute();
		$id = $statement->fetchAll(PDO::FETCH_ASSOC);
    $id = $id[0]['id'] + 1;

		$sql = file_get_contents('sql/register.sql');
		$params = array(
			'id' => $id,
			'username' => $username,
			'password' => $password,
			'full_name' => $full_name,
			'email' => $email,
      'phone' => $phone
		);
		$statement = $database->prepare($sql);
		$statement->execute($params);
		$users = $statement->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['userid'] = $id;

		echo("<script>location.href ='index.php';</script>");
	}
?>

	<div class="jumbotron">
		<div class="container">
			<h1>Register</h1>
			<p>Fill out the following in order to create a user account for this awesome application.</p>
		</div>
	</div>

	<div class="container">

		<form method="POST">
			<input type="text" class="form-control" name="username" placeholder="username" required>
			<br>
			<input type="password" class="form-control" name="password" placeholder="password" required>
			<br>
			<input type="text" class="form-control" name="full_name" placeholder="full name">
			<br>
			<input type="email" class="form-control" name="email" placeholder="email address">
			<br>
      <input type="phone" class="form-control" name="phone" placeholder="phone number">
			<br>
			<input type="submit" value="Register" class="btn btn-default dropdown-toggle" />
		</form>
	</div>

<?php include('footer.php'); ?>
