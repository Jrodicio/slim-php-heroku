<?php
/*
	Rodicio Julian

	Aplicación No 1 (Sumar números)
	Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
	supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
	se sumaron.

*/
	$numero = 0; 
	$acumulado = 0;
	$suma = 0;
	$limite = 1000; 
	$contador = 0;

	while ($suma <= 1000)
	{
		$numero+=1;

		$suma = $acumulado + $numero;

		if ($suma <= 1000)
		{
			$contador++;
			$acumulado+=$numero;

			print("Se suma el número $numero <br> ");
		}
		
	}

	print("<br>Se han sumado un total de $contador números. El resultado es: $acumulado");

?>