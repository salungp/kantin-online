<?= $this->view('public/templates/navbar'); ?>
<?php $this->view('public/templates/banner', array('text' => 'Selamat datang di Kantinku')); ?>
<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="content">
				<?php echo Flasher::getFlash(); ?>
				<div class="row">
					<?php foreach ($menu as $key) :  ?>
						<div class="col-4">
							<div class="box">
								<div class="menu-image">
									<img src="<?= base_url('assets/images/menu_images/'.$key['menu_image']); ?>">
									<a href="<?= base_url('home/suka/'.$key['id']); ?>" class="menu-btn-love"><i class="fa  fa-heart-o"></i></a>
								</div>
								<div class="menu-text">
									<a href="<?= base_url('home/beli/'.$key['id']); ?>">
										<h3><?= $key['nama']; ?></h3>
										<h1>Rp.<?= $key['harga']; ?></h1>
										<a href="<?= base_url('home/beli/'.$key['id']); ?>" class="menu-btn-cart"><i class="fa fa-shopping-cart"></i></a>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?php if (count($menu) < 1) : ?>
						<h1>Tidak ada hasil</h1>
					<?php endif; ?>
				</div>
			</div>
			<div class="sidebar">
				<div class="sidebar-item">
					<div class="sidebar-header">
						<h1>Kategori</h1>
					</div>
					<div class="sidebar-body">
						<div class="list">
							<a href="<?= base_url('home/per/1'); ?>">Minuman</a>
							<a href="<?= base_url('home/per/2'); ?>">Makanan</a>
							<a href="<?= base_url('home/per/3'); ?>">Makanan Ringan</a>
							<a href="<?= base_url('home/per/4'); ?>">Gorengan</a>
							<a href="<?= base_url(); ?>">Nasi Bungkus</a>
						</div>
					</div>
				</div>
				<div class="sidebar-item">
					<div class="sidebar-header">
						<h1>Paling laris</h1>
						<div class="row">
							<?php foreach ($menu as $key) : ?>				
							<div class="col-auto">
								<div class="box-sm">
									<div class="menu-image">
										<img src="<?= base_url('assets/images/menu_images/'.$key['menu_image']); ?>">
									</div>
									<div class="menu-text">
										<h3 class="text-sm"><?= $key['nama']; ?></h3>
										<h1 class="text-md">Rp.<?= $key['harga']; ?></h1>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>