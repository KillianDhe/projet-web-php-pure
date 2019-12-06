<?php


class Visiteur
{
    private $pseudo;
    private $nbpostes;

    /**
     * Visiteur constructor.
     * @param $pseudo
     * @param $nbpostes
     */
    public function __construct($pseudo, $nbpostes)
    {
        $this->pseudo = $pseudo;
        $this->nbpostes = $nbpostes;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getNbpostes()
    {
        return $this->nbpostes;
    }

    /**
     * @param mixed $nbpostes
     */
    public function setNbpostes($nbpostes): void
    {
        $this->nbpostes = $nbpostes;
    }




}