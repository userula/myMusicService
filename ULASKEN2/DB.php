<?php 

	$db = new DB('project');
	$dbconn = $db->getConn();
	
	class DB{
		private $db_conn;
		function __construct($db_name)
		{
			$this->db_conn = new mysqli('localhost', 'asd', 'asd', $db_name);
			if(!$this->connect())
			{
				echo "Failed to connect to MySQL";
			}
		}

		function db_query($sql)
		{
			$res = mysqli_query($this->db_conn, $sql);
			if($res)
			{
				return $res->fetch_all(MYSQLI_ASSOC);
			}
			else
			{
				return "error";
			}
		}

		function db_insert($sql)
		{
			$res = mysqli_query($this->db_conn, $sql);
		}

		function getConn()
		{
			return $this->db_conn;
		}

		function connect()
		{
			if($this->db_conn -> connect_errno)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		function select_all($table)
		{
			$sql = "SELECT * FROM ".$table;

			$res = mysqli_query($this->db_conn, $sql);

			if($res)
			{
				return $res->fetch_all(MYSQLI_ASSOC);
			}
			else
			{
				return 'error';
			}
		}

		function select_artistById($id)
		{
			$sql = "SELECT * FROM artists WHERE id = ".$id;

			$res = mysqli_query($this->db_conn, $sql);

			if($res)
			{
				return $res->fetch_all(MYSQLI_ASSOC);
			}
			else
			{
				return 'error';
			}
		}

		function select_musicById($id)
		{
			$sql = "SELECT * FROM music WHERE id = ".$id;

			$res = mysqli_query($this->db_conn, $sql);

			if($res)
			{
				return $res->fetch_all(MYSQLI_ASSOC);
			}
			else
			{
				return 'error';
			}
		}

		function select_playlistById($id)
		{
			$sql = "SELECT * FROM playlist WHERE id = ".$id;

			$res = mysqli_query($this->db_conn, $sql);

			if($res)
			{
				return $res->fetch_all(MYSQLI_ASSOC);
			}
			else
			{
				return 'error';
			}
		}

	}

 ?>