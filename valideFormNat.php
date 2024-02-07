<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$libelle=$_POST['libelle']; //je récupère le libellé du form
$num=$_POST['num'];
var_dump($libelle, " ", $num);
if($action == 'Modifier'){
  $_REQUEST=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num");
  $_REQUEST->bindParam(':num', $num);
  $_REQUEST->bindParam(':libelle', $libelle);
}else{
  $_REQUEST=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
  $_REQUEST->bindParam(':libelle', $libelle);
}
$nb= $_REQUEST->execute();
$message= $action == "Modifier" ? "modifiée" : "ajoutée";




//Ce qu'il y a en haut c'est du SQL

echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';


if($nb==1){
    echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>La nationalité a correctement été ' . $message . ' !</strong></div>';
}else{
    echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>La nationalité n\'a pas  été '. $message .' !</strong></div>';
}?>
    </div>
</div>
<a href="listeNationalites.php" class="btn btn-primary"> Revenir à la liste des nationalité</a>


    </div>

  
    


<?php include "footer.php"; ?>
