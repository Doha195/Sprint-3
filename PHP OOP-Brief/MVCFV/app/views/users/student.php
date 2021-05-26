    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php
    if ($_SESSION['user_Permision'] == 1) {
    }
    ?>
    <!-- Title -->
    <h1><?= $data['title']; ?></h1>
    <!-- Add User Button -->
    <a href="<?= URLROOT; ?>/Users/add" class="btn btn-success float-right mb-3"><i class="fas fa-user-plus mr-2"></i>Add New User</a>
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
            <button class="btn" id='info'>info</button>
        </table>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>