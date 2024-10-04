<?php
class Emails {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function registeremail($data) {
        $this->db->query('INSERT INTO emails (email, password, nom_Empresa, texto, url_web) VALUES(:email, :password, :nom_Empresa, :texto, :url_web)');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':num_empresa', $data['num_empresa']);
        $this->db->bind(':texto', $data['texto']);
        $this->db->bind(':url_web', $data['url_web']);
       

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


}

