
<?php
class Email extends Controller {
    protected $admin;
    protected $email;
    protected $session;

    public function __construct() {
        $this->admin = $this->model('Main');
        $this->email = $this->model('Emails');
        
        $this->session = new Session();
    }

    public function index() {

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $cols = array(
                array('email', $_POST['email']),
                array('password', password_hash($_POST['password'], PASSWORD_DEFAULT)),
                array('empresa', $_POST['empresa']),
                array('mensaje', $_POST['mensaje']),
                array('enlace', $_POST['enlace']),
            );

            $created = $this->admin->create('emails', $cols) ;
            // var_dump($created);
            // exit;

            if ( $created ) {
                $this->session->set('message', 'guardado correcto.');
                redirect('/email/success');

                    $data = [
                        'mensaje'  => $_POST['mensaje'],
                        'enlace' => $_POST['enlace'],
                    ];

                ob_start();
                    $this->view('emails/template', $data);
                    $body = ob_get_contents();
                ob_end_clean();

                $subject = $_POST['empresa'];

                Mailer::send_email($_POST['email'], $subject, $body);

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

        $this->view('emails/index', $data);
                          
    }

    public function lista(){

        $data = [
            'emails' => $this->admin->readAll('emails'),
            'email' => $this->admin->readWhere('single', 'email', "hazelazul34@gmail.com", 'emails'),
            'controller' => strtolower(get_called_class()),
            'page' => __FUNCTION__
        ];

        $this->view('emails/lista', $data);   
    }


    public function success() {

        $data = [
            'controller' => strtolower(get_called_class()),
            'page' => __FUNCTION__
        ];

        $this->view('email/success', $data);
                          
    }

    

    public function configurar(){
         // table user_email
        // id,  userId , email, password, host, sender_name, port, encryption, createdAt

        if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) 
        {
            // $usuarios =$this->admin->readWhere('set', 'createdAt', $fecha, 'usuarios');
            $data = [
                'controller' => strtolower(get_called_class()),
                'page' => __FUNCTION__,
                // 'usuario' => $this->admin->readWhere('single', 'id', $id, 'usuarios'),
            ];



            $this->view('email/configurar', $data);
        }

       

        if ($userId) {
        // Datos del correo electrónico
            $email_cols = array(
            array('id', $_POST['$id']),
            array('user_id', $_POST['$userId']), // Usar el ID del usuario insertado
            array('email', $_POST['email']),
            array('password', $_POST['password']),
            array('host', $_POST['host']),
            array('sender_name', $_POST['sender_name']),
            array('port', $_POST['port']),
            array('encryption', $_POST['encryption']),
            );

             $created = $this->admin->create('user_email', $email_cols);

            if ($created) {
               $this->session->set('message', 'Guardado correcto.');
               redirect('/email/success');

            // Preparar y enviar el correo
                $data = [
                'mensaje' => $_POST['mensaje'],
                'enlace' => $_POST['enlace'],
                ];

                ob_start();
                $this->view('emails/template', $data);
                $body = ob_get_contents();
                ob_end_clean();

                $subject = $_POST['empresa'];

                Mailer::send_email($_POST['email'], $subject, $body);
                exit;

            } else {
                $this->session->set('message', 'Ocurrió un error al guardar el correo electrónico.');
                redirect('/email/configurar');
                exit;
            }
        } else {
               $this->session->set('message', 'Ocurrió un error al guardar el usuario.');
               redirect('/email/configurar');
               exit;
                }


    
    }
    


    public function saludar(){

         if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) 
        {
            // $usuarios =$this->admin->readWhere('set', 'createdAt', $fecha, 'usuarios');
            $data = [
                'controller' => strtolower(get_called_class()),
                 'page' => __FUNCTION__,
                // 'usuario' => $this->admin->readWhere('single', 'id', $id, 'usuarios'),
            ];

            $this->view('email/saludar', $data);
        }


    }
    



}