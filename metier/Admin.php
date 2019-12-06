<?php


class Admin extends Visiteur
{

    private $motDePasse;
    private $nom;
    private $prenom;
    private $email;

    /**
     * Admin constructor.
     * @param $pseudo
     * @param $motDePasse
     * @param $nom
     * @param $prenom
     * @param $email
     */
    public function __construct($pseudo,$motDePasse, $nom, $prenom, $email)
    {
        parent::__construct($pseudo,NULL);
        $this->motDePasse = $motDePasse;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * @param mixed $motDePasse
     */
    public function setMotDePasse($motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
}