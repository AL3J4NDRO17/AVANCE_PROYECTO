<?php
    class TblCategorias {
        private $conect;

        public function __construct($conect) {
            //requiero la clase dbconexion
            require_once('../Config/databaseconexion.php');
            //instrucciones userconection con $dbconexion
            $this->$conect=new Database_Conexion();
        }

        public function InsertCategorias($Nombre, $Descripcion) {
            // Insertar datos en la tabla "Categorias"
            $sql = "INSERT INTO Categorias (Nombre, Descripcion) VALUES ('$Nombre', '$Descripcion')";
            // llamo a la conexion
            $Conexion=$this->conect->getconect();
            $Conexion->query($sql);

            // Obtener el ID generado de la tabla "Categorias"
            $id = $this->conect->insert_id;
            return $id;
            // cierro la conexion
            $this->conect->closeconect();
        }

        public function DeleteCategorias($ID_Categoria) {
            // Eliminar categoría de la tabla "Categorias"
            $sql = "DELETE FROM Categorias WHERE ID_Categoria = '$ID_Categoria'";
            // llamo a la conexion
            $Conexion=$this->conect->getconect();
            $Conexion->query($sql);
            
            // Verificar si se eliminó la categoría correctamente
            if ($this->conect->affected_rows > 0) {
                return true; // Categoría eliminada correctamente
            } else {
                return false; // Error al eliminar la categoría
            }
            // cierro la conexion
            $this->conect->closeconect();
        }
        
        public function UpdateCategorias($ID_Categoria, $Nombre, $Descripcion) {
            // Actualizar datos de la categoría en la tabla "Categorias"
            $sql = "UPDATE Categorias SET Nombre = '$Nombre', Descripcion = '$Descripcion' WHERE ID_Categoria = '$ID_Categoria'";
               // llamo a la conexion
               $Conexion=$this->conect->getconect();
               $Conexion->query($sql);
            
            // Verificar si se actualizó la categoría correctamente
            if ($this->conect->affected_rows > 0) {
                return true; // Categoría actualizada correctamente
            } else {
                return false; // Error al actualizar la categoría
            }
             // cierro la conexion
             $this->conect->closeconect();
        }
    }
?>