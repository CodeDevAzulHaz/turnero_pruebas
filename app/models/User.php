
<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password, role) VALUES(:name, :email, :password, :role)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':role', 'user');

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($row) {
            $hashed_password = $row['password'];
            if(password_verify($password, $hashed_password)) {
                return $row;
            }
        }

        return false;
    }

    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getAllUsers() {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }

    public function updateUserStatus($id, $status) {
        $this->db->query('UPDATE users SET is_active = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


?>
