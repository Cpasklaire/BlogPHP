<?php 

namespace App\Models;

use App\Database\DataConnect;

class Post {
    public string $id;
    public string $text;  
    public string $tittle;  
    public string $user;
}


class PostModel {
    
    public DataConnect $connection;

    public function getPosts(){
        $statement = $this->connection->getConnection()->query(
            "SELECT ID FROM post"
        );
        $posts = [];

        while(($row = $statement->fetch())){
            $post = new Post();
            $post->id = $row["id"];
            $post->text = $row["text"];
            $post->tittle = $row["tittle"];
            $post->user = $row["user"];
            $posts[] = $post;
        }
        return $posts;
    }
}