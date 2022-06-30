<?php 

namespace App\Models;

use App\Database\DataConnect;

class Post {
    public string $id;
    public string $userId;  
    public string $title;  
    public string $text;
    public string $imageURL;
}


class PostModel {
    
    public DataConnect $connection;

    public function getPosts(){
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM Posts"
        );
        $posts = [];

        while(($row = $statement->fetch())){
            $post = new Post();
            $post->id = $row["id"];
            $post->userId = $row["userId"];
            $post->title = $row["title"];
            $post->text = $row["text"];
            $post->imageURL = $row["imageURL"];
            $posts[] = $post;
        }
        return $posts;
    }
}