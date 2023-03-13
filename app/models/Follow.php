<?php
namespace app\models;

class Follow extends \app\core\Model {
	public $follower_id;
	public $followed_id;

	public function followUser() {
		$SQL = 'INSERT INTO follow(follower_id, followed_id) VALUES (:follower_id, :followed_id)';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['followed_id'=>$this->followed_id,
						'follower_id'=>$this->follower_id]);
		return $STH->fetch();
	}
	
	public function unfollowUser() {
		$SQL = 'DELETE FROM follow WHERE follower_id=:follower_id AND followed_id=:followed_id';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['follower_id'=>$this->follower_id,
					    'followed_id'=>$this->followed_id]);
	}

	public function searchIfFollowed() {
		$SQL = 'SELECT * FROM follow WHERE follower_id=:follower_id AND followed_id=:followed_id';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['follower_id'=>$this->follower_id,
					    'followed_id'=>$this->followed_id]);
		return $STH->fetch();
	}

	public function getPublications($profile_id) {
		$SQL = 'SELECT publication.* FROM `publication` JOIN `follow` ON `publication`.`profile_id` = `follow`.`followed_id` WHERE `follow`.follower_id=:follower_id';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['follower_id'=>$profile_id]);
		return $STH->fetchAll();
	}

	public function search($searchTerm){
		$SQL = "SELECT * FROM publication WHERE caption LIKE :searchTerm ORDER BY `timestamp` DESC";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['searchTerm'=>"%$searchTerm%"]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetchAll();
	}
}