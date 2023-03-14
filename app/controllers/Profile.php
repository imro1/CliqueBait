<?php
namespace app\controllers;

class Profile extends \app\core\Controller{
	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function index(){
		$profile = new \app\models\Profile();
		$profile = $profile->get($_SESSION['profile_id']);
		$this->view('Profile/details', $profile);
	}

	public function details($profile_id){
		$profile = new \app\models\Profile();
		$profile = $profile->get($profile_id);
		$this->view('Profile/details', $profile);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function edit(){
		$profile = new \app\models\Profile();
		$profile = $profile->get($_SESSION['profile_id']);
		if(isset($_POST['action'])){
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->update();
			header('location:/Profile/index');
		}else{
			$this->view('Profile/edit', $profile);
		}
	}

	#[\app\filters\Login]
	public function create(){
		if(isset($_POST['action'])){
			$profile = new \app\models\Profile();
			$profile->first_name = $_POST['first_name'];
			$profile->middle_name = $_POST['middle_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->profile_id = $_SESSION['user_id'];
			$_SESSION['profile_id'] = $profile->insert();
			if ($_SESSION['profile_id'] == 0) {
				$_SESSION['profile_id'] = $_SESSION['user_id'];
			}
			header('location:/Profile/index');
		}else{
			$this->view('Profile/create');
		}
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function iFollow($profile_id){
		$follow = new \app\models\Follow();
		if (isset($_SESSION['user_id'])) {
			$follow->follower_id = $_SESSION['user_id'];
		}
		$follow->followed_id = $profile_id;
		return $follow->searchIfFollowed();
	}

}