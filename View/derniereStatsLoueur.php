<h2>Dernières statistiques</h2>
<h3><?php echo htmlspecialchars($_SESSION['loueur_nom']) ?></h3>
<div id="btnConnexion">
    <a href="connexion.php?action=connexion">Déconnexion</a>
    <a href="mesStats?action=connecte">Retour en arrière</a>
    <a href="historiqueLoueur.php?action=historiqueLoueur">Historique</a>
</div>
<?php/*
for($loueur as $infoDuJour) {
    echo '<h3>' . $loueur->getId() . '</h3>';
    echo '<h3>' . $loueur->getNom() . '</h3>';
    echo '<p>' . $loueur->getTimeouts() . '</p>';
    echo '<p>' . $loueur->getRetourKO() . '</p>';
    echo '<small>Publié le ' . $loueur->getDate() . '</small>';
}*/
?>