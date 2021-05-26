<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center"><?= $data['title'] ?></h2>
                <form action="<?= URLROOT; ?>/users/forgotpass" method="post">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                        <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                        <!-- <div class="text-danger"> {{ userNameErros }} </div> -->
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Send" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>