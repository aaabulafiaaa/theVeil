<?php
	class users
	{
		private $anonymous = array
		(
			'id' => 0,
			'name' => "Anônimo"
		);
		

		public function newUser($name, $password)
		{
			$array = array('name' => $name, 'password' => md5($password));
			if(theVeil::$database->insert('users', $array))
			{
				return true;
			} else
			{
				return false;
			}
		}
		
		public function getUserName($id)
		{
			if($id == $this->anonymous['id'])
			{
				return $this->anonymous['name'];
			} else
			{
			$data = theVeil::$database->select('users', "WHERE id = {$id} LIMIT 1");
				return $data[0]["name"];
			}
		}
		
		public function postCountById($id)
		{
			var_dump(theVeil::$database->count('posts', "WHERE author = {$id}"));
		}
	}