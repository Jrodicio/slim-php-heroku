<?php
/*
    Julian Rodicio

    Aplicación No 26 (RealizarVenta)
    Archivo: RealizarVenta.php
    método:POST
    Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
    POST .
    Verificar que el usuario y el producto exista y tenga stock.
    crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
    carga los datos necesarios para guardar la venta en un nuevo renglón.
    Retorna un :
    “Venta realizada” se hizo una venta
    “No se pudo hacer“ si no se pudo hacer
    Hacer los métodos necesarios en las clases
*/

    include "Clases/venta.php";

    if (isset($_POST["codigoBarras"]) && isset($_POST["idUsuario"]) && isset($_POST["items"]))
    {
        $codigoBarras = $_POST["codigoBarras"];
        $idUsuario = $_POST["idUsuario"];
        $qItems = $_POST["items"];

        $fileProducto = "Archivos/Producto/JSON/producto.json";
        $fileUsuarios = "Archivos/Usuario/JSON/usuarios.json";
        $fileVentas = "Archivos/Venta/ventas.json";

        $arrayProductos = array();

        if(file_exists($fileProducto) && file_exists($fileUsuarios))
        {
            //Productos
            $archivoProductos = fopen($fileProducto,"r");
            while (!feof($archivoProductos) && !isset($productoVendido))
            {
                $jsonProducto = fgets($archivoProductos);
                $productoLeido = Producto::ProductoFromJSON($jsonProducto);

                if(!is_bool($productoLeido))
                {

                    if($productoLeido->CompararCodigoBarras($codigoBarras))
                    {
                        $productoVendido = $productoLeido;
                        $productoLeido->AddStock($qItems*(-1));
                    }
                    
                    array_push($arrayProductos,$productoLeido);
                }
            }
            fclose($archivoProductos);

            if(isset($productoVendido))
            {
                //Usuarios
                $archivoUsuarios = fopen($fileUsuarios,"r");    
                while (!feof($archivoUsuarios) && !isset($usuarioGenerador))
                {
                    $jsonUsuario = fgets($archivoUsuarios);
                    $usuarioLeido = Usuario::UsuarioFromJSON($jsonUsuario);

                    if(!is_bool($usuarioLeido))
                    {
                        if($usuarioLeido->CompararID($idUsuario))
                        {
                            $usuarioGenerador = $usuarioLeido;
                        }
                    }
                }
                fclose($archivoUsuarios);
                
                if(isset($usuarioGenerador))
                {
                    if($qItems <= $productoVendido->_stock)
                    {
                        $ventaRealizada = new Venta($productoVendido,$usuarioGenerador,$qItems);
                        $jsonVenta = $ventaRealizada->ToJSON();

                        $archivoVentas = fopen($fileVentas,"a");
                        fwrite($archivoVentas, "$jsonVenta\n");
                        fclose($archivoVentas);
                        
                        $archivoProductos = fopen($fileProducto,"w");
                        for($j = 0; $j < count($arrayProductos); $j++)
                        {
                            $jsonProducto = $arrayProductos[$j]->ToJSON();
                            fwrite($archivoProductos, "$jsonProducto\n");
                        }
                        fclose($archivoProductos);
                        
                        echo "Venta realizada";
                        return "Venta realizada";
                    }
                }
            }
        }
    }
    echo "No se pudo hacer";
    return "No se pudo hacer";
?>