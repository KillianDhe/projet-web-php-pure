<?php


class CommentaireGateWay
{
    private $connection;

    /**
     * CommentaireGateWay constructor.
     */
    public function __construct(Connection $connection)
    {

        $this->connection = $connection;
    }

    public function insertCommentaire(Commentaire $commentaire){
        $query = "INSERT into Commentaire VALUES (:idCommentaire,:idArticle,:commentaire,:pseudo)";

        try{

        $this->connection->executeQuery($query, array(
            'idCommentaire' => array(0,PDO::PARAM_INT),
            'idArticle' => array($commentaire->getIdArticle(),PDO::PARAM_INT),
            'commentaire' => array($commentaire->getCommentaire(),PDO::PARAM_STR),
            'pseudo' => array($commentaire->getPseudo(), PDO::PARAM_STR)));
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de l'insertion du commentaire'");
        }
    }

    public function selectComWithArticleId(int $id){
        $query = "SELECT pseudo, commentaire FROM Commentaire WHERE idArticle = :id ORDER BY idCommentaire desc";

        try{

        $this->connection->executeQuery($query, array(
            'id' => array($id,PDO::PARAM_INT)));

        return $this->connection->getResults();
        Catch(Exception $e){
                throw new Exception("Erreur sql lors de la selection d'un commentaire");
            }
    }




}