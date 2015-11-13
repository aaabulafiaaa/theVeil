<?php
require "database.class.php";
require "threads.class.php";
require "users.class.php";

	class theVeil
	{
		public static $database;
		public static $posts;
		public static $users;
		
		public function __construct()
		{
		 self::$database = new database;
		 self::$posts = new posts;
		 self::$users = new users;
		}				
	}
?> 
