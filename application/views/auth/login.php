<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Login</title>
	<link rel="stylesheet" href="<?=site_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?=site_url('assets/css/all.min.css')?>">
</head>
<body>

	
	<div class="container-fluid">
		<div class="row justify-content-center mt-5">
			<div class="col-md-5">

				<?=$this->session->flashdata('message')?>
				
				<form method="post" action="<?=site_url('Auth')?>">
					<div class="form-group">
						<input type="email" class="form-control" name="email"  value="<?=set_value('email')?>" placeholder="Email">
						<?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fas fa-lock"></i> Login</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	
	<script src="<?=site_url('assets/js/jquery.min.js')?>"></script>
	<script src="<?=site_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>