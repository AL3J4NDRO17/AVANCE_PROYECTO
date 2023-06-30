<?php
   class TblHistorial {
    private $conexion;

    public function __construct($conexion) {
        //requiero la clase dbconexion
        require_once('../Config/databaseconexion.php');
        //instrucciones userconection con $dbconexion
        $this->conexion = new Database_Conexion();
    }

    public function InsertHistorial($FK_Usuario, $FK_Producto, $Fecha_Compra, $Cantidad, $Precio_Unitario) {
        // Insertar datos en la tabla "Historial"
        $sql = "INSERT INTO Historial (FK_Usuario, FK_Producto, Fecha_Compra, Cantidad, Precio_Unitario) 
                VALUES ('$FK_Usuario', '$FK_Producto', '$Fecha_Compra', '$Cantidad', '$Precio_Unitario')";
        // llamo a la conexion
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);

        // Obtener el ID generado de la tabla "Historial"
        $id = $Conexion->insert_id;
        // cierro la conexion
        $this->conexion->closeconect();
        return $id;
    }

    public function DeleteHistorial($ID_Historial) {
        // Eliminar registro del historial en la tabla "Historial"
        $sql = "DELETE FROM Historial WHERE ID_Historial = '$ID_Historial'";
        // llamo a la conexion
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);

        // Verificar si se eliminó el registro correctamente
        if ($Conexion->affected_rows > 0) {
            // cierro la conexion
            $this->conexion->closeconect();
            return true; // Registro eliminado correctamente
        } else {
            // cierro la conexion
            $this->conexion->closeconect();
            return false; // Error al eliminar el registro
        }
    }
    
    public function UpdateHistorial($ID_Historial, $FK_Usuario, $FK_Producto, $Fecha_Compra, $Cantidad, $Precio_Unitario) {
        // Actualizar datos del registro en la tabla "Historial"
        $sql = "UPDATE Historial SET FK_Usuario = '$FK_Usuario', FK_Producto = '$FK_Producto',
                Fecha_Compra = '$Fecha_Compra', Cantidad = '$Cantidad', Precio_Unitario = '$Precio_Unitario'
                WHERE ID_Historial = '$ID_Historial'";
        // llamo a la conexion
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);
        
        // Verificar si se actualizó el registro correctamente
        if ($Conexion->affected_rows > 0) {
            // cierro la conexion
            $this->conexion->closeconect();
            return true; // Registro actualizado correctamente
        } else {
            // cierro la conexion
            $this->conexion->closeconect();
            return false; // Error al actualizar el registro
        }
    }
}
?>