<div class='jumbotron jumbotron-fluid' id='publication<?=$data->publication_id?>' style='text-align: center; margin:auto; background-color: darkgrey;'>
	<hr>
	<?php $profile=$data->getProfile(); ?>
	<a href="/Publication/details/<?=$data->publication_id?>"><img style="max-width:700px;max-height:700px" src="/images/<?= $data->picture ?>"></a>
	<p>Posted by <a href='/Profile/details/<?=$profile->profile_id ?>'><?= htmlspecialchars($profile) ?></a> on <?= $data->timestamp?><?php
		if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $data->profile_id){
			echo "<a href='/Publication/delete/$data->publication_id'><i class='bi-trash'></i></a>";
			echo "<a href='/Publication/edit/$data->publication_id'><i class='bi-pen'></i></a>";
		}
	?></p>
	<div style='font-style:italic; font-size:20px; '>Caption: <?=htmlspecialchars($data->caption) ?></div>
	

</div>
