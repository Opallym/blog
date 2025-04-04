<?php

    namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

    class App 
    {
        /**
         * Liste des modules
         * @var array
         */
        private $modules = [];

        /**
         * Router
         * @var Router
         */
        private $router;

        /**
         * App constructor
         * @param string[] $modules est la liste des modules a charger
         */

        public function __construct(array $modules)
        {
            foreach($modules as $module)
            {
                $this -> modules[] = new $module;

            }    
        }
        public function run(ServerRequestInterface $request): ResponseInterface
        {
            $uri = $request->getUri()->getPath();
            if(!empty($uri) && $uri[-1] === "/")
            {
                return (new Response())
                    ->withStatus(301)
                    ->withHeader('Location' , substr($uri, 0, -1));
            }
            if($uri === '/blog/mon-article') 
            {
                return new Response(200,[],'<h1>Bienvenue sur mon super blog</h1>');
            }
            return new Response(404,[],'<h1>Erreur 404</h1>');
        }
    }