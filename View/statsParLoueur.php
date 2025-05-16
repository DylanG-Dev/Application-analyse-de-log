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
                <form method="post" action="index.php?statsParLoueur">
                    <table id="statsLoueur">
                        <tr>
                            <td colspan="3"><input type="text" name="id" min="0" placeholder="Nom du loueur" /></td>
                        </tr>

                        <tr>
                            <td><br><a href="#"><input class="btn btn-warning" name="btnErase" type="reset" value="Effacer" /></a></td>
                            <td><br><input class="btn btn-primary" name="btnRecherche" type="submit" value="Chercher" /></td>

                            <?php if (isset($_POST['btnRecherche'])): ?>
                                <?php if (!empty($logs)): ?>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Date</th>
                                            <th>Erreur KO</th>
                                            <th>Erreur Timeout</th>
                                            <th>Pays</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($logs as $log): ?>
                                            <tr>
                                                <td><?= htmlspecialchars((string) $log['id']) ?></td>
                                                <td><?= htmlspecialchars((string) $log['nom']) ?></td>
                                                <td><?= htmlspecialchars((string) $log['date']) ?></td>
                                                <td><?= htmlspecialchars((string) $log['appelsKO']) ?></td>
                                                <td><?= htmlspecialchars((string) $log['timeouts']) ?></td>
                                                <td><?= htmlspecialchars((string) $log['pays']) ?></td>
                                                <td><?= htmlspecialchars((string) $log['email']) ?></td>
                                                <td><?= htmlspecialchars((string) $log['numTel']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p>Aucun log trouvé pour ce loueur.</p>
                                <?php endif; ?>
                            <?php endif; ?>


                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="text-center mt-4">
    <strong>Giurgiuman Alexandre, Barthelemy Maxence, Gamet Dylan</strong>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>