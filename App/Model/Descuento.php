<?php
   class TblDescuentos {
    private $conect;

    public function __construct($conexion) {
         //requiero la clase dbconexion
         require_once('../Config/databaseconexion.php');
         //instrucciones userconection con $dbconexion
         $this->$conect = new Database_Conexion();
    }

    public function InsertDescuento($Descripcion, $Fecha_Inicio, $Fecha_Fin, $Porcentaje) {
        // Insertar datos en la tabla "Descuentos"
        $sql = "INSERT INTO Descuentos (Descripcion, Fecha_Inicio, Fecha_Fin, Porcentaje, FK_Producto) 
                VALUES ('$Descripcion', '$Fecha_Inicio', '$Fecha_Fin', '$Porcentaje')";
        // llamo a la conexion
        $Conexion = $this->conect->getconect();
        $Conexion->query($sql);

        // Obtener el ID generado de la tabla "Descuentos"
        $id = $Conexion->insert_id;
        // cierro la conexion
        $this->conect->closeconect();
        return $id;
    }

    public function DeleteDescuento($ID_Descuento) {
        // Eliminar descuento de la tabla "Descuentos"
        $sql = "DELETE FROM Descuentos WHERE ID_Descuento = '$ID_Descuento'";
        // llamo a la conexion
        $Conexion = $this->conect->getconect();
        $Conexion->query($sql);

        // Verificar si se eliminó el descuento correctamente
        if ($Conexion->affected_rows > 0) {
            // cierro la conexion
            $this->conect->closeconect();
            return true; // Descuento eliminado correctamente
        } else {
            // cierro la conexion
            $this->conect->closeconect();
            return false; // Error al eliminar el descuento
        }
    }
    
    public function UpdateDescuento($ID_Descuento, $Descripcion, $Fecha_Inicio, $Fecha_Fin, $Porcentaje) {
        // Actualizar datos del descuento en la tabla "Descuentos"
        $sql = "UPDATE Descuentos SET Descripcion = '$Descripcion', Fecha_Inicio = '$Fecha_Inicio', 
                Fecha_Fin = '$Fecha_Fin', Porcentaje = '$Porcentaje'
                WHERE ID_Descuento = '$ID_Descuento'";
        // llamo a la conexion
        $Conexion = $this->conect->getconect();
        $Conexion->query($sql);
        
        // Verificar si se actualizó el descuento correctamente
        if ($Conexion->affected_rows > 0) {
            // cierro la conexion
            $this->conect->closeconect();
            return true; // Descuento actualizado correctamente
        } else {
            // cierro la conexion
            $this->conect->closeconect();
            return false; // Error al actualizar el descuento
        }
    }
}
?>