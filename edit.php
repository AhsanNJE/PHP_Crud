<?php 
	include "functions.php";
	$id = $_GET['id'];
	$data = findData($id);
	$allData = $data->fetch_assoc();
?>

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
					if(isset($_POST['update'])){
						updateData($id,$_POST);
					}
				?>
				<a href="show.php" class="btn btn-info">Show Data</a>

				<form method="POST">
					<div class="form-group mt-3">
						<label for="studentName">Student Name</label>
						<input id="studentName" class="form-control" type="text" name="studentName" value="<?php echo $allData["studentName"] ?>">
					</div>
					<div class="form-group mt-3">
						<label for="fName">Father Name</label>
						<input id="fName" class="form-control" type="text" name="fName" value="<?php echo $allData["fName"] ?>">
					</div>
					<div class="form-group mt-3">
						<label for="mName">Mother Name</label>
						<input id="mName" class="form-control" type="text" name="mName" value="<?php echo $allData["mName"] ?>">
					</div>
					<div class="form-group mt-3">
						<label for="email">Email Address</label>
						<input readonly id="email" class="form-control" type="text" name="email" value="<?php echo $allData["email"] ?>">
					</div>
					<div class="form-group mt-3">
						<label for="status">Status</label>
						<select id="status" class="form-control" name="status">
							<?php 
								if ($allData["status"]==1) {
									echo '<option value="1">Active</option>';
								}
								else{
							        echo '<option value="2">Inactive</option>';
								}
							?>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
							
						</select>
					</div>
					<button name="update" class="btn btn-success mt-3 form-control">Update  Data</button>

				</form>
				
			</div>
		</div>
	</div>

</body>
</html>
