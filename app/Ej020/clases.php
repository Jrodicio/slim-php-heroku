<?php
/*
    Rodicio Julián

    Aplicación No 20 (Registro CSV)
    Archivo: registro.php
    método:POST
    Recibe los datos del usuario(nombre, clave,mail )por POST ,
    crear un objeto y utilizar sus métodos para poder hacer el alta,
    guardando los datos en usuarios.csv.
    retorna si se pudo agregar o no.
    Cada usuario se agrega en un renglón diferente al anterior.
    Hacer los métodos necesarios en la clase usuario
 */

    class Usuario
    {
        public $_usuario;
        public $_clave;
        public $_mail;


        public function __construct($usuario, $clave, $mail)
        {
            $this->_usuario = $usuario;
            $this->_clave = $clave;
            $this->_mail = $mail;
        }

        static function CompararUsuarios(Usuario $usuario1, Usuario $usuario2)
        {
            if($usuario1->_usuario == $usuario2->_usuario || $usuario1->_clave == $usuario2->_clave)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        /*
        function ValidarUsuario($usuario)
        {
            $estado = null;
            $fecha = date("d-m-Y H:i:s.ms");
            if (isset($usuario->_usuario) && isset($usuario->_clave))
            {
                if ($usuario->_usuario == "admin" && $usuario->_clave == "1234")
                {
                    $estado = "Login correcto";
                }
                else
                {
                    $estado = "Usuario o clave incorrecta";
                }
            }
            else
            {
                $estado = "Faltan datos";
            }

            $miArchivo = fopen("log.txt", "a");
            fwrite($miArchivo, "$estado,$usuario->_usuario,$usuario->_clave,$fecha\n");
            fclose($miArchivo);
        }
        */
    }

?>