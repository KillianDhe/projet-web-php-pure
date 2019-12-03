<?php


class Admin extends Visiteur
{
    public $idAdmin;
    public $pass;
    public $email;

    public function __construct(string $idAdmin,string $pass, string $email)
    {
        $this->idAdmin = $idAdmin;
        $this->pass = $pass;
        $this->email = $email;
    }
}