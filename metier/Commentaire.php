<?php


class Commentaire
{
    private $commentaire;
    private $pseudo;

    /**
     * Commentaire constructor.
     * @param $commentaire
     * @param $pseudo
     */
    public function __construct($commentaire, $pseudo)
    {
        $this->commentaire = $commentaire;
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire): void
    {
        $this->commentaire = $commentaire;
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



}