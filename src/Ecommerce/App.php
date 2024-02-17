<?php namespace Ecommerce;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface; // Supprimez cette ligne

class App
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */


    public function run(ServerRequestInterface $request)
    {
        // VARIABLE SUPER GLOBALE : $_SERVER est un tableau contenant des informations telles que les en-têtes,
        //les chemins et les emplacements de script
        //$uri = $_SERVER['REQUEST_URI']; // L'URI qui a été fourni pour accéder à cette page. Par exemple : '/index.html'.
        $uri = $request->getUri()->getPath();
        //var_dump($uri[-1]);
        //var_dump(substr($uri, 0, -1)); // cela retourne la chaine de caracteres -1 par exemple "fabien" --> "fabie"
        //condition permettant d'empecher l'ajout des "/" en fin d'url en le supprimant si on en ajoute 1
        if (!empty($uri) && strlen($uri) > 0 && substr($uri, -1) === '/') {
            // substr() parcourir chaine de caracteres et Retourne un segment de chaîne avec offset = position curseur
            // et length: nombre de caracteres pris en compte apres le curseur
            //header('Location:' . substr($uri, 0, -1)); // $rest = substr("abcdef", -3, 1); // retourne "d"
            //header('HTTP/1.1 301 Moved Permanently');
            return(new Response())
            ->withStatus(301)
            ->withHeader("Location", substr($uri, 0, -1));
            // les headers peuvent contenir 1 ou
            // plusieurs parametres : header(string $header, bool $replace = true, int $response_code = 0): void
        }
        if ($uri === '/ecommerce') {
            return new Response(200, [], '<h1>Bienvenue sur le blog</h1>');
        }
        return new Response(404, [], '<h1>Erreur 404</h1>');
    }
}
