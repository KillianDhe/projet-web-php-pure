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

        $this->connection->executeQuery($query, array(
            'id' => array($id,PDO::PARAM_INT)));

        return $this->connection->getResults();
    }

    public function insertArticle(Article $article){
        $query = "INSERT into Article(nomA,prenomA,description,titre,date) VALUES (:nomA,:prenomA,:description,:titre,:aDate)";

        $this->connection->executeQuery($query, array(
                                                'nomA' => array($article->getNomAuteur(),PDO::PARAM_STR),
                                                'prenomA' => array($article->getPrenomAuteur(),PDO::PARAM_STR),
                                                'description' => array($article->getTexte(),PDO::PARAM_STR),
                                                'titre' => array($article->getTitre(), PDO::PARAM_STR),
                                                'aDate' => array($article->getDate(), PDO::PARAM_STR)));
    }

    public function selectAllArticle(){
        $query = "SELECT idArticle, nomA, prenomA, description, titre, date FROM Article";


        $this->connection->executeQuery($query);

        return $this->connection->getResults();
    }

    public function deletArticleById(int $id){
        $query = "DELETE FROM Article WHERE idArticle = :id";

        $this->connection->executeQuery($query,array(
                                               'id' => array($id,PDO::PARAM_INT)));
    }

    public function updateArticleById(Article $article){
        $query = "UPDATE Article SET nomA = :nomA, prenomA = :prenomA, description = :desc, titre = :titre, date = :aDate WHERE idArticle = :id";

        $this->connection->executeQuery($query,array(
                                               'nomA' => array($article->getNomAuteur(),PDO::PARAM_STR),
                                               'prenomA' => array($article->getPrenomAuteur(),PDO::PARAM_STR),
                                               'desc' => array($article->getTexte(),PDO::PARAM_STR),
                                               'titre' => array($article->getTitre(), PDO::PARAM_STR),
                                               'aDate' => array($article->getDate(), PDO::PARAM_STR),
                                                ':id' => [$article->getId(), PDO::PARAM_INT]
                                        ));
    }
}