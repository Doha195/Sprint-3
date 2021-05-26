    <?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center">Add User</h2>
                <form action="<?= URLROOT; ?>/users/add" method="post">
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
                        <label for="class">Class</label>
                        <select class="form-control <?= (!empty($data['class_err'])) ? 'is-invalid' : ''; ?>" name="class">
                            <?php foreach ($data['getclass'] as $class) : ?>
                                <option value="<?= $class->id; ?>"><?= $class->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="invalid-feedback"><?= $data['class_err']; ?></span>
                    </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" value="Add" name="add" class="btn btn-success btn-block">
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>