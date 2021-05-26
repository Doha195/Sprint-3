<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->claseModel = $this->model('Clase');
  }

  // Home
  #region
  public function index()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    } elseif ($_SESSION['user_Permision'] == 0) {
      redirect('pages/index');
    }
    // Check for POST
    if (isset($_POST['add'])) {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $class = $this->claseModel->getClass();
      $USers = $this->userModel->getUsers();

      // Init data
      $data = [
        'title' => 'List Of Users',
        'Users' => $USers,
        'getclass' => $class,
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'userName' => trim($_POST['firstName']) . '.' . trim($_POST['lastName']),
        'class' => trim($_POST['class']),
        'password' => 12345678,
        'firstName_err' => '',
        'lastName_err' => '',
        'userName_err' => '',
        'class_err' => '',
      ];

      // Validate First Name
      if (empty($data['firstName'])) {
        $data['firstName_err'] = 'Pleae Enter Your First Name';
      } elseif (strlen($data['firstName']) < 3) {
        $data['firstName_err'] = 'First Name Must  be at least 3 characters';
      }
      // Validate Last Name
      if (empty($data['lastName'])) {
        $data['lastName_err'] = 'Pleae Enter Your Last Name';
      } elseif (strlen($data['lastName']) < 3) {
        $data['lastName_err'] = 'Last Name Must  be at least 3 characters';
      }

      // Validate User Name
      if (empty($data['userName'])) {
        $data['userName_err'] = 'Pleae Enter User Name';
      } else {
        // Check User Name
        if ($this->userModel->findUserByUsername($data['userName'])) {
          $data['userName_err'] = 'User Name is already taken';
        }
      }

      // Validate Class
      if (empty($data['class'])) {
        $data['class_err'] = 'Pleae Select Class';
      }

      // Make sure da$data are empty
      if (empty($data['class_err']) &&  empty($data['firstName_err']) && empty($data['lastName_err'])) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // // ADD User
        if ($this->userModel->add($data)) {
          redirect('users/index');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view
        $this->view('Users/index', $data);
      }
    } elseif (isset($_POST['search'])) {

      // Validate Search
      $search = $_POST['search'];
      if (empty($search)) {
        $USers = $this->userModel->getUsers();
      } else {
        $USers = $this->userModel->search($search);
      }
      // Init data
      $class = $this->claseModel->getClass();
      $data = [
        'title' => 'Search Results',
        'Users' => $USers,
        'getclass' => $class,
        'firstName' => '',
        'lastName' => '',
        'dateOfBirth' => '',
        'class' => '',
        'email' => '',
      ];
      // Load view
      $this->view('Users/index', $data);
    } else {
      // Init data
      $USers = $this->userModel->getUsers();
      $class = $this->claseModel->getClass();
      $data = [
        'title' => 'List Of Users',
        'Users' => $USers,
        'getclass' => $class,
        'firstName' => '',
        'lastName' => '',
        'dateOfBirth' => '',
        'class' => '',
        'email' => '',
      ];
      // Load view
      $this->view('Users/index', $data);
    }
  }

  #endregion


  // register
  #region
  public function register()
  {
    if (isLoggedIn()) {
      redirect('users/index');
    }
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $class = $this->claseModel->getClass();


      // Init data
      $data = [
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'dateOfBirth' => trim($_POST['dateOfBirth']),
        'tele' => trim($_POST['tele']),
        'class' => trim($_POST['class']),
        'userName' => trim($_POST['userName']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'gender' => trim($_POST['gender']),
        'recoveryCode' => str_replace('/', '', trim($_POST['password'])),
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'gender_err' => '',
        'getclass' => $class
      ];

      // Validate User Name
      if (empty($data['userName'])) {
        $data['userName_err'] = 'Pleae Enter Your User Name';
      } else {
        // Check User Name
        if ($this->userModel->findUserByUsername($data['userName'])) {
          $data['userName_err'] = 'User Name is already taken';
        }
      }

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae Enter Your Email';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email is already taken';
        }
      }

      // Validate First Name
      if (empty($data['firstName'])) {
        $data['firstName_err'] = 'Pleae Enter Your First Name';
      } elseif (strlen($data['firstName']) < 3) {
        $data['firstName_err'] = 'First Name Must  be at least 3 characters';
      }
      // Validate Last Name
      if (empty($data['lastName'])) {
        $data['lastName_err'] = 'Pleae Enter Your Last Name';
      } elseif (strlen($data['lastName']) < 3) {
        $data['lastName_err'] = 'Last Name Must  be at least 3 characters';
      }
      // Validate Date Of Birth
      if (empty($data['dateOfBirth'])) {
        $data['dateOfBirth_err'] = 'Pleae Select Your Date Of Birth';
      }
      // Validate Tele
      if (empty($data['tele'])) {
        $data['tele_err'] = 'Pleae Enter Your Phone Number';
      } elseif (strlen($data['tele']) < 10) {
        $data['tele_err'] = 'Must be 10 Numbers';
      }
      // Validate Class
      if (empty($data['class'])) {
        $data['class_err'] = 'Pleae Select Your Class';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Pleae Enter password';
      } elseif (strlen($data['password']) < 8) {
        $data['password_err'] = 'Password must be at least 8 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Pleae confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }
      // Validate Gender
      if (empty($data['gender'])) {
        $data['gender_err'] = 'Pleae Select Your Gender';
      }
      // Make sure da$data are empty
      if (
        empty($data['firstName_err']) &&
        empty($data['lastName_err']) &&
        empty($data['dateOfBirth_err']) &&
        empty($data['tele_err']) &&
        empty($data['class_err']) &&
        empty($data['email_err']) &&
        empty($data['password_err']) &&
        empty($data['confirm_password_err'] &&
          empty($data['gender_err']))
      ) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->register($data)) {
          // flash('register_success', 'You are registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with data
        $this->view('users/register', $data);
      }
    } else {
      // Init data
      $class = $this->claseModel->getClass();
      $data = [
        'firstName' => '',
        'lastName' => '',
        'dateOfBirth' => '',
        'tele' => '',
        'class' => '',
        'userName' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'gender' => '',
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'gender_err' => '',
        'getclass' => $class
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }
  #endregion

  // login
  #region
  public function login()
  {
    if (isLoggedIn()) {
      redirect('users/index');
    }
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'userName' => trim($_POST['userName']),
        'password' => trim($_POST['password']),
        'userName_err' => '',
        'password_err' => '',
      ];

      // Validate User Name
      if (empty($data['userName'])) {
        $data['userName_err'] = 'Pleae enter User Name';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      // Check for user/email
      if ($this->userModel->findUserByUsername($data['userName'])) {
        // User found
      } else {
        // User not found
        $data['userName_err'] = 'No user found';
      }

      // Make sure errors are empty
      if (empty($data['userName_err']) && empty($data['password_err'])) {
        // Validated
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['userName'], $data['password']);

        if ($loggedInUser) {
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect';

          $this->view('users/login', $data);
        }
      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
    } else {
      // Init data
      $data = [
        'userName' => '',
        'password' => '',
        'userName_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }
  #endregion


  public function forgotpass()
  {

    if (isLoggedIn()) {
      redirect('users/index');
    }
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'title' => 'Forgot Password',
        'email' => trim($_POST['email']),
        'email_err' => '',
        'recoveryCode' => '',
      ];


      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae Enter Your Email';
      } else {
        // Check email
        if (!$this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email Not Found';
        }
      }

      // Make sure da$data are empty
      if (empty($data['email_err'])) {
        // Validated

        $user = $this->userModel->getUsersInfoEmail($data['email']);
        require APPROOT . '/Helpers/mail.php';

        $mail->setFrom('pages@gmail.com', 'Reset Passwoed');
        $mail->addAddress($user->email);               //Name is optional
        $mail->Subject = 'Reset Passwoed';
        $mail->Body    = 'Clik This Link To Reset Your Passwoed :<br><br> http://localhost/php/MVCFV/users/resetpass/' . $user->recoveryCode;
        $mail->send();
      } else {
        // Load view with data
        $this->view('users/forgotpass', $data);
      }
    } else {
      // Init data
      $data = [
        'title' => 'Forgot Password',
        'email' => '',
        'email_err' => '',
      ];

      // Load view
      $this->view('users/forgotpass', $data);
    }
  }


  public function resetpass($id)
  {

    if (isLoggedIn()) {
      redirect('users/index');
    }

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form
      $code = $this->userModel->getUsersInfoCode($id);

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'title' => 'Forgot Password',
        'recoveryCode' => $id,
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'password_err' => '',
        'confirm_password_err' => '',
        // 'recoveryCode' => $code->recoveryCode,
      ];

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Pleae Enter password';
      } elseif (strlen($data['password']) < 8) {
        $data['password_err'] = 'Password must be at least 8 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Pleae confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }
      // Make sure da$data are empty
      if (empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Reset Password
        if ($this->userModel->resetpass($data)) {
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with data
        $this->view('users/resetpass', $data);
      }
    } else {
      // Init data
      $code = $this->userModel->getUsersInfoCode($id);
      $data = [
        'title' => 'Forgot Password',
        'password' => '',
        'confirm_password' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'recoveryCode' => $id,
      ];
      var_dump($id);
      // Load view
      $this->view('users/resetpass', $data);
    }
  }

  // create session
  #region
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_userName'] = $user->userName;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_firstName'] = $user->firstName;
    $_SESSION['user_lastName'] = $user->lastName;
    $_SESSION['user_class'] = $user->classId;
    $_SESSION['user_Permision'] = $user->Permision;
    redirect('pages/index/');
  }
  #endregion

  // logout
  #region
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_firstName']);
    unset($_SESSION['user_lastName']);
    unset($_SESSION['user_class']);
    session_destroy();
    redirect('users/login');
  }
  #endregion


  // Profil
  #region
  public function profil($id)
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }

    if (isset($_POST['edit'])) {

      // Process form

      $user = $this->userModel->getUsersInfo($id);
      $data = [
        'id' => $id,
        'firstName' => $user->firstName,
        'lastName' => $user->lastName,
        'dateOfBirth' => $user->dateOfBirth,
        'tele' => $user->tele,
        'class' => $user->classId,
        'userName' => $user->userName,
        'email' => $user->email,
        'gender' => $user->gender,
        'password' => $user->password,
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'gender_err' => '',
      ];
      $this->view('Users/profil', $data);
    } elseif (isset($_POST['update'])) {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // $class = $this->claseModel->getClass();
      $user = $this->userModel->getUsersInfo($id);

      $password = '';
      if (empty($_POST['newPassword'])) {
        $password = $user->password;
      } else {
        $password = trim($_POST['newPassword']);
        $password = password_hash($password, PASSWORD_DEFAULT);
      }
      // Init data
      $data = [
        'id' => $id,
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'dateOfBirth' => trim($_POST['dateOfBirth']),
        'tele' => trim($_POST['tele']),
        'class' => trim(intval($_POST['class'])),
        'userName' => trim($_POST['userName']),
        'email' => trim($_POST['email']),
        'password' => $password,
        'gender' => trim($_POST['gender']),
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'password_err' => '',
        'gender_err' => '',
      ];



      // Make sure da$data are empty
      if (
        empty($data['firstName_err']) &&
        empty($data['lastName_err']) &&
        empty($data['dateOfBirth_err']) &&
        empty($data['tele_err']) &&
        empty($data['class_err']) &&
        empty($data['email_err']) &&
        empty($data['gender_err'])
      ) {
        // Validated

        // Update User
        if ($this->userModel->editProfil($data)) {
          $this->view('Users/profil', $data);
          var_dump($_POST);
        } else {
          die('Something went wrong');
        }
      } else {
        // // Load view with data
        // $this->view('users/profil', $data);
      }
    } else {
      $user = $this->userModel->profil($id);
      $data = [
        'id' => $id,
        'title' => 'Profil',
        'user' => $user
      ];
      $this->view('Users/profil', $data);
    }
  }
  #endregion


  // Add User
  public function add()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    } elseif ($_SESSION['user_Permision'] == 0) {
      redirect('pages/index');
    }
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $class = $this->claseModel->getClass();
      // $USers = $this->userModel->getUsers();

      // Init data
      $data = [
        'title' => 'Add Users',
        // 'Users' => $USers,
        'getclass' => $class,
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'userName' => trim($_POST['firstName']) . '.' . trim($_POST['lastName']),
        'class' => trim($_POST['class']),
        'password' => 12345678,
        'firstName_err' => '',
        'lastName_err' => '',
        'userName_err' => '',
        'class_err' => '',
      ];

      // Validate First Name
      if (empty($data['firstName'])) {
        $data['firstName_err'] = 'Pleae Enter Your First Name';
      } elseif (strlen($data['firstName']) < 3) {
        $data['firstName_err'] = 'First Name Must  be at least 3 characters';
      }
      // Validate Last Name
      if (empty($data['lastName'])) {
        $data['lastName_err'] = 'Pleae Enter Your Last Name';
      } elseif (strlen($data['lastName']) < 3) {
        $data['lastName_err'] = 'Last Name Must  be at least 3 characters';
      }

      // Validate User Name
      if (empty($data['userName'])) {
        $data['userName_err'] = 'Pleae Enter User Name';
      } else {
        // Check User Name
        if ($this->userModel->findUserByUsername($data['userName'])) {
          $data['userName_err'] = 'User Name is already taken';
        }
      }

      // Validate Class
      if (empty($data['class'])) {
        $data['class_err'] = 'Pleae Select Class';
      }

      // Make sure da$data are empty
      if (empty($data['class_err']) &&  empty($data['firstName_err']) && empty($data['lastName_err'])) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // // ADD User
        if ($this->userModel->add($data)) {
          redirect('users/index');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view
        $this->view('Users/add', $data);
      }
    } else {
      // Init data
      // $USers = $this->userModel->getUsers();
      $class = $this->claseModel->getClass();
      $data = [
        'title' => 'List Of Users',
        // 'Users' => $USers,
        'getclass' => $class,
        'firstName' => '',
        'lastName' => '',
        'dateOfBirth' => '',
        'tele' => '',
        'class' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'gender' => '',
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'gender_err' => '',
      ];
      // Load view
      $this->view('Users/add', $data);
    }
  }

  public function info($id)
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    } elseif ($_SESSION['user_Permision'] == 0) {
      redirect('pages/index');
    }
    $user = $this->userModel->getUsersInfo($id);
    // $post = $this->postModel->getPostById($id);
    // $user = $this->userModel->getUserById($post->user_id);

    $data = [
      'user' => $user
    ];

    $this->view('Users/info', $data);
  }

  // edit
  #region
  public function edit($id)
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    } elseif ($_SESSION['user_Permision'] == 0) {
      redirect('pages/index');
    }
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $class = $this->claseModel->getClass();


      // Init data
      $data = [
        'id' => $id,
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'dateOfBirth' => trim($_POST['dateOfBirth']),
        'tele' => trim($_POST['tele']),
        'class' => trim($_POST['class']),
        'userName' => trim($_POST['userName']),
        'email' => trim($_POST['email']),
        'gender' => trim($_POST['gender']),
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'gender_err' => '',
        'getclass' => $class
      ];

      // Make sure da$data are empty
      if (empty($data['firstName_err']) && empty($data['lastName_err']) && empty($data['dateOfBirth_err']) && empty($data['tele_err']) && empty($data['class_err']) && empty($data['userName_err']) && empty($data['email_err']) && empty($data['gender_err'])) {
        // Validated

        // // Edit User
        if ($this->userModel->edit($data)) {
          redirect('users/index');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with data
        $this->view('users/edit', $data);
      }
    } else {
      // Init data
      $class = $this->claseModel->getClass();
      $user = $this->userModel->getUsersInfo($id);
      $data = [
        'id' => $id,
        'firstName' => $user->firstName,
        'lastName' => $user->lastName,
        'dateOfBirth' => $user->dateOfBirth,
        'tele' => $user->tele,
        'class' => $user->classId,
        'userName' => $user->userName,
        'email' => $user->email,
        'gender' => $user->gender,
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'gender_err' => '',
        'getclass' => $class
      ];

      // Load view
      $this->view('users/edit', $data);
    }
  }
  #endregion


  // edit Profil
  #region
  public function editProfil($id)
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // $class = $this->claseModel->getClass();
      $user = $this->userModel->getUsersInfo($id);

      $password = '';
      if (empty($_POST['newPassword'])) {
        $password = $user->password;
      } else {
        $password = trim($_POST['newPassword']);
        $password = password_hash($password, PASSWORD_DEFAULT);
      }
      // Init data
      $data = [
        'id' => $id,
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'dateOfBirth' => trim($_POST['dateOfBirth']),
        'tele' => trim($_POST['tele']),
        'class' => trim(intval($_POST['class'])),
        'userName' => trim($_POST['userName']),
        'email' => trim($_POST['email']),
        'password' => $password,
        'gender' => trim($_POST['gender']),
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'password_err' => '',
        'gender_err' => '',
      ];



      // Make sure da$data are empty
      if (
        empty($data['firstName_err']) &&
        empty($data['lastName_err']) &&
        empty($data['dateOfBirth_err']) &&
        empty($data['tele_err']) &&
        empty($data['class_err']) &&
        empty($data['email_err']) &&
        empty($data['gender_err'])
      ) {
        // Validated

        // Update User
        if ($this->userModel->editProfil($data)) {
          $this->view('users/editprofil', $data);
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with data
        $this->view('users/editprofil', $data);
      }
    } else {
      // Init data
      $user = $this->userModel->getUsersInfo($id);
      $data = [
        'id' => $id,
        'firstName' => $user->firstName,
        'lastName' => $user->lastName,
        'dateOfBirth' => $user->dateOfBirth,
        'tele' => $user->tele,
        'class' => $user->classId,
        'userName' => $user->userName,
        'email' => $user->email,
        'gender' => $user->gender,
        'password' => $user->password,
        'firstName_err' => '',
        'lastName_err' => '',
        'dateOfBirth_err' => '',
        'tele_err' => '',
        'class_err' => '',
        'userName_err' => '',
        'email_err' => '',
        'gender_err' => '',
      ];

      // Load view
      $this->view('users/editProfil', $data);
    }
  }
  #endregion


  // delete user
  public function delete($id)
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    } elseif ($_SESSION['user_Permision'] == 0) {
      redirect('pages/index');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if ($this->userModel->delete($id)) {
        redirect('Users/index');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('Users/index');
    }
  }
}
