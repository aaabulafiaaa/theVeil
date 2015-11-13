<?php
	class users
	{
		private $anonymous = array
		(
			'id' => 0,
			'name' => "Anônimo"
		);
		

		public function create($name, $password)
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
		
		public function verify($name, $password)
		{
				$password = md5($password);
				$data = theVeil::$database->select('users', "WHERE `name` = '{$name}' AND `password` = '{$password}' LIMIT 1");
				if($data)
				{
						echo 'rolou';
					var_dump($data);
				} else
				{
						echo 'nao rolou';
					var_dump($data);
				}
		}
		
		public function getName($id)
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
		
		public function postCount($id)
		{
			var_dump(theVeil::$database->count('posts', "WHERE author = {$id}"));
		}
	}
