<?php
// ==========================================
// KONEKSI DATABASE
// ==========================================
$host = 'localhost';
$db_name = 'db_latihan_pbo_fabianadilarevianza'; // <--- SILAKAN GANTI Sesuai nama database kamu di Laragon
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// ==========================================
// LOAD DATA MENGGUNAKAN CLASS OOP
// ==========================================
require_once 'Tiket.php';
require_once 'TiketRegular.php';
require_once 'TiketImax.php';
require_once 'TiketVelvet.php';

// Ambil data menggunakan method dari masing-masing class child
$tiketRegInstance = new TiketRegular([]);
$daftarRegular = $tiketRegInstance->getDaftarRegular($db);

$tiketImaxInstance = new TiketImax([]);
$daftarImax = $tiketImaxInstance->getDaftarImax($db);

$tiketVelvetInstance = new TiketVelvet([]);
$daftarVelvet = $tiketVelvetInstance->getDaftarVelvet($db);

// Total akumulasi seluruh film di database
$totalSemuaFilm = count($daftarRegular) + count($daftarImax) + count($daftarVelvet);

// ==========================================
// LOGIKA FILTER NAVIGASI SIDEBAR
// ==========================================
$view = $_GET['view'] ?? 'all';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineSpace - Admin Theater Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="app-container">
        <aside class="sidebar">
            <div class="brand">
                <span class="logo-icon">🎬</span>
                <h2>CINE<span>SPACE</span></h2>
            </div>
            <nav class="menu">
                <a href="index.php?view=all" class="<?= $view == 'all' ? 'active' : '' ?>"><span class="icon">📊</span> Semua Studio</a>
                <a href="index.php?view=regular" class="<?= $view == 'regular' ? 'active' : '' ?>"><span class="icon">🍿</span> Studio Regular</a>
                <a href="index.php?view=imax" class="<?= $view == 'imax' ? 'active' : '' ?>"><span class="icon">⚡</span> Studio IMAX</a>
                <a href="index.php?view=velvet" class="<?= $view == 'velvet' ? 'active' : '' ?>"><span class="icon">🛏️</span> Studio Velvet</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div>
                    <h1>Theater Dashboard</h1>
                    <p class="subtitle">Sistem Monitoring Jadwal & Pendapatan Tiket Studio</p>
                </div>
                <div class="user-profile">
                    <span>Hello, <strong>Fabian</strong></span>
                    <div class="avatar">FA</div>
                </div>
            </header>

            <section class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon icon-blue">🎬</div>
                    <div class="stat-info">
                        <h3>
                            <?php 
                            if ($view == 'regular') {
                                echo count($daftarRegular);
                            } elseif ($view == 'imax') {
                                echo count($daftarImax);
                            } elseif ($view == 'velvet') {
                                echo count($daftarVelvet);
                            } else {
                                echo $totalSemuaFilm;
                            }
                            ?>
                        </h3>
                        <p>
                            <?php 
                            if ($view == 'all') {
                                echo "Total Semua Film";
                            } else {
                                echo "Film " . ucfirst($view) . " Aktif";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon icon-green">💺</div>
                    <div class="stat-info">
                        <h3>Active</h3>
                        <p>Studio Monitoring</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon icon-purple">💎</div>
                    <div class="stat-info">
                        <h3>Premium</h3>
                        <p>System Online</p>
                    </div>
                </div>
            </section>

            <div class="tables-grid">
                
                <?php if ($view == 'all' || $view == 'regular'): ?>
                <section class="card-table tier-regular">
                    <div class="card-header">
                        <h2>🍿 Studio Regular</h2>
                        <span class="badge-count"><?= count($daftarRegular) ?> Jadwal</span>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Film</th>
                                    <th>Jadwal Tayang</th>
                                    <th>Kursi</th>
                                    <th>Harga Dasar</th>
                                    <th>Total Harga</th>
                                    <th>Keterangan Studio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftarRegular as $row): 
                                    $tiket = new TiketRegular($row); ?>
                                    <tr>
                                        <td>#<?= $row['id_tiket'] ?? '-' ?></td>
                                        <td class="film-title"><?= $row['nama_film'] ?? '-' ?></td>
                                        <td class="text-glow"><?= $row['jadwal_tayang'] ?? '-' ?></td>
                                        <td><?= $row['jumlah_kursi'] ?? '-' ?></td>
                                        <td>Rp <?= number_format($row['harga_dasar_tiket'] ?? 0, 0, ',', '.') ?></td>
                                        <td class="price-tag text-regular">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
                                        <td><span class="badge badge-regular"><?= $tiket->tampilkanInfoStudio() ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <?php endif; ?>

                <?php if ($view == 'all' || $view == 'imax'): ?>
                <section class="card-table tier-imax">
                    <div class="card-header">
                        <h2>⚡ Studio IMAX 3D</h2>
                        <span class="badge-count"><?= count($daftarImax) ?> Jadwal</span>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Film</th>
                                    <th>Jadwal Tayang</th>
                                    <th>Kursi</th>
                                    <th>Harga Dasar</th>
                                    <th>Total Harga</th>
                                    <th>Keterangan Studio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftarImax as $row): 
                                    $tiket = new TiketImax($row); ?>
                                    <tr>
                                        <td>#<?= $row['id_tiket'] ?? '-' ?></td>
                                        <td class="film-title"><?= $row['nama_film'] ?? '-' ?></td>
                                        <td class="text-glow"><?= $row['jadwal_tayang'] ?? '-' ?></td>
                                        <td><?= $row['jumlah_kursi'] ?? '-' ?></td>
                                        <td>Rp <?= number_format($row['harga_dasar_tiket'] ?? 0, 0, ',', '.') ?></td>
                                        <td class="price-tag text-imax">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
                                        <td><span class="badge badge-imax"><?= $tiket->tampilkanInfoStudio() ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <?php endif; ?>

                <?php if ($view == 'all' || $view == 'velvet'): ?>
                <section class="card-table tier-velvet">
                    <div class="card-header">
                        <h2>🛏️ Studio Velvet Suite</h2>
                        <span class="badge-count"><?= count($daftarVelvet) ?> Jadwal</span>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Film</th>
                                    <th>Jadwal Tayang</th>
                                    <th>Kursi</th>
                                    <th>Harga Dasar</th>
                                    <th>Total Harga</th>
                                    <th>Keterangan Studio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftarVelvet as $row): 
                                    $tiket = new TiketVelvet($row); ?>
                                    <tr>
                                        <td>#<?= $row['id_tiket'] ?? '-' ?></td>
                                        <td class="film-title"><?= $row['nama_film'] ?? '-' ?></td>
                                        <td class="text-glow"><?= $row['jadwal_tayang'] ?? '-' ?></td>
                                        <td><?= $row['jumlah_kursi'] ?? '-' ?></td>
                                        <td>Rp <?= number_format($row['harga_dasar_tiket'] ?? 0, 0, ',', '.') ?></td>
                                        <td class="price-tag text-velvet">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.') ?></td>
                                        <td><span class="badge badge-velvet"><?= $tiket->tampilkanInfoStudio() ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <?php endif; ?>

            </div>
        </main>
    </div>

</body>
</html>