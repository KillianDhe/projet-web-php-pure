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
        $this->incrementerNbCommentaire();
        $_SESSION['pseudoComm']=$commentaire->getPseudo();
    }

    public static  function  getpseudo(){
        if(isset($_COOKIE['pseudo'])){
            return (Validation::purify($_COOKIE['pseudo']));
        }
        return "";
    }

    public static function getnbcommentaire()
    {
        if(isset($_COOKIE['nbcommentaire']) && ($_COOKIE['nbcommentaire'] >= 0)){
             return (Validation::nettoyerint($_COOKIE['nbcommentaire']));
        }
        else return 0;
    }

    public function incrementerNbCommentaire(){
        setcookie('nbcommentaire',($this->getnbcommentaire()+1),time()+365*24*3600);
    }

    public function getComWithArticleId(int $id){
        global $dsn, $user, $pass;
        $comList = [];

        $comG = new CommentaireGateWay(new Connection($dsn,$user,$pass));

        $result = $comG->selectComWithArticleId($id);

        if (empty($result)){
            return NULL;
        }

        foreach ($result as $commentaire){
            $comList[] = new Commentaire($commentaire['commentaire'],$commentaire['pseudo'],$id);
        }
        return $comList;
    }

    public function chercherParDate($date){
        global $dsn, $user, $pass;

        $articleG = new ArticleGateWay(new Connection($dsn,$user,$pass));
        $result=$articleG->getArticleByDate($date);

        if (empty($result)){
           return null;
        }

        foreach ($result as $article){
            $articleList[] = new Article($article['idArticle'],$article['description'],$article['titre'],$article['date'],$article['prenomA'],$article['nomA']);
        }
        return $articleList;

    }

    public function getNbArticle(){
        global $dsn, $user, $pass;
        $ArtG=new ArticleGateWay(new Connection($dsn,$user,$pass));
        $nbArt=$ArtG->selectNbArticle();

        if(isset($nbArt) && ($nbArt!=null))
            return $nbArt;
        else
            return 0;

    }

    public function getLimit($nbNewsPage, $page){
        $limList =[];
        global $dsn, $user, $pass;
        $articleG = new ArticleGateWay(new Connection($dsn,$user,$pass));
        $result = $articleG->selectLimit($nbNewsPage,$page);

        foreach ( $result as $article){
            $limList[] =  new Article($article['idArticle'],$article['description'],$article['titre'],$article['date'],$article['prenomA'],$article['nomA']);
        }

        return $limList;
    }



}