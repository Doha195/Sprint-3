<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="container p-3 rounded-lg">
    <div class="row justify-content-center">
        <article class="art1 col-3 d-flex flex-column align-items-center justify-content-center">
            <img src="https://img.icons8.com/bubbles/100/000000/user.png">
            <p><?= $data['user']->firstName . ' ' . $data['user']->lastName; ?></p>
            <p>Student</p>
            <a href="<?= URLROOT; ?>/Users/editProfil/<?= $data['user']->id; ?>"><i class="fas fa-edit mr-3"></i></a>
        </article>
        <article class="col-5 art2 p-5">
            <h5 class="text-center">information</h5>
            <hr>
            <div class="row mb-2">
                <div class="col-6">
                    <p class="m-b-10 f-w-600">Date Of Birth </p>
                    <h6 class="text-muted f-w-400"><?= $data['user']->dateOfBirth; ?></h6>
                </div>
                <div class="col-6 text-center">
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
            <h6 class="text-center">Contact</h6>
            <hr>
            <div class="row">
                <div class="col-6">
                    <p class="m-b-10 f-w-600">Email</p>
                    <h6 class="text-muted f-w-400">
                        <?= $data['user']->email; ?>
                    </h6>
                </div>
                <div class="col-6 text-center">
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