<?php

/*
	Rodicio Julian

	Aplicación No 10 (Arrays de Arrays)
	Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
	contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
	Arrays de Arrays.
*/
	$lapicera1 = array("color"=>"Rojo", "marca"=>"Bic", "trazo"=>"Fino","precio"=>20.99);
	$lapicera2 = array("color"=>"Azul", "marca"=>"Sinball", "trazo"=>"Grueso","precio"=>22.99);
	$lapicera3 = array("color"=>"Verde", "marca"=>"Chino", "trazo"=>"Medio","precio"=>5.99);
	
	$lapiceraArrayIndex = array($lapicera1,$lapicera2,$lapicera3);
	$lapiceraArrayAsoc = array("Lapicera 1" =>$lapicera1,"Lapicera 2" =>$lapicera2,"Lapicera 3" =>$lapicera3);

	print("Array Indexado");
	for($i=0;$i<3;$i++)
	{
		print("<br><br> Datos lapicera: <br>");
		foreach ($lapiceraArrayIndex[$i] as $elemento) 
		{
			print("$elemento<br>");
		}
	}

	print("<br><br>Array asociativo<br>");
	foreach ($lapiceraArrayAsoc as $lapicera) 
	{
		print("Datos lapicera: <br>");
		foreach($lapicera as $elemento)
		{
			print("$elemento<br>");
		}
		print("<br><br>");
	}
?>