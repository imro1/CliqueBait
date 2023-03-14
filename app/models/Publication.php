<?php
namespace app\models;

class Publication extends \app\core\Model{
	public function getAll(){
		$SQL = "SELECT * FROM publication ORDER BY `timestamp` DESC";
		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetchAll();
	}

	public function search($searchTerm){
		$SQL = "SELECT * FROM publication WHERE caption LIKE :searchTerm ORDER BY `timestamp` DESC";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['searchTerm'=>"%$searchTerm%"]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetchAll();
	}

	public function get($publication_id){
		$SQL = "SELECT * FROM publication WHERE publication_id=:publication_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['publication_id'=>$publication_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO publication(profile_id, picture, caption) VALUES (:profile_id, :picture, :caption)";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['profile_id'=>$this->profile_id,
						'picture'=>$this->picture,
						'caption'=>$this->caption]);
	}

	public function update(){
		$SQL = "UPDATE publication SET picture=:picture, caption=:caption, `timestamp`=:`timestamp` WHERE publication_id=:publication_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['picture'=>$this->picture,
						'caption'=>$this->caption,
						'`timestamp`'=>$this->timestamp,
						'publication_id'=>$this->publication_id]);
	}

	public function delete(){
		$SQL = "DELETE FROM publication WHERE publication_id=:publication_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['publication_id'=>$this->publication_id]);
	}

	public function getProfile(){
		$SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['profile_id'=>$this->profile_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetch();
	}
}
