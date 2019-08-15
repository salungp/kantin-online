<?php $this->view('public/templates/navbar'); ?>
<?php $this->view('public/templates/banner', array('text' => 'Home / Kontak')); ?>
<div class="kontak">
	<div class="container">
		<h1>Kirimkan pesan yang bermanfaat ya.</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<?php Flasher::getFlash(); ?>
		<form action="<?= base_url('home/kirim_kontak'); ?>" method="POST">
			<div class="row">
				<div class="col-6">
					<label for="fn">Nama Depan</label>
					<input id="fn" type="text" name="front_name" placeholder="Nama depan" class="form-input" required>
				</div>
				<div class="col-6">
					<label for="bn">Nama Belakang</label>
					<input id="bn" type="text" name="back_name" placeholder="Nama belakang" class="form-input" required>
				</div>
				<div class="col-12">
					<label for="subject">Subjek</label>
					<input type="text" name="subject" id="subject" class="form-input" placeholder="Subjek" required>
				</div>
				<div class="col-12">
					<label for="email">email</label>
					<input type="email" name="email" id="email" class="form-input" placeholder="Email" required>
				</div>
				<div class="col-12">
					<label for="msg">Pesan</label>
					<textarea id="msg" name="msg" class="form-input" placeholder="Pesan" required></textarea>
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-danger">Kirim</button>
				</div>
			</div>
		</form>
	</div>
</div>