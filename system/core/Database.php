<?php
class Database
{
	private $db_name = database['db_name'];
	private $db_host = database['db_host'];
	private $db_user = database['db_user'];
	private $db_pass = database['db_pass'];
	public $conn;
	public $stmt;
	public $order;
	public $select = '*';

	public function __construct()
	{
		$dsn = 'mysql:host='.$this->db_host.';dbname='.$this->db_name;
		$this->conn = new PDO($dsn, $this->db_user, $this->db_pass);
	}

	public function select($field)
	{
		if ( ! is_array($field) && ! is_null($field))
		{
			$this->select = $field;
		} else {
			$this->select = '*';
		}
	}

	public function query($query)
	{
		$this->stmt = $this->conn->prepare($query);
	}

	public function get($table)
	{
		$this->stmt = $this->conn->prepare('SELECT '.$this->select.' FROM '.$table.$this->order);
		$this->stmt->execute();
	}

	public function insert($table, $data = array())
	{
		$key = implode(', ', array_keys($data));
		foreach ($data as $k => $v)
		{
			$_value[':'.$k] = $v;
			$_k = array_keys($_value);
			$_k = implode(', ', $_k);
		}
		$value = implode(', ', array_values($data));
		$query = 'INSERT INTO '.$table.' ('.$key.') VALUES ('.$_k.')';
		$this->stmt = $this->conn->prepare($query);
		$this->stmt->execute($_value);
	}

	public function get_where($table, $where = array())
	{
		foreach ($where as $k => $v) {
			$key = $k.'=:'.$k;
			$execute[':'.$k] = $v;
		}
		$query = 'SELECT '.$this->select.' FROM '.$table.' WHERE '.$key.$this->order;
		$this->stmt = $this->conn->prepare($query);
		$this->stmt->execute($execute);
	}

	public function order_by($index, $type = null)
	{
		if ( is_null($type) )
		{
			$this->order = ' ORDER BY '.$index.' ASC';
		} else {
			$this->order = ' ORDER BY '.$index.' '.$type;
		}
	}

	public function row_array()
	{
		$this->stmt->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function result_array()
	{
		$this->stmt->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function execute()
	{
		$this->stmt->execute();
	}

	public function rowCount()
	{
		return $this->stmt->rowCount();
	}
}