<?php
//Vous étes ici
namespace App\Controllers;
//utilise ça
use App\Database\DataConnect;
use App\Models\PostModel;

class PostController {
	
	protected $twig;

	public function __construct($twig) {
		$this->twig = $twig;
	}

	public function posts() {
		$connection = new DataConnect();  
		$postModel = new PostModel();

		$postModel->connection = $connection;

		$posts = $postModel->getPosts();




/* //$posts = [];
		while ($obj = $result->fetch_object()) {

    		// print_r($obj->id);
    		// print_r($obj->text);
    		// print_r('<br>');print_r('<br>');print_r('<br>');
 		}
		
		echo $this->twig->render('index.html', ['posts' => $posts]);  

// return $posts;		 */
	}

	public function show($postId) {
		echo "nous sommes dans le controller post"; 
		echo "method show pour le post" . $postId;		
	}
}

