<?php if (isset($_SESSION['user_id'])) : ?>
  <nav class="navbar navbar-expand-lg navbar-dark mb-3">
    <div class="container">
      <a class="navbar-brand" href="<?= URLROOT; ?>/pages/index"><?= SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php if ($_SESSION['user_Permision'] == 1) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/pages/index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/pages/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/Users/index">Student</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/classe/index">Class</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/pages/index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/pages/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/pages/contact">Contact</a>
            </li>
          <?php endif; ?>
        </ul>

        <ul class="navbar-nav ml-auto">
          <?php if (isset($_SESSION['user_id'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/Users/profil/<?= $_SESSION['user_id'] ?>"><?= $_SESSION['user_userName'] ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/users/logout">Logout</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
<?php endif; ?>