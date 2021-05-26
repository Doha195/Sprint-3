    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php
    // echo '<pre>';
    // var_dump($_SESSION['user_class']);
    // echo '</pre>';
    // echo '<pre>';
    // var_dump($data['classId']);
    // echo '</pre>';
    ?>
    <h1><?= $data['title']; ?></h1>
    <table>
        <thead class="text-center">
            <th>#</th>
            <th>First Name</th>
            <th>last name</th>
            <th>Gender</th>
        </thead>
        <?php
        $i = 1;
        foreach ($data['myClass'] as $myClas) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= ucfirst($myClas->firstName) ?></td>
                <td><?= ucfirst($myClas->lastName) ?></td>
                <td><?= ucfirst($myClas->gender) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php require APPROOT . '/views/inc/footer.php'; ?>