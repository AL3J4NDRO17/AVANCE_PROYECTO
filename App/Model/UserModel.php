<?php

class usermodel
{
    //creamos un atributo para manipular los datos en la bd
    private $UserConexion;

    //definimos el constructor de la clase usermodel
    public function __construct()
    {
        //requiero la clase dbconexion
        require_once('../Config/databaseconexion.php');
        //instrucciones userconection con $dbconexion
        $this->UserConexion=new Database_Conexion();
    }

    //a partir de esto vienen los metodos logicos de la app

    public function getall()
    {
        //paso 1 creo la consulta
        $sql="SELECT * FROM calificaciones";
        //paso 2 llamo a la conexion
        $dbconexion=$this->UserConexion->getconect();
        //paso 3 ejecuto la conexion
        $result=$dbconexion->query($sql);
        //paso 4 verifico y acomodo los datos
        $users=array();
        while($users=$result->fetch_assoc())
        $users[]=$users;
        //paso 5 cierro la conexion
        $this->UserConexion->closeconect();
        //paso 6 arrojo el resultado
        return $users;
    }
    //a partir de esto vienen los metodos logicos de la app

    //metodo para obtener todos los usuarios por su id
    public function getByid($id)
        {
            //paso 1 creamos la consulta 
            $sql="SELECT * FROM user WHERE IdUser=$id";
            //paso 2 obtenemos la coneccion
            $dbconexion=$this->UserConexion->getconect();
            //paso 3
            $result=$dbconexion->query($sql);
            //paso 4 verificar que existen resultados
            if($result && $result->num_rows >0){
                $users=$result->fetch_assoc();
            }
            else{
                $users=false;
            }
            //paso 5 cerramos la conexion
            $this->UserConexion->closeconect();
            //paso 6
            return $users;
        }
            //metodo para verificar credenciales de logueo
            public function getByCredential($us,$pass)
            {
                //paso 1 creamos la consulta 
                $sql="SELECT * FROM Usuario  WHERE ID=$us AND Password=$pass";
                //paso 2 obtenemos la conexion
                $dbconexion=$this->UserConexion->getconect();
                //paso 3 mostrar resultados
                $result=$dbconexion->query($sql);
                //paso 4 verificar que existen resultados
                if($result && $result->num_rows >0){
                    $users=$result->fetch_assoc();
                }
                else{
                    $users=false;
                }
                //paso 5 cerramos la conexion
                $this->UserConexion->closeconect();
                //paso 6
                return $users;
            }
            //metodo para insertar usuarios
            public function insertUser($ID,$Nombre,$ApePa,$ApeMa,$email,$pass,$date,$direccion,$phone)
            {
                //paso 1 creamos la insercion
                $sql="INSERT INTO Direccion (";
                $sql="INSERT INTO Usuario (ID_Usuario,Nombre,ApPaterno,ApMaterno,Correo_Electronico,pass,Fecha_Registro,Direccion,Telefono 
                values ('$ID','$Nombre','$ApePa','$ApeMa','$email','$pass','$date','$direccion','$phone')";
                
                //paso 2 obtenemos la conexion
                $dbconexion=$this->UserConexion->getconect();

                //paso 3 mostrar resultados
                $result=$dbconexion->query($sql);
                //paso 4 verificar que existen resultados
                if($result && $result->num_rows >0){
                    $users=$result->fetch_assoc();
                }
                else{
                    $users=false;
                }
                //paso 5 cerramos la conexion
                $this->UserConexion->closeconect();
                //paso 6
                return $users;
            }
            // Metodo de Actualizacion del email
            public function updateEmailData($Email, $user) 
            {
                // Creacion del sql 
                $sql = "UPDATE Usuarios SET Email = '$Email' WHERE ID_Usuario = '$user'";
                // Obtener la conexion a la base de datos
                $dbconexion = $this->UserConexion->getconect();
                // Ejecucion del codigo sql
                $dbconexion->query($sql);
            }

            // Metodo de Actualizacion del telefono
            public function updateTelefonoData($Telefono, $user) 
            {
                // Creacion del sql 
                $sql = "UPDATE Usuarios SET Telefono = '$Telefono' WHERE ID_Usuario = '$user'";
                // Obtencion de la conexion a la base de datos
                $_connection = $this->UserConexion->getconect();
                // Ejecucion del codigo sql
                $_connection->query($sql);
            }

            // Metodo de Actualizacion de contraseña
            public function updatePasswordData($Pass, $username) 
            {
                // Creacion del sql 
                $sql = "UPDATE Usuarios SET pass= '$Pass' WHERE NombreUsuario = '$username'";
                // Obtencion de la conexion a la base de datos
                $dbconexion = $this->UserConexion->getconect();
                // Ejecucion del codigo sql
                $dbconexion->query($sql);

            }

            // Metodo de Elminacion del usuario
            public function deleteData($user) 
            {
                // Creacion del sql para la elminacion del usuario
                $sql = "DELETE * FROM Usuarios WHERE ID_Usuario = '$user'";
                // Obtencion de la conexion a la base de datos
                $dbconexion= $this->UserConexion->getconect();
                // Ejecucion del codigo sql
                $dbconexion->query($sql);

            }
                        
        }           
?>