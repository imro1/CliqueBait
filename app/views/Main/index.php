<?php $this->view('shared/header', 'CliqueBait'); ?>

<?php
foreach ($data as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('shared/footer'); ?>