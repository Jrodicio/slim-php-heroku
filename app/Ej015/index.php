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

    require "Figuras.php";

    print("<h3>Rectangulos</h3>");

    $rectangulo = new Rectangulo(4,8);

    print($rectangulo->ToString());
    print($rectangulo->Dibujar());

    $rectangulo->SetColor("Red");
    print($rectangulo->Dibujar());

    $rectangulo->SetColor("Black");
    print($rectangulo->Dibujar());

    print("<h3>Triangulo</h3>");

    $triangulo = new Triangulo(10,6);

    print($triangulo->ToString());
    print($triangulo->Dibujar());

    $triangulo->SetColor("Red");
    print($triangulo->Dibujar());

    $triangulo->SetColor("Black");
    print($triangulo->Dibujar());

?>