<?php $this->view('shared/header', 'CliqueBait'); ?>
<div style="margin:center; text-align: center">
<h1>Whos 'Profile:</h1>
<h2><?=$data ?>
	<?php
	if($this->isFollowed($data->profile_id) && isset($_SESSION['profile_id']) && $_SESSION['profile_id'] != $data->profile_id){
		echo "<a href='/Follow/unfollowUser/$data->profile_id' class='btn btn-primary'>Unfollow</a>";
	}else if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] != $data->profile_id){
		echo "<a href='/Follow/followUser/$data->profile_id' class='btn btn-primary'>Follow</a>";
}
	?>
</h2>
</div>
<br>
<div style="text-align: center;">
<?php
if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $data->profile_id){
	echo '<a href="/Profile/edit" class="btn btn-primary">Edit my profile</a>';
}
?>
</div>
<h2 style="text-align: center">Publications by <?=$data ?></h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('shared/footer'); ?>