    <!-- Button trigger modal 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div id='supprNat' class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppréssion</h5>
      </div>
      <div class="modal-body">
        Voulez vous vraiment supprimer cette nationalité ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sucess" data-dismiss="modal">Ne pas supprimer</button>
        <a href="" class="btn btn-danger" id="btnSuppr">Supprimer</a>
      </div>
    </div> <!---supprNat.php?num=--->
  </div>
</div>



<footer class="container">
  <p>&copy; Company 2017-2022</p>
</footer>


    
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>  
<script src="https://kit.fontawesome.com/4bc7a7d669.js" crossorigin="anonymous"></script>  
<script type="text/javascript">
$("a[data-suppr]" ).click(function(){
  var lien = $(this).attr("data-suppr"); //recup btn 
  var msg = $(this).attr("data-msg"); //recup msg 
  $("#btnSuppr").attr("href",lien); // on ecrt ce lien sur btn suppr
  $(".modal-body").text(msg); // on ecrt ce lien sur btn suppr
});

</script>
</body>
</html>