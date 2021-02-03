<?php 
include('connection.php');
session_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/ca92620e44.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container">
	<form method="post" action="generate.php">	
		<?php if(isset($_SESSION['msg'])): ?>
			<div class="text-danger text-center"><?php echo $_SESSION['msg'] ?></div>
		<?php endif; ?>
		<div class="form-group">
			<label>Enter first 5 number</label>
			<input type="number" name="const_num" class="const_num form-control" required maxlength="5">
		</div>
		<div class="form-group">
			<label>Amount to generate</label>
			<div class="text-danger">Not more than 2000</div>
			<input type="number" name="gen" class="gen form-control" required max="1000">
		</div>
		<div class="form-group">
			<button class="btn btn-dark generate_btn" type="submit" name="generate_btn">Generate</button>
		</div>
	</form>
</div>