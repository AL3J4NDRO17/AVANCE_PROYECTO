<?php
    class TblTransacciones {
        private $conexion;
    
        public function __construct($conexion) {
            // Requiero la clase dbconexion
            require_once('../Config/databaseconexion.php');
            // Instrucciones userconection con $dbconexion
            $this->conexion = new Database_Conexion();
        }
    
        public function InsertTransaccion($FK_Usuario, $FK_Vendedor, $Fecha, $Hora, $Monto, $Estado) {
            // Insertar datos en la tabla "Transacciones"
            $sql = "INSERT INTO Transacciones (FK_Usuario, FK_Vendedor, Fecha, Hora, Monto, Estado) 
                    VALUES ('$FK_Usuario', '$FK_Vendedor', '$Fecha', '$Hora', '$Monto', '$Estado')";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Obtener el ID generado de la tabla "Transacciones"
            $id = $Conexion->insert_id;
            // Cierro la conexión
            $this->conexion->closeconect();
            return $id;
        }
    
        public function DeleteTransaccion($ID_Transaccion) {
            // Eliminar transacción de la tabla "Transacciones"
            $sql = "DELETE FROM Transacciones WHERE ID_Transaccion = '$ID_Transaccion'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se eliminó la transacción correctamente
            if ($Conexion->affected_rows > 0) {
                // Cierro la conexión
                $this->conexion->closeconect();
                return true; // Transacción eliminada correctamente
            } else {
                // Cierro la conexión
                $this->conexion->closeconect();
                return false; // Error al eliminar la transacción
            }
        }
    
        public function UpdateTransaccion($ID_Transaccion, $FK_Usuario, $FK_Vendedor, $Fecha, $Hora, $Monto, $Estado) {
            // Actualizar datos de la transacción en la tabla "Transacciones"
            $sql = "UPDATE Transacciones SET FK_Usuario = '$FK_Usuario', FK_Vendedor = '$FK_Vendedor',
                    Fecha = '$Fecha', Hora = '$Hora', Monto = '$Monto', Estado = '$Estado'
                    WHERE ID_Transaccion = '$ID_Transaccion'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se actualizó la transacción correctamente
            if ($Conexion->affected_rows > 0) {
                // Cierro la conexión
                $this->conexion->closeconect();
                return true; // Transacción actualizada correctamente
            } else {
                // Cierro la conexión
                $this->conexion->closeconect();
                return false; // Error al actualizar la transacción
            }
        }
    }
?>