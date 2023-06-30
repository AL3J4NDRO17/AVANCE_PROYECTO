<?php
//PASO 2 SE CREA LA CONEXION CON LA BASE DE DATOS
    class Database_Conexion{
        //atributo para manipular la base de datos
        private $conect;
        //definir constructor
        public function __construct()
        {
            //enlazar los datos de la base de datos a conectar
            require_once('./config.php');

            //creamos la instancia que conecta la base de datos
            $this->conect=new mysqli(Database_Host,Database_User,Database_Password,Database_Name);
            
            //Mensaje de erro en caso de falla de conexion
            if($this->conect->connect_error){
                die('Database error conexion: '.$this->conect->connect_error);
            }  
        }

        //se crea un metodo para obtener la conexion
        public function getconect(){
            return $this->conect;

        }

        //creamos el metodo para realizar la desconexion
        public function closeconect(){
            $this->conect->close();
        }
    }