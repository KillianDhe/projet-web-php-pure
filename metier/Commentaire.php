<?php


class Commentaire
{
    private $commentaire;
    private $pseudo;
    private $idArticle;

    /**
     * Commentaire constructor.
     * @param $commentaire
     * @param $pseudo
     * @param $idArticle
     */
    public function __construct($commentaire, $pseudo, $idArticle)
    {
        $this->commentaire = $commentaire;
        $this->pseudo = $pseudo;
        $this->idArticle = $idArticle;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * @param mixed $idArticle
     */
    public function setIdArticle($idArticle): void
    {
        $this->idArticle = $idArticle;
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