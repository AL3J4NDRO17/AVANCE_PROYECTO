<?php
   class TblVendedores {
    private $conexion;

    public function __construct($conexion) {
        // Requiero la clase dbconexion
        require_once('../Config/databaseconexion.php');
        // Instrucciones userconection con $dbconexion
        $this->conexion = new Database_Conexion();
    }

    public function InsertVendedor($Nombre, $Descripcion, $Tel_Contacto, $FK_Calificacion, $Email, $Sexo) {
        // Insertar datos en la tabla "Vendedores"
        $sql = "INSERT INTO Vendedores (Nombre, Descripcion, Tel_Contacto, FK_Calificacion, Email, Sexo) 
                VALUES ('$Nombre', '$Descripcion', '$Tel_Contacto', '$FK_Calificacion', '$Email', '$Sexo')";
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);

        // Obtener el ID generado de la tabla "Vendedores"
        $id = $Conexion->insert_id;
        // Cierro la conexión
        $this->conexion->closeconect();
        return $id;
    }

    public function DeleteVendedor($ID_Vendedor) {
        // Eliminar vendedor de la tabla "Vendedores"
        $sql = "DELETE FROM Vendedores WHERE ID_Vendedor = '$ID_Vendedor'";
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);

        // Verificar si se eliminó el vendedor correctamente
        if ($Conexion->affected_rows > 0) {
            // Cierro la conexión
            $this->conexion->closeconect();
            return true; // Vendedor eliminado correctamente
        } else {
            // Cierro la conexión
            $this->conexion->closeconect();
            return false; // Error al eliminar el vendedor
        }
    }

    public function UpdateVendedor($ID_Vendedor, $Nombre, $Descripcion, $Tel_Contacto, $FK_Calificacion, $Email, $Sexo) {
        // Actualizar datos del vendedor en la tabla "Vendedores"
        $sql = "UPDATE Vendedores SET 
                Nombre = '$Nombre', Descripcion = '$Descripcion', Tel_Contacto = '$Tel_Contacto', 
                FK_Calificacion = '$FK_Calificacion', Email = '$Email', Sexo = '$Sexo' 
                WHERE ID_Vendedor = '$ID_Vendedor'";
        $Conexion = $this->conexion->getconect();
        $Conexion->query($sql);

        // Verificar si se actualizó el vendedor correctamente
        if ($Conexion->affected_rows > 0) {
            // Cierro la conexión
            $this->conexion->closeconect();
            return true; // Vendedor actualizado correctamente
        } else {
            // Cierro la conexión
            $this->conexion->closeconect();
            return false; // Error al actualizar el vendedor
        }
    }
}
?>