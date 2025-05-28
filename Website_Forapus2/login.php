<?php
session_start();
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Email dan password harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: index.php");
                exit;
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Email tidak terdaftar.";
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="form-container">
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST" action="login.php" novalidate>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required minlength="6">
        </div>
        <button type="submit" class="button">Login</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
