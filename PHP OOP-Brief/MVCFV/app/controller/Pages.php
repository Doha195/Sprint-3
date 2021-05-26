<?php
class Pages extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    $this->userModel = $this->model('User');
    $this->ClaseModel = $this->model('Clase');
  }

  public function index()
  {

    if (!isAdmin()) {
      redirect('pages/student/' . $_SESSION['user_class']);
    }
    $class = $this->ClaseModel->getClass();
    $USers = $this->userModel->getUsers();
    $totalUsers = $this->userModel->totalUsers();
    $totalClasses = $this->ClaseModel->totalClass();
    $classId = $this->userModel->classID();


    $data = [
      'title' => 'gestion des apprenants',
      'getclass' => $class,
      'Users' => $USers,
      'TotalUsers' => $totalUsers,
      'TotalClasses' => $totalClasses,
      'classId' => $classId,
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Us',
    ];

    $this->view('pages/about', $data);
  }
  public function contact()
  {

    if (!isLoggedIn()) {
      redirect('users/login');
    }
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data

      $data = [
        'title' => 'Contact',
        'firstName' => trim($_POST['firstName']),
        'lastName' => trim($_POST['lastName']),
        'email' => trim($_POST['email']),
        'subject' => trim($_POST['subject']),
        'message' => trim($_POST['message']),
        'firstName_err' => '',
        'lastName_err' => '',
        'email_err' => '',
        'tele_err' => '',
        'subject_err' => '',
        'message_err' => '',
        'mailStatus' => '',
      ];


      // Validate Email
      if (empty($data['firstName'])) {
        $data['firstName_err'] = 'Pleae Enter Your First Name';
      }

      // Validate lastName
      if (empty($data['lastName'])) {
        $data['lastName_err'] = 'Pleae Enter Your Last Name';
      }

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae Enter Your Email';
      }

      // Validate Phone
      if (empty($data['tele'])) {
        $data['tele_err'] = 'Pleae Enter Your Phone';
      }

      // Validate Subject
      if (empty($data['subject'])) {
        $data['subject_err'] = 'Pleae Enter Subject Email';
      }

      // Validate Message
      if (empty($data['message'])) {
        $data['message_err'] = 'Pleae Enter Message';
      } elseif (strlen($data['message']) < 20) {
        $data['message_err'] = 'message Must  be at least 20 characters';
      }

      // Make sure da$data are empty
      if (empty($data['email_err']) &&  empty($data['firstName_err']) && empty($data['lastName_err']) && empty($data['subject_err']) && empty($data['message_err'])) {

        require APPROOT . '/Helpers/mail.php';

        $mail->setFrom($data['email'], $data['firstName'] . ' ' . $data['lastName']);
        $mail->addAddress('ttestest336@gmail.com');               //Name is optional
        $mail->Subject = $data['subject'];
        $mail->Body    = $data['message'];
        $mail->send();
        redirect('pages/contact');
      } else {
        // Load view
        $this->view('pages/contact', $data);
      }
    } else {
      // Init data
      $data = [
        'title' => 'Contact',
        'firstName' => '',
        'lastName' => '',
        'email' => '',
        'tele' => '',
        'subject' => '',
        'message' => '',
        'mailStatus' => '',
      ];
      // Load view
      $this->view('pages/contact', $data);
    }
  }


  // Student
  public function student($id)
  {
    $USers = $this->userModel->getUsers();
    $myClass = $this->userModel->myClass($id);

    $data = [
      'id' => $id,
      'title' => 'SharePosts',
      'myClass' => $myClass,
    ];

    $this->view('pages/student', $data);
  }
}
