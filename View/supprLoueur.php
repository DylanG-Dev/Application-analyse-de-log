<h2><?php echo htmlspecialchars($_SESSION['loueur_nom']) ?></h2>
<div id="displayFlex"><div class="container-fluid">
        <div class="row vh-100">
            <div id="side-bar" class="col-12 col-md-3 col-xl-2 bg-dark text-white p-0 d-flex flex-column">
                <nav class="navbar bg-dark border-bottom border-white">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="index.php?deco">
                            <i class="bi bi-house-door"></i>
                            <span class="ms-2">Déconnexion</span>
                        </a>
                    </div>
                </nav>
                <nav class="nav flex-column p-2">
                    <a class="nav-link text-white" href="index.php?historiqueAdmin">
                        <i class="bi bi-speedometer2"></i>
                        <span class="ms-2">Historique</span>
                    </a>
                    <a class="nav-link text-white" href="index.php?derniereStatsAdmin">
                        <i class="bi bi-speedometer2"></i>
                        <span class="ms-2">Dernière stats des loueurs</span>
                    </a>
                    <a class="nav-link text-white" href="index.php?statsParLoueur">
                        <i class="bi bi-speedometer2"></i>
                        <span class="ms-2">Stats par loueur</span>
                    </a>
                    <a class="nav-link text-white" href="index.php?creerLoueur">
                        <i class="bi bi-person-circle"></i>
                        <span class="ms-2">Création d'un loueur</span>
                    </a>
                    <a class="nav-link text-white" href="index.php?modifierLoueur">
                        <i class="bi bi-person-circle"></i>
                        <span class="ms-2">Modification d'un loueur</span>
                    </a>
                    <a class="nav-link text-white" href="index.php?supprimerLoueur">
                        <i class="bi bi-person-circle"></i>
                        <span class="ms-2">Suppression d'un loueur</span>
                    </a>
                </nav>
            </div>
            <div class="col-12 col-md-9 col-xl-10 bg-white">
                <p>Selectionner le  loueur que vous voulez supprimer en saissisant son nom</p>
                <form method="post" action="index.php?supprimerLoueur">
                    <table id="suppr">                                                                                                                                                                                                                                                                                                                                                                                                                               Loueur">
                        <tr>
                            <td colspan="3"><input type="text" name="nom" placeholder="Nom" /></td>
                        </tr>
                        <tr>
                            <td><br><a class="effacer" href="#"><input class="btn btn-warning" name="btnErase" type="reset" value="Effacer" /></a></td>
                            <td><br><input class="btn btn-primary" name="btnValider" type="submit" value="Supprimer" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>



<p>Selectionner le  loueur que vous voulez supprimer en saissisant son nom</p>
<form method="post" action="index.php?supprimerLoueur">
    <table id="suppr">                                                                                                                                                                                                                                                                                                                                                                                                                               Loueur">
        <tr>
            <td colspan="3"><input type="text" name="nom" placeholder="Nom" /></td>
        </tr>
        <tr>
            <td><br><a class="effacer" href="#"><input class="btn btn-warning" name="btnErase" type="reset" value="Effacer" /></a></td>
            <td><br><input class="btn btn-primary" name="btnValider" type="submit" value="Supprimer" /></td>
        </tr>
    </table>
</form>