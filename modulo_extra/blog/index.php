<?php
require_once 'vendor/autoload.php';
require_once 'Lib/Livro/Route/Route.php';
use Livro\Route\Route;

$route = new Route;

// default action
$route->on('', function($args, $route)
{
    $route->exec('show_category', [] );
});

// render a category
$route->on('show_category', function($args)
{
	$loader = new \Twig\Loader\FilesystemLoader('template');
	$twig = new \Twig\Environment($loader);
	$template = $twig->loadTemplate('index.html');
	
	chdir ('admin');
	require_once 'init.php';
	Livro\Database\Transaction::open('cms');
	$posts = Post::getByTag( isset($args['tag']) ? $args['tag'] : null );
	Livro\Database\Transaction::close();
	
	$replaces = array();
	$replaces['base_url'] = 'template';
	
	foreach ($posts as $post)
	{
	    $replaces['posts'][] = $post->toArray();
	}
	
	$content = $template->render($replaces);
    echo $content;
});

// render a post
$route->on('show_post', function($args)
{
	$loader = new \Twig\Loader\FilesystemLoader('template');
	$twig = new \Twig\Environment($loader);
	$template = $twig->loadTemplate('post.html');
	
	if (!empty($args['id']))
	{
    	chdir ('admin');
    	require_once 'init.php';
    	Livro\Database\Transaction::open('cms');
    	$post = new Post($args['id']);
    	Livro\Database\Transaction::close();
    	
    	$replaces = $post->toArray();
    	$replaces['base_url'] = 'template';
    	$content = $template->render($replaces);
        echo $content;
    }
});

// in case of exception
$route->exception( function($exception)
{
	$loader = new \Twig\Loader\FilesystemLoader('template');
	$twig = new \Twig\Environment($loader);
	$template = $twig->loadTemplate('post.html');
	
	$replaces = array();
	$replaces['base_url'] = 'template';
	$replaces['title'] = $exception->getMessage();
	
	$content = $template->render($replaces);
    echo $content;
});

$route->on('teste', function ($args) {
    print 'teste';
    print '<br>';
    var_dump($args);
});

$route->run();
