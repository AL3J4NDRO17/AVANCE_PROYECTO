<?php
    class TblCalificacion {
        private $conect;
    
        public function __construct($conect) {
            //requiero la clase dbconexion
            require_once('../Config/databaseconexion.php');
            //instrucciones userconection con $dbconexion
            $this->conect = new Database_Conexion();
        }
    
        public function InsertCalificacion($ID_Vendedor, $Calificacion, $Fecha) {
            // Insertar datos en la tabla "TblCalificacion"
            $sql = "INSERT INTO TblCalificacion (ID_Vendedor, Calificacion, Fecha) VALUES ('$ID_Vendedor', '$Calificacion', '$Fecha')";   
            // llamo a la conexion
            $Conexion = $this->conect->getconect();
            $Conexion->query($sql);
            // Obtener el ID generado de la tabla "TblCalificacion"
            $id = $Conexion->insert_id;
            // cierro la conexion
            $this->conect->closeconect();
            return $id;
        }
    
        public function DeleteCalificacion($ID_Calificacion) {
            // Eliminar calificación de la tabla "TblCalificacion"
            $sql = "DELETE FROM TblCalificacion WHERE ID_Calificacion = '$ID_Calificacion'";
            // llamo a la conexion
            $Conexion = $this->conect->getconect();
            $Conexion->query($sql);
            // Verificar si se eliminó la calificación correctamente
            if ($Conexion->affected_rows > 0) {
                // cierro la conexion
                $this->conect->closeconect();
                return true; // Calificación eliminada correctamente
            } else {
                // cierro la conexion
                $this->conect->closeconect();
                return false; // Error al eliminar la calificación
            }
        }
        
        public function UpdateCalificacion($ID_Calificacion, $ID_Vendedor, $Calificacion, $Fecha) {
            // Actualizar datos de la calificación en la tabla "TblCalificacion"
            $sql = "UPDATE TblCalificacion SET ID_Vendedor = '$ID_Vendedor', Calificacion = '$Calificacion', Fecha = '$Fecha' WHERE ID_Calificacion = '$ID_Calificacion'";
            // llamo a la conexion
            $Conexion = $this->conect->getconect();
            $Conexion->query($sql);
            // Verificar si se actualizó la calificación correctamente
            if ($Conexion->affected_rows > 0) {
                // cierro la conexion
                $this->conect->closeconect();
                return true; // Calificación actualizada correctamente
            } else {
                // cierro la conexion
                $this->conect->closeconect();
                return false; // Error al actualizar la calificación
            }
        }
    }
?>