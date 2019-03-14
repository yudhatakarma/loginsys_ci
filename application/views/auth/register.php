<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Registration</title>
	<link rel="stylesheet" href="<?=site_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?=site_url('assets/css/all.min.css')?>">
</head>
<body>

	
	<div class="container-fluid">
		<div class="row justify-content-center mt-5">
			<div class="col-md-5">
				
				<form method="post" action="<?=site_url('Auth/register')?>">
					<div class="form-row">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" name="name" placeholder="Fullname" value="<?=set_value('name')?>">
							<?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-group col-md-12">
							<input type="email" class="form-control" name="email" placeholder="Email Active" value="<?=set_value('email')?>" >
							<?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-group col-md-6">
							<input type="password" class="form-control" name="password1" placeholder="Password">
							<?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-group col-md-6">
							<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
						</div>

						<div class="form-group col-md-12">
							<button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fas fa-lock"></i> Login</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>

	
	<script src="<?=site_url('assets/js/jquery.min.js')?>"></script>
	<script src="<?=site_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>