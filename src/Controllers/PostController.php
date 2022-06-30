<?php
//Vous étes ici
namespace App\Controllers;
//utilise ça
use App\Database\DataConnect;
use App\Models\PostModel;

class PostController {
	
	protected $twig;

	public function __construct(/* $twig */) {
		//$this->twig = $twig;
	}

	public function list() {
		$connection = new DataConnect();  
		$postModel = new PostModel();

		$postModel->connection = $connection;

		$posts = $postModel->getPosts();
		print_r($posts);
		
/* 		echo $this->twig->render('index.html', ['posts' => $posts]);  

		return $posts; */
	}
    public function show() {

		$postModel = new PostModel();
		$postModel->connection = new DataConnect();

		$post = $postModel->getPosts();
		
/* 		echo $this->twig->render('index.html', ['post' => $post]);  

		return $post; */
	}
}