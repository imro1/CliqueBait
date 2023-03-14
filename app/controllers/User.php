<?php
namespace app\controllers;

class User extends \app\core\Controller{

	public function index(){
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);
			if(password_verify($_POST['password'], $user->password_hash)){
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['username'] = $user->username;
				$profile = $user->getProfile();
				$_SESSION['profile_id'] = $profile->profile_id;
				header('location:/Main/index');
			}else{
				header('location:/User/index?error=Wrong username/password combination!');
			}
		}else{
			$this->view('User/index');
		}
	}

	#[\app\filters\Login]
	public function logout(){
		session_destroy();
		header('location:/Main/index');
	}

	public function register(){
		if(isset($_POST['action'])){//form submitted

			if($_POST['password'] == $_POST['password_confirm']){//match
				$user = new \app\models\User();
				$check = $user->get($_POST['username']);
				if(!$check){
					$user->username = $_POST['username'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$_SESSION['user_id'] = $user->insert();
					$_SESSION['username'] = $_POST['username'];
					header('location:/Profile/create?message=You must now create your profile to use that feature.');
				}else{
					header('location:/User/register?error=The username "'.$_POST['username'].'" is already in use. Select another.');
				}
			}else{
				header('location:/User/register?error=Passwords do not match.');
			}
		}else{
			$this->view('User/register');
		}
	}
}