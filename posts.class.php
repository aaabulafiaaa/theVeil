<?php
	class posts 
	{
		
		public function replyThread($post_data, $author = 0, $thread)
		{
			$array = array('date' => date("Y-m-d H:i:s"), 'thread' => $thread, 'post' => $post_data, 'author' => $author);
			if(theVeil::$database->insert('posts', $array))
			{
				return true; 
			}
		}
		
		public function newThread($name, $post_data, $author)
		{
			$array = array('name' => $name);
			if(theVeil::$database->insert('threads', $array))
			{
				if($this->replyThread($post_data, $author, mysql_insert_id()))
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

		public function loadThread($thread)
		{
			if($thread)
			{
				return theVeil::$database->select('posts', "WHERE thread = {$thread} ORDER BY date");
			} else
			{
				return $this->database->select('posts');
			}
		}
		
		public function loadThreads($opt = null)
		{
			return theVeil::$database->select('posts', $opt);
		}
		
		public function loadLatestThreads($num = 5)
		{
			return theVeil::$database->select('posts', "ORDER BY date DESC LIMIT {$num}");
		}
		
		
	}
?>
