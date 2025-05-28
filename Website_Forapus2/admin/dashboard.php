<?php
session_start();
include '../includes/koneksi.php';

// Cek apakah user sudah login dan memiliki role admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

include '../includes/header.php';
?>

<main class="container">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?>!</p>

    <section class="admin-menu">
        <div class="menu-item">
            <a href="kelola-user.php" class="button">Kelola User</a>
        </div>
        <div class="menu-item">
            <a href="kelola-galeri.php" class="button">Kelola Galeri</a>
        </div>
        <div class="menu-item">
            <a href="kelola-proker.php" class="button">Kelola Program Kerja</a>
        </div>
        <div class="menu-item">
            <a href="kelola-survey.php" class="button">Kelola Survey</a>
        </div>
    </section>
</main>

<style>
.container {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #f0f8ff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    font-family: 'Baloo 2', cursive, sans-serif;
}

h1 {
    color: #007acc;
    text-align: center;
    margin-bottom: 30px;
}

.admin-menu {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.menu-item .button {
    display: inline-block;
    padding: 20px 30px;
    background-color: #20b2aa;
    color: white;
    font-weight: bold;
    font-size: 1.2rem;
    border-radius: 10px;
    text-decoration: none;
    box-shadow: 0 6px 10px rgba(32,178,170,0.6);
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.menu-item .button:hover {
    background-color: #17a398;
    transform: scale(1.05);
}
</style>

<?php
include '../includes/footer.php';
?>
