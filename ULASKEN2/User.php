<?php 
	class User{
		private $id;
		private $fname;
		private $lname;
		private $email;
		private $pass;

		function __construct($id, $f, $l, $e, $p)
		{
			$this->id = $id;
			$this->fname = $f;
			$this->lname = $l;
			$this->email = $e;
			$this->pass = $p;
		}

		function getId()
		{
			return $this->id;
		}

		function getFname()
		{
			return $this->fname;
		}

		function getLname()
		{
			return $this->lname;
		}

		function getEmail()
		{
			return $this->email;
		}
	}

 ?>