<?php
namespace app\models;

class Message extends \app\core\Model{
	public $message_id;
	public $sender;
	public $receiver;
	public $message;
	public $timestamp;

	public function insert(){
		$SQL = "INSERT INTO message (sender,receiver,message) value (:sender,:receiver,:message)";
		$STH = $this->connection->prepare($SQL);
		$data = ['sender'=>$this->sender,
					'receiver'=>$this->receiver,
					'message'=>$this->message];
		$STH->execute($data);
		$this->message_id = $this->connection->lastInsertId();
		//TODO: if needed get the timestamp
	}

	public function delete($message_id,$user_id){
		//only the owner of the message can delete it
		$SQL = "DELETE FROM message WHERE message_id=:message_id AND receiver = :receiver";
		$STH = $this->connection->prepare($SQL);
		$data = ['message_id'=>$message_id,
					'receiver'=>$user_id];
		$STH->execute($data);
		return $STH->rowCount();
	}

	public function getAllForUser($user_id){
		//$SQL = "SELECT * FROM message WHERE sender=:sender OR receiver=:receiver";
		$SQL = "SELECT message.message_id, message.message, message.timestamp, sendertable.username AS sender_name, `user`.`username` AS receiver_name FROM `message` JOIN `user` AS sendertable ON `message`.`sender` = sendertable.`user_id` JOIN `user` ON `user`.`user_id` = message.receiver WHERE sender=:sender OR receiver=:receiver";

		$STH = $this->connection->prepare($SQL);
		$data = ['receiver'=>$user_id,
					'sender'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}

}