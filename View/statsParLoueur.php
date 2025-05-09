<h3><?php echo htmlspecialchars($_SESSION['loueur_nom']) ?></h3>
<div id="btnConnexion">
    <a href="connexion.php">Déconnexion</a>
</div>
<form method="post" action="index.php">
    <table id="statsLoueur">
        <tr>
            <td colspan="3"><input type="number" name="id" min="0" placeholder="Id" /></td>
        </tr>

        <tr>
            <td colspan="3"><input type="text" name="nom" placeholder="Nom" /></td>
        </tr>

        <tr>
            <td colspan="3"><input type="date" name="date" min="0" placeholder="Date" /></td>
        </tr>

        <tr>
            <td><br><a href="#"><input class="btn btn-warning" name="btnErase" type="reset" value="Effacer" /></a></td>
        </tr>
    </table>
</form>