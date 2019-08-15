<?php
class home_model
{
	public $db;
	public function __construct()
	{
		$this->db = new Database();
	}

	public function get()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->select('id, nama, harga, menu_image');
		$this->db->get('menu');
		return $this->db->result_array();
	}

	public function get_where($id = null)
	{
		$this->db->get_where('menu', array('id' => $id));
		return $this->db->row_array();
	}

	public function like_menu_where($id = null)
	{
		$this->db->get_where('like_menu', array('id_user', $id));
		return $this->db->result_array();
	}

	public function pesanan($id)
	{
		$this->db->order_by('id', 'DESC');
		$this->db->query();
		return $this->db->result_array();
	}

	public function kategori($text = null)
	{
		$this->db->get_where('menu', array('kategori' => $text));
		return $this->db->result_array();
	}

	public function pesanMakanan($data = array())
	{
		$this->db->insert('pesanan', $data);
		return $this->db->rowCount();
	}

	public function getNotif()
	{
		$this->db->get('notifikasi');
		return $this->db->result_array();
	}

	public function getUser()
	{
		$this->db->get_where('user', array('id' => @$_SESSION['token']['id']));
		return $this->db->row_array();
	}

	public function search()
	{
		$key = @$_POST['q'];
		$this->db->query("SELECT * FROM menu WHERE nama LIKE '%$key%'");
		return $this->db->result_array();
	}

	public function actlogin($data)
	{
		$username = $data['username'];
		$password = $data['password'];

		$this->db->get_where('user', array('nis' => $username));
		$user = $this->db->row_array();

		if ($user)
		{
			if (password_verify($password, $user['password']))
			{
				$_SESSION['token'] = array(
					'id' => $user['id']
				);
				redirect();
			} else {
				Flasher::setFlash('<div class="alert alert-danger">
				<h1>Danger</h1>
				Password salah.</div>');
				redirect('home/login');
			}
		} else {
			Flasher::setFlash('<div class="alert alert-danger">
				<h1>Danger</h1>
				Email tidak terdaftar.</div>');
			redirect('home/login');
		}
	}

	public function insert_kontak($data)
	{
		$this->db->insert('kontak', $data);
		return $this->db->rowCount();
	}

	public function register($data)
	{
		$this->db->insert('user', $data);
		return $this->db->rowCount();
	}

	public function like($data)
	{
		$this->db->insert('like_menu', $data);
		return $this->db->rowCount();
	}
}