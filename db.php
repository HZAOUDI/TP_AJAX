<?php
    class Database{
        private $dsn = "mysql:host=localhost;dbname=petition";
        private $user = "root";
        private $pass = "";
        public $conn;
        
        public function __construct(){
            try{
                $this->conn = new PDO($this->dsn, $this->user, $this->pass);
               
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function insert($Nom, $Prenom, $Description, $Titre){
            $sql = "INSERT INTO petitions (Nom, Prenom, Description, Titre) VALUES (:Nom, :Prenom, :Description, :Titre)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['Nom'=>$Nom,'Prenom'=>$Prenom,'Description'=>$Description,'Titre'=>$Titre ]);
            return true;
        }
        
        function getSignatureById($id) {
            $conn = mysqli_connect("localhost", "root", "", "petition");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT IDP FROM petitions WHERE IDP = '$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row['IDP'];
            } else {
                return false;
            }
            mysqli_close($conn);
        }
        
        public function insertS($Titre, $Nom, $Prenom, $Pays){
            $IDP = $this->getSignatureById($Titre); // obtenir l'IDP correspondant au titre sélectionné
            if (!$IDP) {
                // retourner false si l'IDP n'est pas trouvé
                return false;
            }
            $sql = "INSERT INTO signatures (IDP, Nom, Prenom, Pays) VALUES (:IDP, :Nom, :Prenom, :Pays)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['IDP'=>$IDP, 'Nom'=>$Nom,'Prenom'=>$Prenom,'Pays'=>$Pays ]);
            return true;
        }
        

        public function read(){
            $data= array();
            $sql = "SELECT * FROM petitions";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                $data[] = $row;
            } 
            return $data;
        }

        public function getUserById($IDP){
            $sql = "SELECT * FROM petitions WHERE IDP= :IDP";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute (['IDP'=>$IDP]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function update($IDP, $Nom, $Prenom, $Description, $Titre){
            $sql ="UPDATE petitions SET Nom= :Nom, Prenom = :Prenom, Description = :Description, Titre = :Titre WHERE IDP = :IDP";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['Nom'=>$Nom, 'Prenom'=>$Prenom,'Description'=>$Description,'Titre'=>$Titre, 'IDP'=>$IDP]);
            return true;
        }

        public function delete($IDP){
            $sql = "DELETE FROM petitions WHERE IDP= :IDP";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['IDP'=>$IDP]);
            return true;
        }

        public function totalRowCount(){
            $sql = "SELECT * FROM petitions";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();

            return $t_rows;
        }

        public function getPetitionWithMostSignatures() {
            $query = "SELECT petitions.*, COUNT(signatures.IDS) AS NumSignatures
                      FROM petitions
                      LEFT JOIN signatures ON petitions.IDP = signatures.IDP
                      GROUP BY petitions.IDP
                      ORDER BY NumSignatures DESC
                      LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        
    }

?>