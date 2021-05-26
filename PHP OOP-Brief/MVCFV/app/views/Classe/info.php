    <?php require APPROOT . '/views/inc/header.php'; ?>

    <h1><?= $data['name']; ?></h1>
    <table>
        <thead class="text-center">
            <th>#</th>
            <th>First Name</th>
            <th>last name</th>
            <th>Date Of Registration</th>
            <th>Action</th>
        </thead>
        <?php
        $i = 1;
        foreach ($data['classInfo'] as $User) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= ucfirst($User->firstName) ?></td>
                <td><?= ucfirst($User->lastName) ?></td>
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
    <?php require APPROOT . '/views/inc/footer.php'; ?>