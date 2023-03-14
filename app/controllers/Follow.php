<?php
namespace app\controllers;

class Follow extends \app\core\Controller{
	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function index(){
		$follow = new \app\models\Follow();
		$follow->profile_id = $_SESSION['profile_id'];
		$follow = $follow->getPublications($follow->profile_id);
		$this->view('Follow/index', $follow);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function search(){
		$follow = new \app\models\Follow();
		$follow->profile_id = $_SESSION['profile_id'];
		$follow = $follow->search($_GET['search_term'], $follow->profile_id);
		$this->view('Follow/index', $follow);

	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function followUser($followed_id){
		$follow = new \app\models\Follow();
		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $followed_id;
		$follow->followUser();
		$profile = new \app\models\Profile();
		$profile = $profile->get($follow->followed_id);
		$this->view('Profile/details', $profile);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function unfollowUser($followed_id){
		$follow = new \app\models\Follow();
		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $followed_id;
		$follow->unfollowUser();
		$profile = new \app\models\Profile();
		$profile = $profile->get($follow->followed_id);
		$this->view('Profile/details', $profile);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function iFollow($profile_id){
		$follow = new \app\models\Follow();
		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $profile_id;
		return $follow->searchIfFollowed();
	}

}