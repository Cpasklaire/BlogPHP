<?php 

namespace App\Models;

use App\Database\DataConnect;

class Comment {
    public string $id;
    public string $postId;
    public string $userId;   
    public string $text;
    public bool $valided;
    public string $adminId;
}


class CommentModel {
    
    public DataConnect $connection;

    public function getComments(){
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM Comments"
        );
        $comments = [];

        while(($row = $statement->fetch())){
            $comment = new Post();
            $comment->id = $row["id"];
            $comment->postId = $row["postId"];
            $comment->userId = $row["userId"];
            $comment->text = $row["text"];
            $comment->valided = $row["valided"];
            $comment->adminId = $row["adminId"];
            $comments[] = $comment;
        }
        return $comments;
    }
}