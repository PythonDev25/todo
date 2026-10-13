 <?php 
 session_start();
 require 'bdcon.php';
   ?>

 <?php if(isset($_POST['ajouter'])): ?>
 <?php $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $prix = mysqli_real_escape_string($con, $_POST['prix']);
    $categorie = mysqli_real_escape_string($con, $_POST['categorie']);
    $query = "INSERT INTO produits (nom, prix, categorie) VALUES ('$nom', '$prix', '$categorie')";
    $query_run = mysqli_query($con, $query);?>
     <?php if($query_run): ?> 
           <?php $_SESSION['message'] = "votre produit a ete ajoute avec succes";
            header("Location: ajt-prod.php");
            exit(0); ?>
        <?php else: ?>
       <?php   $_SESSION['message'] = "desole produit non ajoute";
        header("Location: ajt-prod.php");
        exit(0);?>
         <?php endif ?>
     <?php endif ?>

     
     <?php if(isset($_POST['maj'])):?>
 <?php  $produit_id = mysqli_real_escape_string($con, $_POST['produit_id']);?>
   <?php  $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $prix = mysqli_real_escape_string($con, $_POST['prix']);
    $categorie = mysqli_real_escape_string($con, $_POST['categorie']); ?>
     <?php $query = "UPDATE produits SET nom='$nom', prix='$prix', categorie='$categorie' WHERE id='$produit_id';";?>
    <?php $query_run = mysqli_query($con, $query); ?>
          <?php if($query_run): ?>
            <?php $_SESSION['message'] = "les infos de votre produit ont été mises à jour avec succes !";
            header("Location: index.php");
            exit(0); ?>
        <?php else: ?>
        <?php $_SESSION['message'] = "desole produit non modifié";
        header("Location: index.php");
        exit(0); ?>
         <?php endif ?>
     <?php endif ?>

   <?php if(isset($_POST['supprimer'])): ?>
    <?php $produit_id = mysqli_real_escape_string($con, $_POST['supprimer']); ?>
    <?php $query = "DELETE FROM produits WHERE id='$produit_id'"; ?>
    <?php $query_run = mysqli_query($con, $query); ?>
   <?php if($query_run): ?>
        <?php  $_SESSION['message'] = "le produit a été supprimé avec succes !";
        header("Location: index.php");
        exit(0);?>
    <?php else: ?>
        <?php $_SESSION['message'] = "desole produit non supprime";
        header("Location: index.php");
        exit(0); ?>
    <?php endif ?>
        exit(0); ?>
    <?php endif ?>

 



        
 


 