<?php
/*
    Rodicio Julián

    Aplicación No 24 ( Listado JSON y array de usuarios)
    Archivo: listado.php
    método:GET
    Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
    usuarios).
    En el caso de usuarios carga los datos del archivo usuarios.json.
    se deben cargar los datos en un array de usuarios.
    Retorna los datos que contiene ese array en una lista
    <ul>
    <li>apellido, nombre,foto</li>
    <li>apellido, nombre,foto</li>
    </ul>
    Hacer los métodos necesarios en la clase usuario
 */

    class Usuario
    {
        public string $_apellido;
        public string $_nombre;
        public string $_clave;
        public string $_mail;
        public int $_id;
        public string $_fechaAlta;
        public string $_foto;


        public function __construct($id, $nombre, $apellido,$clave, $mail, $fechaAlta = null, $foto = null)
        {
            if($id != null && $nombre != null && $apellido != null && $clave != null && $mail != null && $foto != null)
            {
                $this->_id = $id;
                $this->_nombre = $nombre;
                $this->_apellido = $apellido;
                $this->_clave = $clave;
                $this->_mail = $mail;
                
                if (is_null($fechaAlta))
                {
                    $fechaAlta = date("d-M-Y H:m:s");
                }

                $this->_fechaAlta = $fechaAlta;
                $this->_foto = $foto;
            }            
        }

        static function CompararUsuarios(Usuario $usuario1, Usuario $usuario2)
        {
            if($usuario1->_mail == $usuario2->_mail || $usuario1->_id == $usuario2->_id)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function IsAny(Array $arrayUsuarios)
        {
            foreach($arrayUsuarios as $usuario)
            {
                if(get_class($usuario) == "Usuario")
                {
                    if(Usuario::CompararUsuarios($this,$usuario))
                    {
                        return true;
                    }
                }
            }
            return false;            
        }

        static function UsuarioFromJSON(string $json)
        {
            $jsonObject = json_decode($json,JSON_BIGINT_AS_STRING);
            
            if(    isset($jsonObject["_nombre"]) 
                && isset($jsonObject["_apellido"])
                && isset($jsonObject["_clave"]) 
                && isset($jsonObject["_mail"]) 
                && isset($jsonObject["_id"]) 
                && isset($jsonObject["_fechaAlta"]) 
                && isset($jsonObject["_foto"]))
            {
                $usuario = new Usuario ($jsonObject["_id"], $jsonObject["_nombre"], $jsonObject["_apellido"], $jsonObject["_clave"], $jsonObject["_mail"], $jsonObject["_fechaAlta"],$jsonObject["_foto"]);
                return $usuario;
            }
            else 
            {
                return false;
            }
        }

        public function ToJSON()
        {
            return json_encode($this);
        }

        public function ToString()
        {
            $strUsuario = $this->_apellido;
            $strUsuario .= ", ".$this->_nombre;
            $strUsuario .= ", ".$this->_foto;
            return $strUsuario;
        }
    }

?>