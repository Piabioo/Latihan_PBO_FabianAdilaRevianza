<?php
require_once 'Tiket.php';

class TiketImax extends Tiket {
    protected $kacamata3D;
    protected $efekGerak;

    public function getDaftarImax($db) {
        $stmt = $db->prepare("SELECT * FROM tabel_tiket WHERE jenis_studio='imax'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hitungTotalHarga() {
        // SESUAI SOAL: (jumlah_kursi * hargaDasarTiket) + 35000
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoStudio() {
        return "Studio IMAX - Biaya tambahan Flat Rp35.000.";
    }
}
?>