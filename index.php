<?php
require_once 'database.php';
require_once 'TiketRegular.php';
require_once 'TiketImax.php';
require_once 'TiketVelvet.php';

echo "<h2>Daftar Tiket Bioskop</h2>";

// buat objek kosong untuk akses metode query
$regular = new TiketRegular([]);
$imax    = new TiketImax([]);
$velvet  = new TiketVelvet([]);

// fungsi tampilkan tabel
function tampilkanTabel($data, $studio, $className) {
    echo "<h3>$studio</h3>";
    echo "<table border='1' cellpadding='6'>";
    echo "<tr>
            <th>ID</th>
            <th>Film</th>
            <th>Jadwal</th>
            <th>Kursi</th>
            <th>Harga Dasar</th>
            <th>Total Harga</th>
            <th>Keterangan Studio</th>
          </tr>";
    foreach ($data as $row) {
        // buat objek sesuai class yang dikirim
        $obj = new $className($row);
        echo "<tr>
            <td>{$row['id_tiket']}</td>
            <td>{$row['nama_film']}</td>
            <td>{$row['jadwal_tayang']}</td>
            <td>{$row['jumlah_kursi']}</td>
            <td>{$row['harga_dasar_tiket']}</td>
            <td>{$obj->hitungTotalHarga()}</td>
            <td>{$obj->tampilkanInfoStudio()}</td>
        </tr>";
    }
    echo "</table><br>";
}

// panggil fungsi untuk tiap studio
tampilkanTabel($regular->getDaftarRegular($db), "Studio Regular", "TiketRegular");
tampilkanTabel($imax->getDaftarImax($db), "Studio IMAX", "TiketImax");
tampilkanTabel($velvet->getDaftarVelvet($db), "Studio Velvet", "TiketVelvet");
?>
