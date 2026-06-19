<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    protected $bantalSelimut;
    protected $layananButler;

    public function getDaftarVelvet($db) {
        $stmt = $db->prepare("SELECT * FROM tabel_tiket WHERE jenis_studio='velvet'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hitungTotalHarga() {
        // SESUAI SOAL: (jumlah_kursi * hargaDasarTiket) * 1.50
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoStudio() {
        return "Studio Velvet - Surcharge Premium 50%.";
    }
}
?>