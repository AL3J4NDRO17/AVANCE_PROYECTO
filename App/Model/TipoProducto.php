<?php
    class TblTProductos {
        private $conexion;

        public function __construct($conexion) {
            //requiero la clase dbconexion
           require_once('../Config/databaseconexion.php');
           //instrucciones userconection con $dbconexion
           $this->$conexion=new Database_Conexion();
        }

        public function InsertTProducto($Material, $Descripcion) {
            // Insertar datos en la tabla "TProductos"
            $sql = "INSERT INTO TProductos (Material, Descripcion) VALUES ('$Material', '$Descripcion')";
            $_Conexion=$this->conexion->getconect();
            $_Conexion->query($sql);

            // Obtener el ID generado de la tabla "TProductos"
            $id = $this->conexion->insert_id;
            return $id;
            // cierro la conexion
            $this->conexion->closeconect();
        }

        public function DeleteTProducto($ID_TProducto) {
            // Eliminar tipo de producto de la tabla "TProductos"
            $sql = "DELETE FROM TProductos WHERE ID_TProducto = '$ID_TProducto'";
            $_Conexion=$this->conexion->getconect();
            $_Conexion->query($sql);
            
            // Verificar si se eliminó el tipo de producto correctamente
            if ($this->conexion->affected_rows > 0) {
                return true; // Tipo de producto eliminado correctamente
            } else {
                return false; // Error al eliminar el tipo de producto
            }
            // cierro la conexion
            $this->conexion->closeconect();
        }
        
        public function UpdateTProducto($ID_TProducto, $Material, $Descripcion) {
            // Actualizar datos del tipo de producto en la tabla "TProductos"
            $sql = "UPDATE TProductos SET Material = '$Material', Descripcion = '$Descripcion' WHERE ID_TProducto = '$ID_TProducto'";
            $_Conexion=$this->conexion->getconect();
            $_Conexion->query($sql);
            
            // Verificar si se actualizó el tipo de producto correctamente
            if ($this->conexion->affected_rows > 0) {
                return true; // Tipo de producto actualizado correctamente
            } else {
                return false; // Error al actualizar el tipo de producto
            }
            // cierro la conexion
            $this->conexion->closeconect();
        }
    }
?>