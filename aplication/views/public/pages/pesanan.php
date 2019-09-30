<?php $this->view('public/templates/navbar'); ?>
<?php $this->view('public/templates/banner', array('text' => 'Silahkan tunggu')); ?>
<div class="pesanan" style="padding: 20px 0">
	<div class="container">
		<?php Flasher::getFlash(); ?>
		<h1>Pesanan</h1>
		<p>Hari ini anda sedang memesan. <b>Jika sudah sampai mohon pencet tombol selesai oke?</b></p>
		<div class="box-table">
			<table cellspacing="0">
				<tr>
					<th>No</th>
					<th>Menu Foto</th>
					<th>Menu</th>
					<th>Pesan jam</th>
					<th>Jumlah</th>
					<th>Status</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($pesanan as $key) : ?>
				<tr>
					<td><?php echo $i ?></td>
					<td>
						<img src="<?php echo base_url('assets/images/menu_images/'.$key['menu_image']); ?>" width="100">
					</td>
					<td><?php echo $key['nama']; ?></td>
					<td><?php echo date('D M Y H.i', strtotime($key['created_at'])); ?></td>
					<td><?php echo $key['jumlah_barang']; ?></td>
					<td>
						<?php if ($key['status'] < 1) : ?>
							<div class="btn btn-success">Transaksi selesai</div>
						<?php else : ?>
							<a href="<?php echo base_url('home/selesai/'.$key['id']); ?>" class="btn btn-danger">Selesai</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>