<?php
    class TblEnvios {
        private $conexion;
    
        public function __construct($conexion) {
            //requiero la clase dbconexion
            require_once('../Config/databaseconexion.php');
            //instrucciones userconection con $dbconexion
            $this->$conexion = new Database_Conexion();
        }
    
        public function InsertEnvio($FK_Pedido, $Fecha_Envio, $Estado, $Info_Seguimiento) {
            // Insertar datos en la tabla "Envios"
            $sql = "INSERT INTO Envios (FK_Pedido, Fecha_Envio, Estado, Info_Seguimiento) 
                    VALUES ('$FK_Pedido', '$Fecha_Envio', '$Estado', '$Info_Seguimiento')";
            // llamo a la conexion
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Obtener el ID generado de la tabla "Envios"
            $id = $Conexion->insert_id;
            // cierro la conexion
            $this->conexion->closeconect();
            return $id;
        }
    
        public function DeleteEnvio($ID_Envio) {
            // Eliminar envío de la tabla "Envios"
            $sql = "DELETE FROM Envios WHERE ID_Envio = '$ID_Envio'";
            // llamo a la conexion
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se eliminó el envío correctamente
            if ($Conexion->affected_rows > 0) {
                // cierro la conexion
                $this->conexion->closeconect();
                return true; // Envío eliminado correctamente
            } else {
                // cierro la conexion
                $this->conexion->closeconect();
                return false; // Error al eliminar el envío
            }
        }
        
        public function UpdateEnvio($ID_Envio, $FK_Pedido, $Fecha_Envio, $Estado, $Info_Seguimiento) {
            // Actualizar datos del envío en la tabla "Envios"
            $sql = "UPDATE Envios SET FK_Pedido = '$FK_Pedido', Fecha_Envio = '$Fecha_Envio', 
                    Estado = '$Estado', Info_Seguimiento = '$Info_Seguimiento' 
                    WHERE ID_Envio = '$ID_Envio'";
            // llamo a la conexion
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
            
            // Verificar si se actualizó el envío correctamente
            if ($Conexion->affected_rows > 0) {
                // cierro la conexion
                $this->conexion->closeconect();
                return true; // Envío actualizado correctamente
            } else {
                // cierro la conexion
                $this->conexion->closeconect();
                return false; // Error al actualizar el envío
            }
        }
    }    
?>