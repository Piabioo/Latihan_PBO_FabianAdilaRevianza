<?php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    protected $tipeAudio;
    protected $lokasiBaris;

    public function getDaftarRegular($db) {
        $stmt = $db->prepare("SELECT * FROM tabel_tiket WHERE jenis_studio='regular'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hitungTotalHarga() {
        return $this->hargaDasarTiket;
    }

    public function tampilkanInfoStudio() {
        return "Studio Regular - Harga standar.";
    }
}
?>
