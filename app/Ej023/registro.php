<?php
/*
    Rodicio Julián

    Aplicación No 23 (Registro JSON)
    Archivo: registro.php
    método:POST
    Recibe los datos del usuario(nombre, clave,mail )por POST ,
    crea un ID autoincremental (emulado, puede ser un random de 1 a 10.000).
    crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para
    poder hacer el alta,
    guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
    Usuario/Fotos/.
    retorna si se pudo agregar o no.
    Cada usuario se agrega en un renglón diferente al anterior.
    Hacer los métodos necesarios en la clase usuario.

 */
    include "Clases/usuario.php";

    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];

    $directorioArchivos = "Archivos/Usuario/";
    $strArchivo = "JSON/usuarios.json";

        
    if (isset($nombre) && isset($clave) && isset($mail))
    {
        
        $id = random_int(1,10000);
        $fechaAlta = date("d-m-Y H:i:s");
        $nombreFoto = $mail."-".$_FILES["archivo"]["name"];
        $pathFoto = $directorioArchivos."Fotos/".$nombreFoto;
        $tipoArchivo = pathinfo($pathFoto, PATHINFO_EXTENSION);
        
        if ($_FILES["archivo"]["size"] > 500000) 
        {
            echo "El archivo es demasiado grande.";
            return "El archivo es demasiado grande.";
        }

        if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "png")
        {
			echo "El archivo debe ser JPG, JPEG o PNG.";
            return "El archivo debe ser JPG, JPEG o PNG.";
		}
      
        
        $nuevoUsuario = new Usuario($id, $nombre, $clave, $mail, $fechaAlta, $nombreFoto);

        $file = $directorioArchivos.$strArchivo;

        if(file_exists($file))
        {
            $archivoUsuarios = fopen($file,"r");
            while (!feof($archivoUsuarios))
            {
                $jsonUsuario = fgets($archivoUsuarios);
                $usuarioLeido = Usuario::UsuarioFromJSON($jsonUsuario);

                if(!is_bool($usuarioLeido))
                {

                    if(Usuario::CompararUsuarios($nuevoUsuario,$usuarioLeido))
                    {
                        fclose($archivoUsuarios);
                        echo "Usuario ya existente";
                        return "Usuario ya existente";
                    }
                }
            }

            fclose($archivoUsuarios);
        }

        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $pathFoto))
        {
            $jsonUsuario = $nuevoUsuario->ToJSON();
            $archivoUsuarios = fopen($file,"a");
            fwrite($archivoUsuarios, "$jsonUsuario\n");
            fclose($archivoUsuarios);
    
            echo "Usuario [$nuevoUsuario->_mail] creado correctamente:\n";
            echo $nuevoUsuario->ToJSON();
            return "Usuario [$nuevoUsuario->_mail] creado correctamente";
        }

        echo "No se pudo subir la foto del usuario.";
        return "No se pudo subir la foto del usuario.";
        
    }
    
?>