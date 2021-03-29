<?php

/*
	Rodicio Julián
	Aplicación No 9 (Arrays asociativos)
	Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
	contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
	lapiceras.
*/
	$lapicera1 = array("color"=>"Rojo", "marca"=>"Bic", "trazo"=>"Fino","precio"=>20.99);
	$lapicera2 = array("color"=>"Azul", "marca"=>"Sinball", "trazo"=>"Grueso","precio"=>22.99);
	$lapicera3 = array("color"=>"Verde", "marca"=>"Chino", "trazo"=>"Medio","precio"=>5.99);
	
	$lapiceraArray = array($lapicera1,$lapicera2,$lapicera3);

	foreach ($lapiceraArray as $lapicera) 
	{
		print("Datos lapicera: <br>");
		foreach($lapicera as $elemento)
		{

			print("$elemento<br>");
		}
		print("<br><br>");
	}



?>