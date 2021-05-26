<?php
class Clase
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get Class List
    public function getClass()
    {
        $this->db->query('SELECT * FROM class Limit 5');
        return $this->db->resultSet();
    }

    // class info
    public function Classinfo($id)
    {
        $this->db->query('SELECT * FROM class WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Class Info
    public function ClassinfoBy($id)
    {
        $this->db->query('SELECT * FROM Users WHERE classId = :id AND Permision = 0');
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();

        return $row;
    }

    // Number of Class
    public function totalClass()
    {
        $this->db->query('SELECT * FROM class');

        $this->db->resultSet();
        $row = $this->db->rowCount();

        return $row;
    }


    // Add Class
    public function add($data)
    {
        $this->db->query('INSERT INTO class (name) VALUES(:name)');
        // Bind valuestele
        $this->db->bind(':name', $data['name']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update Class
    public function edit($data)
    {
        $this->db->query('UPDATE class SET name = :name WHERE id = :id');
        // Bind valuestele
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete Class
    public function delete($id)
    {
        $this->db->query('DELETE FROM class WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
