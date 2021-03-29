<?php
/*
	Rodicio Julian

	Aplicación No 4 (Calculadora)
	Escribir un programa que use la variable $operador que pueda almacenar los símbolos
	matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
	símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
	resultado por pantalla.
*/
	
	$operadores = array("+", "-", "/","*");
	$op1 = random_int(0, 666);
	$op2 = random_int(0, 666);
	$i = random_int(0, 3);
	$operador = $operadores[$i];

	switch ($operador)
	{
		case '+':
			$resultado = $op1 + $op2;
			break;
		case '-':
			$resultado = $op1 - $op2;
			break;
		case '*':
			$resultado = $op1 * $op2;
			break;
		case '/':
			if ($op2 == 0)
			{
				$resultado = "Invalid";
			}
			else
			{
				$resultado = $op1 / $op2;
			}
			break;

	}

	print("$op1 $operador $op2 = $resultado");
?>