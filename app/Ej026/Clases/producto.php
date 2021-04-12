<?php


    class Producto
    {
        public int $_id;
        public string $_codigoBarras;
        public string $_nombre;
        public string $_tipo;
        public int $_stock;
        public float $_precio;

        public function __construct($id, $codigoBarras, $nombre, $tipo, $stock, $precio)
        {
            if(    $id >= 1 && $id <= 10000 
                && is_numeric($codigoBarras) && strlen($codigoBarras) == 6
                && $nombre != null && $tipo != null
                && $stock >= 1 && $precio > 0)
            {
                $this->_id = $id;
                $this->_codigoBarras = $codigoBarras;
                $this->_nombre = $nombre;
                $this->_tipo = $tipo;
                $this->_stock = $stock;
                $this->_precio = $precio;
            }          
        }

        public function AddStock(int $stock)
        {
            $this->_stock += $stock;
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

        public function ToJSON()
        {
            return json_encode($this);
        }

        static function CompararProductos(Producto $producto1, Producto $producto2)
        {
            if($producto1->_codigoBarras == $producto2->_codigoBarras)
            {
                return true;
            }
            return false;
        }

        public function CompararCodigoBarras(string $codigoBarras)
        {
            if ($this->_codigoBarras == $codigoBarras)
            {
                return true;
            }
            return false;
        }
    }

?>