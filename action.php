<?php

require_once 'db.php';
$db = new Database();

if(isset($_POST['action'])  && $_POST['action'] == "view" ){
    $output = '';
    $data = $db->read();
    
    if($db->totalRowCount()>0){
        $output .= '<table class="table table-striped table-sm table-bordered" >
        <thead>
            <tr class="text-center ">
                <th>IDP</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Description</th>
                <th>Titre</th>
                <th>Action</th>
                <!--<th>Signatures </th> -->
            </tr>
        </thead>
        <tbody>';

        foreach($data as $row){
            $output .= '<tr class="text-secondary">
            <td>'.$row['IDP'].'</td>
            <td>'.$row['Nom'].'</td>
            <td>'.$row['Prenom'].'</td>
            <td>'.$row['Description'].'</td>
            <td>'.$row['Titre'].'</td>
            <td class="text-center ">
                <a href="#" title="View Detail" class="text-success infoBtn" id="'.$row['IDP'].'"> <i class="fas fa-info-circle fa-lg"></i> </a> &nbsp;&nbsp;
                <a href="#" title="Edit" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id="'.$row['IDP'].'"> <i class="fas fa-edit fa-lg"></i> </a> &nbsp;&nbsp;
                <a href="#" title="Delete" class="text-danger delBtn" id="'.$row['IDP'].'"> <i class="fas fa-trash-alt fa-lg"></i> </a> &nbsp;&nbsp;
            </td>
            <!-- <td class="text-center">
                <a href="#" title="View Signatures" class="text-info viewSignBtn" data-toggle="modal" data-target="#viewSignModal" id="'.$row['IDP'].'"> <i class="fas fa-list fa-lg"></i> </a> &nbsp;&nbsp;
            </td>  -->
            </tr>';
        }

        $output .= '</tbody></table>';
        echo $output;

        $petitionWithMostSignatures = $db->getPetitionWithMostSignatures();
        // renvoyer les résultats sous forme de HTML
            if ($petitionWithMostSignatures) {
                echo "<h4>La petition avec le grand nombre des signatures </h4>";
                echo "<table>";
                echo "<tr><th>Titre</th><th>Description</th><th>Nombre de signatures</th></tr>";
                echo "<tr><td>" . $petitionWithMostSignatures['Titre'] . "</td><td>" . $petitionWithMostSignatures['Description'] . "</td><td>" . $petitionWithMostSignatures['NumSignatures'] . "</td></tr>";
                echo "</table>";
            } else {
                echo "Aucune pétition trouvée.";
            }
        //echo json_encode($petitionWithMostSignatures);

    }else{
        echo '<h3 class="text-center text-secondary mt-5"> :( No any petition in the database!</h3>';
    }
}

if(isset($_POST['action']) && $_POST['action'] == "insert" ){
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Description = $_POST['Description'];
    $Titre = $_POST['Titre'];

    $db->insert($Nom, $Prenom, $Description, $Titre);
}

if(isset($_POST['action']) && $_POST['action'] == "insertS" ){
    $IDP = $_POST['IDP'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Pays = $_POST['Pays'];

    $db->insertS($IDP,$Nom, $Prenom, $Pays);
}

if(isset($_POST['edit_id'])){
    $IDP = $_POST['edit_id'];
    $row = $db->getUserById($IDP);
    echo json_encode($row);
}

if(isset($_POST['action']) && $_POST['action'] == "update"){
    $IDP = $_POST['IDP'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Description = $_POST['Description'];
    $Titre = $_POST['Titre'];
    $db->update($IDP, $Nom, $Prenom, $Description, $Titre);
}

if(isset($_POST['del_id'])){
    $IDP = $_POST['del_id'];
    $db->delete($IDP);
}

if(isset($_POST['info_id'])){
    $IDP = $_POST['info_id'];
    $row = $db->getUserById($IDP);
    echo json_encode($row);
}




?>