<?php
    class TblMetodosPago {
        private $conexion;

        public function __construct($conexion) {
            //requiero la clase dbconexion
           require_once('../Config/databaseconexion.php');
           //instrucciones userconection con $dbconexion
           $this->$conexion=new Database_Conexion();
        }

        public function InsertMetodoPago($Numero_Cuenta, $CVV, $Fecha_Vencimiento, $Nombre_Titular) {
            // Insertar datos en la tabla "MetodosPago"
            $sql = "INSERT INTO MetodosPago (Numero_Cuenta, CVV, Fecha_Vencimiento, Nombre_Titular) 
                    VALUES ('$Numero_Cuenta', '$CVV', '$Fecha_Vencimiento', '$Nombre_Titular')";
            // llamo a la conexion
            $_Conexion=$this->conexion->getconect();
            $_Conexion->query($sql);

            // Obtener el ID generado de la tabla "MetodosPago"
            $id = $this->conexion->insert_id;
            return $id;
            // cierro la conexion
            $this->conexion->closeconect();
        }

        public function DeleteMetodoPago($ID_MetodoPago) {
            // Eliminar método de pago de la tabla "MetodosPago"
            $sql = "DELETE FROM MetodosPago WHERE ID_MetodoPago = '$ID_MetodoPago'";
            // llamo a la conexion
            $_Conexion=$this->conexion->getconect();
            $_Conexion->query($sql);
            
            // Verificar si se eliminó el método de pago correctamente
            if ($this->conexion->affected_rows > 0) {
                return true; // Método de pago eliminado correctamente
            } else {
                return false; // Error al eliminar el método de pago
            }
             // cierro la conexion
             $this->conexion->closeconect();
        }
        
        public function UpdateMetodoPago($ID_MetodoPago, $Numero_Cuenta, $CVV, $Fecha_Vencimiento, $Nombre_Titular) {
            // Actualizar datos del método de pago en la tabla "MetodosPago"
            $sql = "UPDATE MetodosPago SET Numero_Cuenta = '$Numero_Cuenta', CVV = '$CVV', 
                    Fecha_Vencimiento = '$Fecha_Vencimiento', Nombre_Titular = '$Nombre_Titular' 
                    WHERE ID_MetodoPago = '$ID_MetodoPago'";
             // llamo a la conexion
             $_Conexion=$this->conexion->getconect();
             $_Conexion->query($sql);
            
            // Verificar si se actualizó el método de pago correctamente
            if ($this->conexion->affected_rows > 0) {
                return true; // Método de pago actualizado correctamente
            } else {
                return false; // Error al actualizar el método de pago
            }
            // cierro la conexion
            $this->conexion->closeconect();
        }
    }
?>