<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];
$_REQUEST=$monPdo->prepare("select * from nationalite where num = :num");
$_REQUEST->setFetchMode(PDO::FETCH_OBJ);
$_REQUEST->bindParam(':num', $num);
$_REQUEST->execute();
$LaNationalite = $_REQUEST->fetch();



echo "<div class='container mt-5'>
    <h2 class='pt-3 text-center'> Modifier une nationnalité</h2>
      <form action='valideModifNat.php' method='post' class='col-6 offset-3 border border-secondary p-3 rounded'>
        <div class='form-group'>
            <label for='libelle'>Libellé</label>
            <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value=$LaNationalite->libelle>
        </div>
        <input type='hidden' id='num' name='num' value='$LaNationalite->num'>
        <div class='row'>
            <div class='col'> <a href='http://listeNationalites.php' class='btn btn-warning btn-block'> revenir à la liste</a></div>
            <div class='col'> <button type='submit' class='btn btn-success btn-block'> Modifier</button></div>
        </div>
      </form>
</div>"; ?>
<?php include "header.php";?>
