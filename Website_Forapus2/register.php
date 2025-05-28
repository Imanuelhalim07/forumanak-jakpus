<?php
include 'includes/header.php';
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    // Jika ingin menambahkan role admin secara manual, bisa tambahkan input role di form register
    $role = isset($_POST['role']) ? $_POST['role'] : 'user';

    if (empty($username) || empty($email) || empty($password)) {
        $error = "Semua field harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $error = "Email sudah terdaftar.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$username, $email, $hashed_password, $role])) {
                $success = "Registrasi berhasil. Silakan <a href='login.php'>login</a>.";
            } else {
                $error = "Terjadi kesalahan saat registrasi.";
            }
        }
    }
}
?>

<div class="form-container">
    <h2>Register</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
    <form method="POST" action="register.php" novalidate>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required minlength="6">
        </div>
        <button type="submit" class="button">Register</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>