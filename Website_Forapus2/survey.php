<?php
include 'includes/header.php';
include 'includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Forum Anak Jakarta Pusat</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
    <link rel="stylesheet" href="assets/css/gallery.css">
</head>

<body>
    <div class="page-header">
        <h2>Sampaikan Suaramu! (Survei)</h2>
        <p>Berikan masukanmu untuk Forum Anak Jakarta Pusat yang lebih baik.</p>
    </div>
    </header>

    <main class="container form-container">
        <form action="#" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap :</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
            </div>

            <div class="form-group">
                <label for="usia">Usia :</label>
                <input type="number" id="usia" name="usia" min="5" max="18" placeholder="Masukkan Usia Anda" required>
            </div>

            <div class="form-group">
                <select id="minat" name="minat[]" multiple>
                    <option value="kreativitas">Kegiatan Kreativitas (Seni, Budaya)</option>
                    <option value="olahraga">Kegiatan Olahraga</option>
                    <option value="pendidikan">Kegiatan Pendidikan & Literasi</option>
                    <option value="lingkungan">Kegiatan Peduli Lingkungan</option>
                    <option value="advokasi">Kegiatan Advokasi & Hak Anak</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                <small>Anda dapat memilih lebih dari satu minat.</small>
            </div>

            <div class="form-group">
                <label>Apakah Anda tertarik untuk menjadi anggota aktif Forum Anak?</label>
                <div class="radio-group">
                    <input type="radio" id="tertarik_ya" name="tertarik" value="ya">
                    <label for="tertarik_ya">Ya</label>
                </div>
                <div class="radio-group">
                    <input type="radio" id="tertarik_tidak" name="tertarik" value="tidak">
                    <label for="tertarik_tidak">Tidak</label>
                </div>
            </div>

            <button type="submit" class="button">Kirim Survei</button>
        </form>
    </main>
</body>

</html>

<?php include 'includes/footer.php' ?>