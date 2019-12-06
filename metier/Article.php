 <?php

class Article
{

    private $texte;
    private $titre;
    private $date;
    private $prenomAuteur;
    private $nomAuteur;

    /**
     * Article constructor.
     * @param $texte
     * @param $titre
     * @param $date
     * @param $prenomAuteur
     * @param $nomAuteur
     */
    public function __construct($texte, $titre, $date, $prenomAuteur, $nomAuteur)
    {
        $this->texte = $texte;
        $this->titre = $titre;
        $this->date = $date;
        $this->prenomAuteur = $prenomAuteur;
        $this->nomAuteur = $nomAuteur;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte): void
    {
        $this->texte = $texte;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPrenomAuteur()
    {
        return $this->prenomAuteur;
    }

    /**
     * @param mixed $prenomAuteur
     */
    public function setPrenomAuteur($prenomAuteur): void
    {
        $this->prenomAuteur = $prenomAuteur;
    }

    /**
     * @return mixed
     */
    public function getNomAuteur()
    {
        return $this->nomAuteur;
    }

    /**

     * @param mixed $nomAuteur
     */
    public function setNomAuteur($nomAuteur): void
    {
        $this->nomAuteur = $nomAuteur;
    }


}