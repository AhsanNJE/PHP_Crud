<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>phpCrud</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
	


	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">

				<?php
				include "functions.php";
				
				if(isset($_POST['send'])){
					insert($_POST);
				}
				?>

				<a href="show.php" class="btn btn-info">Show Data</a>

				<form method="POST">
					<div class="form-group">
						<label for="studentName">Student Name</label>
						<input id="studentName" class="form-control" type="text" name="studentName">
					</div>
					<div class="form-group">
						<label for="fName">Father Name</label>
						<input id="fName" class="form-control" type="text" name="fName">
					</div>
					<div class="form-group">
						<label for="mName">Mother Name</label>
						<input id="mName" class="form-control" type="text" name="mName">
					</div>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input id="email" class="form-control" type="text" name="email">
					</div>
					<div class="form-group">
						<label for="status">Status</label>
						<select id="status" class="form-control" name="status">
							<option value="">------Select Status------</option>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
					</div>
					<button name="send" class="btn btn-success mt-3 form-control">Send</button>

				</form>
				
			</div>
		</div>
	</div>

</body>
</html>