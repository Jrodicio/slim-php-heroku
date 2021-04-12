<?php
/*
    Rodicio Julián

    Aplicación No 23 (Registro JSON)
    Archivo: registro.php
    método:POST
    Recibe los datos del usuario(nombre, clave,mail )por POST ,
    crea un ID autoincremental (emulado, puede ser un random de 1 a 10.000).
    crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para
    poder hacer el alta, guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
    Usuario/Fotos/.
    retorna si se pudo agregar o no.
    Cada usuario se agrega en un renglón diferente al anterior.
    Hacer los métodos necesarios en la clase usuario.
 */

    class Usuario
    {
        public string $_nombre;
        public string $_clave;
        public string $_mail;
        public int $_id;
        public string $_fechaAlta;
        public string $_foto;


        public function __construct($id, $nombre, $clave, $mail, $fechaAlta = null, $foto = null)
        {
            if($id != null && $nombre != null && $clave != null && $mail != null && $foto != null)
            {
                $this->_id = $id;
                $this->_nombre = $nombre;
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
                && isset($jsonObject["_clave"]) 
                && isset($jsonObject["_mail"]) 
                && isset($jsonObject["_id"]) 
                && isset($jsonObject["_fechaAlta"]) 
                && isset($jsonObject["_foto"]))
            {
                $usuario = new Usuario ($jsonObject["_id"], $jsonObject["_nombre"], $jsonObject["_clave"], $jsonObject["_mail"], $jsonObject["_fechaAlta"],$jsonObject["_foto"]);
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
    }

?>