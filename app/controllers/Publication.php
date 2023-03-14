<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

	#[\app\filters\JustLeave]
	public function index(){
		
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function create(){
		if(isset($_POST['action'])){
			//make a new object
			$publication = new \app\models\Publication();
			//populate the object
			$publication->caption = $_POST['caption'];
			$publication->profile_id = $_SESSION['user_id'];//FK, might need to change to profile_id
			$filename = $this->saveFile($_FILES['picture']);
			if($filename){
				$publication->picture = $filename;
				$publication->insert();
				header('location:/Profile/index/');
			}else{
				header('location:/Publication/create/');
			}
		}else{
			$this->view('Publication/create');
		}
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function edit($publication_id){
		$publication = new \app\models\Publication();
		$publication = $publication->get($publication_id);
		if(isset($_POST['action']) && $publication->profile_id == $_SESSION['user_id']){
			$publication->caption = $_POST['caption'];
			$publication->update();
			header('location:/Profile/index/');
		}else{
			$this->view('Publication/edit', $publication);
		}
	}

	public function details($publication_id){//detailed view for a record
		$publication = new \app\models\Publication();
		$publication = $publication->get($publication_id);
		$this->view('Publication/details', $publication);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function delete($publication_id){
		$publication = new \app\models\Publication();
		$publication = $publication->get($publication_id);
		if($publication->profile_id == $_SESSION['user_id']){
			unlink("images/$publication->picture");
			$publication->delete();
		}
		header('location:/Profile/index/');
	}
}