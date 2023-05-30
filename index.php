<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>petition</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" rel="stylesheet"/>

    <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #eee;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>

</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#"> <i class="fas fa-signature"></i> &nbsp; Petitions App</a> 

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger font-weight-normal my-3 ">Gestion des Petitions et Signatures</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary">Toutes les Petitions</h4>   
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"> <i class="fas fa-file-signature fa-lg"></i> &nbsp;&nbsp;Ajouter petition</button>
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addSModal"> <i class="fas fa-signature fa-lg"></i> &nbsp;&nbsp;Ajouter Signature</button>
            </div>

        </div>

        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser"> 
                    

                </div>
            </div>
        </div>
        <div class="row">
            <div id="petitionWithMostSignatures"></div>

        </div>
    </div>

    
  <div id="petition-container"></div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // charger la pétition avec le plus de signatures
      loadPetitionWithMostSignatures();
      // actualiser la pétition avec le plus de signatures toutes les 10 secondes
      setInterval(loadPetitionWithMostSignatures, 10000);
    });

    function loadPetitionWithMostSignatures() {
      $.ajax({
        url: 'action.php',
        type: 'POST',
        data: { action: 'get_petition_with_most_signatures' },
        success: function(data) {
          $('#petition-container').html(data);
        },
        error: function() {
          $('#petition-container').html('Une erreur est survenue.');
        }
      });
    }
  </script>


    <!-- Add New Petition Modal -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Ajouter Petition</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="form-data">
                        <div class="form-group">
                            <input type="text" name="Nom" class="form-control" placeholder="Nom" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Prenom" class="form-control" placeholder="Prenom" required>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="Description" placeholder="Description" cols="30" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="Titre" class="form-control" placeholder="Titre" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="insert" id="insert" value="Ajouter Petition" class="btn btn-danger btn-block">        
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>

    <!-- Edit Petition Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Edit Petition</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="edit-form-data">
                        <input type="hidden" name="IDP" id="IDP">

                        <div class="form-group">
                            <input type="text" name="Nom" class="form-control" id="Nom" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Prenom" class="form-control" id="Prenom" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="Description" name="Description" cols="30" rows="4" required></textarea>

                        </div>
                        <div class="form-group">
                            <input type="text" name="Titre" class="form-control" id="Titre" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update" id="update" value="Update User" class="btn btn-primary btn-block">        
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>

    <!-- Add New Signature Modal -->
    <div class="modal fade" id="addSModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Ajouter Signature</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form action="" method="post" id="addS-form-data">

                        <div class="form-group">
                                <label for="IDP">Titre de la pétition</label>
                                <select name="IDP" id="IDP" class="form-control" required>
                                    <option value="">Sélectionner le titre de la pétition</option>
                                    <?php
                                        // connect to the database
                                        $conn = mysqli_connect("localhost", "root", "", "petition");
                                        if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }
                                        // select petition titles from the Petition table
                                        $sql = "SELECT IDP, Titre FROM petitions";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='".$row["IDP"]."' data-idp='".$row["IDP"]."'>".$row["Titre"]."</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No petition titles found</option>";
                                        }
                                        mysqli_close($conn);
                                    ?>
                                </select>
                            </div>

                        <div class="form-group">
                            <input type="text" name="Nom" class="form-control" placeholder="Nom" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Prenom" class="form-control" placeholder="Prenom" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Pays" class="form-control" placeholder="Pays" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="insertS" id="insertS" value="Ajouter Signature" class="btn btn-primary btn-block">        
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>

   
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


   <script type="text/javascript">

       $(document).ready(function(){

            showAllUsers();

            function showAllUsers(){
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {action:"view"},
                    success:function(response){
                       
                        $("#showUser").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }

            //insert ajax request
            $("#insert").click(function(e){
                if($("#form-data")[0].checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: $("#form-data").serialize()+"&action=insert",
                        success:function(response){
                            Swal.fire({
                                title: 'Pétition Ajouté avec Success!',
                                type: 'success'
                            })
                            $("#addModal").modal('hide');
                            $("#form-data")[0].reset();
                            showAllUsers();
                        }
                    });
                }
            });

            //insert Signature ajax request
            $("#insertS").click(function(e){
                if($("#addS-form-data")[0].checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: $("#addS-form-data").serialize()+"&action=insertS",
                        success:function(response){
                            Swal.fire({
                                title: 'Signature ajoutée avec Success!',
                                type: 'success'
                            })
                            $("#addSModal").modal('hide');
                            $("#addS-form-data")[0].reset();
                            showAllUsers();
                        }
                    });
                }
            });

            // Edit Petition
            $("body").on("click", ".editBtn", function(e){
                e.preventDefault();
                edit_id = $(this).attr('id');
                $.ajax({
                    url:"action.php",
                    type: "POST",
                    data:{edit_id:edit_id},
                    success:function(response){
                        data = JSON.parse(response);
                        $("#IDP").val(data.IDP);
                        $("#Nom").val(data.Nom);
                        $("#Prenom").val(data.Prenom);
                        $("#Description").val(data.Description);
                        $("#Titre").val(data.Titre);
                    }
                });
            });

            //update ajax request
            $("#update").click(function(e){
                if($("#edit-form-data")[0].checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: $("#edit-form-data").serialize()+"&action=update",
                        success:function(response){
                            Swal.fire({
                                title: 'Pétition modifié avec success!',
                                type: 'success'
                            })
                            $("#editModal").modal('hide');
                            $("#edit-form-data")[0].reset();
                            showAllUsers();

                        }
                    });
                }
            });

            //Delete ajax request
            $("body").on("click", ".delBtn", function(e){
                e.preventDefault();
                var tr = $(this).closest('tr');
                del_id = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"action.php",
                        type:"POST",
                        data:{del_id:del_id},
                        success:function(response){
                            tr.css('background-color','#ff6666');
                            Swal.fire(
                                'Deleted!',
                                'Pétition supprimer avec Success',
                                'success'
                            )
                            showAllUsers();
                        }
                    });
                }

            });
        });

        //Show petition details
        $("body").on("click", ".infoBtn", function(e){
            e.preventDefault();
            info_id = $(this).attr('id');
            $.ajax({
                url:"action.php",
                type:"POST",
                data:{info_id: info_id},
                success:function(response){
                    data = JSON.parse(response);
                    Swal.fire({
                        title:'<strong> Petition Info ID('+data.IDP+')</strong>',
                        type: 'info',
                        html: '<b>Nom : </b>'+data.Nom+ '<br><b> Prenom : </b>'+data.Prenom+'<br><b>Description : </b>'+data.Description+'<br><b>Titre : </b>'+data.Titre+ '<br><b>DatePublic : </b>'+data.DatePublic,
                        showCancelButton:true,
                    })
                    
                }
            });
        });
        
   

        });
    </script>

    <!-- ajouter ce script à la fin de votre page -->
    <script>
        // fonction AJAX pour appeler action.php et mettre à jour les résultats en temps réel
        function refreshPetitionWithMostSignatures() {
            $.ajax({
                url: 'action.php',
                dataType: 'json',
                success: function(response) {
                    // mettre à jour le contenu de la balise div avec les résultats
                    $('#petitionWithMostSignatures').html(response.Titre + ' (' + response.NumSignatures + ' signatures)');
                }
            });
        }

        // appeler la fonction AJAX toutes les 5 secondes pour mettre à jour les résultats en temps réel
        setInterval(refreshPetitionWithMostSignatures, 5000);
    </script>

    
    
</body>
</html>