<?php
    class TblValoraciones {
        private $conexion;
    
        public function __construct($conexion) {
            // Requiero la clase dbconexion
            require_once('../Config/databaseconexion.php');
            // Instrucciones userconection con $dbconexion
            $this->conexion = new Database_Conexion();
        }
    
        public function InsertValoracion($FK_Usuario, $FK_Producto, $Calificacion, $Comentarios, $Fecha) {
            // Insertar datos en la tabla "Valoraciones"
            $sql = "INSERT INTO Valoraciones (FK_Usuario, FK_Producto, Calificacion, Comentarios, Fecha) 
                    VALUES ('$FK_Usuario', '$FK_Producto', '$Calificacion', '$Comentarios', '$Fecha')";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Obtener el ID generado de la tabla "Valoraciones"
            $id = $Conexion->insert_id;
            // Cierro la conexión
            $this->conexion->closeconect();
            return $id;
        }
    
        public function DeleteValoracion($ID_Valoracion) {
            // Eliminar valoración de la tabla "Valoraciones"
            $sql = "DELETE FROM Valoraciones WHERE ID_Valoracion = '$ID_Valoracion'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se eliminó la valoración correctamente
            if ($Conexion->affected_rows > 0) {
                // Cierro la conexión
                $this->conexion->closeconect();
                return true; // Valoración eliminada correctamente
            } else {
                // Cierro la conexión
                $this->conexion->closeconect();
                return false; // Error al eliminar la valoración
            }
        }
    
        public function UpdateValoracion($ID_Valoracion, $FK_Usuario, $FK_Producto, $Calificacion, $Comentarios, $Fecha) {
            // Actualizar datos de la valoración en la tabla "Valoraciones"
            $sql = "UPDATE Valoraciones SET 
                    FK_Usuario = '$FK_Usuario', FK_Producto = '$FK_Producto', 
                    Calificacion = '$Calificacion', Comentarios = '$Comentarios', Fecha = '$Fecha' 
                    WHERE ID_Valoracion = '$ID_Valoracion'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se actualizó la valoración correctamente
            if ($Conexion->affected_rows > 0) {
                // Cierro la conexión
                $this->conexion->closeconect();
                return true; // Valoración actualizada correctamente
            } else {
                // Cierro la conexión
                $this->conexion->closeconect();
                return false; // Error al actualizar la valoración
            }
        }
    }
?>