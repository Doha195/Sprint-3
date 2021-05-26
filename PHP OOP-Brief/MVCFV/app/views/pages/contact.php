    <?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center"><?= $data['title']; ?></h2>
                <form action="<?= URLROOT; ?>/pages/contact" method="post">
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
                        <label for="email">Email :</label>
                        <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                        <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject :</label>
                        <input type="text" name="subject" class="form-control form-control-lg <?= (!empty($data['subject_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['subject']; ?>">
                        <span class="invalid-feedback"><?= $data['subject_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="Message">Message :</label>
                        <textarea name="message" class="form-control <?= (!empty($data['message_err'])) ? 'is-invalid' : ''; ?>" rows="3"><?= $data['message']; ?></textarea>
                        <span class="invalid-feedback"><?= $data['message_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Send" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>