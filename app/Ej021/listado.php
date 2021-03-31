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

    include "clases.php";
        
    $tipoListado = $_GET["listado"];
    $strArchivo = $tipoListado.".csv";
    $arrayListado = array();

    if(file_exists($strArchivo))
    {
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
    
        $strRetorno = "<ul>\n";

        foreach($arrayListado as $objeto)
        {
            $strRetorno .= "<li>".$objeto->ToString()."</li>";
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