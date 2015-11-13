<?php
require "input.class.php";
require "database.class.php";
require "threads.class.php";
require "users.class.php";

	class theVeil
	{
		public static $input;
		public static $database;
		public static $threads;
		public static $users;
		
		public function __construct()
		{
		 self::$input = new input;
		 self::$database = new database;
		 self::$threads = new threads;
		 self::$users = new users;
		}				
	}
?> 
