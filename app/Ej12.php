<?php
/*
	Rodicio Julian

	Aplicación No 12 (Invertir palabra)
    Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
    de las letras del Array.
    Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

    function InvertirArray($palabra)
    {
        $invertida = array();

        for($i=count($palabra)-1; $i>=0; $i--)
        {
            $invertida[] = $palabra[$i];
        }

        return $invertida;
    }

    $arrayMiPalabra = array("H","o","l","a"," ","m","u","n","d","o");
    $invertida = InvertirArray($arrayMiPalabra);

    foreach($arrayMiPalabra as $letra)
    {
        print("$letra");
    }
    print("<hr>");

    foreach($invertida as $letra)
    {
        print("$letra");
    }
?>