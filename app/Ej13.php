<?php
/*
    Julián Rodicio
    Aplicación No 13 (Validar palabra)
    Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
    función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
    deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
    “Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
    1 si la palabra pertenece a algún elemento del listado.
    0 en caso contrario.
*/

    function ValidarPalabra($palabra, $max)
    {
        $palabrasValidas = array("Recuperatorio","Parcial","Programacion");

        if (strlen($palabra) <= $max)
        {
            foreach($palabrasValidas as $p)
            {
                if($p == $palabra)
                {
                    return 1;
                }
            }
        }
        
        return 0;
    }

    $palabraValida = "Parcial";
    $palabraInvalida = "Final";

    //Test palabra valida//
    print("Retorna 0 (Parcial,4): <br>");
    $retorno = ValidarPalabra($palabraValida,4);
    print("$retorno <br>");
    print("Retorna 1 (Parcial,8): <br>");
    $retorno = ValidarPalabra($palabraValida,8);
    print("$retorno <br>");

    //Test palabra invalida//
    print("Retorna 0 (Final, 4) y (Final,8): <br>");
    $retorno = ValidarPalabra($palabraInvalida,4);
    print("$retorno <br>");
    $retorno = ValidarPalabra($palabraInvalida,8);
    print("$retorno <br>");
?>