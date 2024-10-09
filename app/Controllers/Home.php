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
        // ( !notSession() ) && redirect('/home/user_logged') && exit;

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
        // ( !notSession() ) && redirect('/home/user_logged') && exit;

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


    public function lista(){
        if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) 
        {
            $data = [
                'usuarios' => $this->admin->readAll('usuarios'),
                // 'password' => $this->admin->readWhere('single', 'ciudad', "oxaca", 'usuarios'),
                'controller' => strtolower(get_called_class()),
                'page' => __FUNCTION__
            ];

            $this->view('home/lista', $data);
        }
    }

    public function editar(int $id)
    {
        // GET, POST, PUT, DELETE
        if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) 
        {
            // $usuarios =$this->admin->readWhere('set', 'createdAt', $fecha, 'usuarios');
            $data = [
                'controller' => strtolower(get_called_class()),
                'page' => __FUNCTION__,
                'usuario' => $this->admin->readWhere('single', 'id', $id, 'usuarios'),
            ];

            $this->view('home/editar', $data);
        }


        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $cols = array(
                array('username', $_POST['username']),
                array('nombre', $_POST['nombre']),
                array('ciudad', $_POST['ciudad']),
                array('telefono', $_POST['telefono']),
            );

            if(!empty($_POST['password'])){
                $cols[] = array('password', password_hash($_POST['password'], PASSWORD_DEFAULT));
            }

            $updated = $this->admin->update('usuarios', $cols, "id= $id");

            if($updated){
                $this->session->set('message', 'Usuario actualizado correctamente');
                redirect('/usuarios/lista');
                exit;
            } else{
                $this->session->set('message', 'Error al actualizar usuario');
                redirect("/usuarios/editar/$id");
                exit;
            }
        }
        // else 
        // {
        //     // condicion else
        // }
    }
         
    // /home/eliminar/3
    public function eliminar(int $id){

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $deleted = $this->admin->delete('usuarios', 'id', $id);

            if($deleted){
                $this->session->set('message', 'Ususario eleminado correctamente');
            }else{
                $this->session->set('message', 'Error al eliminar usuario');
            }
            
            redirect('/home/lista');
        }
    }

    public function buscar(){

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            //recibe un termino de búsqueda por GET
            $termino = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //Busca usuarios que coicidan con el termino en username, mobre o ciudad
            $usuarios = $this->admin->search('usuarios',[
            array('username', "%termino%", 'LIKE'),
            array('nombre', "%termino%", 'LIKE', 'OR'),
            array('ciudad', "%termino%", 'LIKE', 'OR')
             ]);

            $data = [

            'controller' => strtolower(get_called_class()),
            'page' => __FUNCTION__,
            'usuario' => $usuarios,
            'termino' => $termino

             ];
             
             $this->view('home/lista', $data);

        
        }
    }



}