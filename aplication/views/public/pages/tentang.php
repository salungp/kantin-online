<?php $this->view('public/templates/navbar'); ?>
<?php $this->view('public/templates/banner', array('text' => 'Home / Tentang')); ?>
<div class="tentang">
	<div class="container">
		<h1 class="big">Tentang aplikasi ini.</h1>
		<div class="row">
			<div class="about-text">
				<h1 class="text-md">Kantinku</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="about-image">
				<img src="<?= base_url('assets/images/menu_images/2.jpg'); ?>">
			</div>
		</div>
	</div>
</div>
