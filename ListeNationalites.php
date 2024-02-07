<?php include "header.php"; 
include "connexionPdo.php";
$_REQUEST=$monPdo->prepare("select * from nationalite");
$_REQUEST->setFetchMode(PDO::FETCH_OBJ);
$_REQUEST->execute();
$LesNationalites = $_REQUEST->fetchALL();

//Ce qu'il y a en haut c'est du SQL


?>


    <div class="container mt-5">
        <div class="row pt-3"> 
            <div class="col-9"><h2>Liste des nationalités</h2></div>
            <div class="col-3"><a href='formNat.php?action=Ajouter' class='btn btn-success'><i class='fa-solid fa-plus'></i>Crée une nationalité <a></div>
        
        </div>
        <table class="table table-hover table-striped table-dark">
        <thead>
                <tr class='d-flex'>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-7">Libellé</th>
                <th scope="col" class="col-md-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($LesNationalites as $nationalite) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$nationalite->num </td>";
                    echo "<td class='col-md-7'>$nationalite->libelle</td>";
                    echo "<td class='col-md-3'>
                    <a href='formNat.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fa-solid fa-pen'></i>Modifier la nationalité <a>
                    <a href='' class='btn btn-danger'><i class='fa-solid fa-trash'></i>Supprimer la nationalité <a>
                    </td>";
                    echo "</tr>" ;
                
                }
                ?>
                

            </tbody>
            </table>
    </div>

  
    


<?php include "footer.php"; ?>
