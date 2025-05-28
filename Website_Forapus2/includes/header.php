<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
</head>

<header class="header">
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="assets/images/forapus.png" alt="Logo Forapus"></a>
        </div>
        <div class="hamburger" onclick="toggleMenu()">☰</div>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Beranda</a></li>
            <li><a href="profil-organisasi.php" class="<?= basename($_SERVER['PHP_SELF']) == 'profil-organisasi.php' ? 'active' : '' ?>">Profil Organisasi</a></li>
            <li><a href="proker.php" class="<?= basename($_SERVER['PHP_SELF']) == 'proker.php' ? 'active' : '' ?>">Program Kerja</a></li>
            <li><a href="galeri.php" class="<?= basename($_SERVER['PHP_SELF']) == 'galeri.php' ? 'active' : '' ?>">Galeri</a></li>
            <li><a href="survey.php" class="<?= basename($_SERVER['PHP_SELF']) == 'survey.php' ? 'active' : '' ?>">Survey</a></li>
        </ul>
        <div class="user-menu">
            <?php if (isset($_SESSION['username'])): ?>
                <a href="profil-user.php">👤 <?= htmlspecialchars($_SESSION['username']); ?></a> | <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a> | <a href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </nav>
</header>