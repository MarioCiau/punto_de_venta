<?php
require_once 'models/cliente.php';
class clienteController{
    public function index(){
        $cliente = new Cliente();
        $clientes=$cliente->getRandom(3);

        //renderizar vista
        require_once 'views/cliente/index.php';
    }

    public function todos(){
        $cliente = new Cliente();
        $clientes=$cliente->getAll();

        //renderizar vista
        require_once 'views/cliente/clientes.php';
    }


    public function crear(){
        require_once 'views/cliente/crear.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $cliente = new Cliente();
            $cliente->setId($id);

            $client= $cliente->getOne();

            }
        require_once 'views/cliente/ver.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $cliente = new  Cliente();
        $clientes = $cliente->getAll();
        require_once 'views/cliente/gestion.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $edad = isset($_POST['edad']) ? $_POST['edad'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $estado && $localidad && $direccion && $edad && $telefono){
                $cliente = new Cliente();
                $cliente->setNombre($nombre);
                $cliente->setEstado($estado);
                $cliente->setLocalidad($localidad);
                $cliente->setDireccion($direccion);
                $cliente->setEdad($edad);
                $cliente->setTelefono($telefono);

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $cliente->setId($id);

                $save= $cliente->edit();
            }else{
               $save= $cliente->save();
            }
                if($save){
                    $_SESSION['cliente']='complete';
                }else{
                    $_SESSION['cliente']='failed';
                }
            } else{
                $_SESSION['cliente']='failed';
            }
        }else{
            $_SESSION['cliente']='failed';
        }
        header("Location:?controller=cliente&action=gestion");
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
        $edit=true;
        $id = $_GET['id'];
        $cliente = new Cliente();
        $cliente->setId($id);
        $cli= $cliente->getOne();

        require_once 'views/cliente/crear.php';
        }else{
            header("Location:?controller=cliente&action=gestion");
        }
    }

    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $cliente = new Cliente();
            $cliente->setId($id);
            $delete=$cliente->delete();
            if($delete){
                $_SESSION['delete']='complete';
            }else{
                $_SESSION['delete']='failed';
            }
        }else{
            $_SESSION['delete']='failed';
        }
        header("Location:?controller=cliente&action=gestion");
    }
}