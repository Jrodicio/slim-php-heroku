<?php
/** Julián Rodicio
 *  Aplicación No 14 (Par e impar)
 *   Crear una función llamada esPar que reciba un valor entero como parámetro y devuelva TRUE
 *   si este número es par ó FALSE si es impar.
 *   Reutilizando el código anterior, crear la función esImpar.
 */

    function esPar($numero)
    {
        if ($numero%2 == 0)
        {
            return true;
        }
        return false;
    }

    function esImpar($numero)
    {
        return !esPar($numero);
    }

    // Test //

    print("esPar test <br>");

    if(esPar(2))
    {
        print("esPar(2): OK<br>");
    }
    if(esPar(456))
    {
        print("esPar(456): OK<br>");
    }
    if(esPar(787))
    {
        print("esPar(787): NOK<br>");
    }

    print("esImpar test <br>");
    if(esImpar(2))
    {
        print("esImpar(2): NOK<br>");
    }
    if(esImpar(459))
    {
        print("esImpar(459): OK<br>");
    }
    if(esImpar(787))
    {
        print("esImpar(787): OK<br>");
    }

?>