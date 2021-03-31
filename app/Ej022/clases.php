<?php
/*
    Rodicio Julián

    Aplicación No 21 ( Listado CSV y array de usuarios)
    Archivo: listado.php
    método:GET
    Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
    usuarios).
    En el caso de usuarios carga los datos del archivo usuarios.csv.
    se deben cargar los datos en un array de usuarios.
    Retorna los datos que contiene ese array en una lista
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