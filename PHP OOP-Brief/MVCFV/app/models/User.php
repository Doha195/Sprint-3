<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Regsiter user
    public function register($data)
    {
        $this->db->query('INSERT INTO users (firstName, lastName, dateOfBirth, userName, email, password, tele, gender, classId, recoveryCode) VALUES(:firstName, :lastName, :dateOfBirth, :userName, :email, :password, :tele, :gender, :class, :recoveryCode)');
        // Bind valuestele
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':dateOfBirth', $data['dateOfBirth']);
        $this->db->bind(':userName', $data['userName']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':tele', $data['tele']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':recoveryCode', stripslashes(str_replace('/', '', $data['password'])));

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($userName, $password)
    {
        $this->db->query('SELECT * FROM users WHERE userName = :userName');
        $this->db->bind(':userName', $userName);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Reset password
    public function resetpass($data)
    {
        $this->db->query('UPDATE users SET password = :password WHERE recoveryCode = :recoveryCode');
        // Bind valuestele
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':recoveryCode', $data['recoveryCode']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // profil
    public function profil($id)
    {
        $this->db->query('SELECT * FROM Users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by User Name
    public function findUserByUserName($userName)
    {
        $this->db->query('SELECT * FROM users WHERE userName  = :userName ');
        // Bind value
        $this->db->bind(':userName', $userName);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Get Users List
    public function getUsers()
    {
        $this->db->query('SELECT * FROM users WHERE Permision = 0');
        return $this->db->resultSet();
    }

    // Get Users List ORDER BY dateOfRegister
    public function getUsersByDate()
    {
        $this->db->query('SELECT * FROM users WHERE Permision = 0 ORDER BY dateOfRegister');
        return $this->db->resultSet();
    }

    // Add User
    public function add($data)
    {
        $this->db->query('INSERT INTO users (firstName, lastName, userName, password, classId) VALUES(:firstName, :lastName, :userName, :password, :class)');
        // Bind valuestele
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':userName', $data['userName']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':class', $data['class']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update User
    // Add User
    public function edit($data)
    {
        $this->db->query('UPDATE users SET firstName = :firstName, lastName = :lastName, dateOfBirth = :dateOfBirth, userName = :userName, email = :email, tele = :tele, gender = :gender, classId = :class WHERE id = :id');
        // Bind valuestele
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':dateOfBirth', $data['dateOfBirth']);
        $this->db->bind(':userName', $data['userName']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':tele', $data['tele']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Update Prifile
    // Add User
    public function editProfil($data)
    {
        $this->db->query('UPDATE users SET firstName = :firstName, lastName = :lastName, dateOfBirth = :dateOfBirth, userName = :userName, email = :email, password = :password, tele = :tele, gender = :gender, classId = :class WHERE id = :id');
        // Bind valuestele
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':dateOfBirth', $data['dateOfBirth']);
        $this->db->bind(':userName', $data['userName']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':tele', $data['tele']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Get User Info
    public function search($search)
    {
        $this->db->query("SELECT * FROM Users WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR email LIKE '%$search%'");
        $row = $this->db->resultSet();

        return $row;
    }

    // Search
    public function getUsersInfo($id)
    {
        $this->db->query('SELECT * FROM Users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Get User Info By email
    public function getUsersInfoEmail($email)
    {
        $this->db->query('SELECT * FROM Users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        return $row;
    }

    // Get User Info By Recvery Code
    public function getUsersInfoCode($id)
    {
        $this->db->query('SELECT recoveryCode FROM Users WHERE recoveryCode = :recoveryCode');
        $this->db->bind(':recoveryCode', $id);

        $row = $this->db->single();

        return $row;
    }


    // Number of Users
    public function totalUsers()
    {
        $this->db->query('SELECT * FROM Users');

        $this->db->resultSet();
        $row = $this->db->rowCount();

        return $row;
    }


    // delete user
    public function delete($id)
    {
        $this->db->query('DELETE FROM users WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // My Class
    public function myClass($id)
    {
        $this->db->query('SELECT * FROM Users WHERE classId = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();

        return $row;
    }


    // Class Id
    public function classID()
    {
        $this->db->query('SELECT classId FROM users GROUP BY classId');
        $result = $this->db->resultSet();
        return $result;
    }
}
