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
        $query = "SELECT titre, description, nomA, prenomA, date FROM Article WHERE id = :id";

        $this->connection->executeQuery($query, array(
            'id' => array($id,PDO::PARAM_INT)));

        return $this->connection->getResults();
    }

    public function insertArticle(Article $article){
        $query = "INSERT into Article VALUES (,:nomA,:prenomA,:description,:titre,:aDate)";

        $this->connection->executeQuery($query, array(
                                                'nomA' => array($article->getNomAuteur(),PDO::PARAM_STR),
                                                'prenomA' => array($article->getPrenomAuteur(),PDO::PARAM_STR),
                                                'description' => array($article->getTexte(),PDO::PARAM_STR),
                                                'titre' => array($article->getTitre(), PDO::PARAM_STR),
                                                'aDate' => array($article->getDate(), PDO::PARAM_STR)));
    }
}