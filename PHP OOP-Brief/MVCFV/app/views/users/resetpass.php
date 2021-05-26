    <?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center"><?= $data['title'] ?></h2>
                <form action="<?= URLROOT; ?>/users/resetpass/<?= $data['recoveryCode'] ?>" method="post">
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