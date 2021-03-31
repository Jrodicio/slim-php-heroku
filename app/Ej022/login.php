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
    echo "se intenta algo";
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    echo "se intenta algo";
    $usuarioLogin = new Usuario("login", $clave, $mail);
    $arrayUsuarios = Usuario::LeerUsuariosCSV("usuarios.csv");
    echo "se intenta algo";
    if ($arrayUsuarios != null)
    {
        foreach($arrayUsuarios as $usuarioExistente)
        {
            if (Usuario::CompararUsuarios($usuarioLogin,$usuarioExistente))
            {
                if(Usuario::VerificarCredenciales($usuarioLogin,$usuarioExistente))
                {
                    echo "Verificado";
                    return "Verificado";
                }
                else
                {
                    echo "Error en los datos";
                    return "Error en los datos";
                }
            }
        }
        echo "Usuario no registrado";
        return "Usuario no registrado";
    }
    echo "nada";
    return "nada";
    
?>