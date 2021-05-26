    <?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?= $data['title']; ?></h1>
    <div class="d-flex justify-content-around">
        <div class="static" style="background-color: #4b778d;">Total Students <?= $data['TotalUsers'] ?></div>
        <div class="static" style="background-color: #206a5d;">Total class <?= $data['TotalClasses'] ?></div>
    </div>
    <div class="mt-5 d-flex justify-content-around">
        <div class="users p-3">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Latest Registered Students
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table>
                                <thead>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Date Of Registration</th>
                                </thead>
                                <?php
                                $i = 1;
                                foreach ($data['Users'] as $User) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><a href="<?= URLROOT; ?>/Users/info/<?= $User->id ?>"><?= ucwords($User->firstName . ' ' . $User->lastName) ?></a></td>
                                        <td><?= substr($User->dateOfRegister, 0, 10) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="class p-3">
            <div class="accordion" id="accordionExample2">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                List Of Classes
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample2">
                        <div class="card-body">
                            <table>
                                <thead>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <!-- <th class="text-center">Number Of Students</th> -->
                                </thead>
                                <?php
                                $i = 1;
                                foreach ($data['getclass'] as $class) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><a href="<?= URLROOT; ?>/classe/info/<?= $class->id ?>"><?= ucfirst($class->name) ?></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>