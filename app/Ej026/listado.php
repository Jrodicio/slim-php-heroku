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
    
    include "Clases/usuario.php";
        
    if (!isset($_POST["listado"]))
    {
        return "Falta parametro [listado]";
    }
    $tipoListado = $_POST["listado"];
    
    $strArchivo = "Archivos/Usuario/JSON/$tipoListado.json";

    $arrayListado = array();

    if(file_exists($strArchivo))
    {
        $archivoUsuarios = fopen($strArchivo,"r");
        $i = 0;
        while (!feof($archivoUsuarios))
        {
            $jsonUsuario = fgets($archivoUsuarios);
            $usuarioLeido = Usuario::UsuarioFromJSON($jsonUsuario);

            if(!is_bool($usuarioLeido))
            {
                $arrayListado[$i] = $usuarioLeido;
                $i++;
            }
        }

        fclose($archivoUsuarios);
    
        $strRetorno = "<ul>\n";
        foreach($arrayListado as $usuario)
        {
            $strRetorno .= "<li>".$usuario->ToString()."</li>";
        }
        $strRetorno .= "</ul>";

        echo $strRetorno;
        return $strRetorno;
    }
    else
    {
        echo "El listado no existe";
        return "El listado no existe";
    }

    
?>