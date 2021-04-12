<?php
/*
    Rodicio Julián

    Aplicación No 25 ( AltaProducto)
    Archivo: altaProducto.php
    método:POST
    Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
    crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
    crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
    si ya existe el producto se le suma el stock , de lo contrario se agrega al documento en un
    nuevo renglón
    Retorna un :
    “Ingresado” si es un producto nuevo
    “Actualizado” si ya existía y se actualiza el stock.
    “no se pudo hacer“si no se pudo hacer
    Hacer los métodos necesarios en la clase

 */
    include "Clases/producto.php";

    if (isset($_POST["codigoBarras"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]))
    {
        $id = random_int(1,10000);
        $codigoBarras = $_POST["codigoBarras"];
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        
        $file = "Archivos/Producto/JSON/producto.json";
        $accion = "Alta";
        
        $nuevoProducto = new Producto($id, $codigoBarras, $nombre, $tipo, $stock, $precio);     
        
        if (isset($nuevoProducto->_id))
        {
            $arrayProductos = array();
            $i = 0;

            if(file_exists($file))
            {
                
                $archivoProductos = fopen($file,"r");

                while (!feof($archivoProductos))
                {
                    $jsonProducto = fgets($archivoProductos);
                    $productoLeido = Producto::ProductoFromJSON($jsonProducto);

                    if(!is_bool($productoLeido))
                    {
                        if(Producto::CompararProductos($nuevoProducto,$productoLeido))
                        {
                            $productoLeido->AddStock($nuevoProducto->_stock);
                            $accion = "Actualizado";
                        }
                        $arrayProductos[$i] = $productoLeido;
                        $i++;
                    }
                }
            }
            if ($accion == "Alta")
            {
                $arrayProductos[$i] = $nuevoProducto;
                $accion = "Ingresado";
            }
            
            $archivoProductos = fopen($file,"w");
            for($j = 0; $j < count($arrayProductos); $j++)
            {
                $jsonProducto = $arrayProductos[$j]->ToJSON();
                fwrite($archivoProductos, "$jsonProducto\n");
            }
            fclose($archivoProductos);

            echo $accion;
            return $accion;
        }

        echo "No se pudo hacer";
        return "No se pudo hacer";
    }
 ?>