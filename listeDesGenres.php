<?php include "header.php"; 
include "connexionPdo.php";
//list nat
$libelle="";


//constru de la rqt 
$textReq="select * from genre";
if(!empty($_GET)){
  $libelle = $_GET['libelle'];
  if ($libelle != "") {$textReq.= " where libelle like '%".$libelle."%'";}

}

$textReq.=" order by genre.libelle";
$_REQUEST=$monPdo->prepare($textReq);
$_REQUEST->setFetchMode(PDO::FETCH_OBJ);
$_REQUEST->execute();
$LesGenres = $_REQUEST->fetchALL();




//Ce qu'il y a en haut c'est du SQL


?>
<!-- le titre -->

    <div class="container mt-5">
        <div class="row pt-3"> 
            <div class="col-9"><h2>Les genres</h2></div>
            <div class="col-3"><a href='formGenre.php?action=Ajouter' class='btn btn-success'><i class='fa-solid fa-plus'></i>Crée un genre <a></div>
        
        </div>
        <!-- le titre -->


        <form action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3" >
    <div class="row">
      <div class="col">
      <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value='<?php  if ($libelle != ""){echo $libelle;} ?>'> <!-- ($libelle != "")-->
      </div>
      <div class="col">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-warning btn-block">Rechercher </button>
      </div>
    </div>
  </form>



        <table class="table table-hover table-striped table-dark">
        <thead>
                <tr class='d-flex'>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-7">Libellé</th>
                <th scope="col" class="col-md-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($LesGenres as $genre) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$genre->num </td>";
                    echo "<td class='col-md-7'>$genre->libelle</td>";
                    echo "<td class='col-md-3'>
                    <a href='formGenre.php?action=Modifier&num=$genre->num' class='btn btn-primary'><i class='fa-solid fa-pen'></i>Modifier le genre <a>
                    <a href='#supprNat' data-toggle='modal' data-msg='Voulez vous vraiment supprimer ce genre ?' data-suppr='supprGenre.php?num=$genre->num' class='btn btn-danger'><i class='fa-solid fa-trash'></i>Supprimer le genre <a>
                    </td>";
                    echo "</tr>" ;
                
                }
                ?>
                

            </tbody>
            </table>
    </div>

  
    


<?php include "footer.php"; ?>
