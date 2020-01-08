<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 06/12/2019
 * Time: 10:22
 */

class ArticleGateWay
{
    private $connection;

    /**
     * AricleGateWay constructor.
     */
    public function __construct(Connection $connection)
    {

        $this->connection = $connection;
    }

    public function findArticleById(int $id){
        $query = "SELECT titre, description, nomA, prenomA, date FROM Article WHERE idArticle = :id";
        try{

        $this->connection->executeQuery($query, array(
            'id' => array($id,PDO::PARAM_INT)));

        return $this->connection->getResults();
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la selection d'un article via son id");
        }
    }

    public function insertArticle(Article $article){
        $query = "INSERT into Article(nomA,prenomA,description,titre,date) VALUES (:nomA,:prenomA,:description,:titre,:aDate)";

        try {
        $this->connection->executeQuery($query, array(
                                                'nomA' => array($article->getNomAuteur(),PDO::PARAM_STR),
                                                'prenomA' => array($article->getPrenomAuteur(),PDO::PARAM_STR),
                                                'description' => array($article->getTexte(),PDO::PARAM_STR),
                                                'titre' => array($article->getTitre(), PDO::PARAM_STR),
                                                'aDate' => array($article->getDate(), PDO::PARAM_STR)));
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de l'insertion d'un article");
        }

    }

    public function selectAllArticle(){
        $query = "SELECT idArticle, nomA, prenomA, description, titre, date FROM Article ORDER BY date desc";

        try{
        $this->connection->executeQuery($query);

        return $this->connection->getResults();
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la selection des articles");
        }
    }

    public function selectNbArticle(){
        $query = "SELECT COUNT(*) FROM Article";

        try{

        $this->connection->executeQuery($query);

        return $this->connection->getResults()[0]['COUNT(*)'];
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la selection du nombre d'articles");
        }
    }

    public function deletArticleById(int $id){
        $query = "DELETE FROM Article WHERE idArticle = :id";
        try {

        $this->connection->executeQuery($query,array(
                                               'id' => array($id,PDO::PARAM_INT)));
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la suppression d'un article");
        }
    }

    public function updateArticleById(Article $article){
        $query = "UPDATE Article SET nomA = :nomA, prenomA = :prenomA, description = :desc, titre = :titre, date = :aDate WHERE idArticle = :id";

        try{

        $this->connection->executeQuery($query,array(
                                               'nomA' => array($article->getNomAuteur(),PDO::PARAM_STR),
                                               'prenomA' => array($article->getPrenomAuteur(),PDO::PARAM_STR),
                                               'desc' => array($article->getTexte(),PDO::PARAM_STR),
                                               'titre' => array($article->getTitre(), PDO::PARAM_STR),
                                               'aDate' => array($article->getDate(), PDO::PARAM_STR),
                                                ':id' => [$article->getId(), PDO::PARAM_INT]
                                        ));
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la mise a jour de l'article");
        }
    }

    public function getArticleByDate($date){
        $query = "SELECT idArticle,titre, description, nomA, prenomA, date FROM Article WHERE date = :datee";

        try{
        $this->connection->executeQuery($query, array(
            'datee' => array($date,PDO::PARAM_STR)));

        return $this->connection->getResults();
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la selection des articles par date");
        }
    }

    public function selectLimit($noPage, $articlePage){
        $query =  "SELECT idArticle, nomA, prenomA, description, titre, date FROM Article LIMIT :noPage, :articlePage";

        try{

        $this->connection->executeQuery($query, array(
                                                'noPage' => array($noPage, PDO::PARAM_INT),
                                                'articlePage' => array($articlePage, PDO::PARAM_INT)));
        return $this->connection->getResults();
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la selection des articles avec limitation");
        }
    }

    public function selectLimitParDate($noPage, $articlePage, $date)
    {

        $query = "SELECT idArticle, nomA, prenomA, description, titre, date FROM Article WHERE date=:date LIMIT :noPage, :articlePage ";

        try {

            $this->connection->executeQuery($query, array(
                'noPage' => array($noPage, PDO::PARAM_INT),
                'articlePage' => array($articlePage, PDO::PARAM_INT),
                'date' => array($date, PDO::PARAM_STR)
            ));
            return $this->connection->getResults();
        } Catch (Exception $e) {
            throw new Exception("Erreur sql lors de la selection des articles par date avec limitation");
        }
    }
}