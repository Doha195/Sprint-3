    <?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center">UPDATE Class</h2>
                <form action="<?= URLROOT; ?>/classe/edit/<?= $data['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="name">Class Name :</label>
                        <input type="text" name="name" class="form-control form-control-lg <?= (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']; ?>">
                        <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                    </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" value="Update" name="add" class="btn btn-success btn-block">
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>