<div class="form-wrapper">
	<div class="form-box">
		<h1>Sign In</h1>
		<?php Flasher::getFlash(); ?>
		<form action="<?= base_url('home/alogin'); ?>" method="POST">
			<input type="text" name="username" class="form-control" placeholder="NIS" required="">
			<input type="password" name="password" class="form-control" placeholder="Password" required="">
			<button type="submit">Sign In</button>
			Tidak punya akun?<a href="<?= base_url('home/register'); ?>" style="color: #3498db"> Daftar</a>
		</form>
	</div>
</div>