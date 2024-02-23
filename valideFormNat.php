<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$libelle=$_POST['libelle']; //je récupère le libellé du form
$continent=$_POST['continent']; //je récupère le continent du form
$num=$_POST['num'];
var_dump($libelle, " ", $num);
if($action == 'Modifier'){
  $_REQUEST=$monPdo->prepare("update nationalite set libelle = :libelle, numContinent= :continent where num = :num");
  $_REQUEST->bindParam(':num', $num);
  $_REQUEST->bindParam(':libelle', $libelle);
  $_REQUEST->bindParam(':continent', $continent);
}else{
  $_REQUEST=$monPdo->prepare("insert into nationalite(libelle, numContinent) values(:libelle, :continent)");
  $_REQUEST->bindParam(':libelle', $libelle);
  $_REQUEST->bindParam(':continent', $continent);
}
$nb= $_REQUEST->execute();
$message= $action == "Modifier" ? "modifiée" : "ajoutée";




//Ce qu'il y a en haut c'est du SQL

echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';


if($nb==1){
  $_SESSION['message']=["success"=>'<strong>La nationalité a correctement été ' . $message . ' !</strong>'];
    
}else{
  $_SESSION['message']=["success"=>'<strong>La nationalité n\'a pas correctement été ' . $message . ' !</strong>'];
  
}

header('location:listeNationalites.php');
exit();
?>
    </div>
</div>
<a href="listeNationalites.php" class="btn btn-primary"> Revenir à la liste des nationalité</a>


    </div>

  
    


<?php include "footer.php"; ?>
