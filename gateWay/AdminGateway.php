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
        try{
            $query = "SELECT nom, prenom, mail FROM Administrator WHERE pseudo = :pseudo";

            $this->connection->executeQuery($query, array(
                'pseudo' => array($pseudo,PDO::PARAM_STR)));
            return $this->connection->getResults();
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la selection du pseudo");
        }

    }

    public function finAdminByEmail(string $mail){
        try{
            $query = "SELECT pseudo,   nom, prenom, email, password FROM Administrator WHERE email = :mail";

            $this->connection->executeQuery($query, array(
                'mail' => array($mail,PDO::PARAM_STR)));
            return $this->connection->getResults();
        }
        Catch(Exception $e){
            throw new Exception("Erreur sql lors de la selection du mail");
        }

    }



    //public function
}