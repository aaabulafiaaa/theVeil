<?php
	class input
	{
		public static $get;
		public static $post;
		
		public function get($source)
		{
			return $this->sanitize($_GET["{$source}"]);
		}
		
		public function post()
		{
			return $this->sanitize($_POST["{$source}"]);
		}
		
		private function sanitize($source)
		{
			return mysql_real_escape_string($source);
		}
	}
?>
