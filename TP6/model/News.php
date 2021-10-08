<?php
include "NewModel.php";
class News {
    private int $id;
    private string $titre;
    private string $contenu;
    private string $date;
    private int $idU;

    public function __construct(string $titre, string $contenu, string $date, int $idU) {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->date = $date;
        $this->idU = $idU;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContenu(): string {
        return $this->contenu;
    }

    /**
     * @return string
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getIdU(): int {
        return $this->idU;
    }

    /**
     * @return string
     */
    public function getTitre(): string {
        return $this->titre;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * @param string $contenu
     */
    public function setContenu(string $contenu): void {
        $this->contenu = $contenu;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void {
        $this->date = $date;
    }

    /**
     * @param int $idU
     */
    public function setIdU(int $idU): void {
        $this->idU = $idU;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }
    public static function fromForm() : ? News{
        $news=null;
        if((isset($_POST['titre']) && $_POST['titre']!="") && (isset($_POST['contenue']) && $_POST['contenue']!="") && (isset($_POST['Date']) && $_POST['Date']!="")) {
            $news = new News($_POST["idN"], $_POST["titre"], $_POST['contenue'], $_POST['Date'], $_POST['IdU']);
        }
        return $news;
    }
}