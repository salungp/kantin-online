<?php $this->view('public/templates/navbar'); ?>
<?php $this->view('public/templates/banner', array('text' => 'Silahkan pesan makanan anda')) ?>
<div class="beli">
	<div class="container">
		<?php Flasher::getFlash(); ?>
		<div class="row">
			<div class="col-6">
				<div class="image">
					<img src="<?= base_url('assets/images/menu_images/'.$menu['menu_image']); ?>">
				</div>
			</div>
			<div class="col-6">
				<div class="desk">
					<h3>Detail</h3>
					<hr>
					<form action="<?= base_url('home/pesan'); ?>" method="POST">
						<p class="text-md"><?= $menu['nama']; ?></p>
						<input type="hidden" name="nama" value="<?= $menu['nama']; ?>">
						<input type="hidden" name="foto" value="<?= $menu['menu_image']; ?>">
						<input type="hidden" name="id" value="<?= $menu['id']; ?>">
						<h1>Rp.<?= $menu['harga']; ?></h1>
						<input type="hidden" name="harga" value="<?= $menu['harga']; ?>">
						<p>Lokasi Pengiriman</p>
						<select name="lokasi" class="form-control">
							<option>Aula</option>
							<option>UKS</option>
							<option>Ruang Guru</option>
							<option>Lab</option>
							<option>Kelas</option>
						</select>
						<p>Jumlah</p>
						<div class="group">
							<button onclick="document.querySelector('#jumlah').value++" id="btn-plus" type="button">+</button>
							<input type="hidden" name="jumlah" id="jumlah" value="">
							<p id="coba">
							</p>
							<button onclick="document.querySelector('#jumlah').value--" id="btn-mines" type="button">-</button>
						</div>
						<br>
						<button type="submit" class="btn btn-primary">Pesan sekarang</button>
					</form>
					<script>
						var coba = document.querySelector('#coba');
						var jumlah = document.querySelector('#jumlah');
						var plus = document.querySelector('#btn-plus');
						var mines = document.querySelector('#btn-mines');
						plus.addEventListener('click', function () {
							coba.innerHTML = jumlah.value;
						});

						mines.addEventListener('click', function () {
							coba.innerHTML = jumlah.value;
						});
					</script>
				</div>
			</div>
		</div>
		<h1>Yang lainya</h1>
		<hr>
		<div class="row">
			<?php foreach ($other as $key) :  ?>
				<div class="col-4">
					<div class="box">
						<div class="menu-image">
							<img src="<?= base_url('assets/images/menu_images/'.$key['menu_image']); ?>">
						</div>
						<div class="menu-text">
							<h3><?= $key['nama']; ?></h3>
							<h1>Rp.<?= $key['harga'] ?></h1>
							<a href="<?= base_url('home/beli/'.$key['id']); ?>" class="btn-round">Beli</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>