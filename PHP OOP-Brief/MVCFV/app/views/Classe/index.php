    <?php require APPROOT . '/views/inc/header.php'; ?>

    <!-- Title -->
    <h1><?= $data['title']; ?></h1>

    <!-- Add User Button -->
    <a href="<?= URLROOT; ?>/classe/add" class="btn btn-success float-right mb-3"><i class="fas fa-user-plus mr-2"></i>Add New Class</a>

    <!-- User Table -->
    <div class="">
        <table>
            <thead class="text-center">
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <?php
            $i = 1;
            foreach ($data['getclass'] as $class) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= ucfirst($class->name) ?></td>
                    <td>
                        <a href="<?= URLROOT; ?>/Classe/edit/<?= $class->id ?>"><i class="fas fa-edit mr-3"></i></a>
                        <form class="delete" action="<?= URLROOT; ?>/Classe/delete/<?= $class->id; ?>" method="post">
                            <input type="submit" value="d" class="d-input"><i class="fas fa-trash-alt"></i>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>