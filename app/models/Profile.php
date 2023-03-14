<?php
namespace app\models;

class Profile extends \app\core\Model{
	public function __toString(){
		return "$this->first_name $this->middle_name $this->last_name";
	}

	public function getAll(){
		$SQL = "SELECT * FROM profile";
		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetchAll();
	}

	public function get($profile_id){
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['profile_id'=>$profile_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetch();
	}

	public function getPublications(){
		$SQL = "SELECT * FROM publication WHERE profile_id=:profile_id ORDER BY `timestamp` DESC";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['profile_id'=>$this->profile_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT INTO profile(first_name, middle_name, last_name, profile_id) VALUES (:first_name, :middle_name, :last_name, :profile_id)";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'profile_id'=>$this->profile_id]);
		return $this->connection->lastInsertId(); // equals to zero for some reason, should return newly inserted profile's profile id
	}

	public function update(){
		$SQL = "UPDATE profile SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name WHERE profile_id=:profile_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'profile_id'=>$this->profile_id]);
	}


	public function getFollowers() {
		$SQL = "SELECT `profile`.* FROM profile JOIN `follow` ON `profile`.`profile_id` = `follow`.`follower_id` WHERE followed_id=:followed_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['followed_id'=>$this->profile_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetchAll();
	}
}
