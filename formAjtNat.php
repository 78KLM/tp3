<?php include "header.php"; ?>

<div class="container mt-5">
    <h2 class="pt-3 text-center"> Ajouter une nationnalité</h2>
      <form action="valideAjtNat.php" method="post" class="col-6 offset-3 border border-secondary p-3 rounded">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" name="libelle" id="libelle" class="form-controle" placehoder="Saisir le libellé">
        </div>
        <div class="row">
            <div class="col"> <a href="http://listeNationalites.php" class='btn btn-warning btn-block'> revenir à la liste</a></div>
            <div class="col"> <button type="submit" class='btn btn-success btn-block'> Ajouter</button></div>
        </div>
      </form>
</div>
<?php include "footer.php"; ?>
