<?php

//use user et post?

class CommentController
{
    //Créé un commentaire
    public function create
    {
        //recherche du post
        //créé le commentaire ratacher
        //mettre info
        //envoyer rendu
        $comment = new comment();
        $comment->setPostId($params['post']['postId'])
            ->setUserId//($params['post']['userId'])
            ->setText//($params['post']['userId'])
            ->setValided(0)
            ->setAdminId//($params['post']['userId']);

        echo($comment)
        return;
    }
    //Supprimer un commentaire
    public function delete
    {
        //recherche du post

        if($commentId != $comment->getCommentId())
        {
            echo(le commentaire nexiste pas)
            return;
        }

        $comment->delete($comment);
        echo(le commentaire est supprimer)
        return;
    }
}