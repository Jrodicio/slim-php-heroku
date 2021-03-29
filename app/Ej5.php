<?php
/*
	Rodicio Julian

	Aplicación No 5 (Números en letras)
	Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
	por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
	entre el 20 y el 60.
	Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/
	
	$num = (string)random_int(10, 99);
	
	$decena = $num[0];
	$unidad = $num[1];

	$textoNumero = "";

	print("$num");
	if ($num >= 20 && $num <= 60)
	{
		switch ($decena) 
		{
			case '2':
				if($unidad != "0")
				{
					$textoNumero = "Veinti";
				}
				else
				{
					$textoNumero = "Veinte";
				}
				break;
			case '3':
				$textoNumero = "Treinta";
				break;
			case '4':
				$textoNumero = "Cuarenta";
				break;
			case '5':
				$textoNumero = "Cincuenta";
				break;
			case '6':
				$textoNumero = "Sesenta";
				break;
		}

		if($num%10 != 0 && $num > 30)
		{
			$textoNumero .= " y ";
		}

		switch ($unidad)
		{
			case '1':
				$textoNumero .= "uno";
				break;
			case '2':
				$textoNumero .= "dos";
				break;
			case '3':
				$textoNumero .= "tres";
				break;
			case '4':
				$textoNumero .= "cuatro";
				break;
			case '5':
				$textoNumero .= "cinco";
				break;
			case '6':
				$textoNumero .= "seis";
				break;
			case '7':
				$textoNumero .= "siete";
				break;
			case '8':
				$textoNumero .= "ocho";
				break;
			case '9':
				$textoNumero .= "nueve";
				break;
		}

		print(": $textoNumero");
	}
	

	
?>