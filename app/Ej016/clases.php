<?php
    /**Julian Rodicio
       Aplicación No 16 (Rectangulo - Punto)
       Codificar las clases Punto y Rectangulo.
       La clase Punto ha de tener dos atributos privados con acceso de sólo lectura (sólo con
       getters), que serán las coordenadas del punto. Su constructor recibirá las coordenadas del
       punto.
       La clase Rectangulo tiene los atributos privados de tipo Punto _vertice1, _vertice2, _vertice3
       y _vertice4 (que corresponden a los cuatro vértices del rectángulo).
       La base de todos los rectángulos de esta clase será siempre horizontal. Por lo tanto, debe tener
       un constructor para construir el rectángulo por medio de los vértices 1 y 3.
       Los atributos ladoUno, ladoDos, área y perímetro se deberán inicializar una vez construido el
       rectángulo.
       Desarrollar una aplicación que muestre todos los datos del rectángulo y lo dibuje en la página.
     */
    class Punto
    {
        #Campos
        private $_x;
        private $_y;

        #Métodos

        public function __construct($x, $y)
        {
            $this->_x = $x;
            $this->_y = $y;
        }

        public function GetX()
        {
            return $this->_x;
        }

        public function GetY()
        {
            return $this->_y;
        }
    }

    class Rectangulo
    {
        #Campos
        private $_vertice1;
        private $_vertice2;
        private $_vertice3;
        private $_vertice4;
        
        public $area;
        public $ladoUno;
        public $ladoDos;
        public $perimetro;

        #Métodos

        public function __construct($v1, $v3)
        {
            $this->_vertice1 = $v1;
            $this->_vertice2 = new Punto($v1->GetX(), $v3->GetY());
            $this->_vertice3 = $v3;
            $this->_vertice4 = new Punto($v3->GetX(), $v1->GetY());

            $this->ladoUno = sqrt(($this->_vertice1->GetY()-$this->_vertice2->GetY())**2);
            $this->ladoDos = sqrt(($this->_vertice1->GetX()-$this->_vertice3->GetX())**2);

            $this->area = $this->ladoUno * $this->ladoDos;
            $this->perimetro = $this->ladoUno * 2 + $this->ladoDos * 2;
        }

        public function Dibujar()
        {
            $dibujo = "<p>";
            for($i = 0; $i < $this->ladoUno ; $i++)
            {
                for($j = 0; $j < $this->ladoDos ; $j++)
                {
                    $dibujo .= "*&nbsp";
                }
                $dibujo .= "<br>";
            }
            $dibujo .= "</p>";

            return $dibujo;
        }

    }
?>