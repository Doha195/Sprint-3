<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?= URLROOT; ?>/users/index" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<section class="container p-3 rounded-lg">
    <form action="<?= URLROOT; ?>/Users/editProfil/<?= $data['id']; ?>" method="post">
        <div class="row justify-content-center">
            <article class="art1 col-3 d-flex flex-column justify-content-center align-items-center">
                <img src="https://img.icons8.com/bubbles/100/000000/user.png">
                <input name="firstName" class="d-inline input " type="text" value="<?= $data['firstName'] ?>">
                <input name="lastName" class="d-inline input " type="text" value="<?= $data['lastName'] ?>">
                <p>Test</p>
            </article>
            <article class="col-5 art2 p-5">
                <h5>information</h5>
                <hr>
                <div class="row mb-2">
                    <div class="col-6">
                        <p class="m-b-10 f-w-600">Date Of Birth </p>
                        <input type="date" name="dateOfBirth" value="<?= $data['dateOfBirth']; ?>" class="input text-muted f-w-400"></input>
                    </div>
                    <div class="col-6">
                        <p class="m-b-10 f-w-600">Gender </p>
                        <input type="text" name="gender" value="<?= $data['gender']; ?>" class="input text-muted f-w-400"></input>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <p class="m-b-10 f-w-600">User Name </p>
                        <input type="text" name="userName" value="<?= $data['userName']; ?>" class="input text-muted f-w-400"></input>
                    </div>
                    <div class="col-6">
                        <p class="m-b-10 f-w-600">Class </p>
                        <input type="text" name="class" value="<?= $data['class']; ?>" class="input text-muted f-w-400"></input>
                    </div>
                </div>
                <h5>Contact</h5>
                <hr>
                <div class="row mb-3">
                    <div class="col-6">
                        <p class="m-b-10 f-w-600">Email</p>
                        <input type="email" name="email" value="<?= $data['email']; ?>" class="input text-muted f-w-400"></input>
                    </div>
                    <?php if ($_SESSION['user_Permision'] == 0) : ?>
                        <div class="col-6">
                            <p class="m-b-10 f-w-600">Password</p>
                            <input type="hidden" name="password" value="<?= $data['password']; ?>"></input>
                            <input type="password" name="newPassword" class="text-muted f-w-400"></input>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="m-b-10 f-w-600">Phone</p>
                        <input type="number" name="tele" value="<?= $data['tele']; ?>" class="input text-muted f-w-400"></input>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-3" value="Update">
            </article>
        </div>
    </form>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>