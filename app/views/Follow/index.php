<?php $this->view('shared/header', 'CliqueBait'); ?>

<h1 style="text-align: center;">Publications by People You Follow</h1>

<?php
foreach ($data as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('shared/footer'); ?>