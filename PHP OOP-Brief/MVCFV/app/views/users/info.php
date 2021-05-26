<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="container p-3 rounded-lg ">
    <a href="<?= URLROOT; ?>/users/index" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="row justify-content-center">
        <article class="art1 col-3 d-flex flex-column justify-content-center align-items-center">
            <img src="https://img.icons8.com/bubbles/100/000000/user.png">
            <p><?= $data['user']->firstName . ' ' . $data['user']->lastName; ?></p>
            <p>Student</p>
            <a href="<?= URLROOT; ?>/Users/editProfil/<?= $data['user']->id; ?>"><i class="fas fa-edit mr-3"></i></a>
        </article>
        <article class="col-5 art2 p-5">
            <h5>information</h5>
            <hr>
            <div class="row mb-2">
                <div class="col-6">
                    <p class="m-b-10 f-w-600">Date Of Birth </p>
                    <h6 class="text-muted f-w-400"><?= $data['user']->dateOfBirth; ?></h6>
                </div>
                <div class="col-6">
                    <p class="m-b-10 f-w-600">Gender </p>
                    <h6 class="text-muted f-w-400"><?= $data['user']->gender; ?></h6>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <p class="m-b-10 f-w-600">Class </p>
                    <h6 class="text-muted f-w-400">
                        <?= $data['user']->classId; ?>
                    </h6>
                </div>
            </div>
            <h5>Contact</h5>
            <hr>
            <div class="row">
                <div class="col-6">
                    <p class="m-b-10 f-w-600">Email</p>
                    <h6 class="text-muted f-w-400">
                        <?= $data['user']->email; ?>
                    </h6>
                </div>
                <div class="col-6">
                    <p class="m-b-10 f-w-600">Phone</p>
                    <h6 class="text-muted f-w-400">
                        <?= $data['user']->tele; ?>
                    </h6>
                </div>
            </div>
        </article>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>