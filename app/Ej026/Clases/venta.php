<?php
    
    include "Clases/usuario.php";
    include "Clases/producto.php";
    
    class Venta
    {
        public Producto $_producto;
        public Usuario $_usuario;
        public int $_qItems;

        public function __construct($producto, $usuario, $qItems)
        {
            if($producto != null && $usuario != null && $qItems > 0)
            {
                $this->_producto = $producto;
                $this->_usuario = $usuario;
                $this->_qItems = $qItems;
            }
        }

        public function ToJSON()
        {
            return json_encode($this);
        }

        static function ProductoFromJSON(string $json)
        {
            $jsonObject = json_decode($json,JSON_BIGINT_AS_STRING);
            
            if(    isset($jsonObject["_id"]) 
                && isset($jsonObject["_codigoBarras"])
                && isset($jsonObject["_nombre"]) 
                && isset($jsonObject["_tipo"]) 
                && isset($jsonObject["_stock"]) 
                && isset($jsonObject["_precio"]))
            {
                $producto = new Producto ($jsonObject["_id"], $jsonObject["_codigoBarras"],$jsonObject["_nombre"],$jsonObject["_tipo"],$jsonObject["_stock"],$jsonObject["_precio"]);
                return $producto;
            }
            else 
            {
                return false;
            }
        }
    }

?>