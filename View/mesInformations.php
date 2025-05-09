<h3><?php echo htmlspecialchars($_SESSION['loueur_nom']) ?></h3>
<div id="btnConnexion">
    <a href="connexion.php">Déconnexion</a>
</div>
<?php
 foreach($loueur as $infoParJour) {
    echo '<h3>'.$loueur->getId().'</h3>';
    echo '<h3>'.$loueur->getNom().'</h3>';
    echo '<p>'.$loueur->getTimeouts().'</p>';
    echo '<p>'.$loueur->getRetourKO().'</p>';
    echo '<small>Publié le '.$loueur->getDate().'</small>';
}
echo <p>nom</p>
echo <p>pays origine</p>
echo <p>email</p>
echo <p>tel</p>
?>



