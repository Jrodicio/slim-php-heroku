<?php
/*
	Rodicio Julian

	Aplicación No 7 (Mostrar impares)
	Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
	Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
	salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
	las estructuras while y foreach.
*/
	$arrayImpares = array();
	$countArray = 0;
	$auxNumero = 0;

	while ($countArray < 10)
	{
		if($auxNumero%2 != 0)
		{
			$arrayImpares[$countArray] = $auxNumero;
			$countArray = count($arrayImpares);
		}
		
		$auxNumero++;
	}

	print("FOR:<br><br>");
	for($i=0;$i<$countArray;$i++)
	{
		print("Número $arrayImpares[$i]<br>");
	}

	print("<br>WHILE:<br><br>");
	$i = 0;
	while($i < $countArray)
	{
		print("Número $arrayImpares[$i]<br>");
		$i++;
	}

	print("<br>FOREACH:<br><br>");
	foreach($arrayImpares as $numero)
	{
		print("Número $numero<br>");
	}
	
?>