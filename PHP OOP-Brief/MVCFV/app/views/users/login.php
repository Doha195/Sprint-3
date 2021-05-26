<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container" id="login">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2 class="text-center">Login</h2>
        <form action="<?= URLROOT; ?>/users/login" method="post">
          <div class="form-group">
            <label for="userName">User Name :</label>
            <input type="userName" name="userName" class="form-control form-control-lg <?= (!empty($data['userName_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['userName']; ?>">
            <span class="invalid-feedback"><?= $data['userName_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
            <span class="invalid-feedback"><?= $data['password_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?= URLROOT; ?>/users/register" class="btn btn-light btn-block">No account? Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>