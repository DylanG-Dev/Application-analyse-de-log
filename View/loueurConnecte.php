<div id="topPage"class="d-flex flex-column min-vh-200">
    <div class="container-fluid flex-grow-1">
        <div class="row">
            <div id="side-bar" class="col-12 col-md-3 col-xl-2 bg-dark text-white p-0 d-flex flex-column">
                <nav class="navbar bg-dark border-bottom border-white">
                    <div class="container-fluid">
                        <a id="deco" class="navbar-brand text-white" href="index.php?deco">
                            <i  class="bi bi-house-door"></i>
                            <span id="boutondeco" class="ms-2"><strong>Déconnexion</strong></span>
                        </a>
                    </div>
                </nav>
                <nav class="nav flex-column p-2">
                    <a class="nav-link text-white" href="index.php?historiqueLoueur">
                        <i class="bi bi-speedometer2"></i>
                        <span class="ms-2">Historique</span>
                    </a>
                    <a class="nav-link text-white" href="index.php?derniereStatsLoueur">
                        <i class="bi bi-speedometer2"></i>
                        <span class="ms-2">Dernière statistiques</span>
                    </a>
                    <a class="nav-link text-white" href="index.php?mesInformations">
                        <i class="bi bi-person-circle"></i>
                        <span class="ms-2">Mes informations</span>
                    </a>
                </nav>
            </div>
            <div class="col-12 col-md-9 col-xl-10 bg-white">
                <header id="head">
                    <h2 class="alert alert-warning"><?php echo htmlspecialchars($_SESSION['loueur_nom']) ?></h2>
                </header>
            </div>
        </div>
    </div>
    <footer class="text-center">
        <h2 id="footer" class="alert alert-warning">Giurgiuman Alexandre, Barthelemy Maxence, Gamet Dylan</h2>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>