<?php
class Classe extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } elseif ($_SESSION['user_Permision'] == 0) {
            redirect('pages/index');
        }
        $this->ClaseModel = $this->model('Clase');
    }

    public function index()
    {
        $class = $this->ClaseModel->getClass();
        $data = [
            'title' => 'List Of Class',
            'getclass' => $class,
        ];

        $this->view('classe/index', $data);
    }

    // Add User
    public function add()
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
                'title' => 'Add Class',
                'name' => trim($_POST['name']),
                'name_err' => '',
            ];

            // Validate First Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae Enter Class Name';
            }

            // Make sure data error are empty
            if (empty($data['name_err'])) {
                // Validated

                // // ADD User
                if ($this->ClaseModel->add($data)) {
                    redirect('classe/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('classe/add', $data);
            }
        } else {
            // Init data
            $data = [
                'title' => 'List Of Class',
                'name' => '',
                'namer_err' => '',
            ];
            // Load view
            $this->view('classe/add', $data);
        }
    }

    // edit
    #region
    public function edit($id)
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
                'title' => 'Update Class',
                'id' => $id,
                'name' => trim($_POST['name']),
                'name_err' => '',
            ];

            // Validate First Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae Enter Class Name';
            }

            // Make sure data error are empty
            if (empty($data['name_err'])) {
                // Validated

                // // Edit User
                if ($this->ClaseModel->edit($data)) {
                    redirect('classe/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('classe/edit', $data);
            }
        } else {
            // Init data
            $class = $this->ClaseModel->Classinfo($id);
            $data = [
                'id' => $id,
                'title' => 'List Of Class',
                'name' => $class->name,
            ];
            // Load view
            $this->view('classe/edit', $data);
        }
    }
    #endregion

    // delete Class
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->ClaseModel->delete($id)) {
                redirect('classe/index');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('classe/index');
        }
    }

    // edit
    #region
    public function info($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        // Check for POST
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //     // Process form

        //     // Sanitize POST data
        //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        //     // Init data
        //     $data = [
        //         'title' => 'Update Class',
        //         'id' => $id,
        //         'name' => trim($_POST['name']),
        //         'name_err' => '',
        //     ];

        //     // Validate First Name
        //     if (empty($data['name'])) {
        //         $data['name_err'] = 'Pleae Enter Class Name';
        //     }

        //     // Make sure data error are empty
        //     if (empty($data['name_err'])) {
        //         // Validated

        //         // // Edit User
        //         if ($this->ClaseModel->edit($data)) {
        //             redirect('classe/index');
        //         } else {
        //             die('Something went wrong');
        //         }
        //     } else {
        //         // Load view
        //         $this->view('classe/edit', $data);
        //     }
        // } 
        else {
            // Init data
            $class = $this->ClaseModel->Classinfo($id);
            $classInfo = $this->ClaseModel->ClassinfoBy($id);
            $data = [
                'id' => $id,
                'title' => 'Class Info',
                'name' => $class->name,
                'classInfo' => $classInfo,
            ];
            // Load view
            $this->view('classe/info', $data);
        }
    }
    #endregion

}
