<?php
require_once 'models/usuario.php';
class usuarioController{
    public function index(){
       $usuario= new Usuario();
        $usuarios=$usuario->getAllUsers();
        $custumers=$usuario->getAllCustumers();
        $products=$usuario->getAllProducts();
        $sales=$usuario->getAllSales();
        require_once 'views/usuario/index.php';
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $user = isset($_POST['user']) ? $_POST['user'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($nombre && $apellidos && $user && $email && $password){
            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setUsuario($user);
            $usuario->setEmail($email);
            $usuario->setPassword($password);

            $save =$usuario->save();
            if($save){
              $_SESSION['register'] ="complete";
            }else{
              $_SESSION['register'] ="failed";
            }
          }else{
            $_SESSION['register'] ="failed";
          }
        }else{
          $_SESSION['register'] ="failed";
        }
        header("Location:?controller=usuario&action=registro");
      }

      public function login(){
        if(isset($_POST)){
          $usuario = new Usuario();
          $usuario->setUsuario($_POST['user']);
          $usuario->setPassword($_POST['password']);
          $identify=$usuario->login();

          if($identify && is_object($identify)){
            $_SESSION['identify']=$identify;
            if(isset($_SESSION['error_login'])){
              unset($_SESSION['error_login']);
          }
            if($identify->rol=='admin'){
              $_SESSION['admin']=true;
            }
            }else{
              $_SESSION['error_login']="Identificacion fallida";
          }
        }
        header("Location:?controller=usuario&action=index");
      }

    public function logout(){
      if(isset($_SESSION['identify'])){
          unset($_SESSION['identify']);
      }

      if(isset($_SESSION['admin'])){
          unset($_SESSION['admin']);
      }
      header("Location:index.php?controller=usuario&action=index");
  }
}
?>