class Petition {
    private $idp;
    private $nom;
    private $prenom;
    private $description;
    private $datePublic;
    private $titre;

    // constructeur
    public function __construct($idp, $nom, $prenom, $description, $datePublic, $titre) {
        $this->idp = $idp;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->description = $description;
        $this->datePublic = $datePublic;
        $this->titre = $titre;
    }

    // getter et setter pour chaque attribut
    public function getIdp() {
        return $this->idp;
    }

    public function setIdp($idp) {
        $this->idp = $idp;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDatePublic() {
        return $this->datePublic;
    }

    public function setDatePublic($datePublic) {
        $this->datePublic = $datePublic;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

}


    
    
