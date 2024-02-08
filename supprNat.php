<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];

    $_REQUEST=$monPdo->prepare("delete from nationalite where num = :num");
    $_REQUEST->bindParam(':num', $num);
    $nb= $_REQUEST->execute();




//Ce qu'il y a en haut c'est du SQL

echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-3">';


if($nb==1){
    echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>La nationalité a correctement été supprimée !</strong></div>';
}else{
    echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>La nationalité n\'a pas  été supprimée !</strong></div>';
}?>
    </div>
</div>
<a href="listeNationalites.php" class="btn btn-primary"> Revenir à la liste des nationalité</a>


    </div>

  
    


<?php include "footer.php"; ?>