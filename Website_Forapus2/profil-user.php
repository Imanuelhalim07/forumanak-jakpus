<?php
include 'includes/header.php';
include 'includes/koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil data user dari database berdasarkan username session
$username = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "<p>User tidak ditemukan.</p>";
    include 'includes/footer.php';
    exit;
}

// Proses update profil jika form disubmit
$success = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    // Validasi sederhana
    if (empty($nama) || empty($email)) {
        $error = "Nama dan email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        // Update data user
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        if ($stmt->execute([$nama, $email, $user['id']])) {
            $success = "Profil berhasil diperbarui.";
            $_SESSION['username'] = $nama; // Update session username
            // Refresh data user
            $user['username'] = $nama;
            $user['email'] = $email;
        } else {
            $error = "Gagal memperbarui profil.";
        }
    }
}
?>

<main class="container">
    <h2>Profil Pengguna</h2>

    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="POST" action="profil-user.php" enctype="multipart/form-data" class="form-container">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($user['username']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>

        <!-- Tambahan: Upload foto profil -->
        <div class="form-group">
            <label for="foto">Foto Profil</label><br>
            <?php if (!empty($user['foto'])): ?>
                <img src="assets/uploads/<?= htmlspecialchars($user['foto']) ?>" alt="Foto Profil" style="max-width:150px; border-radius:50%; margin-bottom:10px;">
            <?php else: ?>
                <p>Tidak ada foto profil.</p>
            <?php endif; ?>
            <input type="file" id="foto" name="foto" accept="image/*">
        </div>

        <button type="submit" class="button">Simpan Perubahan</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>
