<?php
    error_reporting(-1);
    ini_set('display_errors', 1);

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;
    use Slim\Routing\RouteCollectorProxy;

    require __DIR__ . '/../vendor/autoload.php';


    $ficheros = scandir("./");

    print("<h1>Ejercicios Julian Rodicio</h1>");
    for($i=3; $i<count($ficheros); $i++)
    {
        if(str_contains($ficheros[$i],"Ej"))
        {
            $file = $ficheros[$i];
            if(str_contains($file,".php"))
            {
                $file = substr($ficheros[$i],0,strlen($ficheros[$i])-4);
            }
            print("<a href='https://jrodicio-prog3.herokuapp.com/$ficheros[$i]'>$file</a><br>");
        }
        
    }
    


?>