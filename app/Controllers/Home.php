<?php
class Home extends Controller {
    protected $admin;
    protected $email;
    protected $session;

    public function __construct() {
        $this->admin = $this->model('Main');
        $this->email = $this->model('Emails');
        $this->session = new Session();
    }
    public function index() {
        ( !notSession() ) && redirect('/home/user_logged') && exit;

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        } 

        $data = [
            'controller' => strtolower(get_called_class()),
            'page' => __FUNCTION__
        ];

        $this->view('home/index', $data);
                          
    }

    
    public function registro() {
        ( !notSession() ) && redirect('/home/user_logged') && exit;

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $cols = array(
                array('username', $_POST['username']),
                array('password', password_hash($_POST['password'], PASSWORD_DEFAULT)),
                array('nombre', $_POST['nombre']),
                array('ciudad', $_POST['ciudad']),
                array('telefono', $_POST['telefono']),
            );

            $created = $this->admin->create('usuarios', $cols) ;
            // var_dump($created);
            // exit;

            if ( $created ) {
                $this->session->set('message', 'guardado correcto.');
                redirect('/email/success');
                exit;

            } else {
                $this->session->set('message', 'Ocurrio un error.');
                redirect('/email');
                exit;
            }
        } 

        $data = [
            'controller' => strtolower(get_called_class()),
            'page' => __FUNCTION__
        ];

        $this->view('home/registro', $data);
                          
    }


}