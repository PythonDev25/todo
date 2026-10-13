<?php require 'bdcon.php';
session_start();
?>

<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>accueil</title>
</head>

<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                </div>
                <div class="card-header">
                    <h4>
                        <span style="color: blue;">details des produits ajoutés</span>
                        <a href="ajt-prod.php" class="btn btn-danger float-end">ajouter un autre produit</a>
                    </h4>
                </div>


                <div class="card-body">
                    <table class="table table-bordered table-striped">
                <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOM</th>
                                <th>PRIX</th>
                                <th>CATEGORIE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM produits;";
                            $produits = mysqli_query($con, $query);
                            ?>

                            <?php if (mysqli_num_rows($produits) > 0):  ?>

                                <?php foreach ($produits as $produit):  ?>
                                    <tr>
                                        <td><?= $produit['id']; ?></td>
                                        <td><?= $produit['nom'];?></td>
                                        <td><?= $produit['prix']; ?></td>
                                        <td><?= $produit['categorie']; ?></td>
                                        <td>
                                            <a href="voir-prod.php?id=<?= $produit['id']; ?>" class="btn btn-info btn-sm">voir</a>
                                            <a href="modif-prod.php?id=<?= $produit['id']; ?>" class="btn btn-success btn-sm">modifier</a>
                                            <form action="config.php" method="POST" style="display: inline;">
                                                <button type="submit" name="supprimer" value="<?= $produit['id'] ?>" class="btn btn-danger btn-sm">supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach  ?>
                            <?php else: ?>
                                <h5>aucun produit enregistré</h5>
                            <?php endif ?>

                        </tbody>
                    </table>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>