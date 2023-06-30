<?php
   class TblDetallesPedido {
    private $conexion;

    public function __construct($conexion) {
         //requiero la clase dbconexion
         require_once('../Config/databaseconexion.php');
         //instrucciones userconection con $dbconexion
         $this->$conexion = new Database_Conexion();
    }

    public function InsertDetallePedido($FK_Producto, $Cantidad, $Total) {
        // Insertar datos en la tabla "DetallesPedido"
        $sql = "INSERT INTO DetallesPedido (FK_Producto, Cantidad, Total) 
                VALUES ('$FK_Producto', '$Cantidad', '$Total')";
        // llamo a la conexion
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);

        // Obtener el ID generado de la tabla "DetallesPedido"
        $id = $Conexion->insert_id;
        // cierro la conexion
        $this->conexion->closeconect();
        return $id;
    }

    public function DeleteDetallePedido($ID_DetallePedido) {
        // Eliminar detalle de pedido de la tabla "DetallesPedido"
        $sql = "DELETE FROM DetallesPedido WHERE ID_DetallePedido = '$ID_DetallePedido'";
        // llamo a la conexion
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);

        // Verificar si se eliminó el detalle de pedido correctamente
        if ($Conexion->affected_rows > 0) {
            // cierro la conexion
            $this->conexion->closeconect();
            return true; // Detalle de pedido eliminado correctamente
        } else {
            // cierro la conexion
            $this->conexion->closeconect();
            return false; // Error al eliminar el detalle de pedido
        }
    }
    
    public function UpdateDetallePedido($ID_DetallePedido, $FK_Producto, $Cantidad, $Total) {
        // Actualizar datos del detalle de pedido en la tabla "DetallesPedido"
        $sql = "UPDATE DetallesPedido SET FK_Producto = '$FK_Producto', 
                Cantidad = '$Cantidad', Total = '$Total' 
                WHERE ID_DetallePedido = '$ID_DetallePedido'";
        // llamo a la conexion
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);
        
        // Verificar si se actualizó el detalle de pedido correctamente
        if ($Conexion->affected_rows > 0) {
            // cierro la conexion
            $this->conexion->closeconect();
            return true; // Detalle de pedido actualizado correctamente
        } else {
            // cierro la conexion
            $this->conexion->closeconect();
            return false; // Error al actualizar el detalle de pedido
        }
    }
}
?>