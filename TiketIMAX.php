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
        return $this->hargaDasarTiket * 1.25; // surcharge 25%
    }

    public function tampilkanInfoStudio() {
        return "Studio IMAX - Biaya tambahan 25%.";
    }
}
?>
