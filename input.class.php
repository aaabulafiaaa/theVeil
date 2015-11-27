<?php
	class input
	{
		
		public function get($source)
		{
			return $this->$source;
		}
		
		public function post()
		{
			return $this->$source;
		}
		
		public function __get($source){
			if($_GET[$source]){ return $_GET[$source]; } elseif($_POST[$source]){ return $_POST[$source]; } else { return false; }
			}
		
		private function sanitize($source)
		{
			return mysql_real_escape_string($source);
		}
	}
?>
