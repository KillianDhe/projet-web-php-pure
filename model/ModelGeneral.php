<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 06/12/2019
 * Time: 11:44
 */

class ModelGeneral
{

    public function mInsertArticle(Article $article){
        global $dsn, $user, $pass;

        $artcileG = new ArticleGateWay(new Connection($dsn,$user,$pass));
        $artcileG->insertArticle($article);
    }

    public function getAllArticle(){
        global $dsn, $user, $pass;
        $articleList = [];

        $artcileG = new ArticleGateWay(new Connection($dsn,$user,$pass));

        $result = $artcileG->selectAllArticle();

        if (empty($result)){
            return NULL;
        }

        foreach ($result as $article){
            $articleList[] = new Article($article['idArticle'],$article['description'],$article['titre'],$article['date'],$article['prenomA'],$article['nomA']);
        }
        return $articleList;
    }

    public function removeArticleByID(int $id){
        global $dsn, $user, $pass;

        $artcileG = new ArticleGateWay(new Connection($dsn,$user,$pass));

        $artcileG->deletArticleById($id);
    }

    public function getArticleById(int $id){
        global $dsn, $user, $pass;


        $artcileG = new ArticleGateWay(new Connection($dsn,$user,$pass));
        $result = $artcileG->findArticleById($id);
        if (empty($result)){
            return NULL;
        }

        $article = $result[0];

        return new Article($id,$article['description'],$article['titre'],$article['date'],$article['prenomA'],$article['nomA']);
    }

    public function reviseArticle(Article $article){
        global $dsn, $user, $pass;

        $artcileG = new ArticleGateWay(new Connection($dsn,$user,$pass));
        $artcileG->updateArticleById($article);
    }

    public function insertCommentaire(Commentaire $commentaire){
        global $dsn, $user, $pass;
        $commentaireG=new CommentaireGateWay(new Connection($dsn,$user,$pass));
        $commentaireG->insertCommentaire($commentaire);
    }

}