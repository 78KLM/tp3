<?php include "header.php";
$action=$_GET['action']; //Soit Ajouté soit Modifier

include "connexionPdo.php";
if($action == "Modifier"){
  $num=$_GET['num'];

  $_REQUEST=$monPdo->prepare("select * from nationalite where num = :num");
  $_REQUEST->setFetchMode(PDO::FETCH_OBJ);
  $_REQUEST->bindParam(':num', $num);
  $_REQUEST->execute();
  $LaNationalite = $_REQUEST->fetch();



  } 
        //liste cont
    $_REQUESTCONT=$monPdo->prepare("select * from continent");
    $_REQUESTCONT->setFetchMode(PDO::FETCH_OBJ);
    $_REQUESTCONT->execute();
    $lesContinents=$_REQUESTCONT->fetchALL();
   ?>



<div class='container mt-5'>
    <h2 class='pt-3 text-center'> <?php echo $action?> une nationnalité</h2>
      <form action='valideFormNat.php?action=<?php echo $action ?>' method='post' class='col-6 offset-3 border border-secondary p-3 rounded'>
        <div class='form-group'>
            <label for='libelle'>Libellé</label>
            <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value=<?php if($action == "Modifier"){echo $LaNationalite->libelle;}?>>
        </div>

        <div class='form-group'>
            <label for='continent'>Libellé</label>
            <select name="continent" class='form-controle'> 
              <?php 
              foreach($lesContinents as $continent){
                $selection=$continent->num == $LaNationalite->numContinent ? 'selected' : '';
                echo "<option value='$continent->num' $selection >$continent->libelle</option>";
              }
              ?>
              
            </select>
        </div>

        <input type='hidden' id='num' name='num' value=<?php if($action == "Modifier"){ echo $LaNationalite->num;}?>>
        <div class='row'>
            <div class='col'> <a href='listeNationalites.php' class='btn btn-warning btn-block'> revenir à la liste</a></div>
            <div class='col'> <button type='submit' class='btn btn-success btn-block'> <?php echo $action ?> </button></div>
        </div>
      </form>
</div>"
<?php include "footer.php";?>
