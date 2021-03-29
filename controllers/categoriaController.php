<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria= new Categoria();
        $categorias=$categoria->getAll();
           require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];

            //Conseguir Categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            //Conseguir productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productosCategorias = $producto->getAllCategory();
        }

        require_once 'views/categoria/ver.php';
    }

    public function save(){
        Utils::isAdmin();
        //Guardar la categoria en bd
        if(isset($_POST) && isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $categoria->setId($id);
                $save= $categoria->edit();
            }else{
               $save= $categoria->save();
            }
                if($save){
                    $_SESSION['categoria']='complete';
                }else{
                    $_SESSION['categoria']='failed';
                }
            } else{
                $_SESSION['categoria']='failed';
            }
        header("Location:?controller=categoria&action=index");
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
        $edit=true;
        $id = $_GET['id'];
        $categoria = new Categoria();
        $categoria->setId($id);
        $cat= $categoria->getOne();

        require_once 'views/categoria/crear.php';
        }else{
            header('Location:?controller=categoria&action=index');
        }
    }

    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete=$categoria->delete();
            if($delete){
                $_SESSION['deleteCategoria']='complete';
            }else{
                $_SESSION['deleteCategoria']='failed';
            }
        }else{
            $_SESSION['deleteCategoria']='failed';
        }
        header("Location:?controller=categoria&action=index");
    }
}