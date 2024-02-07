<?php include "header.php";


$action=$_GET['action']; //Soit Ajouté soit Modifier

if($action == "Modifier"){
  include "connexionPdo.php";
  $num=$_GET['num'];

  $_REQUEST=$monPdo->prepare("select * from genre where num = :num");
  $_REQUEST->setFetchMode(PDO::FETCH_OBJ);
  $_REQUEST->bindParam(':num', $num);
  $_REQUEST->execute();
  $LeGenre = $_REQUEST->fetch();

  }else ?>



<div class='container mt-5'>
    <h2 class='pt-3 text-center'> <?php echo $action?> un genre </h2>
      <form action='valideFormGenre.php?action=<?php echo $action ?>' method='post' class='col-6 offset-3 border border-secondary p-3 rounded'>
        <div class='form-group'>
            <label for='libelle'>Libellé</label>
            <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value=<?php if($action == "Modifier"){echo $LeGenre->libelle;}?>>
        </div>
        <input type='hidden' id='num' name='num' value=<?php if($action == "Modifier"){ echo $LeGenre->num;}?>>
        <div class='row'>
            <div class='col'> <a href='listeNationalites.php' class='btn btn-warning btn-block'> revenir à la liste</a></div>
            <div class='col'> <button type='submit' class='btn btn-success btn-block'> <?php echo $action ?> </button></div>
        </div>
      </form>
</div>"
<?php include "footer.php";?>
