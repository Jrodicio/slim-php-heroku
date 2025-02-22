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
    require "clases.php";

    $vertice1 = new Punto (-1, -1);
    $vertice3 = new Punto (6, 6);

    $rectangulo = new Rectangulo($vertice1, $vertice3);
    $datosRectangulo = "Perimetro: ".$rectangulo->perimetro;
    $datosRectangulo .= "<br>Área: ".$rectangulo->area;
    $datosRectangulo .= "<br>Lado uno: ".$rectangulo->ladoUno;
    $datosRectangulo .= "<br>Lado dos: ".$rectangulo->ladoDos;

    print("<h3>Datos rectangulo</h3>");
    print($datosRectangulo);
    print($rectangulo->Dibujar());
?>