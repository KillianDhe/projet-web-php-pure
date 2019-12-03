<?php
/**
 * Created by PhpStorm.
 * User: alban
 * Date: 02/12/2019
 * Time: 16:55
 */

class AdminGateway
{
    private $connection;

    /**
     * AdminGateway constructor.
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function finAdminByPseudo(string $pseudo){
        $query = "SELECT nom, prenom, mail FROM Administrator WHERE pseudo = :pseudo";

        $this->connection->executeQuery($query, array(
                                        'pseudo' => array($pseudo,PDO::PARAM_STR)));
        return $this->connection->getResults();
    }

    public function finAdminByEmail(string $mail){
        $query = "SELECT nom, prenom, mail FROM Administrator WHERE pseudo = :mail";

        $this->connection->executeQuery($query, array(
            'mail' => array($mail,PDO::PARAM_STR)));
        return $this->connection->getResults();
    }
    //public function
}