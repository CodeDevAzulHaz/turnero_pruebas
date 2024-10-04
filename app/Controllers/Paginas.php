<?php 

class Paginas extends Controller {
    public function index(){
        $data =
        [
            'title' => 'Pagina Principal',
            'description' => 'Esta es la descripción de la página principal'
        ];
        $this->view('paginas/home', $data);
    }

    public function sobre(){
        $data =
        [
            'titloPagina' => APP_NOME,
            
        ];
        $this->view('paginas/sobre', $data);
    }
}

?>