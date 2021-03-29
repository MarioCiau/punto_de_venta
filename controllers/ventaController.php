<?php
require_once 'models/cliente.php';
require_once 'models/venta.php';
require_once 'models/abono.php';
class ventaController{
    public function index(){
        require_once 'views/ventas/index.php';
    }

    public function cliente(){
        if(isset($_GET['id_cliente'])){
            $id = $_GET['id_cliente'];
           $cliente = new Cliente();
           $cliente->setId($id);
           $cli= $cliente->getOne();

           require_once 'views/ventas/cliente_venta.php';
          }else{
              header("Location:?controller=venta&action=index");
            }
     }

    public function ventas(){
        $venta = new Venta();
        $ventas=$venta->getAll();

        require_once 'views/ventas/ventas.php';
    }

    public function add(){
            $cliente_id=isset($_POST['cliente']) ? $_POST['cliente'] : false;
            $tipo = isset($_POST['tipo'])  ? $_POST['tipo'] : false;
            $anticipo = isset($_POST['anticipo'])  ? $_POST['anticipo'] : false;
            $stats = Utils::statsCarrito();
            $total=$stats['total'];
            $saldo=$total-$anticipo;

            if($tipo == 'credito'){
                $estado='pendiente';
            }else{
                $estado='pagado';
            }

            if($cliente_id && $tipo && $anticipo){
            //Guardar datos en bd
            $venta = new Venta();
            $venta->setCliente_id($cliente_id);
            $venta->setTipo($tipo);
            $venta->setEnganche($anticipo);
            $venta->setTotal($total);
            $venta->setSaldo($saldo);
            $venta->setEstado($estado);
            if($total==0){
                $_SESSION['carrito_vacio']="error";
            }else{
                $save=$venta->save();
            }

            //Guardar linea de pedido
            $save_lineas=$venta->save_linea();

            if($save && $save_lineas){
                $_SESSION['venta'] = 'complete';
                unset($_SESSION['carrito']);
            }else{
                $_SESSION['venta'] = 'failed';
            }
            header("Location:?controller=venta&action=confirmado&id_cliente=$cliente_id");
        }else{
            header("Location:?controller=usuario&action=index");
        }
    }

    public function confirmado(){
        if(isset($_GET['id_cliente'])){
            $identity=$_GET['id_cliente'];
            $venta = new Venta();
            $venta->setCliente_id($identity);
            $venta = $venta->getOneByUser();

            $venta_productos = new Venta();
            $productos=$venta_productos->getProductosByPedido($venta->id);
        }
        require_once 'views/ventas/confirmado.php';
    }

    public function mis_ventas(){
        if(isset($_GET)){
            $cliente_id=$_GET['cliente_id'];
            $venta = new venta();

        //Sacar los ventas del usuario
        $venta->setCliente_id($cliente_id);
        $ventas=$venta->getAllByUser();
        }

        require_once 'views/ventas/mis_ventas.php';
    }

    public function detalle(){
        Utils::isIdentity();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            //Sacar el pedido
            $venta = new Venta();
            $venta->setId($id);
            $venta = $venta->getOne();

            //Sacar los productos
            $venta_productos = new Venta();
            $ventas=$venta_productos->getProductosByPedido($id);

            require_once 'views/ventas/detalle.php';
        }else{
            header("Location:?controller=venta&action=mis_ventas");
        }
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['venta_id']) && isset($_POST['estado'])){
            //Recoger datos
            $id = $_POST['venta_id'];
            $estado = $_POST['estado'];

            //Update del pedido
            $venta =  new Venta();
            $venta->setId($id);
            $venta->setEstado($estado);
            $venta->updateOne();

            header("Location:?controller=venta&action=detalle&id=".$id);
        }else{
            header("Location:?controller=usuario&action=index");
        }
    }

    public function descontar(){
        if(isset($_POST['id_venta']) && isset($_POST['monto'])  && isset($_POST['saldo']) && isset($_POST['cliente_id'])){
            $id=$_POST['id_venta'];
            $monto=$_POST['monto'];
            $saldo=$_POST['saldo'];
            $cliente_id=$_POST['cliente_id'];
            $descontar=$saldo-$monto;

            $venta =  new Venta();
            $venta->setId($id);
            $venta->setSaldo($descontar);
            $venta->discount();

            if($venta->getSaldo()==0){
                $venta->setEstado("pagado");
                $venta->updateOne();
            }
            $abono = new Abono();
            $abono->setVenta_id($id);
            $abono->setMonto($monto);
            $abono->setCliente_id($cliente_id);
            $abono->setSaldo($descontar);
            $abono->save();

            header("Location:?controller=venta&action=detalle&id=".$id);
        }
        else{
            header("Location:?controller=usuario&action=index");
        }
    }

}