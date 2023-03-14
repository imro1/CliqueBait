<?php
namespace app\models;

class User extends \app\core\Model{

	public function get($username){
		$SQL = "SELECT * FROM user WHERE username=:username";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['username'=>$username]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
		return $STH->fetch();
	}

	public function getProfile(){
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['profile_id'=>$this->user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash]);
		return $this->connection->lastInsertId();
	}

	public function updatePassword(){
		$SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['password_hash'=>$this->password_hash,
						'user_id'=>$this->user_id]);
	}
}
