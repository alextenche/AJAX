<?php
class Chat extends Core{
	
	public function fetchMessages(){
		$this->query("SELECT chats.message, users.username,users.user_id 
					  FROM chats 
					  JOIN users ON chats.user_id = users.user_id 
					  ORDER BY chats.timestamp DESC");
		return $this->rows();
	}

	public function throwMessage($user_id, $message){
		$this->query("INSERT INTO chats (user_id, message, timestamp) 
					  VALUES (".(int)$user_id.",
					         '".$this->db->real_escape_string(htmlentities($message))."',
					         UNIX_TIMESTAMP())");
	}
}
?>