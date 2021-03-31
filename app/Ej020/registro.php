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
    include "clases.php";
    
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $strArchivo = "usuarios.csv";

    if (isset($usuario) && isset($clave) && isset($mail))
    {
        
        $nuevoUsuario = new Usuario($usuario, $clave, $mail);
        
        if(file_exists($strArchivo))
        {
            $archivoUsuarios = fopen($strArchivo,"r");
            while (!feof($archivoUsuarios))
            {
                $arrayUsuario = explode(',',fgets($archivoUsuarios));
                $usuarioLeido = new Usuario($arrayUsuario[0],$arrayUsuario[1],$arrayUsuario[2]);
                
                if(Usuario::CompararUsuarios($nuevoUsuario,$usuarioLeido))
                {
                    fclose($archivoUsuarios);
                    //echo "Usuario ya existente";
                    return "Usuario ya existente";
                }
            }
            fclose($archivoUsuarios);
        }

        $archivoUsuarios = fopen($strArchivo,"a");
        fwrite($archivoUsuarios, "$nuevoUsuario->_usuario,$nuevoUsuario->_clave,$nuevoUsuario->_mail\n");
        fclose($archivoUsuarios);

        //echo "Usuario [$nuevoUsuario->_usuario] creado correctamente";
        return "Usuario [$nuevoUsuario->_usuario] creado correctamente";
    }
    
    
?>