<h2>Connexion loueur</h2>
<h3><?php echo htmlspecialchars($_SESSION['loueur_nom']) ?></h3>
<div id="btnConnexion">
    <a href="connexion.php?action=connexion">Déconnexion</a>
    <a href="mesStats.php?action=mesStats">Mes statistiques</a>
    <a href="mesInformations.php?action=mesInfos">Mes informations</a>
</div>