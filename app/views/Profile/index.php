<?php $this->view('shared/header','Your Profile'); ?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center mb-0">Profile</h2>
        </div>
        <div class="card-body">
          <dl class="row">
            <dt class="col-sm-3">First Name</dt>
            <dd class="col-sm-9"><?= $data->first_name ?></dd>
            <dt class="col-sm-3">Last Name</dt>
            <dd class="col-sm-9"><?= $data->last_name ?></dd>
            <dt class="col-sm-3">Middle Name</dt>
            <dd class="col-sm-9"><?= $data->middle_name ?></dd>
          </dl>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              <a href="/Profile/edit" class="btn btn-primary btn-block">Edit my profile</a>
            </div>
            <div class="col-sm-6">
              <a href="/User/profile" class="btn btn-secondary btn-block">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->view('shared/footer'); ?>
