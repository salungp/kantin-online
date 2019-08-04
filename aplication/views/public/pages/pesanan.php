<?php $this->view('public/templates/navbar'); ?>
<?php $this->view('public/templates/banner', array('text' => 'Silahkan tunggu')); ?>
<div class="pesanan" style="padding: 20px 0">
	<div class="container">
		<h1>Pesanan</h1>
		<p>Hari ini anda sedang memesan.</p>
		<div class="box-table">
			<table cellspacing="0">
				<tr>
					<th>No</th>
					<th>Menu Foto</th>
					<th>Menu</th>
					<th>Pesan jam</th>
					<th>Status</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($pesanan as $key) : ?>
				<tr>
					<td><?= $i ?></td>
					<td>
						<img src="<?= base_url('assets/images/menu_images/'.$key['foto']); ?>" width="100">
					</td>
					<td><?= $key['nama']; ?></td>
					<td><?= date('H.i', strtotime($key['created_at'])); ?></td>
					<td>Selesai</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>