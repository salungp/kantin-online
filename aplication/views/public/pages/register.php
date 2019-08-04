<div class="form-wrapper">
	<div class="form-box">
		<h1>Sign Up</h1>
		<?php Flasher::getFlash(); ?>
		<form action="<?= base_url('home/daftar'); ?>" method="POST">
			<input type="text" name="nama" class="form-control" placeholder="Nama" required="">
			<input type="email" name="email" class="form-control" placeholder="Email" required="">
			<select name="kelas" class="form-control">
				<option>XI-RPL-2</option>
				<option>XI-RPL-1</option>
				<option>XI-BDP-1</option>
				<option>XI-BDP-2</option>
				<option>XI-AKL-1</option>
				<option>XI-AKL-2</option>
				<option>XI-OTKP-1</option>
				<option>XI-OTKP-2</option>
				<option>XI-OTKP-3</option>
				<option>XI-TSM-1</option>
				<option>XI-TSM-2</option>
			</select>
			<input type="number" name="nis" class="form-control" placeholder="NIS" required="">
			<input type="password" name="password" class="form-control" placeholder="Password" required="">
			<button type="submit">Sign Up</button>
			Sudah punya akun?<a href="<?= base_url('home/login'); ?>" style="color: #3498db"> Login</a>
		</form>
	</div>
</div>