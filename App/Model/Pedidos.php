<?php
    class TblPedidos {
        private $conexion;

        public function __construct($conexion) {
            //requiero la clase dbconexion
           require_once('../Config/databaseconexion.php');
           //instrucciones userconection con $dbconexion
           $this->$conexion=new Database_Conexion();
        }

        public function InsertPedido($FK_Usuario,$Estado_Pedido, $Fecha_Pedido) {
            // Insertar datos en la tabla "Pedidos"
            $sql = "INSERT INTO Pedidos (FK_Usuario, FK_Direccion, FK_MetodoPago, Estado_Pedido, Fecha_Pedido) 
                    VALUES ('$FK_Usuario','$Estado_Pedido', '$Fecha_Pedido')";
            // llamo a la conexion
            $_Conexion=$this->conexion->getconect();
            $_Conexion->query($sql);

            // Obtener el ID generado de la tabla "Pedidos"
            $id = $this->conexion->insert_id;
            return $id;
            // cierro la conexion
            $this->conexion->closeconect();
        }

        public function DeletePedido($ID_Pedido) {
            // Eliminar pedido de la tabla "Pedidos"
            $sql = "DELETE FROM Pedidos WHERE ID_Pedido = '$ID_Pedido'";
             // llamo a la conexion
            $_Conexion=$this->conexion->getconect();
            $_Conexion->query($sql);
            
            // Verificar si se eliminó el pedido correctamente
            if ($this->conexion->affected_rows > 0) {
                return true; // Pedido eliminado correctamente
            } else {
                return false; // Error al eliminar el pedido
            }
            // cierro la conexion
            $this->conexion->closeconect();
        }
        
        public function UpdatePedido($ID_Pedido, $FK_Usuario,$Estado_Pedido, $Fecha_Pedido) {
            // Actualizar datos del pedido en la tabla "Pedidos"
            $sql = "UPDATE Pedidos SET FK_Usuario = '$FK_Usuario',Estado_Pedido = '$Estado_Pedido', 
                    Fecha_Pedido = '$Fecha_Pedido' WHERE ID_Pedido = '$ID_Pedido'";
             // llamo a la conexion
             $_Conexion=$this->conexion->getconect();
             $_Conexion->query($sql);
            
            // Verificar si se actualizó el pedido correctamente
            if ($this->conexion->affected_rows > 0) {
                return true; // Pedido actualizado correctamente
            } else {
                return false; // Error al actualizar el pedido
            }
        }
    }
?>