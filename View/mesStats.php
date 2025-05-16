<h2>Connexion loueur</h2>
<h3><?php echo htmlspecialchars($_SESSION['loueur_nom']) ?></h3>
<div id="btnConnexion">
    <a href="connexion.php?action=connexion">Déconnexion</a>
    <a href="loueurConnecte.php?action=connecte">Retour en arrière</a>
    <a href="historiqueLoueur.php?action=historiqueLoueur">Historique</a>
    <a href="derniereStatsLoueur.php?action=derniereStatsLoueur">Dernières statistiques</a>
    <a href="mesInformations.php,action=mesInfos">Mes informations</a>
</div>