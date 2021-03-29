<?php
    /**
     * Julián Rodicio
     * Aplicación No 15 (Figuras geométricas)
     * La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto,
     * un método getter y setter para el atributo _color, un método virtual (ToString) y dos
     * métodos abstractos: Dibujar (público) y CalcularDatos (protegido).
     * CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
     * funcionalidad será la de inicializar los atributos _superficie y _perimetro.
     * Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del
     * objeto que lo invoque (retornar una serie de asteriscos que modele el objeto).
     * Utilizar el método ToString para obtener toda la información completa del objeto, y luego
     * dibujarlo por pantalla.
     */

    require "FiguraGeometrica.php";

    class Rectangulo extends FiguraGeometrica
    {
        #Campos
        private $_ladoDos;
        private $_ladoUno;

        #Métodos
        public function __construct($l1, $l2)
        {
            parent::__construct();
            $this->_ladoUno = $l1;
            $this->_ladoDos = $l2;

            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {
            $perimetro = 2*($this->_ladoUno + $this->_ladoDos);
            $superficie = $this->_ladoUno * $this->_ladoDos;

            $this->_perimetro = $perimetro;
            $this->_superficie = $superficie;
        }

        public function Dibujar()
        {
            
            $dibujo = "<p style=\"color:".$this->GetColor()."\">";
            for($i = 0; $i < $this->_ladoUno ; $i++)
            {
                for($j = 0; $j < $this->_ladoDos ; $j++)
                {
                    $dibujo .= "*";
                }
                $dibujo .= "<br>";
            }
            $dibujo .= "</p>";

            return $dibujo;
        }

        public function ToString()
        {
            $string = parent::ToString();
            $string .= "<br> Lado uno: ".$this->_ladoUno;
            $string .= "<br> Lado dos: ".$this->_ladoDos;

            return $string;
        }
    }
    

?>