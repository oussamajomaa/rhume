<!-- début carousel -->
<div id="carouselExampleIndicators" class="carousel slide w-75" style="margin: auto" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-30" style="margin: auto" src="<?= img; ?>rhum3.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-30" style="margin: auto" src="<?= img; ?>rhum2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-30" style="margin: auto" src="<?= img; ?>rhum1.png" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-30" style="margin: auto" src="<?= img; ?>rhum5.png" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-30" style="margin: auto" src="<?= img; ?>rhum4.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- fin carousel -->

<!-- début card -->
<?php
$sql = $pdo->prepare('select * from produit');
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
echo '<div class="container">';
echo '<div class="row">';


$i = 0;

while ($i < count($res)) { ?>

  <div class="col-sm-4">
    <div class="card ">
      <div class="card-body ">
        <img class="d-block w-50" style="margin: auto" src="<?= $res[$i]["photo"] ?>" alt="Third slide">
        <h6 class="card-title"><?= $res[$i]["designation"] ?></h6>
        <h5 class="card-title">Prix <?= $res[$i]["prix"] ?> €</h5>
        <form action="index.php?page=panier&idproduit=<?= $res[$i]['idproduit'] ?>" method="POST">
          <div class="form-group">
            <label for="qtePanier">Saisir la quantité</label>
            <input type="number" min=0 id="qtePanier" value="0" class="form-control" name="qte">
          </div>
          <input type="submit" name="ajoutPanierSubmit" class="btn btn-primary cardButton" value="AJOUTER AU PANIER">
        </form> 
      </div>
    </div>
  </div>
<?php

  $i++;
}
?>

</div>
</div>




<!-- fin card -->