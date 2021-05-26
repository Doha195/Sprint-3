<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2 class="text-center">Create An Account</h2>
      <form action="<?= URLROOT; ?>/users/register" method="post">
        <div class="form-group">
          <label for="firstName">First Name :</label>
          <input type="text" name="firstName" class="form-control form-control-lg <?= (!empty($data['firstName_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['firstName']; ?>">
          <span class="invalid-feedback"><?= $data['firstName_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="lastName">Last Name :</label>
          <input type="text" name="lastName" class="form-control form-control-lg <?= (!empty($data['lastName_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['lastName']; ?>">
          <span class="invalid-feedback"><?= $data['lastName_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="dateOfBirth">Date Of Birth :</label>
          <input type="date" name="dateOfBirth" class="form-control form-control-lg <?= (!empty($data['dateOfBirth_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['dateOfBirth']; ?>">
          <span class="invalid-feedback"><?= $data['dateOfBirth_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="tele">Phone Number :</label>
          <input type="number" name="tele" class="form-control form-control-lg <?= (!empty($data['tele_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['tele']; ?>">
          <span class="invalid-feedback"><?= $data['tele_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="class">Class</label>
          <select class="form-control <?= (!empty($data['class_err'])) ? 'is-invalid' : ''; ?>" name="class">
            <?php foreach ($data['getclass'] as $class) : ?>
              <option value="<?= $class->id; ?>"><?= $class->name; ?></option>
            <?php endforeach; ?>
          </select>
          <span class="invalid-feedback"><?= $data['class_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="userName">User Name :</label>
          <input type="userName" name="userName" class="form-control form-control-lg <?= (!empty($data['userName_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['userName']; ?>">
          <span class="invalid-feedback"><?= $data['userName_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
          <span class="invalid-feedback"><?= $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password :</label>
          <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
          <span class="invalid-feedback"><?= $data['password_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password :</label>
          <input type="password" name="confirm_password" class="form-control form-control-lg <?= (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control <?= (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <span class="invalid-feedback"><?= $data['gender_err']; ?></span>
        </div>

        <div class="row">
          <div class="col">
            <input type="submit" value="Register" name="register" class="btn btn-success btn-block">
          </div>
          <div class="col">
            <a href="<?= URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>