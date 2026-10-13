<?php
session_start();
require'bdcon.php';
?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Modifier</title>
</head>

<body>
    <div class="container mt-5">
     <?php include('message.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                </div>
                <div class="card-header">
                    <h4>
                        <span style="color: blue;">Modifier ce produit</span>
                        <a href="index.php" class="btn btn-danger float-end">RETOUR</a>
                    </h4>
                </div>
                <div class="card-body">
                     
                
                <?php if(isset($_GET['id'])): ?>
                    
                        <?php $produit_id =mysqli_real_escape_string ($con, $_GET['id']);
                        $query = "SELECT * FROM produits WHERE id='$produit_id'";
                        $query_run = mysqli_query($con, $query);?>

                        <?php if(mysqli_num_rows($query_run) > 0): ?>
                            <?php $produit = mysqli_fetch_array ($query_run);?>

                            <form action="config.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="produit_id" value = "<?= $produit['id']; ?>">
                        <div class="mb-3">
                            <label>nom</label>
                            <input type="text" name="nom" value = "<?= $produit['nom']; ?>" placeholder="ex: ventilateur " class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>prix</label>
                            <input type="text" name="prix" value = "<?= $produit['prix']; ?>" placeholder="ex: 8500 FCFA" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>categorie</label>
                            <input type="text" name="categorie" value = "<?= $produit['categorie']; ?>" placeholder="ex: electromenagers" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="maj" class="btn btn-primary">METTRE à JOUR</button>
                        </div>
                    </form>

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