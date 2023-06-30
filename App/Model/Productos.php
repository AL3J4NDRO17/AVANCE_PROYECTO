<?php
    class TblProductos {
        private $conexion;
    
        public function __construct($conexion) {
            //requiero la clase dbconexion
            require_once('../Config/databaseconexion.php');
            //instrucciones userconection con $dbconexion
            $this->conexion = new Database_Conexion();
        }
    
        public function InsertProducto($ID_TProducto, $FK_Categoria, $FK_Promocion, $Nombre_Producto, $Fabricante, $Existencias, $Calificacion, $Descripcion, $Precio, $IVA) {
            // Insertar datos en la tabla "Productos"
            $sql = "INSERT INTO Productos (ID_TProducto, FK_Categoria, FK_Promocion, Nombre_Producto, Fabricante, Existencias, Calificacion, Descripcion, Precio, IVA) 
                    VALUES ('$ID_TProducto', '$FK_Categoria', '$FK_Promocion', '$Nombre_Producto', '$Fabricante', '$Existencias', '$Calificacion', '$Descripcion', '$Precio', '$IVA')";
             
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Obtener el ID generado de la tabla "Productos"
            $id = $Conexion->insert_id;
            // cierro la conexion
            $this->conexion->closeconect();
            return $id;
        }
    
        public function DeleteProducto($ID_Producto) {
            // Eliminar producto de la tabla "Productos"
            $sql = "DELETE FROM Productos WHERE ID_Producto = '$ID_Producto'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se eliminó el producto correctamente
            if ($Conexion->affected_rows > 0) {
                // cierro la conexion
                $this->conexion->closeconect();
                return true; // Producto eliminado correctamente
            } else {
                // cierro la conexion
                $this->conexion->closeconect();
                return false; // Error al eliminar el producto
            }
        }
        
        public function UpdateProducto($ID_Producto, $ID_TProducto, $FK_Categoria, $FK_Promocion, $Nombre_Producto, $Fabricante, $Existencias, $Calificacion, $Descripcion, $Precio, $IVA) {
            // Actualizar datos del producto en la tabla "Productos"
            $sql = "UPDATE Productos SET ID_TProducto = '$ID_TProducto', FK_Categoria = '$FK_Categoria', FK_Promocion = '$FK_Promocion', 
                    Nombre_Producto = '$Nombre_Producto', Fabricante = '$Fabricante', Existencias = '$Existencias', Calificacion = '$Calificacion', 
                    Descripcion = '$Descripcion', Precio = '$Precio', IVA = '$IVA' 
                    WHERE ID_Producto = '$ID_Producto'";
            $Conexion = $this->conexion->getconect();
            $Conexion->query($sql);
    
            // Verificar si se actualizó el producto correctamente
            if ($Conexion->affected_rows > 0) {
                // cierro la conexion
                $this->conexion->closeconect();
                return true; // Producto actualizado correctamente
            } else {
                // cierro la conexion
                $this->conexion->closeconect();
                return false; // Error al actualizar el producto
            }
        }
    }
?>