    <?php require APPROOT . '/views/inc/header.php'; ?>

    <main id="modal">
        <!-- Title -->
        <h1><?= $data['title']; ?></h1>
        <img src="Assets/unlock-alt-solid.svg" alt="">
        <!-- Add User Button -->
        <button class="btn btn-success mb-3" @click="showAddModal=true"><i class="fas fa-user-plus mr-2"></i>Add New User</button>
        <form class="form-inline my-2 my-lg-0 float-right" action="<?= URLROOT; ?>/users/index" method="post">
            <input name="search" class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
        </form>
        <!-- User Table -->
        <div class="">
            <table>
                <thead class="text-center">
                    <th>#</th>
                    <th>First Name</th>
                    <th>last name</th>
                    <th>Email</th>
                    <th>class</th>
                    <th>Date Of Registration</th>
                    <th>Action</th>
                </thead>
                <?php
                $i = 1;
                foreach ($data['Users'] as $User) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= ucfirst($User->firstName) ?></td>
                        <td><?= ucfirst($User->lastName) ?></td>
                        <td><?= ucfirst($User->email) ?></td>
                        <td><?= ucfirst($User->classId) ?></td>
                        <td><?= substr($User->dateOfRegister, 0, 10) ?></td>
                        <td>
                            <a href="<?= URLROOT; ?>/Users/info/<?= $User->id ?>"><i class="fas fa-info mr-3"></i></a>
                            <a href="<?= URLROOT; ?>/Users/edit/<?= $User->id ?>"><i class="fas fa-edit mr-3"></i></a>
                            <form class="delete" action="<?= URLROOT; ?>/Users/delete/<?= $User->id; ?>" method="post">
                                <input type="submit" value="d" class="d-input"><i class="fas fa-trash-alt"></i>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- Add modal -->
        <section class="modal-container" id="" v-if="showAddModal">
            <div class="modall">
                <div class="card card-body bg-light mt-5">
                    <h2 class="text-center">Add User</h2>
                    <form action="<?= URLROOT; ?>/users/index" method="post" @submit="validationForm">
                        <div class="form-group">
                            <label for="firstName">First Name :</label>
                            <input v-model="firstName" type="text" name="firstName" class="form-control form-control-lg" value="<?= $data['firstName']; ?>">
                            <span class="invalid-feedback"></span>
                            <small class="text-danger text-left"> {{ firstNameErr }} </small>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name :</label>
                            <input v-model="lastName" type="text" name="lastName" class="form-control form-control-lg" value="<?= $data['lastName']; ?>">
                            <span class="invalid-feedback"></span>
                            <small class="text-danger text-left"> {{ lastNameErr }} </small>
                        </div>
                        <div class="form-group">
                            <label for="class">Class :</label>
                            <select class="form-control" name="class">
                                <?php foreach ($data['getclass'] as $class) : ?>
                                    <option value="<?= $class->id; ?>"><?= $class->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="float-right">
                            <input type="submit" value="Add" name="add" class="btn btn-success">
                            <button type="button" class="btn btn-primary" @click="showAddModal=false">Cansel</button>
                        </div>
                    </form>
                </div>
        </section>

    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>