<?php $this->view('shared/header','Edit Your Profile'); ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center mb-0">Edit Profile</h2>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $data->first_name ?>">
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $data->last_name ?>">
            </div>
            <div class="form-group">
              <label for="middle_name">Middle Name</label>
              <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?= $data->middle_name ?>">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="action" value="Save changes">
            </div>
          </form>
        </div>
        <div class="card-footer">
          <a href="/Profile/index" class="btn btn-secondary">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->view('shared/footer'); ?>
