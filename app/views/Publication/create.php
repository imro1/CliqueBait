<?php $this->view('shared/header', 'CliqueBait'); ?>

<div class='container' style='text-align: center; margin: auto; background-color: darkgrey;'>
<h1>New Publication</h1>
<form action='' method='post' enctype='multipart/form-data'>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Picture:<input class='form-control' type="file" name="picture" id="picture" /></label>
		<br><img id='pic_preview' style="max-width:500px;max-height:500px" />
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Caption:<input class='form-control' type="text" name="caption" placeholder='Say something about your picture.' /></label>
	</div>
	<input type="submit" name="action" value="Publish" class='btn btn-primary' />
</form>

<a href='/'>Cancel</a>
</div>
<script>
	picture.onchange = evt => {
  const [file] = picture.files
  if (file) {
    pic_preview.src = URL.createObjectURL(file)
  }
}
</script>
<?php $this->view('shared/footer'); ?>