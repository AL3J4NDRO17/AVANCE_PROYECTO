<?php
    class TblSuscripciones {
        private $conexion;
    
        public function __construct($conexion) {
            // Requiero la clase dbconexion
            require_once('../Config/databaseconexion.php');
            // Instrucciones userconection con $dbconexion
            $this->conexion = new Database_Conexion();
        }
    
        public function InsertSuscripcion($FK_Usuario, $FK_Producto, $Estado, $Fecha_Inicio, $Fecha_Vencimiento, $Nivel) {
            // Insertar datos en la tabla "Suscripciones"
            $sql = "INSERT INTO Suscripciones (FK_Usuario, FK_Producto, Estado, Fecha_Inicio, Fecha_Vencimiento, Nivel) 
                    VALUES ('$FK_Usuario', '$FK_Producto', '$Estado', '$Fecha_Inicio', '$Fecha_Vencimiento', '$Nivel')";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Obtener el ID generado de la tabla "Suscripciones"
            $id = $Conexion->insert_id;
            // Cierro la conexión
            $this->conexion->closeconect();
            return $id;
        }
    
        public function DeleteSuscripcion($ID_Suscripcion) {
            // Eliminar suscripción de la tabla "Suscripciones"
            $sql = "DELETE FROM Suscripciones WHERE ID_Suscripcion = '$ID_Suscripcion'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se eliminó la suscripción correctamente
            if ($Conexion->affected_rows > 0) {
                // Cierro la conexión
                $this->conexion->closeconect();
                return true; // Suscripción eliminada correctamente
            } else {
                // Cierro la conexión
                $this->conexion->closeconect();
                return false; // Error al eliminar la suscripción
            }
        }
    
        public function UpdateSuscripcion($ID_Suscripcion, $FK_Usuario, $FK_Producto, $Estado, $Fecha_Inicio, $Fecha_Vencimiento, $Nivel) {
            // Actualizar datos de la suscripción en la tabla "Suscripciones"
            $sql = "UPDATE Suscripciones SET FK_Usuario = '$FK_Usuario', FK_Producto = '$FK_Producto', 
                    Estado = '$Estado', Fecha_Inicio = '$Fecha_Inicio', Fecha_Vencimiento = '$Fecha_Vencimiento', 
                    Nivel = '$Nivel' 
                    WHERE ID_Suscripcion = '$ID_Suscripcion'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se actualizó la suscripción correctamente
            if ($Conexion->affected_rows > 0) {
                // Cierro la conexión
                $this->conexion->closeconect();
                return true; // Suscripción actualizada correctamente
            } else {
                // Cierro la conexión
                $this->conexion->closeconect();
                return false; // Error al actualizar la suscripción
            }
        }
    }
?>