<?php
class Home extends Controller
{
	public $home_model;

	public function __construct()
	{
		$this->home_model = $this->model('home_model');
		define('user', $this->home_model->getUser());
		define('notif', $this->home_model->getNotif());
	}

	public function login()
	{
		$data['title'] = 'Login';
		$this->view('public/templates/header', $data);
		$this->view('public/pages/login');
	}

	public function alogin()
	{
		$this->home_model->actlogin($_POST);
	}

	public function index()
	{
		is_logged_in();
		$data['title'] = 'Kantinku - Kantinku adalah aplikasi kantin online berbasis website';
		$data['menu'] = $this->home_model->get();
		$data['coba'] = 'Hallo';
		$this->view('public/templates/header', $data);
		$this->view('public/pages/beranda', $data);
		$this->view('public/templates/footer');
	}

	public function tentang()
	{
		is_logged_in();
		$data['title'] = 'Tentang - aplikasi ini dibuat untuk mempermudah ketika ingin berbelanja di kantin yang desak desakan.';
		$this->view('public/templates/header', $data);
		$this->view('public/pages/tentang');
		$this->view('public/templates/footer');
	}

	public function kontak()
	{
		is_logged_in();
		$data['title'] = 'Kontak - Kirimkan pesan yang bermanfaat';
		$this->view('public/templates/header', $data);
		$this->view('public/pages/kontak');
		$this->view('public/templates/footer');
	}

	public function beli($id = null)
	{
		is_logged_in();
		$data['menu'] = $this->home_model->get_where($id);
		if ( is_null($id) )
		{
			show_404();
		} else if ($data['menu']['id'] !== $id)
		{
			show_404();
		}
		$data['title'] = 'Ayam goreng pisang';
		$data['other'] = $this->home_model->kategori($data['menu']['kategori']);
		$this->view('public/templates/header', $data);
		$this->view('public/pages/beli', $data);
		$this->view('public/templates/footer');
	}

	public function logout()
	{
		session_destroy();
		session_unset();
		redirect('home/login');
	}

	public function cari()
	{
		$data['title'] = 'Cari - '.@$_POST['q'];
		$data['menu'] = $this->home_model->search();
		$this->view('public/templates/header', $data);
		$this->view('public/pages/beranda', $data);
		$this->view('public/templates/footer');
	}

	public function pesan()
	{
		is_logged_in();
		$barang_id = $_POST['id'];
		$nama_barang = $_POST['nama'];
		$harga_barang = $_POST['harga'];
		$lokasi = $_POST['lokasi'];
		$foto_barang = $_POST['foto'];
		$jumlah_barang = $_POST['jumlah'];

		if ( $jumlah_barang < 1 )
		{
			Flasher::setFlash('<div class="alert alert-danger">
				<h1>Danger</h1>
				Maaf anda belum memasukkan jumlah makanan.</div>');
			redirect('home/beli/'.$barang_id);
			die;
		}

		$data = array(
			'barang_id' => $barang_id,
			'nama' => $nama_barang,
			'foto' => $foto_barang,
			'user_id' => user['id'],
			'harga' => $harga_barang,
			'lokasi_user' => $lokasi,
			'jumlah_barang' => $jumlah_barang,
			'updated_at' => date('Y-m-d')
		);

		if ($this->home_model->pesanMakanan($data) > 0)
		{
			Flasher::setFlash('<div class="alert alert-success">
				<h1>Success</h1>
				Pesanan berhasil dikirim silahkan tunggu pesanan datang.</div>');
			redirect('home/beli/'.$barang_id);
		} else {
			Flasher::setFlash('<div class="alert alert-danger">
				<h1>Danger</h1>
				Pesanan gagal dikirim.</div>');
			redirect('home/beli/'.$barang_id);
		}
	}

	public function per($kategori = null)
	{
		is_logged_in();
		$data['menu'] = $this->home_model->kategori($kategori);
		$this->view('public/templates/header', array('title' => 'Kategori - '.$kategori));
		$this->view('public/pages/beranda', $data);
		$this->view('public/templates/footer');
	}

	public function pesanan()
	{
		is_logged_in();
		$data['title'] = 'Pesanan - Silahkan tunggu pesanan yang sedang di proses';
		$data['pesanan'] = $this->home_model->pesanan(user['id']);
		$this->view('public/templates/header', $data);
		$this->view('public/pages/pesanan', $data);
		$this->view('public/templates/footer');
	}

	public function kirim_kontak()
	{
		$nama = @$_POST['front_name'].' '.@$_POST['back_name'];
		$subject = @$_POST['subject'];
		$email = @$_POST['email'];
		$msg = @$_POST['msg'];

		$data = array(
			'nama' => $nama,
			'subject' => $subject,
			'email' => $email,
			'pesan' => $msg
		);

		if ($this->home_model->insert_kontak($data) > 0)
		{
			Flasher::setFlash('<div class="alert alert-success">
				<h1>Success</h1>
				Pesan anda berhasil dikirim.</div>');
			redirect('home/kontak');
		} else {
			Flasher::setFlash('<div class="alert alert-danger">
				<h1>Danger</h1>
				Pesan anda gagal dikirim.</div>');
			redirect('home/kontak');
		}
	}

	public function register()
	{
		$data['title'] = 'Register';
		$this->view('public/templates/header', $data);
		$this->view('public/pages/register');
	}

	public function daftar()
	{
		$nama = @$_POST['nama'];
		$nis = @$_POST['nis'];
		$kelas = @$_POST['kelas'];
		$password = @$_POST['password'];
		$email = @$_POST['email'];

		$data = array(
			'nama' => $nama,
			'kelas' => $kelas,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'email' => $email,
			'nis' => $nis,
			'updated_at' => date('Y-m-d H:i:s'),
			'profile_image' => 'default.jpg'
		);

		if ( $this->home_model->register($data) > 0 )
		{
			Flasher::setFlash('<div class="alert alert-success">
				<h1>Success</h1>
				Daftar berhasil silahkan login terlebih dahulu.</div>');
			redirect('home/login');
		} else {
			Flasher::setFlash('<div class="alert alert-danger">
				<h1>Danger</h1>
				daftar gagal.</div>');
			redirect('home/register');
		}
	}
}