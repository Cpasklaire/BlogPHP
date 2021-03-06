<?php
//Vous étes ici
namespace App\Controllers;
//utilise ça
use App\Database\DataConnect;
use App\Models\CommentModel;

class CommentController {
	
	protected $twig;

	public function __construct($twig) {
		$this->twig = $twig;
	}

	public function show() {
		$connection = new DataConnect();  
		$commentModel = new CommentModel();

		$commentModel->connection = $connection;

		$comment = $commentModel->getComments();
		
/* 		echo $this->twig->render('index.html', ['comment' => $comment]);  

		return $comment; */
	}
}