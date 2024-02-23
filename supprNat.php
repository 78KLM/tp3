<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];

    $_REQUEST=$monPdo->prepare("delete from nationalite where num = :num");
    $_REQUEST->bindParam(':num', $num);
    $nb= $_REQUEST->execute();




//Ce qu'il y a en haut c'est du SQL


if($nb==1){
    $_SESSION['message']=["success"=>'<strong>La nationalité a correctement été supprimée !</strong>'];
}
else{
    $_SESSION['message']=["danger"=>"<strong>La nationalité n'a correctement été supprimée !</strong>"];
}
  header('location:listeNationalites.php');
  exit();
?>

