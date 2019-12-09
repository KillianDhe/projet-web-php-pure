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

        $this->connection->executeQuery($query, array(
            'idCommentaire' => array(0,PDO::PARAM_INT),
            'idArticle' => array($commentaire->getIdArticle(),PDO::PARAM_INT),
            'commentaire' => array($commentaire->getCommentaire(),PDO::PARAM_STR),
            'pseudo' => array($commentaire->getPseudo(), PDO::PARAM_STR)));
    }

}