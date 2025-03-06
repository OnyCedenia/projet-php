<header class="navbar">
    <nav class="navbar-content">
        <a href="/" class="navbar-logo">My first App PHP</a>
        <ul class="navbar-links">
            <li class="navbar-item">
                <a href="#">Accueil</a>
            </li>
            <li class="navbar-item">
                <a href="#">Profil</a>
            </li>
            <li class="navbar-item">
                <a href="#">Blog</a>
            </li>
        </ul>
        <ul class="navbar-buttons">
            <?php if (!empty($_SESSION['user'])): ?>
                <li class="navbar-item">
                    <a href="/logout.php" class="btn btn-danger">Logout</a>
                </li>
            <?php else: ?>
                <li class="navbar-item">
                    <a href="/login.php" class="btn btn-secondary">Login</a>
                </li>
                <li class="navbar-item">
                    <a href="/register.php" class="btn btn-light">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>