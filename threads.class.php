<?php
	class threads
	{
		
		public function reply($post_data, $author = 0, $thread)
		{
			$array = array('date' => date("Y-m-d H:i:s"), 'thread' => $thread, 'post' => $post_data, 'author' => $author);
			if(theVeil::$database->insert('posts', $array))
			{
				return true; 
			}
		}
		
		public function create($name, $post_data, $author)
		{
			$array = array('name' => $name);
			if(theVeil::$database->insert('threads', $array))
			{
				if($this->reply($post_data, $author, mysql_insert_id()))
				{
						return true;
				} else
				{
						return false;
				}
			} else
			{
				return false;
			}
		}

		public function load($thread)
		{
			if($thread)
			{
				return theVeil::$database->select('posts', "WHERE thread = {$thread} ORDER BY date");
			} else
			{
				return false;
			}
		}
		
		public function all($opt = null)
		{
			return theVeil::$database->select('posts', $opt);
		}		
	}
?>
