<?php
/*
    Julian Rodicio

    Aplicación No 22 ( Login)
    Archivo: Login.php
    método:POST
    Recibe los datos del usuario(clave,mail )por POST ,
    crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
    Retorna un :
    “Verificado” si el usuario existe y coincide la clave también.
    “Error en los datos” si esta mal la clave.
    “Usuario no registrado si no coincide el mail“
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
            if($usuario1->_mail == $usuario2->_mail)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        static function VerificarCredenciales(Usuario $usuario1, Usuario $usuario2)
        {
            if(Usuario::CompararUsuarios($usuario1,$usuario2) && $usuario1->_clave == $usuario2->_clave) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function ToString()
        {
            $strUsuario = $this->_usuario;
            $strUsuario .= " - ".$this->_mail;
            return $strUsuario;
        }

        static function LeerUsuariosCSV($strArchivo)
        {
            $arrayListado = null;

            if (file_exists($strArchivo))
            {
                $arrayListado = array();
                $archivoUsuarios = fopen($strArchivo,"r");
                $i = 0;
                while (!feof($archivoUsuarios))
                {
                    $arrayUsuario = explode(',',fgets($archivoUsuarios));
                    if($arrayUsuario[0] != "")
                    {
                        $usuarioLeido = new Usuario($arrayUsuario[0],$arrayUsuario[1],str_replace("\n","",$arrayUsuario[2]));
                    
                        $arrayListado[$i] = ($usuarioLeido);
                        $i++;
                    }
                }
                fclose($archivoUsuarios);
            }

            return $arrayListado;
        }
        
    }

?>