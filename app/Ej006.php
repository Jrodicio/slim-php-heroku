<?php
/*
	Rodicio Julian

	Aplicación No 6 (Carga aleatoria)
	Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
	función rand). Mediante una estructura condicional, determinar si el promedio de los números
	son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
	resultado.
*/
	$arrayNumeros = array(rand(0,10),rand(0,10),rand(0,10),rand(0,10),rand(0,10));
	$suma = 0;
	$countNumeros = count($arrayNumeros);
	$promedio;

	//var_dump($arrayNumeros);

	for($i = 0; $i<$countNumeros;$i++)
	{
		print("[$arrayNumeros[$i]]");
		$suma += $arrayNumeros[$i];
	}

	//$suma = array_sum($arrayNumeros);

	print(" = $suma");
	$promedio = $suma/$countNumeros;

	print("<br><br>El promedio es $promedio, por lo tanto es ");

	if($promedio > 6)
	{
		print("mayor a 6.");
	}
	elseif($promedio < 6)
	{
		print("menor a 6.");
	}
	else
	{
		print("igual a 6.");
	}
?>