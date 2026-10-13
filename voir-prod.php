<?php
require 'bdcon.php';
?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>voir</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                </div>
                <div class="card-header">
                    <h4 style="color: blue;">
                        détails du produit n°<?= htmlspecialchars($_GET['id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        <a href="index.php" class="btn btn-danger float-end">RETOUR</a>
                    </h4>
                </div>
                <div class="card-body">


                    <?php if (isset($_GET['id'])): ?>

                        <?php $produit_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM produits WHERE id='$produit_id'";
                        $query_run = mysqli_query($con, $query); ?>

                        <?php if (mysqli_num_rows($query_run) > 0): ?>
                            <?php $produit = mysqli_fetch_array($query_run); ?>

                            <div class="mb-3">
                                <label>nom</label>
                                <p class="form-control">
                                    <?= $produit['nom']; ?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>prix</label>
                                <p class="form-control">
                                    <?= $produit['prix']; ?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>categorie</label>
                                <p class="form-control">
                                    <?= $produit['categorie']; ?>
                                </p>
                            </div>

                        <?php endif ?>

                    <?php else: ?>

                        <h5>ce produit n'existe pas</h5>

                    <?php endif ?>





                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>