<?php
	class database
	{
		private $server = 'localhost';
		private $user = 'root';
		private $password = 1234;
		private $database = 'theveil';
		private $mysql;

		public function __construct()
		{
			$this->mysql = mysql_connect($this->server, $this->user, $this->password);
			if($this->mysql)
			{
				mysql_select_db($this->database, $this->mysql);
			}
		}

		public function insert($table, $args = array())
		{
			$rows = implode(array_keys($args), ',');
			$_values = array_values($args);
			$temp_values = array();
			foreach($_values as $va)
			{
				$temp_values[] = "'{$va}'";
			}

			$values = implode($temp_values, ',');
			if(mysql_query("INSERT INTO `{$table}` ({$rows}) VALUES ({$values});"))
			{
				return true;
			} else
			{
				return false;
			}
		}

		public function select($table, $opt = null)
		{
			$query = mysql_query("SELECT * FROM {$table} {$opt}");		
			$array = array();
			for($i = 0; $array[$i] = mysql_fetch_array($query, MYSQL_ASSOC); $i++); array_pop($array);
			return $array;
		}
		
		public function count($table, $opt)
		{
			$counter = mysql_query("SELECT COUNT(*) AS count FROM {$table} {$opt}");
			$num = mysql_fetch_array($counter);
			return $num["count"];
		}
	}
?>
