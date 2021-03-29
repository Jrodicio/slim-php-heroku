<?php
/*
	Rodicio Julian
	3C

	Aplicación No 2 (Mostrar fecha y estación)
	Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
	distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
	año es. Utilizar una estructura selectiva múltiple.

*/

	$fechaActual = date("d/m/Y");
	print("[DD/MM/AAAA] $fechaActual <br>");

	$fechaActual = date("Y-m-d H:i:s.ms");
	print("[AAAA-MM-DD HH:mm:ss.ms] $fechaActual <br>");

	$fechaActual = date("D M Y");
	print("[Día Mes Año] $fechaActual <br>");

	$mes = date("m");
	$dia = date("d");

	switch ($mes) {
		case '01':
		case '02':
			$estacion = "Verano";
			break;
		case '03':
			if($dia	<= 20)
			{
				$estacion = "Verano";
			}
			else
			{
				$estacion = "Otoño";
			}
			break;
		case '04':
		case '05':
			$estacion = "Otoño";
			break;
		case '06':
			if($dia	<= 20)
				{
					$estacion = "Otoño";
				}
				else
				{
					$estacion = "Invierno";
				}
			break;
		case '07':
		case '08':
			$estacion = "Invierno";
			break;
		case '09':
			if($dia	<= 20)
				{
					$estacion = "Invierno";
				}
				else
				{
					$estacion = "Primavera";
				}
			break;
		case '10':
		case '11':
			$estacion = "Primavera";
			break;
		case '12':
			if($dia	<= 20)
				{
					$estacion = "Primavera";
				}
				else
				{
					$estacion = "Verano";
				}
			break;
	}

	print("<br>Estamos en $estacion");

?>