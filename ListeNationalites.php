<?php include "header.php"; 
include "connexionPdo.php";
//list nat
$libelle="";
$continentSel="Tous";

//constru de la rqt 
$textReq="select nationalite.num, nationalite.libelle as 'libNat', continent.libelle as 'libCont' from nationalite, continent where nationalite.numContinent=continent.num";
if(!empty($_GET)){
  $libelle = $_GET['libelle'];
  $continentSel=$_GET['continent'];
  if ($libelle != "") {$textReq.= " and nationalite.libelle like '%".$libelle."%'";}
  if ($continentSel != "Tous") {$textReq.= " and continent.num = ". $continentSel;}

}
$textReq.=" order by nationalite.libelle";
$_REQUEST=$monPdo->prepare($textReq);
$_REQUEST->setFetchMode(PDO::FETCH_OBJ);
$_REQUEST->execute();
$LesNationalites = $_REQUEST->fetchALL();

        //liste cont
        $_REQUESTCONT=$monPdo->prepare("select * from continent");
        $_REQUESTCONT->setFetchMode(PDO::FETCH_OBJ);
        $_REQUESTCONT->execute();
        $lesContinents=$_REQUESTCONT->fetchALL();
//Ce qu'il y a en haut c'est du SQL

if (!empty($_SESSION['message'])){
  $mesMSG=$_SESSION['message'];
  foreach($mesMSG as $key=>$message){
    echo '<div class="container pt-5">
    <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        </div>';  
  }
  $_SESSION['message']=[];
};

?>



<!-- titre -->
    <div class="container mt-5">
        <div class="row pt-3"> 
            <div class="col-9"><h2>Liste des nationalités</h2></div>
            <div class="col-3"><a href='formNat.php?action=Ajouter' class='btn btn-success'><i class='fa-solid fa-plus'></i>Crée une nationalité <a></div>



  <form action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3" >
    <div class="row">
      <div class="col">
      <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value='<?php  if ($libelle != ""){echo $libelle;} ?>'> <!-- ($libelle != "")-->
      </div>
      <div class="col">
      <select name="continent" class='form-controle'> 
              <?php 
              echo "<option value='Tous'>Tout les contients</option>";
              foreach($lesContinents as $continent){
                $selection=$continent->num == $continentSel ? 'selected' : '';
                echo "<option value='$continent->num' $selection >$continent->libelle</option>";
              }
              ?>
              
            </select>
      </div>
      <div class="col">
        <button type="submit" class="btn btn-warning btn-block">Rechercher </button>
      </div>
    </div>
  </form>



        </div>
        <table class="table table-hover table-striped table-dark">
        <thead>
                <tr class='d-flex'>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-4">Libellé</th>
                <th scope="col" class="col-md-3">Continent</th>
                <th scope="col" class="col-md-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($LesNationalites as $nationalite) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$nationalite->num </td>";
                    echo "<td class='col-md-4'>$nationalite->libNat</td>";
                    echo "<td class='col-md-3'>$nationalite->libCont</td>";
                    echo "<td class='col-md-3'>
                    <a href='formNat.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fa-solid fa-pen'></i>Modifier la nationalité <a>
                    <a href='#supprNat' data-toggle='modal' data-msg='Voulez vous vraiment supprimer cette nationalité ?' data-suppr='supprNat.php?num=$nationalite->num' class='btn btn-danger'><i class='fa-solid fa-trash'></i>Supprimer la nationalité <a>
                    </td>";
                    echo "</tr>" ;
                ///supprNat.php?num=$nationalite->num
                }
                ?>
                

            </tbody>
            </table>
    </div>
  
    


<?php include "footer.php"; ?>
