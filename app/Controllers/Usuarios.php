<?php
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            if(empty($data['email'])) {
                $data['email_err'] = 'Por favor ingrese el correo';
            } else {
                if($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'El correo ya está registrado';
                }
            }

            if(empty($data['name'])) {
                $data['name_err'] = 'Por favor ingrese el nombre';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'Por favor ingrese la contraseña';
            } elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'La contraseña debe tener al menos 6 caracteres';
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Por favor confirme la contraseña';
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Las contraseñas no coinciden';
                }
            }

            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                if($this->userModel->register($data)) {
                    Session::set('success', 'Te has registrado correctamente');
                    redirect('auth/login');
                } else {
                    die('Algo salió mal');
                }
            } else {
                $this->view('auth/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('auth/register', $data);
        }
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if(empty($data['email'])) {
                $data['email_err'] = 'Por favor ingrese el correo';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'Por favor ingrese la contraseña';
            }

            if(empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Contraseña incorrecta';
                    $this->view('auth/login', $data);
                }
            } else {
                $this->view('auth/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('auth/login', $data);
        }
    }

    public function createUserSession($user) {
        Session::set('user_id', $user['id']);
        Session::set('user_email', $user['email']);
        Session::set('user_name', $user['name']);
        Session::set('user_role', $user['role']);
        redirect('dashboard');
    }

    public function logout() {
        Session::remove('user_id');
        Session::remove('user_email');
        Session::remove('user_name');
        Session::remove('user_role');
        Session::destroy();
        redirect('auth/login');
    }
}

