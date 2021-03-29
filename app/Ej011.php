<?php

/*
	Rodicio Julian

	Aplicación No 11 (Potencias de números)
    Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
    que las calcule invocando la función pow).
*/
	function PrimerasCuatroPotencias($numero)
    {
        $potencias = array();
        for($i = 0; $i < 4; $i++)
        {
            $potencias[$i] = pow($numero,$i);
        }
        return $potencias;
    }


	for($i = 1; $i < 5; $i++)
    {
        $arrayPotencias = PrimerasCuatroPotencias($i);
        print("<h4>Potencias de $i: </h4>");
        foreach($arrayPotencias as $potencia)
        {
            print("$potencia<br>");
        }
        print("<hr>");
    }
?>