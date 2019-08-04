<header>
	<nav class="nav">
		<div class="container container-nav">			
			<a href="<?= base_url(); ?>" class="nav-logo">Kantinku</a>
			<div class="nav-item">
				<a href="<?= base_url(); ?>" class="nav-link">Beranda</a>
				<a href="<?= base_url('home/kontak'); ?>" class="nav-link">Kontak</a>
				<a href="<?= base_url('home/tentang'); ?>" class="nav-link">Tentang</a>
				<a href="<?= base_url('home/pesanan'); ?>" class="nav-link">Pesanan</a>
				<a class="nav-link btn-notif" onclick="showNotif()">
					<span><?= count(notif); ?></span>
					Info
					<div class="notif">
						<?php foreach ( notif as $key ) : ?>
							<a href="" class="notif-item"><?= substr($key['title'], 0, 30); ?></a>
						<?php endforeach; ?>
					</div>
				</a>
				<a href="<?= base_url('home/logout'); ?>" class="nav-link">Logout</a>
			</div>
			<form action="<?= base_url('home/cari'); ?>" method="POST">
				<div class="search-group">
					<input type="text" name="q" placeholder="Search here">
					<button type="submit">Cari</button>
				</div>
			</form>
		</div>
	</nav>
	<div class="navbar">
		<div class="container">
			<a href="<?= base_url(); ?>" class="nav-logo">Kantinku</a>
			<button class="toggle-btn">
				<span class="line"></span>
			</button>
		</div>
	</div>
</header>
<script>
	var button = document.querySelector('.toggle-btn');
	var nav = document.querySelector('.nav');
	var cond = true;
	var cond2 = true;
	var notif = document.querySelector('.notif');

	function showNotif() {
		cond2 = !cond2;
		if (cond2) {
			notif.style.display = "none";
		} else {
			notif.style.display = "block";
		}
	}

	button.addEventListener('click', function () {
		cond = !cond;
		if (cond) {
			nav.style.left = "-100%"
		} else {
			nav.style.left = "0"
		}
	});
</script>